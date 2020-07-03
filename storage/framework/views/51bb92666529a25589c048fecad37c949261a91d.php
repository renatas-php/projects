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
                            <h2 class="pageheader-title">Produkto pridėjimas</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" class="breadcrumb-link">Pagrindinis</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>" class="breadcrumb-link">Visi produktai</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Produkto pridėjimas</li>
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
                        <!-- striped table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php if(session()->has('ok')): ?>
                       <div class="alert alert-secondary" role="alert"> <?php echo e(session()->get('ok')); ?>  </div>
                       <?php endif; ?>
                            <div class="card">
                                <div class="card-header">Produktai                                
                                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success btn-sm float-right">+ Pridėti produktą</a>
                                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary btn-sm mr-2 float-right">Atgal</a>
                                
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                    
                                        <thead>

                                            <tr>
                                                
                                                <th scope="col">Pavadinimas</th>
                                                <th>Kategorija</th>
                                                <th>Kaina</th>
                                                <th>Nuotrauka</th>
                                                
                                                <th scope="col">Veiksmas</th>
                                            </tr>
                                        </thead>
                                       
                                      
                                        
                                        <tbody>  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($product->name); ?></td>
                                             
                                               
                                             
                                            
                                             
                                                <td><a class="text-dark" href="<?php echo e(route('categories.showById', $product->category->id)); ?>"> <?php echo e($product->category->name); ?> </a></td>
                                                <td>  <?php echo e($product->price); ?>  </td>
                                                <td> <img src="<?php echo e(asset("storage/$product->image")); ?>" width="50px" height="50px" alt="">  </td>
                                          
                                           
                                           
                                                
                                                
                                                <td>
                                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary btn-sm">Redaguoti</a>
                                                <button  class="btn btn-danger btn-sm" onclick="handleDelete()">Ištrinti</button>
                                                </td>
                                                </tr>    
                                        </tbody><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="POST" id="deleteCategoryForm">
  <?php echo csrf_field(); ?>
  <?php echo method_field('DELETE'); ?>
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Uždaryti</button>
        <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
      </div>
    </div>
    </form>
  </div>
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
    form.action = '/products/' + id
    $('#deleteModal').modal('show')
   }
   
   </script>

</body>
 
</html><?php /**PATH C:\Users\php\todos\blog\eshop\resources\views//product/index.blade.php ENDPATH**/ ?>