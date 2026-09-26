<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


// ======================================================
// HOME — PUBLIC
// ======================================================

$routes->get(
    '/',
    'Home::index'
);


// ======================================================
// EVENTS — PUBLIC
// ======================================================

$routes->get(
    '/events',
    'Events::index'
);

$routes->get(
    '/events/(:segment)',
    'Events::detail/$1'
);


// ======================================================
// CHECKOUT — PUBLIC
// ======================================================

// ======================================================
// PENTING:
// Route khusus seperti /payment dan /success
// HARUS diletakkan SEBELUM /checkout/(:segment)
// agar "payment" dan "success" tidak dianggap slug event.
// ======================================================

// Halaman pembayaran
$routes->get(
    '/checkout/payment',
    'Checkout::payment'
);

// Halaman sukses / e-ticket
$routes->get(
    '/checkout/success',
    'Checkout::success'
);

// Proses checkout
$routes->post(
    '/checkout/process',
    'Checkout::process'
);

// Konfirmasi pembayaran
$routes->post(
    '/checkout/confirm-payment',
    'Checkout::confirmPayment'
);

// Checkout event berdasarkan slug
$routes->get(
    '/checkout/(:segment)',
    'Checkout::index/$1'
);


// ======================================================
// PLACES — PUBLIC
// ======================================================

$routes->get(
    '/places',
    'Places::index'
);

$routes->get(
    '/places/cafe',
    'Places::cafe'
);

$routes->get(
    '/places/cafe/(:segment)',
    'Places::cafeDetail/$1'
);

$routes->get(
    '/places/heritage-culture',
    'Places::heritage'
);

$routes->get(
    '/places/heritage-culture/(:segment)',
    'Places::heritageDetail/$1'
);


// ======================================================
// MAP — PUBLIC
// ======================================================

// Halaman Map Surabaya
$routes->get(
    '/map',
    'Map::index'
);


// ======================================================
// ADMIN — LOGIN
// PUBLIC, TIDAK MEMERLUKAN LOGIN
// ======================================================

// Halaman login admin
$routes->get(
    '/admin/login',
    'Admin\Auth::login'
);

// Proses login admin
$routes->post(
    '/admin/login',
    'Admin\Auth::attemptLogin'
);


// ======================================================
// ADMIN — LOGOUT
// ======================================================

// Logout tidak membutuhkan adminauth
$routes->get(
    '/admin/logout',
    'Admin\Auth::logout'
);


// ======================================================
// ADMIN — DASHBOARD
// WAJIB LOGIN
// ======================================================

$routes->get(
    '/admin',
    'Admin\Dashboard::index',
    [
        'filter' => 'adminauth'
    ]
);


// ======================================================
// ADMIN — PLACES
// WAJIB LOGIN
// ======================================================

// Daftar Places
$routes->get(
    '/admin/places',
    'Admin\Places::index',
    [
        'filter' => 'adminauth'
    ]
);

// Form tambah Place
$routes->get(
    '/admin/places/create',
    'Admin\Places::create',
    [
        'filter' => 'adminauth'
    ]
);

// Simpan Place
$routes->post(
    '/admin/places/store',
    'Admin\Places::store',
    [
        'filter' => 'adminauth'
    ]
);

// Form edit Place
$routes->get(
    '/admin/places/edit/(:num)',
    'Admin\Places::edit/$1',
    [
        'filter' => 'adminauth'
    ]
);

// Detail / lihat Place
$routes->get(
    '/admin/places/view/(:num)',
    'Admin\Places::view/$1',
    [
        'filter' => 'adminauth'
    ]
);

// Update Place
$routes->post(
    '/admin/places/update/(:num)',
    'Admin\Places::update/$1',
    [
        'filter' => 'adminauth'
    ]
);

// Hapus Place
$routes->post(
    '/admin/places/delete/(:num)',
    'Admin\Places::delete/$1',
    [
        'filter' => 'adminauth'
    ]
);


// ======================================================
// ADMIN — EVENTS
// WAJIB LOGIN
// ======================================================

// Daftar Events
$routes->get(
    '/admin/events',
    'Admin\Events::index',
    [
        'filter' => 'adminauth'
    ]
);

// Form tambah Event
$routes->get(
    '/admin/events/create',
    'Admin\Events::create',
    [
        'filter' => 'adminauth'
    ]
);

// Simpan Event
$routes->post(
    '/admin/events/store',
    'Admin\Events::store',
    [
        'filter' => 'adminauth'
    ]
);

// Form edit Event
$routes->get(
    '/admin/events/edit/(:num)',
    'Admin\Events::edit/$1',
    [
        'filter' => 'adminauth'
    ]
);

// Update Event
$routes->post(
    '/admin/events/update/(:num)',
    'Admin\Events::update/$1',
    [
        'filter' => 'adminauth'
    ]
);

// Hapus Event
$routes->post(
    '/admin/events/delete/(:num)',
    'Admin\Events::delete/$1',
    [
        'filter' => 'adminauth'
    ]
);


// ======================================================
// ADMIN — ORDERS
// WAJIB LOGIN
// ======================================================

// Daftar semua pesanan
$routes->get(
    '/admin/orders',
    'Admin\Orders::index',
    [
        'filter' => 'adminauth'
    ]
);

// Detail pesanan
$routes->get(
    '/admin/orders/view/(:num)',
    'Admin\Orders::view/$1',
    [
        'filter' => 'adminauth'
    ]
);