




<?php $__env->startSection('content'); ?>
    <div class="container">
      <?php if(session('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">

              <?php echo e(session('success')); ?>


              <button type="button"
                      class="btn-close"
                      data-bs-dismiss="alert">
              </button>
          </div>
      <?php endif; ?>
      <a href="<?php echo e(route('retraitBac.create')); ?>" class="btn btn-primary my-3">Ajouter</a>
      <table class="table table-hover text-center table-bordered table-head-bg-info table-bordered-bd-info">
        <thead>
          <tr>
            
            <th>CEF</th>
            <th>CNE</th>
            <th>Piece Justificative</th>
            <th>Motife</th>
            <th>type de retraite</th>
            <th>date retrait</th>
            <th>date retour</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $retraitBacs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <tr >
                  
                  <td><?php echo e($item->stagiaire_id); ?></td>
                  <td><?php echo e($item->cne); ?></td>
                  <td><?php echo e($item->piece_justification); ?></td>
                  <td><?php echo e($item->motif); ?></td>
                  <td><?php echo e($item->type_retrait); ?></td>
                  <td><?php echo e($item->date_retrait); ?></td>
                  <td><?php echo e($item->date_retour); ?></td>
                  <td>
                    

                    <!-- Added class="toggle-form" to the form -->
                    <form action="<?php echo e(route('retraitBac.index')); ?>" method="GET" class="toggle-form">
                        <div class="form-check form-switch d-flex align-items-center">

                            <input data-toggle="toggle" 
                                  data-onstyle="primary" 
                                  data-style="btn-round"
                                  type="checkbox"
                                  name="is_returned"
                                  value="1"
                                  <?php echo e($item->is_returned ? 'checked' : ''); ?>>

                        </div>
                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                    </form>
                                      </td>
                  <td class="">
                    <a href="<?php echo e(route('retraitBac.edit',['id'=>$item->id])); ?>" class="btn btn-success">Edit</a>
                    
                    

                  </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Listen to changes on the checkbox, specifically working with the bootstrap-toggle plugin
    $('.toggle-form input[type="checkbox"]').change(function(e) {
        let checkbox = $(this);
        let form = checkbox.closest('form');

        // Show confirmation popup
        if (confirm('Are you sure this Stagiaire returned the Bac?')) {
            // If they clicked OK, manually submit this specific form
            form.submit();
        } else {
            // If they canceled, reset the visual switch state without re-triggering this event
            e.preventDefault();
            checkbox.bootstrapToggle('toggle', true); 
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/retraitBac/index.blade.php ENDPATH**/ ?>