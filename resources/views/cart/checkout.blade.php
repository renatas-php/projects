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
    <!-- Page Preloder -->
    
    
    <!-- Search model -->
	
	<!-- Search model end -->

    <!-- Header Section Begin -->
  @include('front.header')
    <!-- Header Info Begin -->
    
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Krepšelis<span>.</span></h2>
                        <a href="{{ route('/') }}">Pagrindinis</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
    <div class="container">
        @if(session()->has('ok'))
        <div class="alert alert-secondary" role="alert"> {{  session()->get('ok') }}  </div>
        @endif
        @foreach($carts as $cart)
        @endforeach
        @if(!$cart->user_id)
        <div class="jumbotron bg-white">
  <h1 class="display-4 text-center">Prekių krepšelis tuščias</h1>
  <p class="lead text-center">Pridėkite prekę(s) į krepšelį norėdami nusipirkti !</p>
  <hr class="my-4">
  
  <p class="lead text-center">
    <a class="btn bg-dark text-white btn-lg" href="{{ route('/') }}" role="button">Grįžti į pagrindinį</a>
   
  </p>
</div>
          </div>  
            
            @else
           
            <div class="cart-table">
           
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Pekė</th>
                            <th>Kaina</th>
                            <th class="quan">Kiekis</th>
                            <th>Suma</th>
                            <th></th>
                           
                        </tr>
                    </thead>
                    <tbody>@foreach ($carts as $cart)
                        <tr> 
                       @php 
                        
                        $price = $cart->price;

                        $qty = $cart->qty; 

                        $total = $price * $qty;
                        @endphp
                            <td class="product-col">
                                <img src="{{ asset("storage/$cart->product_image") }}" alt="">
                                <div class="p-title">
                                    <h5><a class="text-secondary" href=" {{ route('product.show', $cart->product_id) }}">{{  $cart->product_name }}</a></h5>
                                </div>
                            </td>
                            <td class="price-col">{{ $price }} Eur</td>
                            <td class="quantity-col"><form action="{{ route('cart.update', $cart->id)}}" method="POST">
                            @csrf 
                            @method('PATCH')
                                <div class="qty">
                                
                                <input type="hidden" name="price" value="{{ $price }}">
                                 <select class="qty btn btn-sm btn-dark ml-4" name="qty" data-id="{{ $cart->id }}">
                                    <option {{ $cart->qty == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $cart->qty == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $cart->qty == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $cart->qty == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $cart->qty == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-dark ml-1 ">Atnaujinti</button>
                                </div>        
                       
                                
                               
                        </form>
                            </td>
                            <td class="">{{ $total }} Eur</td>
                            
                            <form action="{{  route('cart.destroy', $cart->id)  }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            
                            <td class="product-close">
                            <button class="btn btn-sm btn-dark" type="submit">
                            x
                            </button>
                           
                            </td>
                            
                            </form>
                           
                        </tr> @endforeach
                    </tbody>
                </table>
            
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                    <form action="{{ route('orders.destroy', $cart->user_id) }}" method="post">
                    @csrf 
                    @method('DELETE')
                        <div class=""><button class="site-btn clear-btn" type="submit">Ištrinti krepšelį</button></div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shipping-info">
                            <h5>Pristatymo būdas</h5>
                            <div class="chose-shipping">
                            @foreach($shippings as $shipping)
                                <div class="cs-item">
                                    <input type="radio" name="shipping" id="shipping">
                                    <label for="shipping" class="active">
                                      
                                        {{ $shipping->name }}
                                        <span>Kaina {{ $shipping->price }} Eur</span>
                                    </label>
                                </div>
                             
                                @endforeach
                            </div>
                        </div>
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                  
                                   
                                        <tr>
                                            <th>Suma be pristatymo</th>
                                            
                                            <th>Pristatymo kaina</th>
                                            <th class="total-cart">Iš viso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                             

                                    <td></td>
                             
                                   
                                  
                                        <tr>
                                            <td class="total"> {{ $cart->sum('total') }} Eur</td>
                                            
                                            
                                           
                                            <td class="shipping"> {{ $shipping->price }} Eur</td>
                                            <td class="total-cart-p">{{ $cart->sum('total') + $shipping->price }} Eur</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{ route('cart.final') }}" class="primary-btn chechout-btn">Pirkti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>@endif
    <!-- Cart Page Section End -->

    <!-- Footer Section Begin -->
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
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script scr=/vendor/bootstrap/frontjs/app.js></script>
    <script>
    (function(){
        const classname = document.querySelectorAll('.qty', '.total') 

        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){

                    const id = element.getAttribute('data-id')

                    axios.patch('', {
                       qty: this.value,
                       
                    })
                    .then(function (response) {
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            })
        })
    })();
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