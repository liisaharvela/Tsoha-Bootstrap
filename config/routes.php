<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

    // Hevosen lisääminen
    $routes->post('/horse', function() {
    HorseController::store();
  });

    // Hevoslisäys
    $routes->get('/horse/new', function() {
    HorseController::create();
  });


  // Hevoslistaus
    $routes->get('/horse', function() {
    HorseController::index();
  });

    // Hevosesittely
    $routes->get('/horse/:id', function($id) {
    HorseController::show($id);
  });

  $routes->get('/horses', function() {
    HelloWorldController::horses_list();
  });

  $routes->get('/horses/1', function() {
    HelloWorldController::horse_show();
  });

  $routes->get('/horses/1/edit', function() {
    HelloWorldController::horse_edit();
  });
