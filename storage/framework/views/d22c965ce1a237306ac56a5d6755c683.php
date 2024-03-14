<!-- Directive Blade spécifiant l'héritage  -->


 <!-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison yield  -->
<?php $__env->startSection('contenu'); ?>

    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            
            
            
            <div class="col-lg-12 ">
                <a href="<?php echo e(route('competences.create')); ?>" class="btn btn-primary float-end">Créer une compétence</a>
            </div>
        </div>
    </div>

     <!-- ICI LA GESTION DES MESSAGES D'INFORMATION   -->
    <?php if(session('information')): ?>
        <div class="bs-docs-section pos-bloc-section">
            <div class="alert alert-dismissible alert-success">
                <h4 class="alert-heading">Information : </h4>
                <p class="mb-0"><?php echo e(session('information')); ?></p>
            </div>
        </div>
    <?php endif; ?>
     <!-- FIN GESTION INFO  -->

    <div class="bs-docs-section ">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Liste des compétences</h4>
                </div>

                <div class="bs-component">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Intitulé</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- BOUCLE POUR RECUPERATION DES COMPTENCES  -->
                            <?php $__currentLoopData = $competences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($competence->id); ?></th>
                                    <td><strong><?php echo e($competence->intitule); ?></strong></td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('competences.show', $competence->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Consulter </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('competences.edit', $competence->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Modifier </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('competences.sup', $competence->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Supprimer </button>

                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <!-- FIN BOUCLE  -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('cvtheque', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvtheque-sio\V0-2\resources\views/competences/index.blade.php ENDPATH**/ ?>