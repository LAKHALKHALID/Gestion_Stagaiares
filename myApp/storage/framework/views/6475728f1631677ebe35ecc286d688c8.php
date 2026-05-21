

<?php $__env->startSection('title','create'); ?>


<?php $__env->startSection('content'); ?>
<?php ($seances = [
    "8h30-11h00",
    "11h00-13h30",
    "13h30-16h00",
    "16h00-18h30"
]); ?>
<style>
.form-checkl-new{
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}

.form-check-inputl-new{
    width: 14px;
    height: 14px;
    cursor: pointer;
}

.form-check-label-new{
    font-size: 16px;
    cursor: pointer;
}
</style>
<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajouter une absence</h5>
        </div>

        <div class="card-body">
                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
            <form action="<?php echo e(route('absences.update',['id'=>$ab->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Code Stagiaire (CEF)</label>
                        <input 
                            type="text" 
                            readonly
                            disabled
                            value="<?php echo e($ab->stagiaire_id); ?>"
                            name="cef" 
                            class="form-control" 
                            placeholder="Entrer le CEF" 
                            required
                        >
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label fw-bold">Choisir les séances</label>

                    <div class="row">
                      <?php for($i = 0; $i < count($seances); $i++): ?>
                              <div class="col-md-3">
                                  <div class="form-check-new">
                                      <input class="form-check-input-new" <?php echo e(in_array($seances[$i],$data)?'checked':''); ?> type="checkbox" name="seance[]" value="8h30-11h00" id="<?php echo e('s'.($i+1)); ?>">
                                      <label class="form-check-label-new" for="<?php echo e('s'.($i+1)); ?>">
                                          <?php echo e($seances[$i]); ?>

                                      </label>
                                  </div>
                                  
                              </div>     
                      <?php endfor; ?>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <label for="">Chemin : </label>
                          <input type="file" name="chemin" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label for="">Medecin : </label>
                          <input type="text" name="medecin" class="form-control">
                        </div>
                      </div>

                        

                    </div>
                </div>

                <div class="text-end">
                    <button class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/absences/edit.blade.php ENDPATH**/ ?>