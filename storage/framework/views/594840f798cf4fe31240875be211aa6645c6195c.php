

<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-books')): ?>
    <div id="user" books="<?php echo e($books); ?>" 
                    readBooks="<?php echo e($readBooks); ?>" 
                    bookGenres="<?php echo e($bookGenres); ?>" 
                    path="<?php echo e(asset('images/thumbnails/')); ?>" 
                    genres="<?php echo e($genres); ?>"> 
        
    </div>
<?php endif; ?>


<script type="text/javascript" src="/js/app.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/users/userBook.blade.php ENDPATH**/ ?>