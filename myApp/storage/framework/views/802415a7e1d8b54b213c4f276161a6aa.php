<?php $__env->startSection('content'); ?>

<div class="container mt-4">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    

        
            

            <a href="<?php echo e(route('groupes.create')); ?>" class="btn btn-primary btn-sm"> Ajouter
            </a>
            <a href="<?php echo e(route('toImport.groupes')); ?>" class="btn btn-primary  btn-sm ms-3">Import</a>
        

        

            <form method="GET" action="<?php echo e(route('groupes.index')); ?>" class="my-3">

                <div class="row">

                    <div class="col-md-8">
                        <select name="filiere_id" class="form-control" onchange="this.form.submit()">

                            <option value="">-- Toutes les filières --</option>

                            <?php $__currentLoopData = $filiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($f->code_f); ?>"
                                    <?php echo e(request('filiere_id') == $f->code_f ? 'selected' : ''); ?>>
                                    <?php echo e($f->nom_filiere_francais); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                        
                    </div>

                    <div class="col-md-4">
                        <a href="<?php echo e(route('groupes.index')); ?>" class="btn btn-secondary w-100   ">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">

                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Filière</th>
                            <th>Capacité</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $groupes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($g->code_g); ?></td>
                                <td><?php echo e($g->nom_g); ?></td>
                                <td><?php echo e($g->filiere->nom_filiere_francais ?? ''); ?></td>
                                <td><?php echo e($g->capacite); ?></td>
                                <td>
                                    <a href="<?php echo e(route('groupes.show', $g->code_g)); ?>"
                                       class="btn btn-info btn-sm">
                                        Show
                                    </a>
                                    <a href="<?php echo e(route('groupes.edit', $g->code_g)); ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('groupes.destroy', $g->code_g)); ?>"
                                          method="POST"
                                          style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce groupe ?')">
                                            Supp
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Aucun groupe trouvé
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <?php echo e($groupes->links()); ?>

                </div>
            </div>
        
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/groupes/index.blade.php ENDPATH**/ ?>