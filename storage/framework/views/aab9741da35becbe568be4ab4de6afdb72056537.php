<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Sora&display=swap" rel="stylesheet">
        
        <style>
        
        .btn {
            background-color: #6B2A95 !important;
            color: #FFFFFF  !important;
            border-radius: 5px;
        }
        .recomend-products {
       display: flex;
       justify-content: center;
       align-items: center;
  
        }
        .recomend-products .product{
            
           position: relative;
           overflow: hidden;
            border-radius: 5px;
            display: grid;
            grid-template-rows: 2fr 1fr;
            grid-gap: 10px;
            cursor: pointer;
            min-height: 350px;
            transition: all 0.6s;
        }

        .recomend-products .product .content{
           
        }
        .recomend-products .product .content h3{
            font-family: 'Sora', sans-serif;
     text-align: center;
     text-transform: uppercase;
     font-size: 16px;
         }

        .recomend-products .product .content .btn-add{
            
            text-align: center;
            font-weight: 400;
            font-family: 'Sora', sans-serif;
            width: 100%;
            padding: 7px;
            font-size: 16px;
            background-color: #6B2A95;
            outline: none;
            border: none;
            border-radius: 8px;
            color: #fff;
                }
  
        .recomend-products .product:hover{
           
           transform: scale(0.9, 0.9);
           box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), 
                -5px -5px 30px 15px rgba(0,0,0,0.22);
            
        }


        .recomend-products .product .imgBox {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        
        }

        .recomend-products .product .imgBox img {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        object-fit: cover;
       
        }


        
        </style>
    </head>
    <body>
       

            <div class="content">
                <div class="title m-b-md text-center">
                   Užduotis
                </div>

                <div class="container">
          
                <div class="jumbotron">
                <h1 class="display-4">Orų prognozės!</h1>
                <p class="lead">Pasirinkite miestą kurio orų prognozę norite sužinoti.</p>
                <hr class="my-4">
                <div class="form-group col-6">
                <form action="" method="GET">
                <div class="custom-file d-flex inline-block">
                    <select name="city" class="form-control">
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($city->city); ?>" 
                  
                    
                    ><?php echo e($city->city); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </select>
                    <button class="btn ml-2" type="submit" id="inputGroupFileAddon04">Prognozė</button>
                    
                </div>
                </form>
               
                
               
                
                </div>
                <div class="col-12 text-center">
                <h1 class="display-4 text-center">
                <?php if( request('city')): ?>
                <?php echo e(request('city')); ?> : <?php echo e($data); ?>

                <?php endif; ?>
                
                </h1>
                </div>

                
                </div>
                <div class="recomend-products col-12 d-flex justify-content-around">
        <?php if($products->count() > 0 ): ?>{

        
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="product col-4 ">
        <div class="imgBox"><img src="<?php echo e($product->image_link); ?>"></div>
        <div class="content">
        <h3 class="title"><?php echo e($product->title); ?></h3>
        <button class="btn-add mb-0">Į krepšelį</button>
        </div>
        </div>
    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }
        <?php endif; ?>
        

    
      
        
        </div>
                </div>
             
       
        
                
        </div>
        <br>
        <br>
        <br>
        <br>
    </body>
</html>
<?php /**PATH C:\Users\php\laravel\uzduotis\uzduotis\resources\views/index.blade.php ENDPATH**/ ?>