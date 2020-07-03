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
                        <h3 class="text-center">Administratoriaus prisijungimas</h3>
                    </div>
                

                <div class="col-lg-11">
                    <form method="POST"  action="{{ route('admin.loged') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p class="in-name">El. pastas*</p></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="form-group row ">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><p class="in-name">Slaptažodis</p></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4"> <button type="submit" class="btn btn-dark rounded-0">
                            Prisijungti
                                </button>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mt-1" for="remember">
                                    <p class="in-name">Prisiminti mane</p> 
                                    </label>
                                </div>
                            </div>
                              <div class="col-md-8 offset-md-4">
                               

                                @if (Route::has('password.request'))
                                    <a class="btn-link " href="{{ route('password.request') }}">
                                    <p class="in-name">Pamiršai slaptažodį ?</p> 
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                          
                        </div>
                    </form>
                </div>
            </div>



<footer class="footer-section spad">
        <div class="container">
            <div class="newslatter-form">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="Your email address">
                            <button type="submit">Subscribe to our newsletter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>About us</h4>
                            <ul>
                                <li>About Us</li>
                                <li>Community</li>
                                <li>Jobs</li>
                                <li>Shipping</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Customer Care</h4>
                            <ul>
                                <li>Search</li>
                                <li>Privacy Policy</li>
                                <li>2019 Lookbook</li>
                                <li>Shipping & Delivery</li>
                                <li>Gallery</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Our Services</h4>
                            <ul>
                                <li>Free Shipping</li>
                                <li>Free Returnes</li>
                                <li>Our Franchising</li>
                                <li>Terms and conditions</li>
                                <li>Privacy Policy</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Information</h4>
                            <ul>
                                <li>Payment methods</li>
                                <li>Times and shipping costs</li>
                                <li>Product Returns</li>
                                <li>Shipping methods</li>
                                <li>Conformity of the products</li>
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