<?php

include('../inc/navbar.php');

include('../../classes/postsClass.php');


$post = new Posts();
?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['addpost'])){
	$tag_id = array();
	$tag_id = implode(',', $_POST['tag_id']);
	
	
	
			

	$adpost = $post->insertPost($_POST, $_FILES, $tag_id);
	
}


 
?>


<div class="col-md-7 my-5">
	<div class="card card-default">
		<div class="card-header"><b>Įrašo pridėjimas</b></div>
		<div class="card-body">
			<form action=" " method="post" enctype="multipart/form-data">
			<div class="form-group">
				
				<label id="title">Antraštė</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label id="content">Turinys</label>
				
				<input id="content" type="hidden" name="content">
  				<trix-editor input="content"></trix-editor>
			</div>
			<div class="form-group">
				<select name="category_id" class="form-control" id="category_id">
					<?php
						$cat = new Categories();
						$getCats = $cat->readCategories();
						if($getCats){
							while($cats = $getCats->fetch_assoc()){

						 ?>
							<option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
					<?php 		}
							} 
						?>
				</select>
			</div>
			
			<div class="form-group">
				<select name="tag_id[]" class="form-control js-example-basic-multiple" id="tag_id" multiple="multiple">
					<?php

					$tag = new Tags();
					$getTags = $tag->readTags();
					if($getTags){
						while($tags = $getTags->fetch_assoc()){



					?>
					<option value="<?php echo $tags['id']; ?>"><?php  echo $tags['name']; ?></option>

					<?php

						}
					}

					?>
					
				</select>

			</div>
			<div class="form-group">
				<label id="image">Nuotrauka</label>
				<input type="file" class="form-control" name="image">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('userid'); ?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" name="username" value="<?php echo Session::get('username'); ?>">
			</div>
			<button type="submit" name="addpost" class="btn btn-success btn-sm mt-2">Išsaugoti</button>
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