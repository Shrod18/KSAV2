<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view");
$routes->get("/login", "LoginController::view");
$routes->get("/travel", "TravelController::viewList");
$routes->get("/travel/add", "TravelController::viewAdd");

/*
 * --------------------------------------------------------------------
 * Routes de retour de formulaire
 * --------------------------------------------------------------------
 */

$routes->post("/login", "LoginController::login");
$routes->get("/logout", "LoginController::logout");
$routes->post("/travel/add", "TravelController::add");
