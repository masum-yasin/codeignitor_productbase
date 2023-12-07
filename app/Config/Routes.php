<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index',['filter' => 'authGuard']);
$routes->get('/products', 'ProductController::index');
$routes->get('/products/create', 'ProductController::create');
$routes->post('/products/store', 'ProductController::store');
$routes->get('/products/delete/(:num)', 'ProductController::delete/$1');
$routes->get('/products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('/products/update/(:num)', 'ProductController::update/$1');
//signup
$routes->get('/signup','SingupController::index');
$routes->match(['get','post'],'signup/store','SingupController::store');
$routes->get('/signin','SigninController::index');
$routes->post('/login','SigninController::login');
$routes->get('/signout','SigninController::logout');


