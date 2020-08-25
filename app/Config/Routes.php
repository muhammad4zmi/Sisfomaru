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
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/admin/dasboard', 'Admin::index');
$routes->get('/camaba/dasboard', 'User::index');
$routes->get('/camaba/identitas', 'User::data_diri');
$routes->get('/admin/pengaturan/', 'Pengaturan::index');
$routes->get('/admin/informasi/create', 'Informasi::create');
$routes->get('/admin/informasi/', 'Informasi::index');
$routes->get('/admin/menu/', 'Menu::index');
$routes->delete('/admin/menu/(:num)', 'Menu::delete/$1');
$routes->get('/admin/menu/submenu', 'Menu::submenu');
$routes->delete('/admin/menu/submenu/(:num)', 'Menu::delete_submenu/$1');
$routes->delete('/admin/informasi/(:num)', 'Informasi::delete/$1');
$routes->get('/admin/informasi/edit/(:segment)', 'Informasi::edit/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
