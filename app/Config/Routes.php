<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/**
 * TODO: Add routes for all href
 * TODO: make routes autoroutable
 */
$routes->get('/', 'Home::index');
$routes->get('spalten', 'Columns::getIndex');
$routes->get('spalten/formular', 'Columns::getForm');
$routes->get('impressum', 'Impressum::getIndex');