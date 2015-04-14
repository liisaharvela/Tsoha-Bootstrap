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

  		View::make('horse/show.html', array('horse' => $horse));
  	}

    // Add horse
    public static function store(){
      $params = $_POST;

      $attributes = array(
        'name' => $params['name'],
        'sukupuoli' => $params['sukupuoli'],
        'rotu' => $params['rotu'],
        'isa' => $params['isa'],
        'ema' => $params['ema'],
        'varitys' => $params['varitys'],
        'syntymaaika' => $params['syntymaaika'],
        'ika' => $params['ika']
      );

      $horse = new Horse($attributes);
      $errors = $horse->errors();

      if(count($errors) == 0){
        $horse->save();
        Redirect::to('/horse/' . $horse->id, array('message' => 'Hevonen on lisätty järjestelmään!'));
      } else{
        View::make('horse/new.html', array('errors' => $errors, 'attributes' => $attributes));
      }    
    }

    // Hevosen muokkaaminen
    public static function edit($id){
      $horse = Horse::find($id);
      View::make('horse/edit.html', array('attributes' => $game));
    }

    // Hevosen päivittäminen
    public static function update($id){
      $params = $_POST;

      $attributes = array(
        'name' => $params['name'],
        'sukupuoli' => $params['sukupuoli'],
        'rotu' => $params['rotu'],
        'isa' => $params['isa'],
        'ema' => $params['ema'],
        'varitys' => $params['varitys'],
        'syntymaaika' => $params['syntymaaika'],
        'ika' => $params['ika']
      );

      $horse = new Horse($attributes);
      $errors = $horse->errors();

      if(count($errors) > 0){
        View::make('horse/edit.html', array('errors' => $errors, 'attributes' => $attributes));
      }else{
        $horse->update();

      Redirect::to('/horse/' . $horse->id, array('message' => 'Hevosta on muokattu onnistuneesti!'));
    }
  }

  // Hevosen poistaminen
  public static function destroy($id){
    $horse = new Horse(array('id' => $id));
    $horse->destroy();

    Redirect::to('/horse', array('message' => 'Hevonen on poistettu onnistuneesti!'));
   }
  }