<?php

use App\Controllers\A_proposController;
use App\Controllers\AcceuilController;
use App\Controllers\ReclamationController;
use App\Controllers\ObservationController;
use App\Controllers\SuggestionController;
use App\Controllers\StatistiquesController;
use App\Controllers\ConnexionController;
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
//
$routes->get('/Liste_Observations',[ObservationController::class,'afficher_observations']);
$routes->get('admin/supprimer_observation/(:num)', [ObservationController::class,'supprimer_observation/$1']);
//
$routes->get('/Liste_Suggestions',[SuggestionController::class,'afficher_suggestions']);
$routes->get('admin/supprimer_suggestion/(:num)', [SuggestionController::class,'supprimer_suggestion/$1']);

//
$routes->post('/ajouteObservation',[ObservationController::class,'ajouterObservation']);
$routes->get('/Soumettre_Suggestion',[SuggestionController::class,'index']);
$routes->post('/ajouteSuggestion',[SuggestionController::class,'ajouterSuggestion']);
$routes->get('/Connexion-Connexion-admin',[ConnexionController::class,'index']);
$routes->post('Admin/Connexion',[ConnexionController::class,'Connexion']);

$routes->get('/Gestion_admins',[Gestion_adminsController::class,'index']);
$routes->post('/ajouteAdmin', [Gestion_adminsController::class,'ajouterAdmin']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->get('/admin/delete/(:segment)',[ReclamationController::class,'deleteClaim']);
$routes->get('/admin/accepter/(:segment)',[ReclamationController::class,'accepteClaim']);
$routes->get('/admin/dashboard',[ReclamationController::class,'getDashboard']);



