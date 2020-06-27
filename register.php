<?php


include('classes/userClass.php');
Session::checkLogin();


?>
<?php


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
    <a class="nav-link text-secondary" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-secondary" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
  



<div class="container">

<div class="jumbotron mt-5">

  <h1 class="display-4">Registracija</h1>
  
  <hr class="my-4">

  <?php

  $reg = new Users();
  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nick = $_POST['nick'];
    $name = $_POST['name'];
  

    $register = $reg->userReg($_POST);
  }

  ?>

  <form action="" method="POST">

  	 <div class="form-group">
	    <label for="email">El.pastas</label>
	    <input type="email" class="form-control" name="email" id="email">
	  </div>

  	<div class="form-group">
	    <label for="password">Slaptazodis</label>
	    <input type="password" class="form-control" name="password" id="password">
	  </div>

	  <div class="form-group">
	    <label for="nick">Slapyvardis</label>
	    <input type="text" class="form-control" name="nick" id="nick">
	   
	  </div>
	 
	  <div class="form-group">
	    <label for="name">Vardas</label>
	    <input type="text" class="form-control" name="name" id="name">
	  </div>
	  
	  
	  
	  <button type="submit" name="register" class="btn btn-primary">Registruotis</button>
	</form>


</div>




</div>


</div>


    </body>
    </html>
