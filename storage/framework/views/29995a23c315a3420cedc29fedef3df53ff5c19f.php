<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <?php echo $__env->make('inc.titledashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Bootstrap CSS -->
   <?php echo $__env->make('inc.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Valdymo panelė</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Paieška">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">Pranešimai</div>
                                    <div class="notification-list">
                                        <div class="list-group"><?php $__currentLoopData = $ordersNote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo e($orderNote->bil_name); ?></span><?php echo e($orderNote->total_price); ?>.00 eur
                                                        <div class="notification-date"><?php echo e($orderNote->created_at); ?></div>
                                                        <div class="notification-date">Užsakymo būsena: <?php echo e($orderNote->status); ?></div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="<?php echo e(route('orders.index')); ?>">Visi užsakymai</a></div>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info"><?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo e($admi->email); ?></h5>
                                    <span class="status"></span><span class="ml-2">Prisijunges</span>
                                </div>
                               
                   
                                <a class="dropdown-item" href="<?php echo e(route('/')); ?>"><i class="fas fa-power-off mr-2"></i>Į parduotuvę</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <?php echo $__env->make('inc.leftbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Skaidrės</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="breadcrumb-link">Pagrindinis</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('sliders.index')); ?>" class="breadcrumb-link">Skaidrės</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Skaidrės pridėjimas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    <div class="row">
                       
                        <!-- ============================================================== -->
                        <!-- input forma -->
                        <!-- ============================================================== -->
                       
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    
                                </div>
                                <div class="card"> 
                                    <h5 class="card-header"><?php echo e(isset($slider) ? 'Redaguoti skaidrės informacija' : 'Pridėti skaidrę'); ?>

                                    <a href="<?php echo e(route('sliders.index')); ?>" class="btn btn-sm btn-primary float-right">Atgal</a>
                                    </h5>
                                   
                                    <div class="card-body">
                                    
                                        <form action="<?php echo e(isset($slider) ? route('sliders.update', $slider->id) : route('sliders.store')); ?>" method="POST" enctype="multipart/form-data">
                                                                                                        
                                        <?php echo csrf_field(); ?>
                                        <?php if(isset($slider)): ?>
                                        <?php echo method_field('PUT'); ?>
                                        <?php endif; ?>
                                        <div class="form-group">
                                                <label for="title" class="col-form-label">Pavadinimas</label>
                                                <input id="title" name="title" value="<?php echo e(isset($slider) ? $slider->title  : ''); ?>" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="title1" class="col-form-label">Sekanti eilutė</label>
                                                <input id="title1" name="title1" value="<?php echo e(isset($slider) ? $slider->title1  : ''); ?>" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="link" class="col-form-label">Nuoroda</label>
                                                <input id="link" name="link" value="<?php echo e(isset($slider) ? $slider->link  : ''); ?>" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                
                                                <br>
                                                <?php if(isset($slider)): ?>
                                                <img src="<?php echo e(asset("storage/$slider->slider")); ?>" width="250px" heigh="250px">
                                                <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                <label for="slider" class="col-form-label">Skaidrė</label>
                                                <input id="slider" name="slider"  type="file" class="form-control">
                                            </div>
                                        <button type="submit" class="btn btn-success btn-sm">Išsaugoti</button>
                                        </form>
                                      
                                    
                        <!-- ============================================================== -->
                        <!-- input forma baigiasi -->
                        <!-- ============================================================== -->
                  
                    
                        
                  
                 </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div> <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Testinė el. parduotuvė sukurta nuo nulio su Laravel.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   <?php echo $__env->make('inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
</body>
 
</html><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views/slider/create.blade.php ENDPATH**/ ?>