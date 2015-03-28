<?php

  require 'app/models/horse.php';

  class HorseController extends BaseController{
  	
  	// Get all horses
  	public static function index(){
  		$horses = Horse::all();

  		View::make('horse/index.html', array('horses' => $horses));
  	}

  	// Get one horse
  	public static function show($id){
  		$horse = Horse::find($id);

  		View::make('horse/show/:id', array('horse' => $horse);
  	}

    // Add horse
    public static function store(){
      $params = $_POST;

      $horse = new Horse(array(
        'name' => $params['name'],
        'sukupuoli' => $params['sukupuoli'],
        'rotu' => $params['rotu'],
        'isa' => $params['isa'],
        'ema' => $params['ema'],
        'varitys' => $params['varitys'],
        'syntymaaika' => $params['syntymaaika'],
        'ika' => $params['ika']
      ));

      $horse->save();

      Redirect::to('/horse/' . $horse->id, array('message') => 'Hevonen on lisätty järjestelmään!'));
    }
  }