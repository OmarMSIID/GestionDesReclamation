<?php

use App\Controllers\A_propos;
use App\Controllers\Acceuil;
use App\Controllers\ReclamationController;
use App\Controllers\Soumettre_Observation;
use App\Controllers\Soumettre_Suggestion;
use App\Controllers\Statistiques;
use App\Models\ReclamationModel;
use App\Controllers\Gestion_admins;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //-----------------pages routes-----------------------//
$routes->get('/', [Acceuil::class,'index']);
$routes->get('/Statistiques',[Statistiques::class,'index']);
$routes->get('/A_propos',[A_propos::class,'index']);

//-----------------formulaires routes-----------------------//
$routes->get('/Soumettre_Reclamation',[ReclamationController::class,'fillClaim']);
$routes->get('/Soumettre_Observation',[Soumettre_Observation::class,'index']);
$routes->get('/Soumettre_Suggestion',[Soumettre_Suggestion::class,'index']);
//$routes->get('/Gestion_admins',[Gestion_admins::class,'index']);
$routes->post('/ajouteReclamation',[ReclamationController::class,'addClaim']);
$routes->post('/ajouteAdmin', [Gestion_admins::class,'ajouterAdmin']);

//-----------------admin routes-----------------------//
$routes->get('/admin/list',[ReclamationController::class,'claimList']);
$routes->get('/admin/view/(:segment)',[ReclamationController::class,'viewClaim']);
$routes->post('/admin/delete/(:segment)',[ReclamationModel::class,'deleteClaim']);
$routes->post('/admin/accepter/(:segment)',[ReclamationModel::class,'accepteClaim']);



