<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
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

    public function process()
    {
        $eventId = (int) $this->request->getPost('event_id');
        $name = trim((string) $this->request->getPost('name'));
        $email = trim((string) $this->request->getPost('email'));
        $phone = trim((string) $this->request->getPost('phone'));
        $quantity = (int) $this->request->getPost('quantity');
        $paymentMethod = trim((string) $this->request->getPost('payment_method'));

        if (!$eventId || !$name || !$email || !$phone) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Semua data pembelian wajib diisi.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Format email tidak valid.');
        }

        if ($quantity < 1 || $quantity > 10) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Jumlah tiket harus antara 1 sampai 10.');
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
                ->with('error', 'Metode pembayaran tidak valid.');
        }

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

        $price = (float) ($event['price'] ?? 0);
        $total = $price * $quantity;

        $orderCode = 'NE-'
            . date('YmdHis')
            . '-'
            . strtoupper(bin2hex(random_bytes(2)));

        $orderModel = new OrderModel();

        $orderData = [
            'order_code' => $orderCode,
            'event_id' => $event['id'],
            'buyer_name' => $name,
            'buyer_email' => $email,
            'buyer_phone' => $phone,
            'subtotal' => $total,
            'service_fee' => 0,
            'total_amount' => $total,
            'payment_method' => $paymentMethod,
            'payment_status' => 'waiting_payment',
            'order_status' => 'waiting_payment',
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

        return redirect()->to(
            base_url(
                'checkout/payment?order=' . urlencode($orderCode)
            )
        );
    }

    public function payment()
    {
        $orderCode = trim(
            (string) $this->request->getGet('order')
        );

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

        $order = [
            'id' => $dbOrder['id'],
            'order_code' => $dbOrder['order_code'],
            'event_id' => $dbOrder['event_id'],
            'event_title' => $event['title'],
            'event_slug' => $event['slug'],
            'name' => $dbOrder['buyer_name'],
            'email' => $dbOrder['buyer_email'],
            'phone' => $dbOrder['buyer_phone'],
            'quantity' => $quantity,
            'price' => $price,
            'total' => (float) $dbOrder['total_amount'],
            'payment_method' => $dbOrder['payment_method'],
            'status' => $dbOrder['payment_status'],
            'created_at' => $dbOrder['created_at'],
        ];

        session()->set(
            'ticket_order',
            $order
        );

        return view('checkout/payment', [
            'order' => $order
        ]);
    }

    public function confirmPayment()
    {
        $orderCode = trim(
            (string) $this->request->getPost('order')
        );

        if ($orderCode === '') {
            $orderCode = trim(
                (string) $this->request->getGet('order')
            );
        }

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

        try {
            $updated = $orderModel->update(
                $order['id'],
                [
                    'payment_status' => 'paid',
                    'order_status' => 'paid'
                ]
            );
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Pembayaran gagal dikonfirmasi: '
                    . $e->getMessage()
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

        return redirect()->to(
            base_url(
                'checkout/success?order='
                . urlencode($orderCode)
            )
        );
    }

    public function success()
    {
        $orderCode = trim(
            (string) $this->request->getGet('order')
        );

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

        $eventModel = new EventModel();

        $event = $eventModel
            ->where('id', $dbOrder['event_id'])
            ->first();

        if (!$event) {
            return redirect()
                ->to(base_url('events'))
                ->with(
                    'error',
                    'Event untuk tiket tidak ditemukan.'
                );
        }

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

        $ticketOrder = [
            'id' => $dbOrder['id'],
            'order_code' => $dbOrder['order_code'],
            'event_id' => $dbOrder['event_id'],
            'event_title' => $event['title'],
            'event_slug' => $event['slug'],
            'name' => $dbOrder['buyer_name'],
            'email' => $dbOrder['buyer_email'],
            'phone' => $dbOrder['buyer_phone'],
            'quantity' => $quantity,
            'price' => $price,
            'total' => (float) $dbOrder['total_amount'],
            'payment_method' => $dbOrder['payment_method'],
            'status' => 'paid',
            'paid_at' => $dbOrder['updated_at']
                ?? date('Y-m-d H:i:s'),
            'created_at' => $dbOrder['created_at'],
        ];

        session()->set(
            'ticket_order',
            $ticketOrder
        );

        return view('checkout/success', [
            'order' => $ticketOrder
        ]);
    }
}