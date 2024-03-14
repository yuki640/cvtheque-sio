
<!-- Directive Blade spécifiant l'héritage -->


<!-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison yield -->
<?php $__env->startSection('contenu'); ?>
<div class="bs-docs-section pos-bloc-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Liste des Professionnels</h4>
                <select onchange="location.href=this.value">
                    <!-- Option par défaut -->
                    <option value="<?php echo e(route('professionnels.index')); ?>" <?php if (! ($slug)): ?> selected="selected" <?php endif; ?>>
                        Tous les métiers
                    </option>
                    <?php $__currentLoopData = $metiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Utilisation de <option> pour chaque métier -->
                    <option value="<?php echo e(route('professionnels.metier', ['slug'=>$metier->slug])); ?>" <?php echo e($slug == $metier->slug ? 'selected' : ''); ?>>
                        <?php echo e($metier->libelle); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <a href="<?php echo e(route('professionnels.create')); ?>" class="btn btn-primary float-end">Créer un professionnel</a>
        </div>
    </div>
</div>

<?php if(session('information')): ?>
<div class="bs-docs-section pos-bloc-section">
    <div class="alert alert-dismissible alert-success">
        <h4 class="alert-heading">Information : </h4>
        <p class="mb-0"><?php echo e(session('information')); ?></p>
    </div>
</div>
<?php endif; ?>

<div class="bs-docs-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Liste des Professionnels</h4>
            </div>
            <div class="bs-component">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom Prénom</th>
                            <th scope="col">Métier</th>
                            <th scope="col">CP Ville</th>
                            <th scope="col">Formation Oui/Non</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $professionnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professionnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($professionnel->id); ?></th>
                            <td><strong><?php echo e($professionnel->nom); ?> <?php echo e($professionnel->prenom); ?></strong></td>
                            <td><strong><?php echo e($professionnel->metier->libelle); ?></strong></td>
                            <td><strong><?php echo e($professionnel->cp); ?> <?php echo e($professionnel->ville); ?></strong></td>
                            <td>
                                <?php if($professionnel->formation == 1): ?>
                                <strong>oui</strong>
                                <?php else: ?>
                                <strong>non</strong>
                                <?php endif; ?>
                            </td>
                            <!-- Les boutons d'action ici -->
                            <td>
                            <form method="post" action="<?php echo e(route('professionnels.show', $professionnel->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Consulter </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('professionnels.edit', $professionnel->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Modifier </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('professionnels.sup', $professionnel->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-primary" > Supprimer </button>

                                        </form>
                                    </td>
                            <!-- Votre code pour les boutons ici -->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8">Aucun professionnel trouvé.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('cvtheque', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvtheque-sio\resources\views/professionnels/index.blade.php ENDPATH**/ ?>