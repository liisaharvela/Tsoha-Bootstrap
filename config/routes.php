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
    HorseController::horses_list();
  });

  $routes->get('/horses/1', function() {
    HorseController::horse_show();
  });

  $routes->get('/horses/1/edit', function() {
    HorseController::horse_edit();
  });

  $routes->get('/horse/:id/edit', function($id){
    HorseController::edit($id);
  });

  $routes->post('/horse/:id/edit', function($id){
    HorseController::update($id);
  });

  $routes->post('/horse/:id/destroy', function($id){
    HorseController::destroy($id);
  });

  $routes->get('/login', function(){
    UserController::login();
  });

  $routes->post('/login', function(){
    UserController::handle_login();
  });
