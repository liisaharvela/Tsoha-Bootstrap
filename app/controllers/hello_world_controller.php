<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }

    public static function horses_list(){
      // Hevoslistaus
      View::make('suunnitelmat/horses_list.html');
    }

    public static function horse_show(){
      // Hevosen tiedot
      View::make('suunnitelmat/horse_show.html');
    }

    public static function horse_edit(){
      // Hevosen muokkaus
      View::make('suunnitelmat/horses_edit.html');
    }
  }
