<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    /**
     * Halaman Login Admin
     */
    public function login()
    {
        return view('admin/login');
    }


    /**
     * Proses Login Admin
     */
    public function attemptLogin()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        // Username dan password admin
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        // Cek login
        if (
            $username === $adminUsername &&
            $password === $adminPassword
        ) {
            session()->set([
                'is_admin_logged_in' => true,
                'admin_username'     => $username,
            ]);

            return redirect()
                ->to('/admin')
                ->with(
                    'success',
                    'Login berhasil. Selamat datang, Admin!'
                );
        }

        // Kalau salah
        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                'Username atau password salah.'
            );
    }


    /**
     * Logout Admin
     */
    public function logout()
    {
        session()->remove([
            'is_admin_logged_in',
            'admin_username',
        ]);

        return redirect()
            ->to('/admin/login')
            ->with(
                'success',
                'Kamu berhasil logout.'
            );
    }
}