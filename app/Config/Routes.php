<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('books', 'BookController::books_list'); 
$routes->get('bookcontroller/create_book','BookController::create_book');
$routes->post('bookcontroller/store_book','BookController::store_book');
$routes->get('bookcontroller/edit_book/(:num)','BookController::edit_book/$1');
$routes->post('bookcontroller/update_book/(:num)','BookController::update_book/$1');
$routes->post('bookcontroller/delete_book/(:num)','BookController::delete_book/$1');
