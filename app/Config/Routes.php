<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Authentication');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Authentication::viewLogin');
$routes->get('/Login', 'Authentication::viewLogin');
$routes->get('/Login/Google', 'Authentication::googleLogin');
$routes->get('/Logout', 'Authentication::logout');
// $routes->get('/Kasubag/Surat/create', 'surat::create');
// $routes->get('/suratKeluar/create', 'surat::create', ['filter' => 'role:bid_umum']);
// // $routes->get('/surat/disposisi/(:segment)', 'surat::disposisi/$1');
// $routes->get('/surat/edit/(:segment)', 'surat::edit/$1');
// $routes->get('/Kasubag/Surat/edit/(:segment)', 'surat::edit/$1');
// $routes->get('/suratKeluar/edit/(:segment)', 'suratKeluar::edit/$1');
// $routes->get('/Kasubag/Surat/lembar/(:segment)', 'surat::lembar/$1');
// $routes->get('/surat/download/(:segment)', 'surat::download/$1');
// $routes->get('/kasubag/surat/read/(:segment)', 'surat::read/$1');
// // $routes->get('/surat/viewpdf/(:segment)', 'surat::viewpdf/$1');
// $routes->delete('/surat/(:num)', 'surat::delete/$1');
// $routes->get('/Kepala/Surat/(:any)', 'Surat::detail/$1');
// $routes->get('/Kasubag/Surat/(:any)', 'Surat::detail/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
