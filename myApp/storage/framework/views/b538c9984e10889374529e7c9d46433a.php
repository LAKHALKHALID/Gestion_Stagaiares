

<?php $__env->startSection('content'); ?>

    <div class="container">
      <h1 class="text-center">Gestion des stagiaires</h1>
            <?php if(session('success')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo e(session('success')); ?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
             <?php if(session('error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo e(session('error')); ?>

                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
      <a href="<?php echo e(route('stagiaires.create')); ?>" class="btn btn-primary">Ajouter New Stagiaire</a>
      <a href="<?php echo e(route('import.stagiaires')); ?>" class="btn btn-primary ms-3">Import</a>

      <div class="container my-5">
        <form action="<?php echo e(route('stagiaires.index')); ?>" method="GET" class="mb-3">
            <div class="row g-3 align-items-end">

                <!-- Code Stagiaire -->
                <div class="col-md-3">
                    <label class="form-label">Code Stagiaire</label>
                    <input type="text" name="cef" class="form-control" placeholder="Enter CEF">
                </div>

                <!-- Filiere -->
                

                <div class="col-md-4">
                    <label class="form-label">Groupe</label>
                    
                    <select class="form-control" name="code_g">
                      <option value="" selected>All</option>
                      <?php $__currentLoopData = $g; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->code_g); ?>"><?php echo e($item->nom_g); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Button -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100 ">
                        Search
                    </button>
                </div>

            </div>
        </form>
      </div>
      <table class="table table-hover table-bordered table-head-bg-info table-bordered-bd-info text-center">
        <thead>
          <tr>
            <th>Cef</th>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Annee Etude</th>
            <th>Annee Scolaire</th>
            <th>Niveau</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($st->cef); ?></td>
                <td><?php echo e($st->cin); ?></td>
                <td><?php echo e($st->nom_francais); ?></td>
                <td><?php echo e($st->prenom_francais); ?></td>
                <td><?php echo e($st->annee_etude); ?></td>
                <td><?php echo e($st->nom_annee_scolaire); ?></td>
                <td><?php echo e($st->niveau_formation); ?></td>
                <td class="d-flex gap-1">

                  
                  <a href="<?php echo e(route('stagiaires.show',['cef'=>$st->cef])); ?>" class="btn btn-sm btn-primary">show</a>
                  <a href="<?php echo e(route('stagiaires.edit',['cef'=>$st->cef])); ?>" class="btn btn-sm btn-success mx-2">edit</a>
                  
                  <form action="<?php echo e(route('stagiaires.destroy',['cef'=>$st->cef])); ?>" method="POST">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this stagiaire?')">Supp</button>
                  </form>


                </td>

              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="mt-3">
          <?php echo e($stagiaires->links()); ?>

      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/stagiaires/index.blade.php ENDPATH**/ ?>