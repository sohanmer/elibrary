

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Available Books</h3></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="row">                        
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-3 book">
                            <div class="card" style="width: 14rem;" data-toggle="tooltip" data-placement="bottom" title="Edition:<?php echo e($book->edition); ?>  Length:<?php echo e($book->length); ?>">
                                <img src="<?php echo e(asset('storage/thumbnails/'.$book->thumbnail)); ?>" height="150rem" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title"><?php echo e($book->name); ?></h5>
                                    <p class="card-text">Author(s):<?php echo e($book->author); ?></p>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-books')): ?>
                                    <div class="container-fluid">                                                                                                  
                                       <div class="row"> 
                                           
                                            <?php
                                                $flag = 0;
                                            ?>
                                            <?php if(isset($readBooks)): ?>
                                                <?php $__currentLoopData = $readBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $readBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($book->id == $readBook): ?>
                                                        <?php 
                                                            $flag = 1;
                                                        ?>
                                                        <?php break; ?>
                                                    <?php else: ?>
                                                        <?php
                                                            $flag = 0;   
                                                        ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if($flag != 1): ?>
                                                <div class="col col-md-12">
                                                    <form action="<?php echo e(route('userBooks.update',$book)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="submit" class= "btn btn-primary"value="Mark as read"></form>
                                                </div>
                                            <?php else: ?>
                                                <div class="col col-md-12">
                                                    <form action="<?php echo e(route('userBooks.destroy',$book)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="submit" class= "btn btn-danger"value="Mark as Unread"></form>
                                                </div>
                                            <?php endif; ?>                                           
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/users/userBook.blade.php ENDPATH**/ ?>