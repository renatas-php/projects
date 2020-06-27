<?php

include('catClass.php');








class Posts{
	
	private $db;

	public $previuos;
	public $next;
	

	public function __construct(){
		$this->db = new Connection();
	}

	public function readPostsByCat($categoryId){
		$categoryId = mysqli_real_escape_string($this->db->link, $categoryId);
		$query = "SELECT tbl_posts.*, tbl_categories.name 
		FROM tbl_posts 
		INNER JOIN tbl_categories 
		ON tbl_posts.category_id = tbl_categories.id WHERE category_id = '$categoryId'";
		$select = $this->db->select($query);
		return $select;


	}

	public function search($text){
		$text = mysqli_real_escape_string($this->db->link, $text);
		$query = "SELECT * FROM tbl_posts
					WHERE title LIKE '%$text%' OR content LIKE '%$text%' 
				OR username LIKE '%$text%' LIMIT 9" ;
		$search = $this->db->select($query);
		return $search;

	}

	public function insertPost($data, $file, $tag_id){
		$title = mysqli_real_escape_string($this->db->link, $data['title']);
		$content = mysqli_real_escape_string($this->db->link, $data['content']);
		$date = date('Y-m-d H:i:s');
		
		$category_id = mysqli_real_escape_string($this->db->link, $data['category_id']);
		$userid =      mysqli_real_escape_string($this->db->link, $data['userid']);
		$username =    mysqli_real_escape_string($this->db->link, $data['username']);

		
		$tag_id =    mysqli_real_escape_string($this->db->link, $tag_id);
		

			

		$permited = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div)); 
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "../../upload/".$unique_image;
		move_uploaded_file($file_temp, $uploaded_image);
		$query = "INSERT INTO tbl_posts (title, content, date,  category_id, image, userid, username, tag_id) VALUES ('$title', '$content', '$date',  '$category_id', '$uploaded_image', '$userid', '$username', '$tag_id')";
	
		$result = $this->db->insert($query);
		header("Location: ../user/userpost.php");



	}
	public function paginate(){

	}
	public function readPosts(){
		$limit = 3;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$start = ($page - 1) * $limit;

		$countQuery = "SELECT * FROM tbl_posts";
		$countResult = $this->db->select($countQuery)->fetch_assoc();

		$total = count($countResult);
		
		$pages = ceil($total / $limit);

		$this->previuos = $page - 1;
		$this->next = $page + 1;
		
		$query = "SELECT tbl_posts.*, tbl_categories.name 
		FROM tbl_posts 
		INNER JOIN tbl_categories 
		ON tbl_posts.category_id = tbl_categories.id LIMIT $start, $limit";
		$result = $this->db->select($query);
		return $result;

	}

	/*public function readPosts(){
		$query = "SELECT tbl_posts.*, tbl_categories.name 
		FROM tbl_posts 
		INNER JOIN tbl_categories 
		ON tbl_posts.category_id = tbl_categories.id";
		$result = $this->db->select($query);
		return $result;
	}*/

	public function readPostId($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_posts WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updatePost($id, $data, $tag_id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$title = mysqli_real_escape_string($this->db->link, $data['title']);
		$content = mysqli_real_escape_string($this->db->link, $data['content']);

		$tag_id =    mysqli_real_escape_string($this->db->link, $tag_id);
		
		$query = "UPDATE tbl_posts SET 
				  title = '$title',
				  content = '$content',
				  tag_id = '$tag_id'
				  WHERE id = '$id'";
		$update = $this->db->update($query);
		header("Location: ../user/userpost.php");

	}

	public function deletePostId($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_posts WHERE id = '$id'";
		$delete = $this->db->delete($query);
		header("Location: userpost.php");
	}

	public function readPostsById($userid){
		$userid = mysqli_real_escape_string($this->db->link, $userid);
		$query = "SELECT tbl_posts.*, tbl_categories.name 
		FROM tbl_posts 
		INNER JOIN tbl_categories 
		ON tbl_posts.category_id = tbl_categories.id WHERE userid = '$userid'";
		$read = $this->db->select($query);
		return $read;
	}

	public function userInfo($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_users WHERE id = '$id'";
		$get = $this->db->select($query);
		return $get;
	}

	

}







?>