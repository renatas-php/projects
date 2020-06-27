<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Tinklaraštis</title>

    <!-- Styles -->
    <link href="../../assets/css/page.min.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../../assets/img/favicon.png">
  </head>

  <body>
<?php

include('../../classes/postsClass.php');

if(!isset($_GET['postid']) OR $_GET['postid'] == NULL){
  "<script> windows.location: index.php; </script>";
}else{
  $id = $_GET['postid'];
}



?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="../../index.php">
            <img class="logo-dark" src="../../assets/img/logo-dark.png" alt="logo">
            <img class="logo-light" src="../../assets/img/logo-light.png" alt="logo">
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
              <a class="nav-link" href="../../index.php?catid=<?php echo $get['id']; ?>"><?php echo $get['name'];?> </a>
          
            </li>
          <?php     } } ?>

            

                

            

            

          </ul>
        </section>

        <form action="index.php?=" class="input-group border-0" method="POST">
           <?php
           $post = new Posts();
        if(isset($_POST['search'])){
       
      
       } 
        
        ?>
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
<a class="btn btn-xs btn-round btn-success ml-5" href="../user/userinfo.php">Mano profilis</a>

<?php }?>

<?php
if(Session::get('username') == false){ ?>
        <a class="btn btn-xs btn-round btn-success ml-5" href="../../login.php">Prisijungti</a>
        
<?php }?>

      </div>
    </nav><!-- /.navbar -->
<?php


      $post = new Posts();
  $read = $post->readPostId($id)->fetch_assoc();

      ?>

        <?php   
 $post = new Posts();
   

  $id = $read['userid']; 
    $info = $post->userInfo($id);
$userInfo = $info->fetch_assoc();   ?>

    <!-- Header -->
    <header class="header text-white h-fullscreen pb-80" style="background-image: url(<?php echo   $read['image']; ?>);" data-overlay="9">
      <div class="container text-center">

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">

            <p class="opacity-70 text-uppercase small ls-1">Antraštė</p>
            <h1 class="display-4 mt-7 mb-8"><?php  echo $read['title'];  ?></h1>
            <p><span class="opacity-70 mr-1">Autorius:</span> <a class="text-white" href="#"><?php echo $read['username']; ?></a></p>
   
            <p><img class="avatar avatar-sm" src="<?php echo $userInfo['image']; ?>"></p>

          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section" id="section-content">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">

              <p class="lead"><?php  echo $read['title'];  ?></p>

              <hr class="w-100px">

            <?php

            echo $read['content'];

            ?>
            <hr>
<footer>Data <cite title="Onemar Associates Inc."><?php echo $read['date'];?></cite></footer>
            </div>
          </div>

          <?php

            $tags = new Tags();
            $id = array();
            $id = explode(",", $read['tag_id']);
            
        foreach($id as $ids){

      $getIt = $tags->readTagId($ids);
           
            while($tresult = $getIt->fetch_assoc()){       
             
       
          ?>
              <div class="gap-xy-2 mt-6">
                <a class="badge badge-pill badge-secondary" value="" href="#"><?php echo $tresult['name'] ?></a>


        <?php

  
      } 
    }
        ?>
            
         

    </div>
      </div> 
        </div>
          </div>
            </div>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">

              <hr>

     <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://tinklarastis-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
 
            
        </div>
      </div>

  </div>
      </div>


    </main>


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="../../index.php"><img src="../../assets/img/logo-dark.png" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
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
    <script src="../../assets/js/page.min.js"></script>
    <script src="../../assets/js/script.js"></script>

  </body>
</html>
