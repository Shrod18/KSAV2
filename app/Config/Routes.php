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
$routes->group("travel", function (RouteCollection $routes) {

    $routes->group("model", function (RouteCollection $routes) {
        $routes->get("/", "ModelTravelController::viewList", ["as" => "modelTravelList"]);

        $routes->get("/add", "ModelTravelController::viewAdd", ["as" => "modelTravelViewAdd"]);
        $routes->post("/add", "ModelTravelController::add", ["as" => "modelTravelControllerAdd"]);

        $routes->get("/(:num)/edit", "ModelTravelController::viewEdit/$1", ["as" => "modelTravelViewEdit"]);
        $routes->post("/(:num)/edit", "ModelTravelController::edit/$1", ["as" => "modelTravelControllerEdit"]);

        $routes->post("/(:num)/delete", "ModelTravelController::delete/$1", ["as" => "modelTravelDelete"]);
    });

    $routes->get("/", "TravelController::viewList", ["as" => "travelViewList"]);

    $routes->get("/add", "TravelController::viewAdd", ["as" => "travelViewAdd"]);
    $routes->post("/add", "TravelController::add", ["as" => "travelControllerAdd"]);

    $routes->get("/(:num)", "TravelController::viewDetail/$1", ["as" => "travelViewDetail"]);
    $routes->get("/(:num)/edit", "TravelController::viewEdit/$1", ["as" => "travelViewEdit"]);    
    $routes->post("/(:num)/edit", "TravelController::edit/$1", ["as" => "travelControllerEdit"]);

    $routes->post("/(:num)/delete", "TravelController::delete/$1", ["as" => "travelDelete"]);
});

/*
 * Regroupement de routes pour les avis clients (reviews)
 */
$routes->group("reviews", function (RouteCollection $routes) {
    $routes->get("/", "ReviewController::viewList", ["as" => "reviewControllerViewList"]);

    $routes->get("/add", "ReviewController::viewAdd", ["as" => "reviewControllerViewAdd"]);
    $routes->post("/add", "ReviewController::add", ["as" => "reviewControllerAdd"]);
    
    $routes->get("/(:num)", "ReviewController::viewDetail/$1", ["as" => "reviewControllerViewDetail"]);
});

$routes->get("/", "HomeController::view", ["as" => "homeControllerView"]);

$routes->get("/login", "LoginController::view", ["as" => "loginControllerView"]);
$routes->post("/login", "LoginController::login", ["as" => "loginControllerLogin"]);
$routes->get("/logout", "LoginController::logout", ["as" => "loginControllerLogout"]);



