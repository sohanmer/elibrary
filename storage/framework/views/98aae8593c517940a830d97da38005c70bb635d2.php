

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Books:<?php echo e($book->name); ?></div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('books.update',$book)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col col-md-5">
                                <label>ISBN</label>
                              <input type="number" class="form-control" placeholder="ISBN" name="isbn" value="<?php echo e($book->isbn); ?>" required>
                            </div>
                            <div class="col col-md-6">
                                <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo e($book->name); ?>" required>
                            </div>
                          </div><br/>
                          <div class="row">
                            <div class="col col-md-5">
                                <label>Edition</label>
                                <input type="text" class="form-control" placeholder="Edition" name="edition" value="<?php echo e($book->edition); ?>" required>
                            </div>
                            <div class="col col-md-6">
                                <label>Author</label>
                                <input type="text" class="form-control" placeholder="Author" name="author" value="<?php echo e($book->author); ?>" required>
                            </div>
                          </div><br/>
                          <div class="row">                          
                            <div class="form-group col-md-4">
                                <label>Length</label>
                                <input type="number" class="form-control" placeholder="Length" name='length' value="<?php echo e($book->length); ?>" required>
                            </div>
                          </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-md-6"><img src="<?php echo e(asset('storage/thumbnails/'.$book->thumbnail)); ?>" height="150rem" class="card-img-top" alt="..."></div>
                                    <label for="exampleFormControlFile1">Update Thumbnail</label>
                                    <input type="file" class="form-control-file" name="thumbnail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Genre</label><br/>
                                    <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $flag=0;    
                                        ?>
                                        <?php $__currentLoopData = $checkedGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkedGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($genre->name == $checkedGenre): ?>
                                                <?php
                                                    $flag=1;   
                                                ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($flag == 1): ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="<?php echo e($genre->id); ?>" checked>
                                                <label class="form-check-label" for="inlineCheckbox1"><?php echo e($genre->name); ?></label>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="<?php echo e($genre->id); ?>" >
                                                <label class="form-check-label" for="inlineCheckbox1"><?php echo e($genre->name); ?></label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                                </div>
                            </div><br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/books/editBook.blade.php ENDPATH**/ ?>