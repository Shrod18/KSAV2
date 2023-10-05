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
        $routes->get("/add", "ModelTravelController::viewAdd", ["as" => "modelTravelViewAdd"]);
        $routes->get("/(:num)", "ModelTravelController::viewDetail/$1", ["as" => "modelTravelViewDetail"]);
        $routes->get("/(:num)/edit", "ModelTravelController::viewEdit/$1", ["as" => "modelTravelViewEdit"]);
        $routes->get("/(:num)/delete", "ModelTravelController::delete/$1", ["as" => "modelTravelDelete"]);
    });

    $routes->get("/", "TravelController::viewList", ["as" => "modelTravelViewList"]);
    $routes->get("/add", "TravelController::viewAdd", ["as" => "modelTravelViewAdd"]);
    $routes->get("/(:num)", "TravelController::viewDetail/$1", ["as" => "modelTravelViewDetail"]);
    $routes->get("/(:num)/edit", "TravelController::viewEdit/$1", ["as" => "modelTravelViewEdit"]);
    $routes->get("/(:num)/delete", "TravelController::delete/$1", ["as" => "modelTravelDelete"]);
});

/*
 * Regroupement de routes pour les avis clients (reviews)
 */
$routes->group("/reviews", function (RouteCollection $routes) {
    $routes->get("/", "ReviewController::viewList", ["as" => "reviewControllerViewList"]);
    $routes->get("/add", "ReviewController::viewAdd", ["as" => "reviewControllerViewAdd"]);
    $routes->get("/(:num)", "ReviewController::viewDetail/$1", ["as" => "reviewControllerViewDetail"]);
});

$routes->get("/", "HomeController::view", ["as" => "homeControllerView"]);
$routes->get("/login", "LoginController::view", ["as" => "loginControllerView"]);

/*
 * --------------------------------------------------------------------
 * Routes de retour de formulaire
 * --------------------------------------------------------------------
 */
$routes->post("/login", "LoginController::login", ["as" => "loginControllerLogin"]);
$routes->get("/logout", "LoginController::logout", ["as" => "loginControllerLogout"]);
$routes->post("/model/travel/add", "ModelTravelController::add", ["as" => "modelTravelControllerAdd"]);
$routes->post("/model/travel/(:num)/edit", "ModelTravelController::edit/$1", ["as" => "modelTravelControllerEdit"]);
$routes->post("/travel/add", "TravelController::add", ["as" => "travelControllerAdd"]);
$routes->post("/travel/(:num)/edit", "TravelController::edit/$1", ["as" => "travelControllerEdit"]);
$routes->post("/reviews/add", "ReviewController::add", ["as" => "reviewControllerAdd"]);
