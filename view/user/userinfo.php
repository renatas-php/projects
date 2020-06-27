<?php



include('../../classes/userClass.php');
Session::checkSession();
$user = new Users();





?>

<?php

?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tinklaraštis</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
<style>
  
  body{
    background-color: #F7F7F7;
  }
  .nav {
    background-color: white;
  }
  .ul .nav-item {
    background-color: #4D4D4D;
  }
</style>
    </head>
    <body><?php

if(isset($_GET['action']) AND $_GET['action'] == 'logout'){
  Session::destroy();
}
?>
    	
   <ul class="nav justify-content-end">
<li class="nav-item text-secondary">
    <div class="dropdown">
  <a class="btn dropdown-toggle nav-link text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php   
    $id = Session::get('userid');    
    $result = $user->isAdmin($id)->fetch_assoc();

    $id = $result['id'];
    $info = $user->userInfo($id);
$userInfo = $info->fetch_assoc();   ?>
   <?php echo "Sveiki, ".$userInfo['name'] ?>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Mano profilis</a>
    <a class="dropdown-item" href="?action=logout">Atsijungti</a>


  
  </div>
</div>
</li>

  
  <li class="nav-item ">
    <a class="nav-link text-secondary" href="register.php">Registracija</a>
 
</ul>
  
<div class="row justify-content-center">
<div class="col-md-4 my-5">
	<div class="card card-default">
    <div class="card-header"><b>Navigacija</b></div>
		<div class="card-body">
		<ul class="list-group">
         



      
      
     
  <li class="list-group-item"><a href="userinfo.php">Mano informacija</a></li>

  <li class="list-group-item"><a href="../../index.php">Į pagrindinį</a></li>
    <li class="list-group-item"><a href="../user/userpost.php">Įrašai</a></li>

     <?php

    $id = Session::get('userid');

    
    $result = $user->isAdmin($id)->fetch_assoc();
    if( $result['role'] === 'admin'){


   
    
    ?>
    <li class="list-group-item"><a href="../category/categories.php">Kategorijos</a></li>
     <?php
       }
     ?>

</ul></div>

	</div>

<?php


if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update'])){
  $id = $result['id'];
  $update = $user->userUpdate($id, $_POST, $_FILES);
}



?>
</div>
<div class="col-md-6 my-5">
  <?php   $info = $user->userInfo($id);
$userInfo = $info->fetch_assoc();   ?>
	<div class="card card-default">
		<div class="card-header"><b>Mano profilio informacija</b></div>
		<div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<label for="name">Vardas</label>
			<input type="text" name="name" class="form-control" value="<?php  echo $userInfo['name']; ?>">
		</div>
		<div class="form-group">
			<label for="nick">Slapyvardis</label>
			<input type="text" name="nick" class="form-control" value="<?php  echo $userInfo['nick']; ?>">
		</div>
		<div class="form-group">
			<label for="email">El. paštas</label>
			<input type="text" name="email" class="form-control" value="<?php  echo $userInfo['email']; ?>">
		</div>
		<div class="form-group">
			<label for="password">Slaptažodis</label>
			<input type="text" name="password" class="form-control" value="<?php  echo $userInfo['password']; ?>">
		</div>
   
    <div class="form-group">
      <label for="image">Nuotrauka</label>
      <hr>
     
       <img class="" src="<?php echo $userInfo['image']; ?>" width="220px" height="200px" >

      <input type="file" name="image" class="form-control mt-3">

    </div>
    <button type="submit" name="update" class="btn btn-success btn-sm">Atnaujinti</button>
  </form>
		</div>
	</div>



</div><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>


    </body>
    </html>
