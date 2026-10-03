```php
<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    /**
     * Halaman checkout.
     */
    public function index($slug)
    {
        $eventModel = new EventModel();

        $event = $eventModel
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }

        return view('checkout/index', [
            'event' => $event
        ]);
    }


    /**
     * Proses pembelian tiket.
     */
    public function process()
    {
        $eventId = (int) $this->request->getPost('event_id');

        $name = trim((string) $this->request->getPost('name'));
        $email = trim((string) $this->request->getPost('email'));
        $phone = trim((string) $this->request->getPost('phone'));

        $quantity = (int) $this->request->getPost('quantity');

        $paymentMethod = trim(
            (string) $this->request->getPost('payment_method')
        );

        if (!$eventId || !$name || !$email || !$phone) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Semua data pembelian wajib diisi.'
                );
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Format email tidak valid.'
                );
        }

        if ($quantity < 1 || $quantity > 10) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah tiket harus antara 1 sampai 10.'
                );
        }

        if ($paymentMethod === '') {
            $paymentMethod = 'qris';
        }

        $allowedPayments = [
            'qris',
            'bank_transfer',
            'ewallet'
        ];

        if (!in_array($paymentMethod, $allowedPayments, true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Metode pembayaran tidak valid.'
                );
        }


        // =========================
        // AMBIL EVENT
        // =========================

        $eventModel = new EventModel();

        $event = $eventModel
            ->where('id', $eventId)
            ->where('status', 'published')
            ->first();

        if (!$event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }


        // =========================
        // HARGA
        // =========================

        $price = (float) ($event['price'] ?? 0);

        $total = $price * $quantity;


        // =========================
        // ORDER CODE
        // =========================

        $orderCode =
            'NE-' .
            date('YmdHis') .
            '-' .
            strtoupper(bin2hex(random_bytes(2)));


        // =========================
        // SIMPAN ORDER
        // =========================

        $orderModel = new OrderModel();

        $orderData = [
            'order_code'      => $orderCode,
            'event_id'        => $event['id'],
            'buyer_name'      => $name,
            'buyer_email'     => $email,
            'buyer_phone'     => $phone,
            'subtotal'        => $total,
            'service_fee'     => 0,
            'total_amount'    => $total,
            'payment_method'  => $paymentMethod,
            'payment_status'  => 'waiting_payment',
            'order_status'    => 'waiting_payment',
        ];

        try {
            $inserted = $orderModel->insert($orderData);
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Pesanan gagal dibuat: ' . $e->getMessage()
                );
        }

        if (!$inserted) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Pesanan gagal dibuat. Silakan coba lagi.'
                );
        }

        $orderId = $orderModel->getInsertID();

        if (!$orderId) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kode pemesanan gagal dibuat.'
                );
        }


        /*
         * PENTING:
         * Payment tidak bergantung pada session.
         *
         * Order code dikirim langsung melalui URL.
         */
        return redirect()->to(
            base_url(
                'checkout/payment?order=' .
                urlencode($orderCode)
            )
        );
    }


    /**
     * Halaman pembayaran / QRIS.
     */
    public function payment()
    {
        /*
         * Ambil order code dari URL.
         */
        $orderCode = trim(
            (string) $this->request->getGet('order')
        );


        /*
         * Fallback session jika masih tersedia.
         */
        if ($orderCode === '') {
            $sessionOrder = session()->get('ticket_order');

            if (!empty($sessionOrder['order_code'])) {
                $orderCode = $sessionOrder['order_code'];
            }
        }

        if ($orderCode === '') {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Kode pemesanan tidak ditemukan.'
                );
        }


        // =========================
        // AMBIL ORDER
        // =========================

        $orderModel = new OrderModel();

        $dbOrder = $orderModel
            ->where('order_code', $orderCode)
            ->first();

        if (!$dbOrder) {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Pesanan tidak ditemukan.'
                );
        }


        // =========================
        // AMBIL EVENT
        // =========================

        $eventModel = new EventModel();

        $event = $eventModel
            ->where('id', $dbOrder['event_id'])
            ->first();

        if (!$event) {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Event untuk pesanan tidak ditemukan.'
                );
        }


        // =========================
        // JUMLAH TIKET
        // =========================

        $price = (float) ($event['price'] ?? 0);

        $quantity = 1;

        if ($price > 0) {
            $calculatedQuantity =
                (float) $dbOrder['subtotal'] / $price;

            if ($calculatedQuantity >= 1) {
                $quantity = (int) round(
                    $calculatedQuantity
                );
            }
        }


        // =========================
        // DATA ORDER
        // =========================

        $order = [
            'id'             => $dbOrder['id'],
            'order_code'     => $dbOrder['order_code'],
            'event_id'       => $dbOrder['event_id'],
            'event_title'    => $event['title'],
            'event_slug'     => $event['slug'],
            'name'           => $dbOrder['buyer_name'],
            'email'          => $dbOrder['buyer_email'],
            'phone'          => $dbOrder['buyer_phone'],
            'quantity'       => $quantity,
            'price'          => $price,
            'total'          => (float) $dbOrder['total_amount'],
            'payment_method' => $dbOrder['payment_method'],
            'status'         => $dbOrder['payment_status'],
            'created_at'     => $dbOrder['created_at'],
        ];


        /*
         * Session hanya sebagai backup.
         */
        session()->set(
            'ticket_order',
            $order
        );


        return view('checkout/payment', [
            'order' => $order
        ]);
    }


    /**
     * Konfirmasi pembayaran.
     */
    public function confirmPayment()
    {
        /*
         * Ambil order code dari POST.
         */
        $orderCode = trim(
            (string) $this->request->getPost('order')
        );

        /*
         * Fallback GET.
         */
        if ($orderCode === '') {
            $orderCode = trim(
                (string) $this->request->getGet('order')
            );
        }

        /*
         * Fallback session.
         */
        if ($orderCode === '') {
            $sessionOrder = session()->get('ticket_order');

            if (!empty($sessionOrder['order_code'])) {
                $orderCode = $sessionOrder['order_code'];
            }
        }

        if ($orderCode === '') {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Kode pemesanan tidak ditemukan.'
                );
        }


        // =========================
        // CARI ORDER
        // =========================

        $orderModel = new OrderModel();

        $order = $orderModel
            ->where('order_code', $orderCode)
            ->first();

        if (!$order) {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Pesanan tidak ditemukan.'
                );
        }


        // =========================
        // UPDATE STATUS
        // =========================

        try {
            $updated = $orderModel->update(
                $order['id'],
                [
                    'payment_status' => 'paid',
                    'order_status'   => 'paid'
                ]
            );
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Pembayaran gagal dikonfirmasi: ' .
                    $e->getMessage()
                );
        }

        if (!$updated) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Status pembayaran gagal diperbarui.'
                );
        }


        /*
         * Redirect menggunakan order code.
         */
        return redirect()->to(
            base_url(
                'checkout/success?order=' .
                urlencode($orderCode)
            )
        );
    }


    /**
     * Halaman E-Ticket.
     */
    public function success()
    {
        /*
         * Ambil order code dari URL.
         */
        $orderCode = trim(
            (string) $this->request->getGet('order')
        );


        /*
         * Fallback session.
         */
        if ($orderCode === '') {
            $sessionOrder = session()->get('ticket_order');

            if (!empty($sessionOrder['order_code'])) {
                $orderCode = $sessionOrder['order_code'];
            }
        }

        if ($orderCode === '') {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Kode pemesanan tidak ditemukan.'
                );
        }


        // =========================
        // AMBIL ORDER
        // =========================

        $orderModel = new OrderModel();

        $dbOrder = $orderModel
            ->where('order_code', $orderCode)
            ->where('payment_status', 'paid')
            ->first();

        if (!$dbOrder) {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Pembayaran belum ditemukan atau belum lunas.'
                );
        }


        // =========================
        // AMBIL EVENT
        // =========================

        $eventModel = new EventModel();

        $event = $eventModel
            ->where('id', $dbOrder['event_id'])
            ->first();
