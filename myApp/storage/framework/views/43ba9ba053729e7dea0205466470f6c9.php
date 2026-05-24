

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Détails du stagiaire</h3>

        <a href="<?php echo e(route('stagiaires.index')); ?>" class="btn btn-light border">
            ← Retour à la liste
        </a>
    </div>

    <!-- Top Card -->
    <div class="card shadow-sm p-4 mb-4 bg-white">
        <div class="row align-items-center">

            <!-- Avatar + Name -->
            <div class="col-md-6 d-flex align-items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=<?php echo e($stagiaire->prenom_francais); ?>+<?php echo e($stagiaire->nom_francais); ?>&size=100"
                    class="rounded-circle" />

                <div>
                    <h4 class="mb-1">
                        <?php echo e($stagiaire->prenom_francais); ?> <?php echo e($stagiaire->nom_francais); ?>

                    </h4>

                    <span class="badge bg-success">Actif</span>
                    <span class="badge bg-primary">Inscrit</span>
                </div>
            </div>

            <!-- Right Info -->
            <div class="col-md-4 text-md-start mt-3 mt-md-0">
                <p><strong>CEF:</strong> <?php echo e($stagiaire->cef); ?></p>
                <p><strong>CIN:</strong> <?php echo e($stagiaire->cin); ?></p>
                <p><strong>Année:</strong> <?php echo e($stagiaire->nom_annee_scolaire); ?></p>
            </div>

            <div class="col-md-2 text-md-end mt-3 mt-md-0">
                <a href="<?php echo e(route('stagiaires.edit',['cef'=>$stagiaire->cef])); ?>" class="btn w-100  btn-success ">edit</a>
                <a href="<?php echo e(route('stagiaires.edit',['cef'=>$stagiaire->cef])); ?>" class="btn w-100  btn-danger my-2">Delete</a>


                
            </div>
        </div>
    </div>

    <!-- Grid Info -->
    <div class="row g-3">

        <!-- Personal -->
        <div class="col-md-6">
            <div class="card  shadow-sm">
                <div class="card-header">
                  <h5 class="text-primary fw-bold my-2">Informations personnelles</h5>
                </div>
                <div class="card-body">
                    <p class="d-flex justify-content-between"><span class="fw-bold" >Nom (Français)</span> <span class="me-5 fw-bolder"><?php echo e($stagiaire->nom_francais); ?></span></p>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Prénom</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->prenom_francais); ?></span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Nom (Arabe)</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->nom_arabe); ?></span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Prénom (Arabe)</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->prenom_arabe); ?></span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Date naissance</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->date_naissance); ?></span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Lieu naissance</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->lieu_naissance); ?></span>
                    </p>
                </div>
                
                
            </div>
        </div>

        <!-- Academic -->
        <div class="col-md-6">
            
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="text-primary fw-bold my-2">Informations académiques</h5>
                </div>

                <div class="card-body">
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Année Scolaire</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->nom_annee_scolaire); ?></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Niveau</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->niveau_formation); ?></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Type</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->type_formation); ?></span>
                    </p>
                    <?php
                        $tatal = 0;
                        foreach ($stagiaire->transactions as $transaction) {
                            $tatal += $transaction->note;
                            
                        }
                    ?>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Note absences / 10 </span>
                        <span class="me-5 fw-bolder"><?php echo e(10 - $tatal); ?></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Année étude</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->annee_etude); ?></span>
                    </p>

                    <p class="d-flex justify-content-between">
                        <span class="fw-bold">Début formation</span>
                        <span class="me-5 fw-bolder"><?php echo e($stagiaire->date_demarrage_formation); ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5>Filiers</h5>
                <hr>
                <?php $__currentLoopData = $stagiaire->filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><strong><?php echo e($item->nom_filiere_francais); ?></strong> </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Extra -->
       <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5>Groupes</h5>
                <hr>
                <?php $__currentLoopData = $stagiaire->groupes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><strong><?php echo e($item->nom_g); ?></strong> </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>

    <!-- Actions -->
    <div class="mt-4 d-flex gap-2">
        <a href="<?php echo e(route('stagiaires.edit', $stagiaire->cef)); ?>" class="btn btn-primary">
            Modifier
        </a>

        <form action="<?php echo e(route('stagiaires.destroy', $stagiaire->cef)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger">
                Supprimer
            </button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/stagiaires/show.blade.php ENDPATH**/ ?>