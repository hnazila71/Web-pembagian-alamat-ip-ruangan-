<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/add-room', 'DashboardController::addRoom', ['filter' => 'auth']);
$routes->post('/store-room', 'DashboardController::storeRoom', ['filter' => 'auth']);

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::store');

$routes->get('room/(:num)', 'RoomController::view/$1');

$routes->post('room/add_computer', 'RoomController::addComputer');
$routes->post('room/edit_computer', 'RoomController::editComputer');
