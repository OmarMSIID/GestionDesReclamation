<?php

use App\Controllers\A_proposController;
use App\Controllers\AcceuilController;
use App\Controllers\ReclamationController;
use App\Controllers\ObservationController;
use App\Controllers\SuggestionController;
use App\Controllers\StatistiquesController;
use App\Models\ReclamationModel;
use App\Controllers\Gestion_adminsController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //-----------------pages routes-----------------------//
$routes->get('/', [AcceuilController::class,'index']);
$routes->get('/Statistiques',[StatistiquesController::class,'index']);
$routes->get('/A_propos',[A_proposController::class,'index']);

//-----------------formulaires routes-----------------------//
$routes->get('/Soumettre_Reclamation',[ReclamationController::class,'fillClaim']);
$routes->get('/Soumettre_Observation',[ObservationController::class,'index']);
$routes->get('/Soumettre_Suggestion',[SuggestionController::class,'index']);
$routes->get('/Gestion_admins',[Gestion_adminsController::class,'index']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);
$routes->post('/ajouteAdmin', [Gestion_adminsController::class,'ajouterAdmin']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->post('/admin/delete/(:segment)',[ReclamationModel::class,'deleteClaim']);
$routes->post('/admin/accepter/(:segment)',[ReclamationModel::class,'accepteClaim']);



