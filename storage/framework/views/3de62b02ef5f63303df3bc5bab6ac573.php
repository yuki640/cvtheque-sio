



<?php $__env->startSection('contenu'); ?>


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche compétence : suprimer</h4>
                </div>
                <div class="bs-component">
                <form method="post" action ="<?php echo e(route('competences.destroy', ['competence'=>$competence->id])); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">
                                <label for="intitule" class="col-sm-2 col-form-label">Intitulé : </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="intitule"
                                          name="intitule" value="<?php echo e($competence->intitule); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description"  class="col-sm-2 col-form-label">Descriptif :</label>
                                <textarea readonly class="form-control"
                                          id="description"
                                          name="description"
                                          
                                          rows="3"><?php echo e($competence->description); ?></textarea>
                            </div>



                         <div class="pos-bloc-section">
                               <a href="<?php echo e(route('competences.index')); ?>" class="btn btn-primary">Retour</a>
                               <button type="submit" class ="btn btn-primary float-end">Supprimer</button>

                                        
                               
                         </div>
                         </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cvtheque', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvtheque-sio\resources\views/competences/sup.blade.php ENDPATH**/ ?>