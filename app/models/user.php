<?php

class user extends BaseModel {

// Attributes
	public $name, $password;

	// Constructor
	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name', 'validate_password');
	}

	public function validate_name(){
		$errors = array();
  		if($this->name == '' || $this->name == null){
    		$errors[] = 'Nimi ei saa olla tyhjä!';
  		}
  		return $errors;
	}

	public function validate_password(){
		$errors = array();
  		if($this->password == '' || $this->password == null){
    		$errors[] = 'Salasana ei saa olla tyhjä!';
  		}
  		return $errors;
	}

	public function authenticate($name, $password) {
		$query = DB::connection()->prepare('SELECT * FROM kayttaja WHERE name = :name AND password = :password LIMIT 1', array('name' => $name, 'password' => $password));
		$query->execute();
		$row = $query->fetch();
		if($row){
			$user = new User($row);
			return $user;
		}else{
			return null;
		}
	}

}