


    
<?php $__env->startSection('content'); ?>
    <div class="container">
      <?php if(session('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo e(session('success')); ?>

              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
      <a href="<?php echo e(route('comportements.create')); ?>" class="btn btn-primary my-3">Ajouter</a>
      <table  class="table table-bordered table-head-bg-info table-bordered-bd-info">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>cef</th>
            <th>Sanction</th>
            <th>Autorité de décision</th>
            <th>Mise en Garde</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          

          <?php $__currentLoopData = $comp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                
                  <?php ($fullName = $c->stagiaire ? $c->stagiaire->nom_francais . ' ' . $c->stagiaire->prenom_francais : 'Stagiaire Inconnu'); ?>
              
              <tr>
                <td><?php echo e(strtoupper($fullName)); ?></td>
                <td><?php echo e($c->stagiaire?->cef ?? 'N/A'); ?></td> 
                <td><?php echo e($c->sanction); ?></td>
                <td><?php echo e($c->autorite_dec); ?></td>
                <td><?php echo e($c->miseEnGarde); ?></td>
                <td><?php echo e($c->created_at); ?></td>
                <td>
                  <a href="<?php echo e(route('comportements.edit', ['id' => $c->id])); ?>" class="btn btn-success btn-sm">Edit</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/comportements/index.blade.php ENDPATH**/ ?>