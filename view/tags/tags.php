<?php

include '../inc/navbar.php';
include '../../classes/tagClass.php';




?>
<?php

	$tag = new Tags();
	
	if(isset($_GET['deltag'])){
		$id = $_GET['deltag'];
		$delTag = $tag->deleteTag($id);
	}

?>

<div class="col-md-7 my-5">
	<div class="d-flex justify-content-end"><a href="addtag.php" class="btn btn-success mb-2">+ Pridėti žymą</a></div>
	<div class="card card-default">
		<div class="card-header"><b>Žymų sąrašas</b></div>
		<div class="card-body">
			

			<table class="table">
				
				<thead>
					<th>Pavadinimas</th>
					<th></th>
				</thead>


				<?php

					$getTags = $tag->readTags();
					while($result = $getTags->fetch_assoc()){
				?>

				<tbody>
					<tr>
						<td>
							<?php  echo $result['name'] ?>
						</td>

						<td>
							<a href="tagedit.php?tagid=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm float-right">Redaguoti</a>
							<a href="?deltag=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm float-right mr-2">Ištrinti</a>
						</td>
					</tr>	<?php	}
							

				?>

				</tbody>


			</table>








		</div>
	</div>
</div>