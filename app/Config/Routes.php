<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cek', 'Home::cek');

//Auth
$routes->get('/login666', 'Auth::index');
$routes->post('/signin', 'Auth::signin');
$routes->get('/register', 'Auth::register');
$routes->add('/save_register', 'Auth::save_register');
$routes->get('/logout', 'Auth::logout');
$routes->post('/logout', 'Auth::logout');

//Admin
$routes->get('/dashboard', 'Admin::index');
