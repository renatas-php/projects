<?php

include_once '../../classes/session.php';
Session::checkSession();
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
    <body>
   <?php

if(isset($_GET['action']) AND $_GET['action'] == 'logout'){
  Session::destroy();
}
?>
      
   <ul class="nav justify-content-end">
<li class="nav-item text-secondary">
    <div class="dropdown">
  <a class="btn dropdown-toggle nav-link text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <?php echo "Sveiki, ".Session::get('username') ?>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="../user/userinfo.php">Mano profilis</a>
    <a class="dropdown-item" href="?action=logout">Atsijungti</a>
  </div>
</div>

  
</li>
  
  <li class="nav-item ">
    <a class="nav-link text-secondary" href="../../register.php">Registracija</a>
  </li>
  
  
</ul> 
<div class="row justify-content-center">
<div class="col-md-3 my-5">
	<div class="card card-default">
    <div class="card-header"><b>Navigacija</b></div>
		<div class="card-body">
		<ul class="list-group">
  <li class="list-group-item"><a href="../user/userpost.php">Įrašai</a></li>
  <li class="list-group-item">


<a href="/eshop/view/category/categories.php">Kategorijos</a>
  </li>
  <li class="list-group-item"><a href="../tags/tags.php">Žymos</a></li>

</ul></div>

	</div>


</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
    </html>

