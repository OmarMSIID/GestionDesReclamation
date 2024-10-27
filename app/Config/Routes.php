<?php

use App\Controllers\Acceuil;
use App\Controllers\ReclamationController;
use App\Models\ReclamationModel;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Acceuil::class,'index']);

$routes->get('/reclamation',[ReclamationController::class,'fillClaim']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->post('/admin/delete/(:segment)',[ReclamationModel::class,'deleteClaim']);


