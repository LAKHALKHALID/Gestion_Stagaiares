


<?php
use App\Models\Stagiaire;
?>
<?php $__env->startSection('content'); ?>
    <div class="container">
      <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
      <a href="<?php echo e(route('deperditions.create')); ?>" class="btn btn-primary my-3">Ajouter</a href="">
      <div class="row my-3">
        <form action="<?php echo e(route('deperditions.index')); ?>" method="GET" class="d-flex align-items-end gap-2">

          <div class="col-md-8">

              <input 
                  type="text" 
                  name="cef"
                  class="form-control"
                  placeholder="Enter CEF"
                  value="<?php echo e(request('cef')); ?>"
              >
          </div>

          <div class="col-md-4">
              <button type="submit" class="btn btn-success w-100">
                  Search
              </button>
          </div>

      </form>
      </div>
        <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
          <thead>
            <tr>
              <th>ID</th>
              <th>CEF</th>
              <th>Raison de déperdition</th>
              <th>Date de déperdition</th>
              <th>Raison de retour</th>
              <th>Date de retour</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            
            <?php $__currentLoopData = $deperditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $stagiaire = Stagiaire::withTrashed()
                    ->where('cef', $item->stagiaire_id)
                    ->first();
                    // dd($stagiaire)
            ?>
                <tr>
                  <td><?php echo e($item->id); ?></td>
                  <td><?php echo e($item->stagiaire_id); ?></td>
                  <td><?php echo e($item->	raison_deperdition); ?></td>
                  <td><?php echo e($item->date_deperdition); ?></td>
                  <td><?php echo e($item->raison_retour); ?></td>
                  <td><?php echo e($item->date_retour); ?></td>

                  <td>
                    <a href="<?php echo e(route('deperditions.edit',['id'=>$item->id])); ?>" class="btn btn-success">Edit</a>
                  </td>


                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\myApp\resources\views/deperditions/index.blade.php ENDPATH**/ ?>