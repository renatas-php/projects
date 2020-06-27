<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Tinklaraštis</title>

    <!-- Styles -->
    <link href="assets/css/page.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.png">
  </head>

  <body>

<?php    include('classes/postsClass.php'); 
        

            ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="index.php">
            <img class="logo-dark" src="assets/img/logo-dark.png" alt="logo">
            <img class="logo-light" src="assets/img/logo-light.png" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <?php  
            $cat = new Categories();
            $result = $cat->readCategories();
            if($result){
            while($get = $result->fetch_assoc()){

            

             ?>
            <li class="nav-item">
              <a class="nav-link" href="view/category/catShow.php?catid=<?php echo $get['id']; ?>"><?php echo $get['name'];?> </a>
          
            </li>
          <?php     } } ?>

            

                

            

            

          </ul>
        </section>

        <form action="index.php?=" class="input-group border-0" method="POST">
          
<div class="input-group" >
  <input type="text" class="form-control" name="text" style="height:27px;" placeholder="Paieška" >
  <div class="input-group-append">
    <button class="btn btn-xs btn-outline-light border-0" style="height:27px;" type="POST" name="search" id="button-addon2">Ieškoti</button>
  </div>
</div></form></br></br>
<?php 

echo Session::userInfo();
   
if(Session::get('username') == true){


  ?>
<a class="btn btn-xs btn-round btn-success ml-5" href="view/user/userinfo.php">Mano profilis</a>

<?php }?>

<?php
if(Session::get('username') == false){ ?>
        <a class="btn btn-xs btn-round btn-success ml-5" href="login.php">Prisijungti</a>
        
<?php }?>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Naujausi įrašai</h1>
            <p class="lead-2 opacity-90 mt-6">Visos aktualijos ir naujienos</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">

      <section class="section bg-gray">
        <div class="container">

          <div class="row gap-y">

            <?php
             $post = new Posts();
            if(isset($_POST['search'])) {


     
     
      

               $text = $_POST['text'];
        $getS = $post->search($text);
         
        
        while($g = $getS->fetch_assoc()) { 

        if($g <= 0){
         ?>
         <div class="container">
<h1 class="text-center">Rezultatu nerasta.</h1>
</div>
         <?php
        } else{

        $img = $g['image'];
  
     $string = str_replace('../../', '', $img);
        ?>

               <div class="col-md-6 col-lg-4">
              <div class="card d-block border hover-shadow-6 mb-6">
                <a href="#"><img class="card-img-top" src="<?php echo $string ?>" alt="Card image cap"></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#"></a></p>
                  <h5 class="mb-0"><a class="text-dark" href="view/post/postshow.php?postid=<?php echo $g['id']; ?>"><?php echo $g['title']; ?></a></h5>
                </div>
              </div>
            </div>


        <?php } }
        }else
        {

            $post = new Posts();
            $read = $post->readPosts();

            while($result = $read->fetch_assoc()) { 
            
            ?>

          <?php 
     $img = $result['image'];
  
     $string = str_replace('../../', '', $img);
     
      
     ?>

            <div class="col-md-6 col-lg-4">
              <div class="card d-block border hover-shadow-6 mb-6">
                <a href="view/post/postshow.php?postid=<?php echo $result['id']; ?>"><img class="card-img-top" src="<?php echo $string
                 ?>" width="100px" height="100px" alt=""></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href=""><?php  echo $result['name'] ?></a></p>
                  <h5 class="mb-0"><a class="text-dark" href="view/post/postshow.php?postid=<?php echo $result['id']; ?>" ><?php echo $result['title']; ?></a></h5>
                </div>
              </div>
            </div>


        

<?php  } } ?>


           


          

          </div>
<?php $post = new Posts(); 
     $page = isset($_GET['page']) ? $_GET['page'] : 1;
     
     $previuos = $page - 1;
     $next = $page + 1;
     

?>
  <?php if(isset($_POST['text']) AND $g <= 0){
  }else{ ?>
          <nav class="flexbox mt-6">
            <?php if(!isset($_GET['page'])){ ?>
              <a class="btn btn-white" href="index.php?page=<?php echo $next; ?>">Sekantis<i class="ti-arrow-right fs-9 ml-2"></i></a>
           <?php }else { ?>
            <a class="btn btn-white" href="index.php?page=<?php echo $previuos; ?>"><i class="ti-arrow-left fs-9 mr-2"></i>Ankstesnis</a>
            <a class="btn btn-white" href="index.php?page=<?php echo $next; ?>">Sekantis<i class="ti-arrow-right fs-9 ml-2"></i></a>
          <?php } ?>
          </nav>
<?php } ?>

        </div>
      </section>

    </main>


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="index.php"><img src="assets/img/logo-dark.png" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="#">Nuoroda</a>
              <a class="nav-link" href="#">Nuoroda</a>
              <a class="nav-link" href="#">Nuoroda</a>
              <a class="nav-link" href="#">Nuoroda</a>
              <a class="nav-link" href="#">Nuoroda</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="../assets/js/page.min.js"></script>
    <script src="../assets/js/script.js"></script>

  </body>
</html>
