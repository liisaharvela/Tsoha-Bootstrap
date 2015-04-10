<?php

  require 'app/models/horse.php';
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
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

      Kint::dump($params);
      $game->save();
    }

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

      Kint::dump($params);
      $game->save();
    }

    public function save(){
    $query = DB::connection()->prepare('INSERT INTO Horse (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES (:name, :sukupuoli, :rotu, :isa, :ema, ;varitys, :syntymaaika, :ika) RETURNING id');
    $query->execute(array('name' => $this->name, 'sukupuoli' => $this->sukupuoli, 'rotu' => $this->rotu, 'isa' => $this->isa, 'ema' => $this->ema, 'varitys' => $this->varitys, 'syntymaaika' => $this->syntymaaika, 'ika' => $this->ika));
    $row = $query->fetch();
    
    Kint::trace();
    Kint::dump($row);
    }

    public static function horses_list(){
      // Hevoslistaus
      View::make('horse/index.html');
    }

    public static function horse_show(){
      // Hevosen tiedot
      View::make('horse/show.html');
    }

    public static function horse_new(){
      // Uusi hevonen
      View::make('horse/new.html');
    }

    public static function horse_edit(){
      // Hevosen muokkaus
      View::make('horse/edit.html');
    }


  }
