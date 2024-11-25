<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/**
 * TODO: Add routes for all href
 */
$routes->get('/', 'Home::index');
$routes->get('spalten', 'Columns::index');
$routes->get('spalten/formular', 'Columns::form');
$routes->get('impressum', 'Impressum::index');