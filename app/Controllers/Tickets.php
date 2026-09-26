<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\TicketOrderModel;

class Tickets extends BaseController
{
    public function checkout($slug)
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

        if (empty($event['price']) || $event['price'] <= 0) {
            return redirect()->to('/events/' . $event['slug']);
        }

        return view('tickets/checkout', [
            'event' => $event
        ]);
    }

    public function order()
    {
        $eventId = $this->request->getPost('event_id');
        $name = trim($this->request->getPost('name'));
        $email = trim($this->request->getPost('email'));
        $phone = trim($this->request->getPost('phone'));
        $quantity = (int) $this->request->getPost('quantity');

        if ($quantity < 1) {
            $quantity = 1;
        }

        if ($quantity > 10) {
            $quantity = 10;
        }

        if (
            empty($eventId) ||
            empty($name) ||
            empty($email) ||
            empty($phone)
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Semua data wajib diisi.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Format email tidak valid.');
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

        $ticketPrice = (float) $event['price'];
        $totalPrice = $ticketPrice * $quantity;

        $orderCode = 'NE-' .
            date('Ymd') .
            '-' .
            strtoupper(substr(bin2hex(random_bytes(4)), 0, 6));

        $orderModel = new TicketOrderModel();

        $orderModel->insert([
            'order_code'     => $orderCode,
            'event_id'       => $event['id'],
            'buyer_name'     => $name,
            'buyer_email'    => $email,
            'buyer_phone'    => $phone,
            'quantity'       => $quantity,
            'ticket_price'   => $ticketPrice,
            'total_price'    => $totalPrice,
            'payment_method' => null,
            'payment_status' => 'pending',
        ]);

        $orderId = $orderModel->getInsertID();

        return view('tickets/order', [
            'event'     => $event,
            'orderId'   => $orderId,
            'orderCode' => $orderCode,
            'name'      => $name,
            'email'     => $email,
            'phone'     => $phone,
            'quantity'  => $quantity,
            'total'     => $totalPrice,
        ]);
    }
}