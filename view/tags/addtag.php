<?php

include('../inc/navbar.php');
include('../../classes/tagClass.php');


if($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$tag = new Tags();
	$name = $_POST['name'];
	$insert = $tag->insertTag($_POST);
}


?>

<div class="col-md-7 my-5">
	<div class="d-flex justify-content-end"><a href="addtag.php" class="btn btn-success mb-2">+ Pridėti žyma</a></div>
	<div class="card card-default">
		<div class="card-header"></div>
		<div class="card-body">
		<form action="" method="post">	
			<div class="form-group">
				<label for="name">Pavadinimas</label>
				<input type="text" name="name" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Išsaugoti</button>
		</div>
	</div>
</form>
<?php if(isset($insert)){
	echo $insert;
}  ?>
</div>