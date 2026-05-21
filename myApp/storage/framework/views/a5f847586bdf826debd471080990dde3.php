




<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Create Bac</h2>

    <?php if(session('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">

              <?php echo e(session('error')); ?>


              <button type="button"
                      class="btn-close"
                      data-bs-dismiss="alert">
              </button>
          </div>
      <?php endif; ?>
    <form action="<?php echo e(route('retraitBac.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="row">

            <!-- Stagiaire ID -->
            <div class="col-md-4 mb-3">
                <label>Stagiaire ID (CEF)</label>
                <input type="text" name="stagiaire_id" class="form-control" required>
            </div>

            <!-- CNE -->
            <div class="col-md-4 mb-3">
                <label>CNE</label>
                <input type="text" name="cne" class="form-control" required>
            </div>

            <!-- Type Retrait -->
            <div class="col-md-4 mb-3">
                  <label>Type Retrait</label>

                  <select name="type_retrait" class="form-select" required>
                      <option value="">-- Choisir --</option>

                      <option value="Retrait Provisoire">
                          Retrait Provisoire
                      </option>

                      <option value="Retrait Définitif">
                          Retrait Définitif
                      </option>
                  </select>
              </div>

            <!-- Motif -->
            <div class="col-md-6 mb-3">
                <label>Motif</label>
                <input type="text" name="motif" class="form-control" required>
            </div>

            <!-- Piece Justification -->
            <div class="col-md-6 mb-3">
                <label>Pièce de justification</label>

                <select name="piece_justification" class="form-select" required>
                    <option value="">-- Choisir --</option>
                    <option value="CIN">CIN</option>
                    <option value="Engagement">Engagement</option>
                </select>
            </div>

            <!-- Date Retrait -->
            <div class="col-md-6 mb-3">
                <label>Date Retrait</label>
                <input type="date" name="date_retrait" class="form-control" required>
            </div>

            <!-- Date Retour -->
            <div class="col-md-6 mb-3">
                <label>Date Retour</label>
                <input type="date" name="date_retour" class="form-control" required>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/retraitBac/create.blade.php ENDPATH**/ ?>