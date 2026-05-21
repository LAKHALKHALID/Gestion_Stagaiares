

<?php $__env->startSection('content'); ?>
    <?php if(session('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo e(session('error')); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo e(session('error')); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
  <form action="<?php echo e(route('import.stagiaires')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <input type="file" name="file" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-2">
        Import
    </button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/stagiaires/toImport.blade.php ENDPATH**/ ?>