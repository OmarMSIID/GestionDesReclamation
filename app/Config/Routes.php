<?php

use App\Controllers\A_proposController;
use App\Controllers\AcceuilController;
use App\Controllers\ReclamationController;
use App\Controllers\ObservationController;
use App\Controllers\SuggestionController;
use App\Controllers\StatistiquesController;
use App\Controllers\ConnexionController;
use App\Controllers\Gestion_adminsController;
use App\Controllers\SuivreReclamationController;
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
$routes->get('/Suivre_Reclamation', [SuivreReclamationController::class, 'afficher_formulaire']);
$routes->post('suivre-reclamation-formulaire', [SuivreReclamationController::class,'verifierEtatReclamation']);
//
$routes->get('/Liste_Admins',[Gestion_adminsController::class,'afficher_admins']);
$routes->get('admin/supprimer_admin/(:num)', [Gestion_adminsController::class,'supprimer_admin/$1']);
//les requêtes GET (pour afficher le formulaire) et POST (pour soumettre les données du formulaire) vers la méthode modifier_admin.
$routes->match(['get', 'post'], 'admin/modifier_admin/(:num)', 'Gestion_adminsController::modifier_admin/$1');
//
$routes->get('/Liste_Observations',[ObservationController::class,'afficher_observations']);
$routes->get('admin/supprimer_observation/(:num)', [ObservationController::class,'supprimer_observation/$1']);
//
$routes->get('/Liste_Suggestions',[SuggestionController::class,'afficher_suggestions']);
$routes->get('admin/supprimer_suggestion/(:num)', [SuggestionController::class,'supprimer_suggestion/$1']);

// route pour telecharger le pdf qui contient quelques informations d'une reclamation
$routes->get('telecharger-reclamation/(:any)', 'ReclamationController::telechargerPdf/$1');

$routes->post('/ajouteObservation',[ObservationController::class,'ajouterObservation']);
$routes->get('/Soumettre_Suggestion',[SuggestionController::class,'index']);
$routes->post('/ajouteSuggestion',[SuggestionController::class,'ajouterSuggestion']);


$routes->get('/Ajouter_admins',[Gestion_adminsController::class,'index']);
$routes->post('/ajouteAdmin', [Gestion_adminsController::class,'ajouterAdmin']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);

//-----------------admin routes-----------------------//
$routes->get('/admin/logout',[ConnexionController::class,'logout']);
$routes->get('/Connexion-Connexion-admin',[ConnexionController::class,'index']);
$routes->post('Admin/Connexion',[ConnexionController::class,'Connexion']);
$routes->get('/admin/List_Reclamation',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->get('/admin/delete/(:segment)',[ReclamationController::class,'deleteClaim']);
$routes->get('/admin/accepter/(:segment)',[ReclamationController::class,'accepteClaim']);
$routes->get('/admin/dashboard',[ReclamationController::class,'getDashboard']);


$routes->get('admin/mot-de-passe-oublie', 'ConnexionController::motDePasseOublie');
$routes->post('admin/envoyer-lien', 'ConnexionController::envoyerLien');
$routes->get('admin/reinitialiser-mot-de-passe/(:any)', 'ConnexionController::reinitialiserMotDePasse/$1');
$routes->post('admin/mettre-a-jour-mot-de-passe', 'ConnexionController::mettreAJourMotDePasse');



