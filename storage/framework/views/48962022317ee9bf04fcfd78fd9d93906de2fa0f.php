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
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-books')): ?>
                                    <div class="row">                                                                                                  
                                        <div class="col">
                                            <a href="<?php echo e(route('books.edit',$book->id)); ?>">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="<?php echo e(route('books.destroy',$book->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/home.blade.php ENDPATH**/ ?>