<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
     * Cek apakah admin sudah login
     */
    private function checkAdmin()
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to('/admin/login');
        }

        return null;
    }


    /**
     * Dashboard Admin
     */
    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        return view('admin/dashboard/index');
    }
}