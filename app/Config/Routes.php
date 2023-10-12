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

        $routes->get("add", "ModelTravelController::viewAdd", ["as" => "modelTravelViewAdd"]);
        $routes->post("add", "ModelTravelController::add", ["as" => "modelTravelAdd"]);

        $routes->get("(:num)/edit", "ModelTravelController::viewEdit/$1", ["as" => "modelTravelViewEdit"]);
        $routes->post("(:num)/edit", "ModelTravelController::edit/$1", ["as" => "modelTravelEdit"]);

        $routes->get("(:num)/delete", "ModelTravelController::delete/$1", ["as" => "modelTravelDelete"]);
    });

    $routes->get("/", "TravelController::viewList", ["as" => "travelViewList"]);

    $routes->get("add", "TravelController::viewAdd", ["as" => "travelViewAdd"]);
    $routes->post("add", "TravelController::add", ["as" => "travelAdd"]);

    $routes->get("(:num)", "TravelController::viewDetail/$1", ["as" => "travelViewDetail"]);
    $routes->get("(:num)/edit", "TravelController::viewEdit/$1", ["as" => "travelViewEdit"]);    
    $routes->post("(:num)/edit", "TravelController::edit/$1", ["as" => "travelEdit"]);

    $routes->get("(:num)/delete", "TravelController::delete/$1", ["as" => "travelDelete"]);
});

/*
 * Regroupement de routes pour les avis clients (reviews)
 */
$routes->group("reviews", function (RouteCollection $routes) {
    $routes->get("/", "ReviewController::viewList", ["as" => "reviewViewList"]);

    $routes->get("add", "ReviewController::viewAdd", ["as" => "reviewViewAdd"]);
    $routes->post("add", "ReviewController::add", ["as" => "reviewAdd"]);
    
    $routes->get("(:num)", "ReviewController::viewDetail/$1", ["as" => "reviewViewDetail"]);
});

$routes->get("/", "HomeController::view", ["as" => "homeView"]);

$routes->get("/login", "LoginController::view", ["as" => "loginView"]);
$routes->post("/login", "LoginController::login", ["as" => "loginLogin"]);
$routes->get("/logout", "LoginController::logout", ["as" => "loginLogout"]);



