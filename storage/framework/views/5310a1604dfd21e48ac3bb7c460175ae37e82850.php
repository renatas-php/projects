<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

    <!-- Google Font -->
    

    <!-- Css Styles -->

</head>

<body>

<?php $__env->startComponent('mail::message'); ?>

**Užsakymo id:** <?php echo e($order->id); ?><br>
**Užsakymo data:** <?php echo e($order->created_at->format('Y/m/d')); ?><br><br><br>

**Kliento informacija:** <br>
                                         
**Pristatymo adresas:** <?php echo e($order->bil_adress); ?>, <?php echo e($order->bil_city); ?><br>
**El. paštas:** <?php echo e($order->bil_email); ?> <br>
**Tel:** <?php echo e($order->bil_phone); ?><br>




<?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
**Užsakytos prekės:**<br><br><br>
**Preke:** <?php echo e($product->name); ?><br><br>
**Nuotrauka:** <img src="<?php echo e(asset("/storage/$product->image")); ?>" width="80px" height="80px"><br>
**Kiekis:** 

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startComponent('mail::button', ['url' => config('app.url'), 'color' => 'green']); ?>
I svetaine
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Gunakan kode tagihan tersebut untuk membayar tagihan.

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\php\todos\blog\eshop\resources\views/emails/order.blade.php ENDPATH**/ ?>