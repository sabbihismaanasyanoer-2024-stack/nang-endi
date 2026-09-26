<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\EventModel;

class Orders extends BaseController
{
    protected $orderModel;
    protected $eventModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->eventModel = new EventModel();
    }


    /**
     * Daftar semua order.
     */
    public function index()
    {
        // Pastikan hanya admin yang bisa masuk
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to('/admin/login');
        }


        $orders = $this->orderModel
            ->orderBy('created_at', 'DESC')
            ->findAll();


        // Tambahkan informasi event
        foreach ($orders as &$order) {

            $event = $this->eventModel
                ->find($order['event_id']);

            $order['event_title'] = $event['title'] ?? 'Event tidak ditemukan';

        }


        return view('admin/orders/index', [
            'orders' => $orders
        ]);
    }
}