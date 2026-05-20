
<style>
    .barcode{
        width: 200px;
        height: 50px;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="" method="GET" class="row g-3 align-items-end">

          <!-- Input CEF -->
          <div class="col-md-5">
              <label for="cef" class="form-label">CEF du stagiaire</label>
              <input type="text" name="cef" id="cef" class="form-control" placeholder="Ex: 2000112300678">
          </div>

          <!-- Input Groupe -->
          <div class="col-md-5">
              <label for="groupe" class="form-label">Groupe</label>
              <input type="text" name="groupe" id="groupe" class="form-control" placeholder="Ex: DEV101">
          </div>

          <!-- Button -->
          <div class="col-md-2">
              <button type="submit" class="btn btn-primary w-100">
                  Rechercher
              </button>
          </div>

      </form>
      

      <div class="container mt-4">
    <div class="row">

        <?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagiaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-6 mb-1">

                <div class="card shadow-sm border-0 bg-white">

                    <div class="card-body">

                        <div class="row align-items-center">

                            <!-- INFO -->
                            <div class="col-6">

                                <p class="mb-1">
                                    <strong>Nom  :</strong>
                                    <?php echo e($stagiaire->nom_francais); ?>

                                </p>

                                <p class="mb-1">
                                    <strong>Prénom:</strong>
                                    <?php echo e($stagiaire->prenom_francais); ?>

                                </p>

                                <p class="mb-1">
                                    <strong>CIN  :</strong>
                                    <?php echo e($stagiaire->cin); ?>

                                </p>

                                <p class="mb-0">
                                    <strong>CEF     :</strong>
                                    <?php echo e($stagiaire->cef); ?>

                                </p>
                                <p class="mb-0">
                                    <strong>Filière   :</strong>
                                    <?php echo e($stagiaire->filieres[0]->nom_filiere_francais); ?>

                                </p>
                                <p class="mb-0">
                                    <strong>Goupes   :</strong>
                                    <?php echo e($stagiaire->groupes[0]->nom_g); ?>

                                </p>


                            </div>

                            <!-- BARCODE -->
                            <div class="col-6 text-center">
                                <p class="mb-4">
                                    <strong>CEF AL ADARISSA FES   </strong>
                                </p>
                                <p class="mb-2">
                                    <strong><?php echo e($stagiaire->nom_annee_scolaire); ?></strong>
                                </p>

                                <svg class="barcode w-100"
                                      data-cef="<?php echo e($stagiaire->cef); ?>">
                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>




<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.barcode').forEach((item) => {

        JsBarcode(item, item.dataset.cef, {
            format: "CODE128",
            width: 2,
            height: 50,
            displayValue: true
        });

    });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/stagiaires/badge.blade.php ENDPATH**/ ?>