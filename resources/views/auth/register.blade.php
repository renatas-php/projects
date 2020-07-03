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

@endsection
<hr></hr>
<div class="container">
<div class="col-lg-12 mt-5 mb-4">
                        <h3 class="text-center">Registracija</h3>
                    </div>
                

                <div class="col-lg-11">
               
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p class="in-name">Vardas</p></label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

                              
                            </div>
                        </div>

                     

                        <div class="form-group row ">
                            <label for="surname" class="col-md-4 col-form-label text-md-right"><p class="in-name">Pavardė</p></label>

                            <div class="col-md-6">
                               
                                <input id="surname" type="text" name="surname"class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('surname') is-invalid @enderror" >

@error('surname')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right"><p class="in-name">Adresas</p></label>

                            <div class="col-md-6">
                                <input id="adress" type="text" name="adress" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('adress') is-invalid @enderror" >

                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right"><p class="in-name">Miestas</p></label>

                            <div class="col-md-6">
                                <input id="city" type="text" name="city" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('city') is-invalid @enderror" >

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right"><p class="in-name">Tel. nr.</p></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" name="phone" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('phone') is-invalid @enderror" >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p class="in-name">El.pašto adresas</p></label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><p class="in-name">Slaptažodis</p></label>

                            <div class="col-md-6">
                                <input id="password" type="password" name="password" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0 @error('password') is-invalid @enderror" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><p class="in-name">Pakartokite slaptažodį</p></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" name="password-confirm" class="col-md-10 rounded-0 border-top-0 border-left-0 border-right-0" >

                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark rounded-0">
                                    Registruotis
                                </button>
                            </div>
                        </div>
                    </form>
                       
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