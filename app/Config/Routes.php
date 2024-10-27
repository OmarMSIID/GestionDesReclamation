<?php

use App\Controllers\A_propos;
use App\Controllers\Acceuil;
use App\Controllers\ReclamationController;
use App\Controllers\Statistiques;
use App\Models\ReclamationModel;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Acceuil::class,'index']);
$routes->get('/Statistiques',[Statistiques::class,'index']);
$routes->get('/A_propos',[A_propos::class,'index']);

$routes->get('/Soumettre_Reclamation',[ReclamationController::class,'fillClaim']);
$routes->get('/Soumettre_Observation',[Soumettre_Observation::class,'index']);
$routes->get('/Soumettre_Suggestion',[Soumettre_Suggestion::class,'index']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->post('/admin/delete/(:segment)',[ReclamationModel::class,'deleteClaim']);


