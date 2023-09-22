<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'StudentController::index');
$routes->get('/studentInfo', 'StudentController::studentInfo');
$routes->post('save', 'StudentController::save');
$routes->get('/edit/(:any)', 'StudentController::editStudentInfo/$1');
$routes->get('/delete/(:any)', 'StudentController::deleteStudentInfo/$1');


