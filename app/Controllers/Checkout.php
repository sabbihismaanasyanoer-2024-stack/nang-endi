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
        // EVENT
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

        $orderModel->insert($orderData);

        $orderId = $orderModel->getInsertID();

        if (!$orderId) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Pesanan gagal dibuat. Silakan coba lagi.'
                );
        }


        // =========================
        // SESSION
        // =========================

        $order = [
            'id'             => $orderId,
            'order_code'     => $orderCode,
            'event_id'       => $event['id'],
            'event_title'    => $event['title'],
            'event_slug'     => $event['slug'],
            'name'           => $name,
            'email'          => $email,
            'phone'          => $phone,
            'quantity'       => $quantity,
            'price'          => $price,
            'total'          => $total,
            'payment_method' => $paymentMethod,
            'status'         => 'waiting_payment',
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        session()->set(
            'ticket_order',
            $order
        );


        return redirect()->to(
            base_url('checkout/payment')
        );
    }


    /**
     * Halaman pembayaran.
     */
    public function payment()
    {
        $order = session()->get('ticket_order');

        if (!$order) {
            return redirect()->to(
                base_url('events')
            );
        }

        return view('checkout/payment', [
            'order' => $order
        ]);
    }


    /**
     * Konfirmasi pembayaran.
     *
     * Setelah pembayaran dikonfirmasi,
     * redirect menggunakan order_code.
     *
     * Jadi halaman E-Ticket tidak bergantung
     * pada session.
     */
    public function confirmPayment()
    {
        $order = session()->get('ticket_order');

        if (!$order || empty($order['id'])) {
            return redirect()->to(
                base_url('events')
            );
        }


        $orderModel = new OrderModel();

        $orderModel->update(
            $order['id'],
            [
                'payment_status' => 'paid',
                'order_status'   => 'paid'
            ]
        );


        $order['status'] = 'paid';

        $order['paid_at'] = date(
            'Y-m-d H:i:s'
        );

        session()->set(
            'ticket_order',
            $order
        );


        /*
         * Jangan redirect hanya ke /checkout/success.
         *
         * Kirim order_code supaya halaman success
         * bisa mengambil data langsung dari database.
         */
        return redirect()->to(
            base_url(
                'checkout/success?order=' .
                urlencode($order['order_code'])
            )
        );
    }


    /**
     * Halaman E-Ticket.
     *
     * Order diambil dari database menggunakan
     * order_code, bukan hanya session.
     */
    public function success()
    {
        $orderCode = trim(
            (string) $this->request->getGet('order')
        );


        // Fallback jika user membuka halaman
        // dari session yang masih tersedia.
        if ($orderCode === '') {
            $sessionOrder = session()->get('ticket_order');

            if (!empty($sessionOrder['order_code'])) {
                $orderCode = $sessionOrder['order_code'];
            }
        }


        if ($orderCode === '') {
            return redirect()->to(
                base_url('events')
            );
        }


        // =========================
        // AMBIL ORDER DATABASE
        // =========================

        $orderModel = new OrderModel();

        $dbOrder = $orderModel
            ->where('order_code', $orderCode)
            ->where('payment_status', 'paid')
            ->first();


        if (!$dbOrder) {
            return redirect()->to(
                base_url('events')
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
            return redirect()->to(
                base_url('events')
            );
        }


        // =========================
        // JUMLAH TIKET
        // =========================

        $quantity = 1;

        $price = (float) ($event['price'] ?? 0);

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
        // DATA UNTUK E-TICKET
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
            'status'         => 'paid',
            'paid_at'        => $dbOrder['updated_at'] ?? date('Y-m-d H:i:s'),
            'created_at'     => $dbOrder['created_at'],
        ];


        // Simpan kembali sebagai convenience,
        // tetapi halaman tidak bergantung pada session.
        session()->set(
            'ticket_order',
            $order
        );


        return view('checkout/success', [
            'order' => $order
        ]);
    }
}