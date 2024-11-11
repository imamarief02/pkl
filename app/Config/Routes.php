<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 
 
 $routes->get('/', 'Dashboard::index');
		
 $routes->get('/logout', 'AuthController::logout');
 $routes->get('/login', 'AuthController::login');
		
 //$routes->group('', ['filter' => 'auth'], function($routes) {
	 
		$routes->get('/dashboard', 'Dashboard::index');
		$routes->get('/profile', 'Dashboard::profile');
		$routes->get('/settings', 'Dashboard::settings');
		$routes->post('/login-process', 'AuthController::loginProcess');

//});