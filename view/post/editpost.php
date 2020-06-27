<?php

include('../inc/navbar.php');
include('../../classes/postsClass.php');


?>


<?php

if(!isset($_GET['postid']) OR $_GET['postid'] == NULL){
	echo "<script>windows.location: 'posts.php';</script>";
}else{
	$id = $_GET['postid'];
}




?>
<?php

$post = new Posts();
$getPosts = $post->readPostId($id);
$result = $getPosts->fetch_assoc();


if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update'])){
	$title = $_POST['title'];
	$content = $_POST['content'];
	$tag_id = array();
	$tag_id = implode(',', $_POST['tag_id']);
	
	
	$update = $post->updatePost($id, $_POST, $tag_id);

}
?>



<div class="col-md-7 my-5">
	<div class="d-flex justify-content-end"><a href="addpost.php" class="btn btn-success mb-2">+ Pridėti įrašą</a></div>
	<div class="card card-default">

		<div class="card-header"><b>Įrašo redagavimas</b></div>

		<div class="card-body">
			<form action=" " method="post">
			<div class="form-group">
				<label id="title">Antraštė</label>
				<input type="text" name="title" class="form-control" value="<?php echo $result['title'] ?>">
			</div>
			<div class="form-group">
				<label id="title">Turinys</label>
				
				<input id="content" type="hidden" value="<?php echo $result['content'] ?>" name="content">
  				<trix-editor input="content"></trix-editor>
			</div>
			<div class="form-group">
				<label id="category_id">Kategorija</label>
				<select name="category_id" class="form-control">
					<?php
						$cat = new Categories();
						$getCats = $cat->readCategories();
						if($getCats){
							while($cats = $getCats->fetch_assoc()){

							
						 ?><option
						 <?php	
								if($result['category_id'] == $cats['id']){ ?>

								selected = "selected"
								
						<?php	} ?> value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
							
							
							
							
					<?php 		}
							
							}
						?>
				</select>

			</div>
			<div class="form-group">
				<label for="tag_id">Zymos</label>
				<select name="tag_id[]"  class="form-control js-example-basic-multiple" id="tag_id" multiple="multiple">
					<?php
					
					$result['tag_id']; 
					$res = array();
					$res = $result['tag_id']; 	
					$tagArray = explode(',', $res);

					$tag = new Tags();
					$getTags = $tag->readTags();
					if($getTags){
						while($tags = $getTags->fetch_assoc()){

					?>
					<option
					<?php if(in_array($tags['id'], $tagArray)) {  ?>
					
					selected = "selected"
					
					<?php  } ?>
					
					 value="<?php echo $tags['id']; ?>"><?php  echo $tags['name']; ?></option>

					<?php

						}
					}

					?>
					
				</select>
				
			</div><?php   		
								?>

			<div class="form-group">
				<label id="date">Įrašo sukūrimo data</label>
				<ul class="list-group">
  					<li class="list-group-item list-group-item-secondary"><?php echo $result['date'] ?></li>
				</ul>
			</div>
			<button type="submit" name="update" class="btn btn-success btn-sm">Išsaugoti</button>
		</form>
		</div>
	</div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
