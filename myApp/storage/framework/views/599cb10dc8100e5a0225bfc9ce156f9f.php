



<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Edit Bac</h2>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <?php echo e(session('error')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('retraitBac.update',['id'=>$bac->id])); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">

            <!-- Stagiaire ID -->
            <div class="col-md-4 mb-3">
                <label>Stagiaire ID (CEF)</label>

                <input type="text"
                        name="stagiaire_id"
                        readonly
                        class="form-control"
                        value="<?php echo e($bac->stagiaire_id); ?>"
                        required>
            </div>

            <!-- CNE -->
            <div class="col-md-4 mb-3">
                <label>CNE</label>

                <input type="text"
                        name="cne"
                        readonly
                        class="form-control"
                        value="<?php echo e($bac->cne); ?>"
                        required>
            </div>

            <!-- Type Retrait -->
            <div class="col-md-4 mb-3">

                <label>Type Retrait</label>

                <select name="type_retrait" class="form-select" required>

                    <option value="">-- Choisir --</option>

                    <option value="Retrait Provisoire"
                        <?php echo e($bac->type_retrait == 'Retrait Provisoire' ? 'selected' : ''); ?>>
                        Retrait Provisoire
                    </option>

                    <option value="Retrait Définitif"
                        <?php echo e($bac->type_retrait == 'Retrait Définitif' ? 'selected' : ''); ?>>
                        Retrait Définitif
                    </option>

                </select>
            </div>

            <!-- Motif -->
            <div class="col-md-6 mb-3">

                <label>Motif</label>

                <input type="text"
                        name="motif"
                        class="form-control"
                        value="<?php echo e($bac->motif); ?>"
                        required>
            </div>

            <!-- Piece Justification -->
            <div class="col-md-6 mb-3">

                <label>Pièce de justification</label>

                <select name="piece_justification" class="form-select" required>

                    <option value="">-- Choisir --</option>

                    <option value="CIN"
                        <?php echo e($bac->piece_justification == 'CIN' ? 'selected' : ''); ?>>
                        CIN
                    </option>

                    <option value="Engagement"
                        <?php echo e($bac->piece_justification == 'Engagement' ? 'selected' : ''); ?>>
                        Engagement
                    </option>

                </select>
            </div>

            <!-- Date Retrait -->
            <div class="col-md-6 mb-3">

                <label>Date Retrait</label>

                <input type="date"
                       name="date_retrait"
                       class="form-control"
                       value="<?php echo e($bac->date_retrait); ?>"
                       required>
            </div>

            <!-- Date Retour -->
            <div class="col-md-6 mb-3">

                <label>Date Retour</label>

                <input type="date"
                       name="date_retour"
                       class="form-control"
                       value="<?php echo e($bac->date_retour); ?>"
                       required>
            </div>

            <fieldset class="form-group border p-3 rounded mb-3">
                <legend class="w-auto px-2 font-weight-bold text-sm">Est-ce que le Bac est retourné ? (Is Returned)</legend>

                <div class="d-flex gap-4 mt-2">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="is_returned" 
                            id="is_returned_yes" 
                            value="1" 
                            <?php echo e(old('is_returned', $bac->is_returned ?? '') == '1' ? 'checked' : ''); ?>

                        >
                        <label class="form-check-label" for="is_returned_yes">
                            Oui (Yes)
                        </label>
                    </div>

                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="is_returned" 
                            id="is_returned_no" 
                            value="0" 
                            <?php echo e(old('is_returned', $bac->is_returned ?? '0') == '0' ? 'checked' : ''); ?>

                        >
                        <label class="form-check-label" for="is_returned_no">
                            Non (No)
                        </label>
                    </div>
                </div>
            </fieldset>

        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/retraitBac/edit.blade.php ENDPATH**/ ?>