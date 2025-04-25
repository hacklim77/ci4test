<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Auth
$routes->get('/login666', 'Auth::index');
$routes->add('/signin', 'Auth::signin');
$routes->get('/register', 'Auth::register');
$routes->add('/save_register', 'Auth::save_register');

//Admin
$routes->get('/dashboard', 'Admin::index');
