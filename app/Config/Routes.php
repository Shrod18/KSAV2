<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view");
$routes->get("/login", "LoginController::view");
$routes->get("/travel", "TravelController::viewList");
$routes->get("/travel/add", "TravelController::viewAdd");
$routes->get("/travel/(:num)", "TravelController::viewDetail/$1");
$routes->get("/travel/(:num)/edit", "TravelController::viewEdit/$1");
$routes->get("/travel/(:num)/delete", "TravelController::delete/$1");

$routes->get("/reviews", "ReviewController::viewList");
$routes->get("/reviews/add", "ReviewController::viewAdd");
$routes->get("/reviews/(:num)", "ReviewController::viewDetail/$1");

/*
 * --------------------------------------------------------------------
 * Routes de retour de formulaire
 * --------------------------------------------------------------------
 */

$routes->post("/login", "LoginController::login");
$routes->get("/logout", "LoginController::logout");
$routes->post("/travel/add", "TravelController::add");
$routes->post("/travel/(:num)/edit", "TravelController::edit/$1");
$routes->post("/reviews/add", "ReviewController::add");
