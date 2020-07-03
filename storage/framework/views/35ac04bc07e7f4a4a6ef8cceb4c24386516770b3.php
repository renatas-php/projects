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
                            <h2 class="pageheader-title">Užsakymai</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="breadcrumb-link">Pagrindinis</a></li>

                                        <li class="breadcrumb-item active" aria-current="page">Visi užsakymai</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                   
                      
                       
                               <!-- ============================================================== -->
                        <!-- striped table -->
                        <!-- ============================================================== -->
                        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                                <div class="card">
                                    <h5 class="card-header">Visi užsakymai</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Nr.</th>
                                                        <th class="border-0">Data</th>
                                                        <th class="border-0">Kliento vardas</th>
                                                        <th class="border-0">El. paštas</th>
                                                        <th class="border-0">Suma</th>
                                                        <th class="border-0">Pristatymo būdas</th>
                                                                                                           
                                                                                                                                                                       
                                                        <th class="border-0">Užsakymo statusas</th>
                                                        <th class="border-0">Veiksmas</th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($order->id); ?></td>
                                                        
                                                        <td><?php echo e($order->created_at); ?></td>
                                                        <td><?php echo e($order->bil_name); ?></td>
                                                        <td> <?php echo e($order->bil_email); ?></td>
                                                        <td><?php echo e($order->total_price); ?>.00 Eur</td>

                                                        <td><?php echo e($order->shipping); ?></td>
                                                        
                                                        
                                                       
                                                        
                                                        
                                    <td><form action="<?php echo e(route ('orders.update', $order->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field('PATCH'); ?>
                                
                                
                                
                                 <select class="btn btn-lg btn-outline-light" name="status" data-id="">
                                    <option <?php echo e($order->status == 'Vykdomas' ? 'selected' : ''); ?> >Vykdomas</option>
                                    <option <?php echo e($order->status == 'Išsiųstas' ? 'selected' : ''); ?> >Išsiųstas</option>
                                    <option <?php echo e($order->status == 'Pristatytas' ? 'selected' : ''); ?> >Pristatytas</option>
                                    <option <?php echo e($order->status == 'Sustabdytas' ? 'selected' : ''); ?>>Sustabdytas</option>
                                    
                                    </select>
                                    <button type="submit" class="btn  btn-outline-light mt-1">Atnaujinti</button>
                                     
                       
                                
                               
                        </form>
                        </td>
                                                        <td><a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-outline-light float-right">Peržiūrėti</a></td>
                                                    </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                 
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- ============================================================== -->
                        <!-- end striped table -->
                        <!-- ============================================================== -->
                  
                    
                        
                  
                 </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Testinė el. parduotuvė sukurta nuo nulio su Laravel.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   <?php echo $__env->make('inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <script>
   function handleDelete(id){
    var form = document.getElementById('deleteCategoryForm')
    form.action = '/categories/' + id
    $('#deleteModal').modal('show')
   }
   
   </script>

</body>
 
</html><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views/orders/index.blade.php ENDPATH**/ ?>