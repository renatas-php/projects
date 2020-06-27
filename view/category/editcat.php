<?php

include('../inc/navbar.php');
include ('../../classes/catClass.php');



$cat = new Categories();

if(!isset($_GET['catid']) OR $_GET['catid'] == NULL){
echo "<script>window.location = 'categories.php'; </script>";
}else{
	$id = $_GET['catid'];
}



?>

<div class="col-md-7 my-5">
	<?php         
	$data = $cat->readCategoriesId($id);
	$result = $data->fetch_assoc();
if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update'])){
	$name = $_POST['name'];
	$updateCat = $cat->updateCategory($name, $id);
	
	
}

	?>
<div class="d-flex justify-content-end">
	<a href="addcat.php" class="btn btn-success mb-2 float-right">+ Pridėti kategoriją</a>
	</div>
<div class="card card-default">
	<form action=" " method="post">

	<div class="card-header"><b>Redaguoti kategorija</b></div>
	<div class="card-body">
		<label id="name" class="">Pavadinimas</label>
		<input type="text" name="name" class="form-control" value="<?php echo $result['name'] ?>">

		<button type="submit" name="update" class="btn btn-success btn-sm mt-2">Išsaugoti</button>
		</form>
	</div>

</div>




</div>
