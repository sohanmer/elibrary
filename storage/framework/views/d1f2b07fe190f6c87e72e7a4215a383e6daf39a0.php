

<?php $__env->startSection('content'); ?>
<style>
  input{
    border:none;
  }
  </style>

<div class="container-contact100">
  <div class="wrap-contact100">
    <form class="contact100-form validate-form" method="POST" action="<?php echo e(route('books.store')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <span class="contact100-form-title">
        Add a New Book
      </span>

      <div class="wrap-input100 ">
        <input class="input100" id="isbn" type="text" name="isbn" placeholder="ISBN">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>
      <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($error->first('isbn')); ?></span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      <div class="wrap-input100 validate-input" data-validate="Name is required">
        <input class="input100" id="name" type="text" name="name" placeholder="Name">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Edition is required">
        <input class="input100" id="edition" type="text" name="edition" placeholder="Edition">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Author is required">
        <input class="input100" id="author" type="text" name="author" placeholder="Author">
        <label class="label-input100" for="email">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Length is required">
        <input class="input100" id="length" type="text" name="length" placeholder="Length">
        <label class="label-input100" for="phone">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>
      
      <input type="file" name="thumbnail">

      <div>
        <label class="font-weight-bolder h6"><br/>Genre</label><br/>      
        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" style="padding-left:0px" value="<?php echo e($genre->id); ?>">
            <label class="form-check-label" for="inlineCheckbox1" style="padding-left:0px;padding-right:0px"><?php echo e($genre->name); ?></label>
          </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="container-contact100-form-btn">
        <div class="wrap-contact100-form-btn">
          <div class="contact100-form-bgbtn"></div>
          <button type="submit" class="contact100-form-btn btn-primary">
            Add
          </button>
        </div>
      </div>
    </form>
  </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/bootstrap/js/popper.js')); ?>"></script>
<script src="<?php echo e(asset('forms/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/daterangepicker/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('forms/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('forms/js/main.js')); ?>"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/assets/scripts/main.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/books/addBooks.blade.php ENDPATH**/ ?>