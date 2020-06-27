<?php

include ('config.php');



class Connection{
	
	public $dbhost = DB_HOST;
	public $dbuser = DB_USER;
	public $dbpass = DB_PASS;
	public $dbname = DB_NAME;


	public $link;
	public $error;

	public function __construct(){
		$this->connect();
	}


	public function connect(){
		$this->link = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if(!$this->link){
			$this->error = "Duomenu bazes prisijungimo klaida".$this->link->connect_error();
			return false;
		}
	}

	public function insert($query){
		$insert = $this->link->query($query);
		return $insert;
	}
	

	public function select($query){
		$select = $this->link->query($query);
		return $select;
	}

	public function update($query){
		$update = $this->link->query($query);
	}

	public function delete($query){
		$delete = $this->link->query($query);
	}














}







?>