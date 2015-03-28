<?php

class horse extends BaseModel {

	// Attributes
	public $id, $omistaja_id, $talli_id, $name, $sukupuoli, $rotu, $isa, $ema, $varitys, $syntymaaika, $ika;

	// Constructor
	public function __construct($attributes){
		parent::__construct($attributes);
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

		return $null;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO hevonen (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES (:name, :sukupuoli, :rotu, :isa, :ema, ;varitys, :syntymaaika, :ika) RETURNING id');
		$query->execute(array('name' => $this->name, 'sukupuoli' => $this->sukupuoli, 'rotu' => $this->rotu, 'isa' => $this->isa, 'ema' => $this->ema, 'varitys' => $this->varitys, 'syntymaaika' => $this->syntymaaika, 'ika' => $this->ika));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

}