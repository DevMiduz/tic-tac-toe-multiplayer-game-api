<?php

use CodeIgniter\Router\RouteCollection;

$routes->post('players/test-route', 'Player::test_route');
$routes->get('players/test-retrieve/(:alphanum)', 'Player::test_retrieve/$1');
$routes->get('players/get-all', 'Player::get_all');