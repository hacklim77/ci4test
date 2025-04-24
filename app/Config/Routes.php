<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Auth
$routes->get('/login666', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->add('/save_register', 'Auth::save_register');

//Admin
$routes->get('/admin', 'Admin::index');
