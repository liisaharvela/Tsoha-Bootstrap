<?php

  require 'app/models/horse.php';

  class HorseController extends BaseController{
  	
  	// Etusivu
  	public static function index(){
  		View::make('horse/index.html');
  	}

  	// Hae tietty hevonen
  	public static function show($id){
      $horse = Horse::find($id);

  		View::make('horse/show.html', array('horse' => $horse));
  	}

    // Tallenna hevonen
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
      self::check_logged_in();
      $horse = Horse::find($id);
      View::make('horse/edit.html', array('attributes' => $horse));
    }

    // Hevosen tietojen päivittäminen
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

   // Tallenna hevonen
   public function save(){
    $query = DB::connection()->prepare('INSERT INTO Horse (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES (:name, :sukupuoli, :rotu, :isa, :ema, ;varitys, :syntymaaika, :ika) RETURNING id');
    $query->execute(array('name' => $this->name, 'sukupuoli' => $this->sukupuoli, 'rotu' => $this->rotu, 'isa' => $this->isa, 'ema' => $this->ema, 'varitys' => $this->varitys, 'syntymaaika' => $this->syntymaaika, 'ika' => $this->ika));
    $row = $query->fetch();
    
    Kint::trace();
    Kint::dump($row);
    }

    // Hevoslistaus
    public static function listing(){
      self::check_logged_in();
      $horses = Horse::all();
      View::make('horse/listing.html', array('horses' => $horses));
    }

    // Luo uusi hevonen
    public static function create(){
      self::check_logged_in();
      View::make('horse/new.html');
    }


  }