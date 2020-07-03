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
            <div class="inner-header ">
                <div class="logo">
                    <a href="/"><img src="{{ asset ('img/logo.png') }}" alt=""></a>
                </div>
                <div class="header-right d-flex flex-row">
                
                
                            

             <form action=" {{ route('search') }} " method="GET">
                                <input name="search" id="search" type="text" placeholder="Paieška" value="{{ request()->input('search') }}" class="mx-sm-3 rounded-0 border-top-0 border-left-0 border-right-0" >
                                
                                
                                <button class="btn" type="submit"><img src="{{ asset('img/icons/search.png') }}" alt=""></button>

            </form>     
                           
                        
                   
                    

                    <a href="{{ route('cart.index') }}">
                        <img src="{{ asset('img/icons/bag.png') }}" alt="">
                        
                        <span>{{ $cart->count() }}</span>
                    </a>
                </div>
                <div class="user-access d-flex flex-row">
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
                <nav class="main-menu mobile-menu">
                <ul> <li><a  href="/">Pradinis</a></li>
                @foreach($categories as $category)
                       
                       
                        <li>
                       
                        <a href="{{ route('front.category', $category->id) }}">{{  $category->name  }}</a>
                        
                        </li>
                        @endforeach
                        
                    </ul> 
                </nav>
            </div>
        </div>
    </header>

    <div class="header-info mt-4">
        <div class="container">
         <div class="row"> @foreach($menubans as $menuban)
         <div class="col-lg-4">
                     
                      <div class="header-item">
                        <img src="{{ asset("storage/$menuban->icon") }}"  alt="">
                        <p>{{ $menuban->text }}</p>
                        </div>
                      </div> @endforeach
                </div>
            
            </div>
        
    </div>