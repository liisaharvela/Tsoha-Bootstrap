<?php

class horse extends BaseModel {

	// Attributes
	public $id, $omistaja_id, $talli_id, $name, $sukupuoli, $rotu, $isa, $ema, $varitys, $syntymaaika, $ika;

	// Constructor
	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name', 'validate_sukupuoli', 'validate_rotu', 'validate_isa', 'validate_ema', 'validate_varitys', 'validate_syntymaaika', 'validate_ika');
	}

	// Print all function
	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM hevoset');
		$query->execute();
		$rows = $query->fetchAll();
		$horses=array();

		foreach($rows as $row){
			$horses[] = new Horse(array(
				'id' => $row['id'],
				'omistaja_id' => $row['omistaja_id'],
				'talli_id' => $row['talli_id'],
				'name' => $row['name'],
				'sukupuoli' => $row['sukupuoli'],
				'rotu' => $row['rotu'],
				'isa' => $row['isa'],
				'ema' => $row['ema'],
				'varitys' => $row['varitys'],
				'syntymaaika' => $row['syntymaaika'],
				'ika' => $row['ika']
			));	
		}	
	}

	// Etsi
	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Hevonen WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$horse = new Horse(array(
				'id' => $row['id'],
				'omistaja_id' => $row['omistaja_id'],
				'talli_id' => $row['talli_id'],
				'name' => $row['name'],
				'sukupuoli' => $row['sukupuoli'],
				'rotu' => $row['rotu'],
				'isa' => $row['isa'],
				'ema' => $row['ema'],
				'varitys' => $row['varitys'],
				'syntymaaika' => $row['syntymaaika'],
				'ika' => $row['ika']
			));	

			return $horse;
		}

		return null;
	}

	// Tallennus
	public function save(){
		$query = DB::connection()->prepare('INSERT INTO hevonen (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES (:name, :sukupuoli, :rotu, :isa, :ema, :varitys, :syntymaaika, :ika) RETURNING id');
		$query->execute(array('name' => $this->name, 'sukupuoli' => $this->sukupuoli, 'rotu' => $this->rotu, 'isa' => $this->isa, 'ema' => $this->ema, 'varitys' => $this->varitys, 'syntymaaika' => $this->syntymaaika, 'ika' => $this->ika));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	// Validoi nimi
	public function validate_name(){
		$errors = array();
  		if($this->name == '' || $this->name == null){
    		$errors[] = 'Nimi ei saa olla tyhjä!';
  		}
  		if(strlen($this->name) < 3){
    		$errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_sukupuoli(){
		$errors = array();
  		if($this->sukupuoli == '' || $this->sukupuoli == null){
    		$errors[] = 'Sukupuoli ei saa olla tyhjä!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_rotu(){
		$errors = array();
  		if($this->rotu == '' || $this->rotu == null){
    		$errors[] = 'Hevosella tulee olla rotu!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_isa(){
		$errors = array();
  		if($this->isa == '' || $this->isa == null){
    		$errors[] = 'Hevosella tulee olla isä!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_ema(){
		$errors = array();
  		if($this->ema == '' || $this->ema == null){
    		$errors[] = 'Hevosella tulee olla emä!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_varitys(){
		$errors = array();
  		if($this->varitys == '' || $this->varitys == null){
    		$errors[] = 'Hevosella tulee olla väri!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_syntymaaika(){
		$errors = array();
  		if($this->syntymaaika == '' || $this->syntymaaika == null){
    		$errors[] = 'Hevosella tulee olla syntymäaika!';
  		}
  		return $errors;
	}

	// Validointi
	public function validate_ika(){
		$errors = array();
  		if($this->ika == '' || $this->ika == null){
    		$errors[] = 'Hevosella tulee olla ikä!';
  		}
  		return $errors;
	}


}