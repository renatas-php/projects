<?php


include('classes/userClass.php');
Session::checkLogin();




?>


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blogas</title>

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
    <body>
    	
   <ul class="nav justify-content-end">
  <li class="nav-item text-secondary">
    <a class="nav-link text-secondary" href="login.php">Prisijungimas</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link text-secondary" href="register.php">Registracija</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-secondary" href="index.php">Pradinis</a>
  </li>
  
</ul>
  



<div class="container">

<div class="jumbotron mt-5">

  <h1 class="display-4">Prisijungimas</h1>
  
  <hr class="my-4">

  <?php

  $reg = new Users();
  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['login'])){
     $data['email'] = $_POST['email'];
     $data['password'] = $_POST['password'];

  	$login = $reg->userLogin($data);
   
  }


  ?>
     <?php if(isset($login))
      {
        echo $login;
      }
      ?>

  <form action="" method="POST">

  	 <div class="form-group">
   
	    <label for="">El.pastas</label>
	    <input type="email" class="form-control" name="email" >
	  </div>

  	<div class="form-group">
	    <label for="">Slaptazodis</label>
	    <input type="password" class="form-control" name="password" >
	  </div>
	  
	  
	  <button type="submit" name="login" class="btn btn-primary">Prisijungti</button>
	</form>


</div>




</div>


</div>


    </body>
    </html>
