

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Books</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('books.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col col-md-5">
                                <label>ISBN</label>
                              <input type="number" class="form-control" placeholder="ISBN" name="isbn">
                            </div>
                            <div class="col col-md-6">
                                <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                          </div><br/>
                          <div class="row">
                            <div class="col col-md-5">
                                <label>Edition</label>
                              <input type="text" class="form-control" placeholder="Edition" name="edition">
                            </div>
                            <div class="col col-md-6">
                                <label>Author</label>
                              <input type="text" class="form-control" placeholder="Author" name="author">
                            </div>
                          </div><br/>                          
                            <div class="form-group col-md-6">
                                <label>Length</label>
                                <input type="number" class="form-control" placeholder="Length" name='length'>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Thumbnail</label>
                                    <input type="file" class="form-control-file" name="thumbnail">
                                </div>
                            <div class="form-group col-md-12">
                              <label>Genre</label><br/>
                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="genre[]" value="<?php echo e($genre->id); ?>">
                                    <label class="form-check-label" for="inlineCheckbox1"><?php echo e($genre->name); ?></label>
                                </div> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/books/addBooks.blade.php ENDPATH**/ ?>