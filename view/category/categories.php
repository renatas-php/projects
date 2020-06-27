<?php

include '../inc/navbar.php';
include'../../classes/catClass.php';

?>

<div class="col-md-7 my-5">
<div class="d-flex justify-content-end">

	<a href="addcat.php" class="btn btn-success float-right mb-2">+ Pridėti kategoriją</a></div>
	
	<div class="card card-default">
		<div class="card-header"><b>Kategorijų sarašas</b></div>
		<div class="card-body">
	

	<?php
	$cat = new Categories();
	if(isset($_GET['deletecat'])){
		$id = $_GET['deletecat'];
		$delcat = $cat->deleteCatById($id);
	}

	?>

<table class="table">

	<thead>
		<th>Pavadinimas</th>

		<th></th>
			
		</thead>

<?php $getCategory = $cat->readCategories();
while($result = $getCategory->fetch_assoc()){ ?>

		<tbody>
			<tr>
			
				<td>
					
					 <?php echo $result['name'] ?>
				</td>

				<td>
					
					<a href="?deletecat=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm float-right">Pašalinti</a>
					
					 <a href="editcat.php?catid=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm float-right mr-2">Redaguoti</a>

				</td>
				
			</tr><?php	}

?>

			</tbody>

		</table>
		
</div>
	
</div>

</div>

</div>



