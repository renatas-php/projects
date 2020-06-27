<?php


include ('../inc/navbar.php');
include('../../classes/postsClass.php');
include('../../helper.php');

$help = new Helpers();

$post = new Posts();

if(isset($_GET['deletePost'])){
	$id = $_GET['deletePost'];
	$delete = $post->deletePostId($id);
}


?>



	

<div class="col-md-7 my-5">
<div class="d-flex justify-content-end">



	<a href="../post/addpost.php" class="btn btn-success float-right mb-2">+ Pridėti įrašą</a></div>
	
	<div class="card card-default">
		<div class="card-header"><b>Įrašų sąršas</b></div>
		<div class="card-body">
	

	
<table class="table">

			<thead>
			<th>Antraštė</th>
			<th>Data</th>
			<th>Kategorija</th>
			<th></th>
				</thead>
	

		
			<?php

$post = new posts();
$userid = Session::get('userid');
$getPosts = $post->readPostsById($userid);
while($result = $getPosts->fetch_assoc()){
	?>
	<?php


	?>

			<tbody>
			<tr>

				<td>
					
					 <?php echo $help->textShort($result['title'], 35); ?>
				</td>

				<td>
					
					 <?php echo $result['date'] ?>
				</td>
				<td>
				<?php echo $result['name']?>

				</td>
				<td>
					
					<a href="?deletePost=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm float-right">Pašalinti</a>
					
					 <a href="../post/editpost.php?postid=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm float-right mr-2">Redaguoti</a>
					

				</td>
				

				
			</tr>	<?php	}

?>


		</tbody>




		</table>
		
					


</div>
	

</div>

</div>
</div>








