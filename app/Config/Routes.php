<?php

use App\Controllers\A_proposController;
use App\Controllers\AcceuilController;
use App\Controllers\ReclamationController;
use App\Controllers\ObservationController;
use App\Controllers\SuggestionController;
use App\Controllers\StatistiquesController;
use App\Controllers\ConnexionController;
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
$routes->post('/ajouteObservation',[ObservationController::class,'ajouterObservation']);
$routes->get('/Soumettre_Suggestion',[SuggestionController::class,'index']);
$routes->post('/ajouteSuggestion',[SuggestionController::class,'ajouterSuggestion']);
$routes->get('/Connexion-Connexion-admin',[ConnexionController::class,'index']);

$routes->get('/Gestion_admins',[Gestion_adminsController::class,'index']);
$routes->post('/ajouteAdmin', [Gestion_adminsController::class,'ajouterAdmin']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->get('/admin/delete/(:segment)',[ReclamationController::class,'deleteClaim']);
$routes->get('/admin/accepter/(:segment)',[ReclamationController::class,'accepteClaim']);



