

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
      <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
      <?php endif; ?>
      <a href="<?php echo e(route('engagements.create')); ?>" class="btn btn-primary mb-3">Ajouter</a>
      <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Motif</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
              <?php $__currentLoopData = $engagements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($item->stagiaire_id); ?></td>
                    <td><?php echo e($item->motif); ?></td>
                    <td><?php echo e($item->date); ?></td>
                    <td class="d-flex gap-2">
                      <a href="<?php echo e(route('engagements.edit',['id'=>$item->id])); ?>" class="btn btn-success btn-sm">Edit</a>
                      <form action="<?php echo e(route('engagements.destroy',['id'=>$item->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button 
                        onclick="return confirm('Are you sure you want to delete this stagiaire ?')"
                        class="btn btn-danger btn-sm">Supp</button>
                      </form>
                    </td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/engagements/index.blade.php ENDPATH**/ ?>