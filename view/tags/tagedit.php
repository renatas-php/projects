<?php


include('../inc/navbar.php');
include('../../classes/tagClass.php');





?>

<?php

if(!isset($_GET['tagid']) OR $_GET['tagid'] == NULL){
	echo "<script>windows.location: 'tags.php' ; <script/>";
}else
{

$id = $_GET['tagid'];

}

	



?>

<?php

$tag = new Tags();
$get = $tag->readTagId($id);
$result = $get->fetch_assoc();


?>


<div class="col-md-6 my-5">
<div class="d-flex justify-content-end"><a href="addtag.php" class="btn btn-success mb-2">+ Prideti zyma</a></div>

<div class="card card-default">
<div class="card-header"><b>Redaguoti zyma</b></div>
<div class="card-body">
	<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update'])){
		$update = $tag->updateTag($id, $_POST);
	}

	?>
<form action="" method="POST">
<div class="form-group">

<label for="name">Pavadinimas</label>
<input name="name" class="form-control" value="<?php echo $result['name']; ?>">

</div>
<button type="submit" name="update" class="btn btn-success btn-sm">Issaugoti</button>
</form>






</div>
</div>

</div>