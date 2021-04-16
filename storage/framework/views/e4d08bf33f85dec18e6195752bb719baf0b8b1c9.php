<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Products</h3>
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="border: 1px solid #eee ;border-radius: 25px;background: #73AD21; padding:5px; margin:5px;" class="col-2 text-center"><?php echo e($item->name); ?></br> <?php echo e($item->price); ?></br>
                    <a href="detail/<?php echo e($item->id); ?>" class="btn btn-primary btn-sm">Buy Now</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\payment\resources\views/home.blade.php ENDPATH**/ ?>