<?php

include ('db.php');



class Admin{
	
private $db;

public function __construct(){
	$this->db = new Connection();
}



	public function adminLogin($email, $password){
		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, $password);
		
		$query = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password' LIMIT 1";
		$login = $this->db->select($query);
		if(!$login = 1){
			$msg = 'Prisijungimo duomenys neteisingi';
			return $msg;
		}else{
			header("Location: dashboard.php");
		}
	}









}








?>