<?php


include ('view/inc/navbar.php');
include('classes/postsClass.php');






?>





<div class="col-md-6 my-5">
<div class="d-flex justify-content-end">



	<a href="" class="btn btn-success float-right mb-2">+ Pridėti įrašą</a></div>
	
	<div class="card card-default">
		<div class="card-header">Įrašas</div>
		<div class="card-body">

			<?php

$post = new Posts();

$getPosts = $post->readPosts();
while($result = $getPosts->fetch_assoc()){
	?>
	

		<table class="table">
			<th>Nuotrauka</th>
			<th>Antraštė</th>
			<th></th>
			<th></th>
			<tr>
				<td></td>
				<td>
					
					 <p><?php echo $result['title'] ?></p>
				</td>
				<td>
					<a href="view/post/editpost.php?=" class="btn btn-primary btn-sm float-right">Redaguoti</a>

				</td>
				<td>
					<a href="delete?=" class="btn btn-danger btn-sm float-right">Pašalinti</a>

				</td>
			</tr>

			</tr>




		</table>
	<?php	}

?>

</div>
	

</div>

</div>








</div>



