
<?php ($cities = [
    "Zagora",
    "Youssoufia",
    "Tiznit",
    "Tinghir",
    "Tétouan",
    "Témara",
    "Taza",
    "Taourirt",
    "Taroudant",
    "Tanger",
    "Tan-Tan",
    "Taounate",
    "Tata",
    "Sidi Slimane",
    "Sidi Kacem",
    "Sidi Bennour",
    "Skhirat",
    "Settat",
    "Sefrou",
    "Salé",
    "Safi",
    "Rhamna",
    "Rabat",
    "Ouezzane",
    "Ouarzazate",
    "Oujda",
    "Nouaceur",
    "Nador",
    "M'diq",
    "Midelt",
    "Meknès",
    "Mohammedia",
    "Marrakech",
    "Larache",
    "Laâyoune",
    "Khouribga",
    "Kénitra",
    "Jerada",
    "Imouzzer Kandar",
    "Ifrane",
    "Guelmim",
    "Fnideq",
    "Fquih Ben Salah",
    "Fès",
    "Errachidia",
    "Essaouira",
    "Es-Semara",
    "El Kelaa des Sraghna",
    "El Jadida",
    "Driouch",
    "Dakhla",
    "Chichaoua",
    "Chefchaouen",
    "Chtouka Ait Baha",
    "Casablanca",
    "Boulemane",
    "Berkane",
    "Berrechid",
    "Benslimane",
    "Beni Mellal",
    "Azrou",
    "Azilal",
    "Al Hoceima",
    "Agadir"
]); ?>

<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Create New Stagiaire</h4>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('stagiaires.update',['cef'=>$stagiaire->cef])); ?>" method="POST">
                <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <!-- CEF -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CEF</label>
                            <input type="text" readonly name="cef" value="<?php echo e($stagiaire->cef); ?>" class="form-control" >
                            
                        </div>

                        <!-- CIN -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CIN</label>
                            <input type="text" readonly name="cin" value="<?php echo e($stagiaire->cin); ?>" class="form-control" >
                            
                        </div>

                        <!-- Nom Français -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom (Français)</label>
                            <input type="text" name="nom_francais" value="<?php echo e($stagiaire->nom_francais); ?>" class="form-control" >
                            <?php $__errorArgs = ['nom_francais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Prénom Français -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Prénom (Français)</label>
                            <input type="text" name="prenom_francais" value="<?php echo e($stagiaire->prenom_francais); ?>" class="form-control" >
                            <?php $__errorArgs = ['prenom_francais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Nom Arabe -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom (Arabe)</label>
                            <input type="text" name="nom_arabe" value="<?php echo e($stagiaire->nom_arabe); ?>" class="form-control" dir="rtl">
                            <?php $__errorArgs = ['nom_arabe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Prénom Arabe -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Prénom (Arabe)</label>
                            <input type="text" name="prenom_arabe" value="<?php echo e($stagiaire->prenom_arabe); ?>" class="form-control" dir="rtl">
                            <?php $__errorArgs = ['prenom_arabe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Année scolaire -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Année Scolaire</label>
                            <select name="nom_annee_scolaire" class="form-control" >
                                <?php for($i = date('Y'); $i >= date('Y')-4; $i--): ?>
                                    <option value="<?php echo e(($i-1).'/'.$i); ?>" <?php echo e($stagiaire->nom_annee_scolaire == (($i-1).'/'.$i) ?'selected':''); ?>><?php echo e(($i-1).'/'.$i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <!-- Date naissance -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date de Naissance</label>
                            <input type="date" name="date_naissance" value="<?php echo e($stagiaire->date_naissance); ?>" class="form-control">
                            <?php $__errorArgs = ['date_naissance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Lieu naissance -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lieu de Naissance</label>
                            
                            <select name="lieu_naissance"  class="form-control" >
                                <option value="">-- Select City --</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city); ?>" <?php echo e($stagiaire->lieu_naissance == $city ?'selected':''); ?>><?php echo e($city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['lieu_naissance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <!-- Niveau formation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Niveau Formation</label>
                            <select name="niveau_formation" class="form-control" >
                                <option value="Technicien" <?php echo e($stagiaire->niveau_formation == 'Technicien' ?'selected':''); ?>>Technicien</option>
                                <option value="Technicien spécialisé" <?php echo e($stagiaire->niveau_formation == 'Technicien' ?'selected':''); ?>>Technicien spécialisé</option>
                                
                            </select>
                        
                        </div>

                        <!-- Type formation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type Formation</label>
                            <input type="text" name="type_formation" value="<?php echo e($stagiaire->type_formation); ?>" class="form-control">
                            <?php $__errorArgs = ['type_formation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Année étude -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Année Étude</label>
                            <select name="annee_etude" class="form-control" >
                                <option value="1ère année" <?php echo e($stagiaire->annee_etude == '1ère année' ?'selected':''); ?>>1ère année</option>
                                <option value="2ème année" <?php echo e($stagiaire->annee_etude == '2ème année' ?'selected':''); ?>>2ème année</option>
                                <option value="3ème année"<?php echo e($stagiaire->annee_etude == '3ème année' ?'selected':''); ?>>3ème année</option>
                            </select>
                        </div>

                        <!-- Date démarrage -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date Démarrage Formation</label>
                            <input type="date" name="date_demarrage_formation" value="<?php echo e($stagiaire->date_demarrage_formation); ?>" class="form-control">
                            <?php $__errorArgs = ['date_demarrage_formation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" name="tel" value="<?php echo e($stagiaire->tel); ?>" placeholder="+212 6 12 34 56 78" class="form-control">
                            <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                        <a href="<?php echo e(route('stagiaires.index')); ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/stagiaires/edit.blade.php ENDPATH**/ ?>