<!DOCTYPE html>
<html lang="zxx">

<head>
@include('inc.meta')

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/vendor/bootstrap/frontcss/style.css" type="text/css">
</head>

<body>
<div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="/"><img src="{{ asset ('img/logo.png') }}" alt=""></a>
                    <nav class="main-menu mobile-menu">
                <ul> <li><a  href="/">Pradinis</a></li>
               
                        
                    </ul> 
                </nav>
                </div>
               
                <div class="user-access">
                @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                                            {{ csrf_field() }}
                                            <button id="logout-form" type="submit">logout</button>
                                        </form>
                @else

                <a href="{{ route('register')}}">Registruotis</a>
                    <a href="{{ route('login')}}" class="in">Prisijungti</a>
                    @endauth

                   
                </div>
                
            </div>
        </div>
    </header>

@section('content')
<section class="cart-total-page spad">
        <div class="container">
           
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Your Information</h3>
                    </div>
                    <div class="col-lg-9">
                       
                       
                     
                       
                     
                    
                       
                       
                        
                       
                    </div>
                    
                
                
            </form>
       
    </section>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
        </div>
    </div>
</div> -->

@endsection
<hr></hr>
<div class="container">
<div class="col-lg-12 mt-5 mb-4">
<div class="jumbotron bg-white">
  <h1 class="display-4 text-center">Užsakymas priimtas!</h1>
  <p class="lead text-center">Ačiū, kad pasirinkote mūsų el. parduotuvę. Jeigu turite kokių kalusimų prašome susisikite !</p>
  <hr class="my-4">
  <p class="text-center">Geros dienos !</p>
  <p class="lead text-center">
    <a class="btn bg-dark text-white btn-lg" href="{{ route('/') }}" role="button">Grįžti į pagrindinį</a>
    @if(auth()->user())
    <a class="btn bg-light text-dark btn-lg" href="{{ route('user.profile') }}" role="button">Mano profilis</a>
    @endif
  </p>
</div>
                    </div>
                

                
            </div>



            <footer class="footer-section spad">
        <div class="container">
            <div class="newslatter-form">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('subscribers.store') }} " method="POST">
                        @csrf
                            <input type="text" name="email" placeholder="Jūsų el. pašto adresas">
                            <button type="submit">Užsiprenumeruoti naujienlaiškį</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Apie mus</h4>
                            <ul>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Klientams</h4>
                            <ul>
                            <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Mūsų paslaugos</h4>
                            <ul>
                            <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Informacija</h4>
                            <ul>
                            <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>
                                <li>Neaktyvi nuoroda</li>>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>
			</div>




		</div>
    </footer>
<script>
    
    </script>
    <script src="/vendor/bootstrap/frontjs/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/bootstrap.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.magnific-popup.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.slicknav.js"></script>
    <script src="/vendor/bootstrap/frontjs/owl.carousel.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.nice-select.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/mixitup.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/main.js"></script>
</body>

</html>