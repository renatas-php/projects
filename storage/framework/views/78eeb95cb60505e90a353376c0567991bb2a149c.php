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
                    <a href="/"><img src="<?php echo e(asset ('img/logo.png')); ?>" alt=""></a>
                </div>
                <div class="header-right d-flex flex-row">
                
                
                            

             <form action=" <?php echo e(route('search')); ?> " method="GET">
                                <input name="search" id="search" type="text" placeholder="Paieška" value="<?php echo e(request()->input('search')); ?>" class="mx-sm-3 rounded-0 border-top-0 border-left-0 border-right-0" >
                                
                                
                                <button class="btn" type="submit"><img src="<?php echo e(asset('img/icons/search.png')); ?>" alt=""></button>

            </form>     
                           
                        
                   
                    

                    <a href="<?php echo e(route('cart.index')); ?>">
                        <img src="<?php echo e(asset('img/icons/bag.png')); ?>" alt="">
                        
                        <span><?php echo e($cart->count()); ?></span>
                    </a>
                </div>
                <div class="user-access d-flex flex-row">
                <?php if(auth()->guard()->check()): ?>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="">
                                            <?php echo e(csrf_field()); ?>

                                            <button id="logout-form" type="submit">logout</button>
                                        </form>
                <?php else: ?>

                <a href="<?php echo e(route('register')); ?>">Registruotis</a>
                    <a href="<?php echo e(route('login')); ?>" class="in">Prisijungti</a>
                    <?php endif; ?>
                </div>
                <nav class="main-menu mobile-menu">
                <ul> <li><a  href="/">Pradinis</a></li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                       
                        <li>
                       
                        <a href="<?php echo e(route('front.category', $category->id)); ?>"><?php echo e($category->name); ?></a>
                        
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul> 
                </nav>
            </div>
        </div>
    </header>

    <div class="header-info mt-4">
        <div class="container">
         <div class="row"> <?php $__currentLoopData = $menubans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-lg-4">
                     
                      <div class="header-item">
                        <img src="<?php echo e(asset("storage/$menuban->icon")); ?>"  alt="">
                        <p><?php echo e($menuban->text); ?></p>
                        </div>
                      </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            
            </div>
        
    </div><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views/front/header.blade.php ENDPATH**/ ?>