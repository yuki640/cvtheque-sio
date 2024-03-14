



<?php $__env->startSection('contenu'); ?>


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche professionnel : Consultation</h4>
                </div>
                <div class="bs-component">
                    <form method="post" action ="<?php echo e(route('professionnels.destroy', ['professionnel'=>$professionnel->id])); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="prenom"
                                          name="prenom" value="<?php echo e($professionnel->prenom); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom"  class="col-sm-2 col-form-label">Nom :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="nom"
                                          name="nom" value="<?php echo e($professionnel->nom); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cp " class="col-sm-2 col-form-label">Code Postal :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="cp"
                                          name="cp" value="<?php echo e($professionnel->cp); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ville " class="col-sm-2 col-form-label">Ville :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="ville"
                                          name="ville" value="<?php echo e($professionnel->ville); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone " class="col-sm-2 col-form-label">Téléphone :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="telephone"
                                          name="telephone" value="<?php echo e($professionnel->telephone); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email " class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="email"
                                          name="email" value="<?php echo e($professionnel->email); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="naissance " class="col-sm-2 col-form-label">Date de naissance :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="naissance"
                                          name="naissance" value="<?php echo e($professionnel->naissance); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="formation " class="col-sm-2 col-form-label">Formation :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="formation"
                                          name="formation" value="<?php echo e($professionnel->formation ? 'Oui' : 'Non'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domaine " class="col-sm-2 col-form-label">Domaine :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="domaine"
                                          name="domaine" value="<?php echo e($professionnel->domaine); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="source " class="col-sm-2 col-form-label">Source :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="source"
                                          name="source" value="<?php echo e($professionnel->source); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="observation " class="col-sm-2 col-form-label">Observation :</label>
                                <div class="col-sm-10">
                                    <textarea readonly="" class="form-control" id="observation"
                                              name="observation" rows="3"><?php echo e($professionnel->observation); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="metier_id " class="col-sm-2 col-form-label">Métier :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="metier_id"
                                          name="metier_id" value="<?php echo e($professionnel->metier->libelle); ?>">
                                </div>
                            </div>

                         <div class="pos-bloc-section">
                               <a href="<?php echo e(route('professionnels.index')); ?>" class="btn btn-primary">Retour</a>
                               <button type="submit" class ="btn btn-primary float-end">Supprimer</button>
                         </div>
                         </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cvtheque', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvtheque-sio\resources\views/professionnels/sup.blade.php ENDPATH**/ ?>