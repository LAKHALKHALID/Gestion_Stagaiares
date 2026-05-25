



<?php $__env->startSection('content'); ?>
    <style>
        @media print {
            /* 1. Hide everything on the page by default */
            body * {
                visibility: hidden;
            }
            
            /* 2. Make ONLY the modal-body and its inner tags visible */
            #printable-ticket-body,
            #printable-ticket-body * {
                visibility: visible;
            }
            
            /* 3. Strip away modal backgrounds, borders, and shadows */
            .modal, 
            .modal-dialog, 
            .modal-content {
                background: none !important;
                border: none !important;
                box-shadow: none !important;
            }

            /* 4. Position the text perfectly at the top-left corner of the printed sheet */
            #printable-ticket-body {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
            }
        }
    </style>

    <div class="container my-5">
        <a href="<?php echo e(route('absences.create')); ?>" class="btn btn-primary">Ajouter</a>
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('absences.index')); ?>" method="get">
            <div class="row my-4">
                <div class="col-md-8">
                    <input type="text" name="cef" class="form-control" placeholder="Entrer Code Stagiaire (CEF)" required>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success w-100">Search</button>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nature</th>
                    <th>Séance</th>
                    <th>Chemin</th>
                    <th>Medecin</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($absences) > 0): ?>
                    <?php $__currentLoopData = $absences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class=" <?php echo e($ab->chemin != null ? 'table-success' : ''); ?> ">
                            <td><?php echo e($ab->id); ?></td>
                            <td><?php echo e($ab->status); ?></td>
                            <td><?php echo e($ab->seance); ?></td>
                            <td><?php echo e($ab->chemin); ?></td>
                            <td><?php echo e($ab->medecin); ?></td>
                            <td><?php echo e($ab->created_at); ?></td>
                            <td class="d-flex gap-1">
                                <a href="<?php echo e(route('absences.edit', ['id' => $ab->id])); ?>" class="btn btn-success btn-sm">Edit</a>
                                <form action="<?php echo e(route('absences.destroy',$ab->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                <button onclick="return confirm('Are you sure you want to delete this absence?')" class="btn btn-danger btn-sm">Supp</button>
                                </form>
                                <button data-absences="<?php echo e($ab); ?>" 
                                        data-stagiaire="<?php echo e($ab->stagiaire); ?>"
                                        data-transactions="<?php echo e($ab->stagiaire->transactions ?? collect([])); ?>"
                                        class="btn btn-info print_billet btn-sm">Billet
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-3">
            <?php echo e($absences->links()); ?>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printable-ticket-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="window.print()" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_script'); ?>
    <script>
        let btnAbsences = document.querySelectorAll(".print_billet");

        btnAbsences.forEach(btn => {
            btn.onclick = (e) => {
                let absencesData = e.currentTarget.getAttribute("data-absences");
                let stagiaireData = e.currentTarget.getAttribute("data-stagiaire");
                let tranzactionData = e.currentTarget.getAttribute("data-transactions");

                // Convert string → object
                let absence = JSON.parse(absencesData);
                let stagiaire = JSON.parse(stagiaireData);
                let trazaction = JSON.parse(tranzactionData);

                // Safe array lookups
                let tr_absence = trazaction.find(t => t.motif == 'a') || { note: 0 };
                let tr_comportement = trazaction.find(t => t.motif == 'c') || { note: 0 };
                
                let fullName = stagiaire.nom_francais + " " + stagiaire.prenom_francais;
            
                // Dynamic date from your loop row element
                let isoDate = absence.created_at; 
                let date = new Date(isoDate);

                let formattedDate =
                    date.getDate().toString().padStart(2, '0') + '/' +
                    (date.getMonth() + 1).toString().padStart(2, '0') + '/' +
                    date.getFullYear();

                let formattedTime =
                    date.getHours().toString().padStart(2, '0') + ':' +
                    date.getMinutes().toString().padStart(2, '0');

                // Build HTML 
                let html = `
                    <p class='fw-bold text-center fs-4'>Billet d'entrée</p>
                    <hr>
                    <p class='text-center m-1'>Stagiaire: <strong>${fullName.toUpperCase()}</strong></p>
                    <p class='text-center m-1'>Date: <strong>${formattedDate} à ${formattedTime}</strong></p>
                    <p class='text-center m-1'>Statut: <strong>Absence ${absence.chemin != null ? 'justifiée' : 'non justifiée'}</strong></p>
                    <p class='text-center m-1'>Note assiduité / 10: <strong>${10 - tr_absence.note}</strong></p>
                    <p class='text-center m-1'>Note comportement / 5: <strong>${5 - tr_comportement.note}</strong></p>
                `;

                // FIX 1: Point directly to your custom printable element ID
                document.querySelector("#printable-ticket-body").innerHTML = html;
                
                // Set the modal title contextually
                document.querySelector("#exampleModalLabel").innerText = "Impression Billet - " + stagiaire.nom_francais.toUpperCase();

                // FIX 2: Target the overall master wrapper to toggle the component display 
                let modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            };
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/absences/index.blade.php ENDPATH**/ ?>