<?php

namespace Config;

use App\Controllers\BarangController;
use App\Controllers\SupplierController;
use App\Controllers\TransaksiController;
use App\Controllers\UsersController;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();



$routes->get('/barang', [BarangController::class, 'index']);
$routes->get('/barang/create', [BarangController::class, 'create']);
$routes->post('/barang/store', [BarangController::class, 'store']);
$routes->get('/barang/edit/(:num)', [BarangController::class, 'edit/$1']);
$routes->post('/barang/update/(:num)', [BarangController::class, 'update/$1']);
$routes->get('/barang/delete/(:num)', [BarangController::class, 'delete/$1']);

$routes->get('/supplier', [SupplierController::class, 'index']);
$routes->get('/supplier/create', [SupplierController::class, 'create']);
$routes->post('/supplier/store', [SupplierController::class, 'store']);
$routes->get('/supplier/edit/(:num)', [SupplierController::class, 'edit/$1']);
$routes->post('/supplier/update/(:num)', [SupplierController::class, 'update/$1']);
$routes->get('/supplier/delete/(:num)', [SupplierController::class, 'delete/$1']);

$routes->get('/transaksi', [TransaksiController::class, 'index']);
$routes->get('/transaksi/create', [TransaksiController::class, 'create']);
$routes->post('/transaksi/store', [TransaksiController::class, 'store']);
$routes->get('/transaksi/edit/(:num)', [TransaksiController::class, 'edit/$1']);
$routes->post('/transaksi/update/(:num)', [TransaksiController::class, 'update/$1']);
$routes->get('/transaksi/delete/(:num)', [TransaksiController::class, 'delete/$1']);
$routes->get('/transaksi/report', 'TransaksiController::report');
$routes->post('/transaksi/generateReport', 'TransaksiController::generateReport');


$routes->get('users', [UsersController::class, 'index']);
$routes->get('users/create', [UsersController::class, 'create']);
$routes->post('users/store', [UsersController::class, 'store']);
$routes->get('users/edit/(:num)', [UsersController::class, 'edit/$1']);
$routes->post('users/update/(:num)', [UsersController::class, 'update/$1']);
$routes->get('users/delete/(:num)', [UsersController::class, 'delete/$1']);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
