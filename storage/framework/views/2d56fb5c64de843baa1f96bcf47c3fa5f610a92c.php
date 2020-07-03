<!DOCTYPE html>
<html lang="zxx">

<head>
   <?php echo $__env->make('inc.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
   <?php echo $__env->make('front.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header Info Begin -->
   
    <!-- Header Info End -->
    
    <!-- Header End -->

    <!-- Hero Slider Begin -->
    <section class="hero-slider">
        <div class="hero-items owl-carousel"><?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single-slider-item set-bg" data-setbg="<?php echo e(asset("storage/$slider->slider")); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1><?php echo e($slider->title); ?></h1>
                            <h2><?php echo e($slider->title1); ?></h2>
                            <a href="<?php echo e($slider->link); ?>" class="primary-btn">Peržiūrėti</a>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Features Section Begin -->
    <section class="features-section spad">
        <div class="features-ads">
            <div class="container">
                <div class="row"><?php $__currentLoopData = $after; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 clear-fix">
                        <div class="single-features-ads">
                            <img class=""src="<?php echo e(asset("storage/$afters->image")); ?>" alt="">
                            <h4><?php echo e($afters->title); ?></h4>
                            <p class=""><?php echo e($afters->text); ?></p>
                        </div>
                    </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                    
                </div>
            </div>
        </div>
        <!-- Features Box -->
        <div class="features-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-box-item first-box">
                                    <img src="img/f-box-1.jpg " alt="">
                                    <div class="box-text">
                                        <span class="trend-year">2020 Gama</span>
                                        <h2>Sofos</h2>
                                        <span class="trend-alert">Naujiena</span>
                                        <a href="<?php echo e(route('/')); ?>" class="primary-btn" >Peržiūrėti</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-box-item second-box">
                                    <img src="img/f-box-2.jpg" alt="">
                                    <div class="box-text">
                                        <span class="trend-year">2020 Žiemos</span>
                                        <a href="<?php echo e(route('/')); ?>" > <h2>Spintos</h2></a>
                                        <span class="trend-alert">Balta & Juoda</span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-box-item large-box"><img src="img/f-box-3.jpg">
                        
                            <div class="box-text">
                                <span class="trend-year">2019 Kolekcija</span>
                                <a href="<?php echo e(route('/')); ?>" > <h2>Šviestuvai</h2></a>
                                <div class="trend-alert">Medis & Tekstilė </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- Latest Product Begin -->
    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Naujausios prekės</h2>
                        </div>
                      
                    </div>
            </div>
            <div class="row" id="product-list">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="<?php echo e(route('product.show', $product->id)); ?>"><img src="<?php echo e(asset("storage/$product->image")); ?>" width="260px"alt=""></a>
                            <div class="p-status">Naujiena</div>
                        </figure>
                        <div class="product-text">
                            <h6><?php echo e($product->name); ?></h6>
                            <p><?php echo e($product->price); ?>.00 EUR</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </section>
    <!-- Latest Product End -->

    <!-- Lookbok Section Begin -->
   
    <!-- Lookbok Section End -->

    <!-- Logo Section Begin --><div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Prekės ženklai</h2>
                        </div>
                      
                    </div>
    <div class="logo-section spad"> 
        <div class="logo-items owl-carousel">
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="logo-item">
                <img src="<?php echo e(asset("storage/$brand->logo")); ?>" width="120px" height="80px" alt="">
                </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
        </div>
    </div>
    <!-- Logo Section End -->

    <!-- Footer Section Begin -->
   
    <footer class="footer-section spad">
   
        <div class="container">
        <?php if(session()->has('ok')): ?>
        <div class="alert alert-secondary text-light bg-transparent" role="alert"> <?php echo e(session()->get('ok')); ?>  </div>
        <?php endif; ?>
            <div class="newslatter-form">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?php echo e(route('subscribers.store')); ?> " method="POST">
                        <?php echo csrf_field(); ?>
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
</body>

</html><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views//front/index.blade.php ENDPATH**/ ?>