

<?php $__env->startSection('content'); ?>

<div class="app-main__outer">
  <div class="app-main__inner">
      <div class="app-page-title">
          <div class="page-title-wrapper">
              <div class="page-title-heading">
                  <div class="page-title-icon">
                      <i class="fas fa-users icon-gradient bg-primary">
                      </i>
                  </div>
                  <div>Manage Users</div>
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
              <div class="main-card mb-3 card">
                  <div class="table-responsive" style="max-height:470px">
                      <table id="user-table" class="align-middle mb-0 table table-borderless table-striped table-hover" style="width:100%">
                          <thead>
                          <tr>
                              <th class="text-center">ID</th>
                              <th>Name</th>
                              <th class="text-center">Email</th>
                              <th class="text-center">Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->name != 'admin'): ?>
                              <tr>
                                  <td class="text-center text-muted"><?php echo e($user->id); ?></td>
                                  <td>
                                      <div class="widget-content p-0">
                                          <div class="widget-content-wrapper">
                                              <div class="widget-content-left mr-3">
                                                  <div class="widget-content-left">
                                                      <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                  </div>
                                              </div>
                                              <div class="widget-content-left flex2">
                                                  <div class="widget-heading"><?php echo e($user->name); ?></div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="text-center">
                                  <div><?php echo e($user->email); ?></div>
                                  </td>
                                  <td class="text-center">
                                    <div class="col">                                            
                                      <button class="btn btn-danger delete-user" style="width:70px" data-toggle="modal" 
                                              data-item="<?php echo e(route('users.destroy',$user->id)); ?>" 
                                              data-target="#delete-user">Delete
                                      </button>
                                  </div>
                                  </td>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                          
                          </tbody>
                      </table>
                  </div>                  
              </div>
          </div>
      </div>
    </div>

</div>
</div>
<script>
  $(document).ready( function () {
      $('#user-table').DataTable();
  } );
  $('.delete-user').click( function () {
        var id = $(this).attr('data-item');
        $('#user-delete').attr('action',id);
    } );
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/users/userList.blade.php ENDPATH**/ ?>