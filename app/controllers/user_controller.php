<?php

  require 'app/models/user.php';

class UserController extends BaseController{
  
  // Sisäänkirjautuminen
  public static function login(){
      View::make('user/login.html');
  }

  // Kirjautumisen käsittely
  public static function handle_login(){
    $params = $_POST;
    $user = User::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }

  // Uloskirjautuminen
  public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
}