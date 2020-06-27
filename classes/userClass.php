<?php


include 'database/db.php';
include_once ('session.php');





class Users{


	private $db;


	public function __construct(){
		$this->db = new Connection();
	}

	public function userInfo($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_users WHERE id = '$id'";
		$get = $this->db->select($query);
		return $get;
	}

	public function userUpdate($id, $data, $file){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$nick = mysqli_real_escape_string($this->db->link, $data['nick']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		
		

		$permited = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div)); 
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$image = "../../upload/".$unique_image;
		move_uploaded_file($file_temp, $image);

		$query = "UPDATE tbl_users SET
			     name = '$name',
			     nick = '$nick',
				 email = '$email',
				 password = '$password',			
				 image = '$image' WHERE id = '$id'";
		$update = $this->db->update($query);
		header("Location: userinfo.php");

		/*if($update){
			$msg = 'Profilio informacija atnaujinta';
			return $msg;
		}else{
			$msg = 'Profilio informacija neatnaujinta';
			return $msg;
		}*/

	}

	public function isAdmin($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_users WHERE id = '$id'";
		$select = $this->db->select($query);
		return $select;

	}

	public function userReg($data){
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		$nick = mysqli_real_escape_string($this->db->link, $data['nick']);
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		if(empty($email) OR empty($password) OR empty($nick) OR empty($name)){
			header("Location: register.php");
		}else{
		$query = "INSERT INTO tbl_users (email, password, nick, name) VALUES ('$email', '$password', '$nick', '$name')";
		$insert = $this->db->insert($query);
			
			Session::start();
			Session::set("userLogin", true);
			$query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
			$login = $this->db->select($query);
			$result = $login->fetch_assoc();
			Session::set("userid", $result['id']);

		header("Location: view/user/userinfo.php");
		}
		
	}

	public function userLogin($data){
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		$query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
		$login = $this->db->select($query);
	
		if(empty($email) OR empty($password)){
			$msg = "Neivedete duomenu";
			return $msg;
		}
		if($login->num_rows > 0 ){
			
			$result = $login->fetch_assoc();
			Session::start();
			Session::set("userLogin", true);
			Session::set("useremail", $result['email']);
			Session::set("usernick", $result['nick']);
			Session::set("username", $result['name']);
			Session::set("userpass", $result['password']);
			Session::set("userid", $result['id']);
			header("Location: view/user/userinfo.php");
			
		}else{
			$msg = "Neteisingi prisijungimo duomenys";
			return $msg;
		}



	}







}









?>


