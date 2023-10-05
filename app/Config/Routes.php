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
        $routes->post("/add", "ModelTravelController::add", ["as" => "modelTravelControllerAdd"]);
        $routes->post("/(:num)/edit", "ModelTravelController::edit/$1", ["as" => "modelTravelControllerEdit"]);
    });

    $routes->get("/", "TravelController::viewList", ["as" => "travelViewList"]);
    $routes->get("/add", "TravelController::viewAdd", ["as" => "travelViewAdd"]);
    $routes->get("/(:num)", "TravelController::viewDetail/$1", ["as" => "travelViewDetail"]);
    $routes->get("/(:num)/edit", "TravelController::viewEdit/$1", ["as" => "travelViewEdit"]);
    $routes->get("/(:num)/delete", "TravelController::delete/$1", ["as" => "travelDelete"]);
    $routes->post("/add", "TravelController::add", ["as" => "travelControllerAdd"]);
    $routes->post("/(:num)/edit", "TravelController::edit/$1", ["as" => "travelControllerEdit"]);
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



$routes->post("/reviews/add", "ReviewController::add", ["as" => "reviewControllerAdd"]);
