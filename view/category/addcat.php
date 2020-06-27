<?php

include ('../inc/navbar.php');
include ('../../classes/catClass.php');




?>

<?php
$cat = new Categories();
if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['addcat'])){
	$name = $_POST['name'];
	$add = $cat->insertCategory($name);
}

?>

<div class="col-md-7 my-5">
	<div class="d-flex justify-content-end">
	<a href="addcat.php" class="btn btn-success float-right mb-2">+ Pridėti kategoriją</a></div>
	<div class="card card-default">
		<div class="card-header">Kategorija
		</div>
		<div class="card-body">
			<form action=" " method="post">
			<div class="form-group">
				<label id="name">Kategorijos pavadinimas</label>
				<input type="text" name="name" class="form-control">
				<button type="submit" name="addcat" class="btn btn-success btn-sm mt-2">Išsaugoti</button>
			</div>
		</form>
		</div>
	</div>
</div>