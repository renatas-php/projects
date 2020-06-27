<?php

include('userClass.php');



class Tags{

	private $db;

	public function __construct(){
		$this->db = new Connection();
	}


	public function readTags(){
		$query = "SELECT * FROM tbl_tags";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteTag($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_tags WHERE id = '$id'";
		$delete = $this->db->delete($query);
		header("Location: tags.php");
	}
	public function readTagId($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_tags WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertTag($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$query = "INSERT INTO tbl_tags (name) VALUES('$name')";
		$insert = $this->db->insert($query);
		if($insert){
		header("Location: tags.php");
	}else{
		$msg = "Zyma neprideta";
		return $msg;
	}

	}

	public function updateTag($id, $data){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$query = "UPDATE tbl_tags SET 
				 name = '$name' WHERE id = '$id'";
		$update = $this->db->update($query);
		header("Location: tags.php");
	}



}



?>