

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Books You Already Read</h3></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="row">                        
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                              $flag=1;   
                            ?>
                            <?php $__currentLoopData = $readBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $readBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($book->id == $readBook): ?>
                                    <?php
                                        $flag=0;
                                    ?>
                                    <?php break; ?>
                                <?php else: ?>
                                    <?php
                                        $flag=1;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($flag==0): ?>
                                <div class="col-sm-3 book">
                                    <div class="card" style="width: 14rem;" data-toggle="tooltip" data-placement="bottom" title="Edition:<?php echo e($book->edition); ?>  Length:<?php echo e($book->length); ?>">
                                        <img src="<?php echo e(asset('storage/thumbnails/'.$book->thumbnail)); ?>" height="150rem" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo e($book->name); ?></h5>
                                            <p class="card-text">Author(s):<?php echo e($book->author); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/users/readBooks.blade.php ENDPATH**/ ?>