<?php

include_once __DIR__ . '/../src/Controller/HomeController.php';
include_once __DIR__ . '/../src/Controller/AdminController.php';

$app->get('/',
    'flexauto\controller\HomeController::indexAction')
    ->bind('index');


// La page services
$app->get('/services',
    'flexauto\controller\HomeController::servicesAction')
    ->bind('services');

// La page contact
$app->get('/contact',
    'flexauto\controller\HomeController::contactAction')
    ->bind('contact');

// La page a_propos
$app->get('/a_propos',
    'flexauto\controller\HomeController::aProposAction')
    ->bind('a_propos');


/***    Les routes concernant l'administrateur  ***/

// dashboard
$app->get('/admin/dashboard',
    'flexauto\controller\AdminController::dashboardAction')
    ->bind('dashboard');

// login
$app->match('/login',
    'flexauto\controller\AdminController::loginAction')
    ->bind('login');

// Ajout d'un nouveau véhicule
$app->match('/admin/ajout_auto',
    'flexauto\controller\AdminController::addAutoAction')
    ->bind('auto_add');

//Affiche tous les autos de la BD
$app->match('/admin/get_all_autos',
    'flexauto\controller\AdminController::getAllAutosAction')
    ->bind('allAutos');

//Modifie un auto
$app->match('/admin/edit_auto/{idAuto}',
    'flexauto\controller\AdminController::editAutoAction')
    ->bind('editAuto');

//Montre les détails d'un auto.
$app->match('/admin/detail_auto/{idAuto}',
    'flexauto\controller\AdminController::detailAutoAction')
    ->bind('detailAuto');

//Supprime un auto.
$app->match('/admin/delete_auto/{idAuto}',
    'flexauto\controller\AdminController::deleteAutoAction')
    ->bind('deleteAuto');