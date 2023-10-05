<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
 * --------------------------------------------------------------------
 * Routes de base
 * --------------------------------------------------------------------
*/

/*
 * Regroupement de routes pour les voyages (travel) et les modèles de voyages (model)
 */
$routes->group("/travel", function (RouteCollection $routes) {

    $routes->group("/model", function (RouteCollection $routes) {
        $routes->get("/", "ModelTravelController::viewList", ["as" => "modelTravelList"]);
        $routes->get("/add", "ModelTravelController::viewAdd");
        $routes->get("/(:num)", "ModelTravelController::viewDetail/$1");
        $routes->get("/(:num)/edit", "ModelTravelController::viewEdit/$1");
        $routes->get("/(:num)/delete", "ModelTravelController::delete/$1");
    });

    $routes->get("/", "TravelController::viewList");
    $routes->get("/add", "TravelController::viewAdd");
    $routes->get("/(:num)", "TravelController::viewDetail/$1");
    $routes->get("/(:num)/edit", "TravelController::viewEdit/$1");
    $routes->get("/(:num)/delete", "TravelController::delete/$1");
});

/*
 * Regroupement de routes pour les avis clients (reviews)
 */
$routes->group("/reviews", function (RouteCollection $routes) {
    $routes->get("/", "ReviewController::viewList");
    $routes->get("/add", "ReviewController::viewAdd");
    $routes->get("/(:num)", "ReviewController::viewDetail/$1");
});

$routes->get("/", "HomeController::view");
$routes->get("/login", "LoginController::view");

/*
 * --------------------------------------------------------------------
 * Routes de retour de formulaire
 * --------------------------------------------------------------------
 */
$routes->post("/login", "LoginController::login");
$routes->get("/logout", "LoginController::logout");
$routes->post("/model/travel/add", "ModelTravelController::add");
$routes->post("/model/travel/(:num)/edit", "ModelTravelController::edit/$1");
$routes->post("/travel/add", "TravelController::add");
$routes->post("/travel/(:num)/edit", "TravelController::edit/$1");
$routes->post("/reviews/add", "ReviewController::add");
