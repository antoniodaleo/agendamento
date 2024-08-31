<?php

use App\Controllers\Super\HomeController;
use App\Controllers\Super\UnitsController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);


/*
    Colocar filtros de permissão / autenticação
*/
$routes->group('super', static function ($routes) {
    //home
    $routes->get('/', [HomeController::class, 'index'], ['as' => 'super.home']);


    //Rota delle UNIT
    $routes->group('units', static function ($routes) {
        $routes->get('/', [UnitsController::class, 'index'], ['as' => 'units']);
        $routes->get('edit/(:num)', [UnitsController::class, 'edit/$1'], ['as' => 'units.edit']);
    });
});






