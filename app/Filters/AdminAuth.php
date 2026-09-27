<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $isAdminLoggedIn = session()->get('is_admin_logged_in');

        if (
            $isAdminLoggedIn !== true &&
            $isAdminLoggedIn !== 1 &&
            $isAdminLoggedIn !== '1'
        ) {
            return redirect()
                ->to('/admin/login')
                ->with(
                    'error',
                    'Sesi admin sudah berakhir. Silakan login kembali.'
                );
        }

        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Tidak ada tindakan setelah request.
    }
}