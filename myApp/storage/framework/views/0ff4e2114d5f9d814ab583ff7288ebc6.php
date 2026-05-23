<?php $__env->startSection('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/calender.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> Absences</span>
                        <span class="fs-3"> <?php echo e(count($absences)); ?></span>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/team.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> stagiaires</span>
                        <span class="fs-3"> <?php echo e(count($stagiaires)); ?></span>
                        
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning" >
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/absence.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> Retrait Bac</span>
                        <span class="fs-3"> <?php echo e(count($retraitbac)); ?></span>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <img src="./images/calender.png" alt="">
                    <p class="text-white fw-bold mb-0 me-3 text-center mt-1">
                        <span class="d-block fs-4"> No active</span>
                        <span class="fs-3"> <?php echo e(count($stagiaires_no_active)); ?></span>

                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 bg-white p-2">
            <h4 class="text-center my-3 fs-3">Retrait Bac</h4>
            <table class="table table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">CEF</th>
                        <th scope="col">Group</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $stagiaires_no_active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(strtoupper($item->stagiaire->nom_francais.' '.$item->stagiaire->prenom_francais)); ?></td>
                        <td><?php echo e($item->stagiaire->cef); ?></td>
                        <td><?php echo e($item->stagiaire->groupes[0]->nom_g); ?></td>
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><?php echo e($stagiaires_no_active->links()); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-md-6 bg-white p-2">
            <h4 class="text-center my-3 fs-3">No Active</h4>
            <table class="table table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">CEF</th>
                        <th scope="col">Group</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $__currentLoopData = $stagiaires_no_active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(strtoupper($item->stagiaire->nom_francais.' '.$item->stagiaire->prenom_francais)); ?></td>
                        <td><?php echo e($item->stagiaire->cef); ?></td>
                        <td><?php echo e($item->stagiaire->groupes[0]->nom_g); ?></td>
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><?php echo e($stagiaires_no_active->links()); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/dashboard.blade.php ENDPATH**/ ?>