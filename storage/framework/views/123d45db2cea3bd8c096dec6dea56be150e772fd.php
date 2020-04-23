

<?php $__env->startSection('content'); ?>    
<div class="app-main__outer container-fluid">
    <div class="app-main__inner" style="top: 4.2em;">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-book icon-gradient bg-primary"></i>
                    </div>
                  <div>Book List</div>
                </div>
            </div>
        </div>
    </div>
        <?php if(session('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card widget-content">
                    <div class="table-responsive" style="max-height:470px">
                       <table class="align-middle widget-content-left mb-0 table table-borderless table-striped table-hover display" 
                              style="width:100%" id="book-table">
                            <thead>
                                <tr class="sticky-top">
                                    <th class="text-center">ISBN</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Edition</th>
                                    <th class="text-center">Length</th>
                                    <th class="text-center">Genres</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center text-muted"><?php echo e($book->isbn); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('images/thumbnails/'.$book->thumbnail)); ?>" height="70px" width="70px">
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?php echo e($book->name); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div><?php echo e($book->author); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div><?php echo e($book->edition); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div><?php echo e($book->length); ?></div>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $bookGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($bookGenre->books_id == $book->id): ?>
                                                    <span class="badge badge-warning"><?php echo e($bookGenre->name); ?></span>
                                                <?php endif; ?>                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </td>
                                        <td class="text-center">
                                            <div class="row" >
                                                <div class="col">
                                                    <a href="<?php echo e(route('books.edit',$book->id)); ?>">
                                                        <button class="btn btn-primary">
                                                        Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col">                                            
                                                    <button class="btn btn-danger delete-modal" data-toggle="modal" 
                                                            data-item="<?php echo e(route('books.destroy',$book->id)); ?>" 
                                                            data-target="#delete-modal">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                          
                          </tbody>
                      </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
    


<script>
    $(document).ready( function () {
        $('#book-table').DataTable();
    } );
    $('.delete-modal').click( function () {
        var id = $(this).attr('data-item');
        $('#delete-form').attr('action',id);
    } );
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/books/bookList.blade.php ENDPATH**/ ?>