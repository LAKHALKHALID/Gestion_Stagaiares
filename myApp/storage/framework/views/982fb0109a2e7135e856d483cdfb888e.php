<?php $__env->startSection('content'); ?>


<div class="container mt-4">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    

        
            <h4 class="mb-0 text-center">Liste des Filières</h4>

            <a href="<?php echo e(route('filiers.create')); ?>" class="btn btn-primary btn-sm my-3">
                    Ajouter
            </a>

            <a href="<?php echo e(route('toImport.filieres')); ?>" class="btn btn-primary btn-sm my-3">
                    import
            </a>
        

        

            <form method="GET" action="<?php echo e(route('filiers.index')); ?>" class="mb-3">

                <div class="row">

                    

                    <div class="col-md-4">
                        <select name="mode_f" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Tous les modes --</option>
                            <option value="Qualifiant"
                                <?php echo e(request('mode_f') == 'Qualifiant' ? 'selected' : ''); ?>>
                                Qualifiant
                            </option>
                            <option value="Diploma"
                                <?php echo e(request('mode_f') == 'Diploma' ? 'selected' : ''); ?>>
                                Diploma
                            </option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <a href="<?php echo e(route('filiers.index')); ?>" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>

            </form>
            <div class="table-responsive">
                <table  class="table table-bordered table-head-bg-info table-bordered-bd-info">

                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Mode</th>
                            <th>Français</th>
                            <th>Arabe</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($f->code_f); ?></td>
                                <td><?php echo e($f->mode_formation); ?></td>
                                <td><?php echo e($f->nom_filiere_francais); ?></td>
                                <td dir="rtl"><?php echo e($f->nom_filiere_arabe); ?></td>
                                <td>
                                    <a href="<?php echo e(route('filiers.show', $f->code_f)); ?>"
                                        class="btn btn-info btn-sm">
                                        Show
                                    </a>

                                    <a href="<?php echo e(route('filiers.edit', $f->code_f)); ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('filiers.destroy', $f->code_f)); ?>"
                                            method="POST"
                                            style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ?')">
                                            Supp
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Aucune filière trouvée
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>

        
    

</div>

<script>

    $(document).ready(function () {

        $('#basic-datatables').DataTable();

    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/filiers/index.blade.php ENDPATH**/ ?>