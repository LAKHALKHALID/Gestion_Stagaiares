





<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <?php if(session('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo e(session('success')); ?>

              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        <?php if(session('refuse')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo e(session('refuse')); ?>

              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        <form action="<?php echo e(route('inscription.store')); ?>" method="post" class="mb-3">
          <?php echo csrf_field(); ?>
            <div class="row g-3 align-items-end">

                <!-- Code Stagiaire -->
                <div class="col-md-3">
                    <label class="form-label">Code Stagiaire</label>
                    <input type="text" name="cef" class="form-control" placeholder="Enter CEF">
                </div>

                <!-- Filiere -->
                <div class="col-md-3">
                    <label class="form-label">Filière</label>
                    <select class="form-select" name="code_f">
                      <?php $__currentLoopData = $f; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->code_f); ?>"><?php echo e($item->nom_filiere_francais); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Groupe</label>
                    <select class="form-select" name="code_g">
                      <?php $__currentLoopData = $g; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->code_g); ?>"><?php echo e($item->nom_g); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Button -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">
                        Ajouter
                    </button>
                </div>

            </div>
        </form>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/inscription/index.blade.php ENDPATH**/ ?>