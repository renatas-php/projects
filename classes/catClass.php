<?php

include('tagClass.php');




class Categories{
	
	private $db;

	public function __construct(){
	$this->db = new Connection();
	}

	public function insertCategory($name){
		$name = mysqli_real_escape_string($this->db->link, $name);
		$query = "INSERT INTO tbl_categories (name) VALUES ('$name')";
		$insert = $this->db->insert($query);
		header("Location: categories.php");
		
	}

	public function readCategories(){
		$query = "SELECT * FROM tbl_categories";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateCategory($name, $id){

		$name = mysqli_real_escape_string($this->db->link, $name);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "UPDATE tbl_categories SET 
				  name = '$name' WHERE id = '$id'";
		$update = $this->db->update($query);
		header("Location: categories.php");
	}

	public function readCategoriesId($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_categories WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteCatById($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_categories WHERE id = '$id'";
		$delete = $this->db->delete($query);
		header("Location: categories.php");
	}





}




?>