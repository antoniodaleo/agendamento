<?php

use App\Controllers\Super\HomeController;
use App\Controllers\Super\ServicesController;
use App\Controllers\Super\UnitsController;
use App\Controllers\UnitsServicesController;
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
        $routes->get('new', [UnitsController::class, 'new'], ['as' => 'units.new']);
        $routes->get('edit/(:num)', [UnitsController::class, 'edit/$1'], ['as' => 'units.edit']);
        $routes->post('create', [UnitsController::class, 'create/$1'], ['as' => 'units.create']);
        $routes->put('update/(:num)', [UnitsController::class, 'update/$1'], ['as' => 'units.update']);
        $routes->put('action/(:num)', [UnitsController::class, 'action/$1'], ['as' => 'units.action']);
        $routes->delete('destroy/(:num)', [UnitsController::class, 'destroy/$1'], ['as' => 'units.destroy']);


        // rotas dos servicos da unidade
        $routes->get('services/(:num)', [UnitsServicesController::class, 'services/$1'], ['as' => 'units.services']);
        
    });


        //Rota delle SERVICOS
        $routes->group('services', static function ($routes) {

            $routes->get('/', [ServicesController::class, 'index'], ['as' => 'services']);
            $routes->get('new', [ServicesController::class, 'new'], ['as' => 'services.new']);
            $routes->get('edit/(:num)', [ServicesController::class, 'edit/$1'], ['as' => 'services.edit']);
            $routes->post('create', [ServicesController::class, 'create/$1'], ['as' => 'services.create']);
            $routes->put('update/(:num)', [ServicesController::class, 'update/$1'], ['as' => 'services.update']);
            $routes->put('action/(:num)', [ServicesController::class, 'action/$1'], ['as' => 'services.action']);
            $routes->delete('destroy/(:num)', [ServicesController::class, 'destroy/$1'], ['as' => 'services.destroy']);
    
        });
    
});






