<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->get('/login', 'Login::index');
 $routes->get('/login/index', 'Login::index');
 $routes->get('/', 'Login::index');
 $routes->get('login/logout', 'Login::logout');
 $routes->post('login/process', 'Login::process');
 $routes->get('/home/index', 'Home::index', ['filter' => 'allfilter']);
 $routes->get('/home/indexhome', 'Home::indexHome', ['filter' => 'allfilter']);
 $routes->get('/menu/catalogue', 'Menu::catalogue', ['filter' => 'allfilter']);
 $routes->get('/menu/distributors_index', 'Menu::distributors_index', ['filter' => 'allfilter']);
 $routes->post('/menu/distributor_add', 'Menu::distributor_add', ['filter' => 'allfilter']);
 $routes->post('/menu/get_distributor_info', 'Menu::get_distributor_info', ['filter' => 'allfilter']);
 $routes->post('/menu/distributor_edit', 'Menu::distributor_edit', ['filter' => 'allfilter']);
 $routes->post('/menu/document_add', 'Menu::document_add', ['filter' => 'allfilter']);
 $routes->get('/menu/upload_index', 'Menu::upload_index', ['filter' => 'allfilter']);
