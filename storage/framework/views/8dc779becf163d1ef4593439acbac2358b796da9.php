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
    
    
    <!-- Search model -->
	
	<!-- Search model end -->

    <!-- Header Section Begin -->
    
    <?php echo $__env->make('front.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header Info Begin -->
   
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2><?php echo e($product->category->name); ?><span>.</span></h2>
                        <a href="<?php echo e(route('/')); ?> ">Pradinis</a>
                        
                        <a class="active" href="<?php echo e(route('front.category', $product->category_id)); ?>"><?php echo e($product->category->name); ?></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="../../img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Product Page Section Beign -->
    <section class="product-page">
        <div class="container">
            
            <div class="row">
            
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <figure>
                                <img src="<?php echo e(asset("storage/$product->image")); ?>" alt="">
                               
                            </figure>
                        </div>
                        <div class="product-img">
                            <figure>
                                <img src="<?php echo e(asset("storage/$product->image")); ?>" alt="">
                               
                            </figure>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2><?php echo e($product->name); ?></h2>
                        <div class="pc-meta">
                            <h5><?php echo e($product->price); ?> Eur</h5>
                            
                        </div>
                        <p><?php echo e($product->description); ?></p>
                        <ul class="tags">
                            <li><span>Kategorija :</span> <a class="text-dark" href="<?php echo e(route('front.category', $product->category_id)); ?>"><?php echo e($product->category->name); ?></a></li>
                            <li><span>Prekės ženklas :</span> <?php echo e($product->brand->name); ?></li>
                        </ul>
                        <div class="product-quantity"> <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                           <?php echo csrf_field(); ?>
                            <div class="pro-qty">
                            
                                <input type="text" name="qty" id="qty" value="1" min="1" max="15">
                            </div>
                        </div>
                        <?php if(auth()->guard()->check()): ?>
                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <?php else: ?>
                        <?php
                        $id = request()->ip();
                        ?>
                        <input type="hidden" name="user_id" value="<?php echo e($id); ?>">
                        <?php endif; ?>
                       
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="product_name" value="<?php echo e($product->name); ?>">
                        <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                        
                        <input type="hidden" name="product_image" value="<?php echo e($product->image); ?>">
                        <button type="submit" class="primary-btn pc-btn">Į krepšelį</button>
                        </form>
                        
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    <!-- Product Page Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Panašios prekės</h2>
                    </div>
                </div>
            </div>
            <div class="row"><?php $__currentLoopData = $relatedProd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-product-item">
                        <figure>
                            <a href="<?php echo e(route('product.show', $related->id)); ?>"><img src="<?php echo e(asset("storage/$related->image")); ?>" alt=""></a>
                            
                        </figure>
                        <div class="product-text">
                            <h6><?php echo e($related->name); ?></h6>
                            <p><?php echo e($related->price); ?></p>
                        </div>
                    </div>
                </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
        <div class="container">
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

</html><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views/front/product.blade.php ENDPATH**/ ?>