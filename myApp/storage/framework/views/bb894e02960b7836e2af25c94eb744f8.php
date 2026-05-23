



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
            <h3>Create Deperdition</h3>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('deperditions.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label class="form-label">Stagiaire ID</label>

                    <input 
                        type="text"
                        name="stagiaire_id"
                        class="form-control"
                        placeholder="Enter stagiaire CEF"
                        value="<?php echo e(old('stagiaire_id')); ?>"
                    >

                    <?php $__errorArgs = ['stagiaire_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Raison Deperdition</label>

                    <input 
                        type="text" 
                        name="raison_deperdition"
                        class="form-control"
                        value="<?php echo e(old('raison_deperdition')); ?>"
                    >

                    <?php $__errorArgs = ['raison_deperdition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Date Deperdition</label>

                    <input 
                        type="date" 
                        name="date_deperdition"
                        class="form-control"
                        value="<?php echo e(old('date_deperdition')); ?>"
                    >

                    <?php $__errorArgs = ['date_deperdition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                

                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>

                    <a href="<?php echo e(route('deperditions.index')); ?>" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/deperditions/create.blade.php ENDPATH**/ ?>