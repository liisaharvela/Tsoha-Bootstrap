<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      $validate_name = 'validate_name';
      $this->{$validate_name}();

      $validate_sukupuoli = 'validate_sukupuoli';
      $this->{$validate_sukupuoli}();

      $validate_rotu = 'validate_rotu';
      $this->{$validate_rotu}();

      $validate_isa = 'validate_isa';
      $this->{$validate_isa}();

      $validate_ema = 'validate_ema';
      $this->{$validate_ema}();

      $validate_varitys = 'validate_varitys';
      $this->{$validate_varitys}();

      $validate_syntymaaika = 'validate_syntymaaika';
      $this->{$validate_syntymaaika}();

      $validate_ika = 'validate_ika';
      $this->{$validate_ika}();

      $errors = array_merge($errors, $validate_name, $validate_sukupuoli, $validate_rotu, $validate_isa, $validate_ema, $validate_varitys, $validate_syntymaaika, $validate_ika);

      return $errors;
    }

  }
