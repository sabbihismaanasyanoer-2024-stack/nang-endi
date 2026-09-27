<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    /**
     * Halaman checkout event.
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
     * Memproses pesanan tiket.
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


        // =========================
        // VALIDASI DATA
        // =========================

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


        // Saat ini pembayaran menggunakan QRIS.
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
        // HARGA DAN TOTAL
        // =========================

        $price = (float) ($event['price'] ?? 0);

        $total = $price * $quantity;


        // =========================
        // KODE PESANAN
        // =========================

        $orderCode =
            'NE-' .
            date('YmdHis') .
            '-' .
            strtoupper(bin2hex(random_bytes(2)));


        // =========================
        // SIMPAN KE DATABASE
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
        // DATA SESSION
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


        // =========================
        // KE HALAMAN PEMBAYARAN
        // =========================

        return redirect()->to(
            base_url('checkout/payment')
        );
    }


    /**
     * Halaman pembayaran QRIS.
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
     * Catatan:
     * Konfirmasi ini merupakan konfirmasi manual dari pengguna.
     * Sistem belum melakukan verifikasi otomatis ke payment gateway.
     */
    public function confirmPayment()
    {
        $order = session()->get('ticket_order');


        if (!$order) {
            return redirect()->to(
                base_url('events')
            );
        }


        // =========================
        // UPDATE DATABASE
        // =========================

        if (!empty($order['id'])) {

            $orderModel = new OrderModel();

            $orderModel->update(
                $order['id'],
                [
                    'payment_status' => 'paid',
                    'order_status'   => 'paid'
                ]
            );
        }


        // =========================
        // UPDATE SESSION
        // =========================

        $order['status'] = 'paid';

        $order['paid_at'] = date(
            'Y-m-d H:i:s'
        );


        session()->set(
            'ticket_order',
            $order
        );


        // =========================
        // KE E-TICKET
        // =========================

        return redirect()->to(
            base_url('checkout/success')
        );
    }


    /**
     * Halaman E-Ticket.
     */
    public function success()
    {
        $order = session()->get('ticket_order');


        if (!$order) {
            return redirect()->to(
                base_url('events')
            );
        }


        return view('checkout/success', [
            'order' => $order
        ]);
    }
}