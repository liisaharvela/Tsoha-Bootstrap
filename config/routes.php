<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
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
