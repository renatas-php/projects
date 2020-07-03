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
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <!-- Page Preloder -->
@include('front.header')
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Pirkimo puslapis<span>.</span></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <form action="{{ route('orders.store') }}" id="payment" class="checkout-form" method="POST" >
            @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Pristatymo duomenys</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Vardas*</p>
                            </div>
                            <div class="col-lg-5">
                                <input name="bil_name" type="text" placeholder="Vardas Pavarde">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">El. paštas*</p>
                            </div>
                            <div class="col-lg-10">
                                <input name="bil_email" type="text">
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Adresas*</p>
                            </div>
                            <div class="col-lg-10">
                                <input name="bil_adress" type="text">
                                <input type="text">
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Miestas*</p>
                            </div>
                            <div class="col-lg-10">
                                <input name="bil_city" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Tel. nr.</p>
                            </div>
                            <div class="col-lg-10">
                                <input name="bil_phone" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Pašto kodas</p>
                            </div>
                            <div class="col-lg-10">
                                <input name="postcode"type="text">
                            </div>
                        </div>
                       
                        
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="order-table">
                            <div class="cart-item">
                                <span>Prekės:</span> @foreach ($carts as $cart)
                           
                                <p class="product-name">{{ $cart->product_name }} ({{$cart->qty}} vnt.)</p>
                                @endforeach
                            </div>
                           
                            
                            <div class="cart-item">
                                <span>Kaina be siuntimo:</span>
                                <p>{{ $cart->sum('total') }} Eur</p>
                            </div>
                            <div class="cart-item">
                                <span>Prekių skaičius: <b>  </b> </span>
                                <p>{{ $cart->sum('qty') }} vnt. </p>
                            </div> @foreach($shippings as $shipping)
                            <div class="cart-item">
                                <span></span>
                                <p></p>
                            </div>@endforeach

                            <div class="cart-total">
                                <span>Iš viso: </span>
                                <p>{{ $cart->sum('total') + $shipping->price }} Eur</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="user_id" value="">
               
                
               
                        <input type="hidden" name="shipping" value="{{ $shipping->name }}">
                        <input type="hidden" name="ship_price" value="{{ $shipping->price }}">
                        <input type="hidden" name="total_price" value="{{ $cart->sum('total') }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3></h3>

                            <div class="form-group col-lg-5">
                            <label for="nameCard">Korteles savininkas</label>
                            <input type="text" name="card-holder" class="form-control">
                            
                            </div>
                            <div class="form-group col-lg-5">
                            <label for="card-element">
                            Kortelės numeris
                            </label>
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            </div>
</br>
        <button type="submit">Vykdyti</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->

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

    <script src="/vendor/bootstrap/frontjs/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/bootstrap.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.magnific-popup.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.slicknav.js"></script>
    <script src="/vendor/bootstrap/frontjs/owl.carousel.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/jquery.nice-select.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/mixitup.min.js"></script>
    <script src="/vendor/bootstrap/frontjs/main.js"></script>
    <script>
(function(){
// Create a Stripe client.
var stripe = Stripe('pk_test_51GrceEIScy7emPr5aFZdEy8bydekt30V5zg0cTqPfR0HbTFcKWULOmMjk9RCZXpKKJVOB8bwlFf8lrVtpI4BKRlJ00oLQFwCRv');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Montserrat", "Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

})();

</script>
</body>

</html>