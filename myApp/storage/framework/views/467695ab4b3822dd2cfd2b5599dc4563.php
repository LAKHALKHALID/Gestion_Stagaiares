



<?php $__env->startSection('content'); ?>

<div class="container mt-4">
  <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

    <div class="card shadow">

        <div class="card-header">
            <h4>Create Engagement</h4>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('engagements.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>


                
                <div class="mb-3">
                    <label class="form-label">Stagiaire</label>

                    <input 
                        type="text" 
                        name="stagiaire_id" 
                        class="form-control"
                        placeholder="Enter stagiaire id"
                    >
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Motif</label>

                    <select name="motif" class="form-select">
                        <option value="">-- Select Motif --</option>
                        <option value="Absence">Absence</option>
                        <option value="Retrais Bac">Retrais Bac</option>
                        <option value="Comportement">Comportement</option>
                    </select>
                </div>

                

                
                <div class="mb-3">
                    <label class="form-label">Date</label>

                    <input 
                        type="date" 
                        name="date" 
                        class="form-control"
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>

            </form>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/engagements/create.blade.php ENDPATH**/ ?>