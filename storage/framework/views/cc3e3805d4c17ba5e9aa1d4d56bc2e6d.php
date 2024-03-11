

<?php $__env->startSection('title'); ?>
    Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Création d'utilisateur</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">Création d'utilisateur</li>
	<?php echo $__env->renderComponent(); ?>

<!-- Contenu -->
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="container-fluid">
	    <div class="edit-profile">
	        <div class="row">
	            <div class="col-xl-4">
	                <div class="card">
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">Création d'utilisateur</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <form>
	                            <div class="row mb-2">
	                                <div class="profile-title">
	                                    <div class="media">
	                                        <img class="img-70 rounded-circle" alt="" src="<?php echo e(asset('assets/images/user/7.jpg')); ?>" />
	                                        <div class="media-body">
	                                            <h3 class="mb-1 f-20 txt-primary nom_utilisateur"></h3>
												<h4 class="mb-1 f-20 txt-primary prenom_utilisateur"></h4>
	                                            <p class="f-12 nom_service"></p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <h6 class="form-label">Bio</h6>
	                                <textarea class="form-control biographie" rows="5" disabled></textarea>
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Email-Address</label>
	                                <input class="form-control mail" placeholder="your-email@domain.com" disabled/>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <form method="POST" action="<?php echo e(route ('register')); ?>" enctype="multipart/form-data" class="card">
                    <?php echo csrf_field(); ?>
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">Données du profil</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Nom de famille</label>
	                                    <input class="form-control edit_nom" type="text" name="lastname" placeholder="Last Name" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Prénom</label>
	                                    <input class="form-control edit_prenom" type="text" name="firstname" placeholder="Prénom" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Email address</label>
	                                    <input class="form-control edit_email" type="email" name="email" placeholder="Email" />
	                                </div>
	                            </div>
								<div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Poste</label>
	                                    <select class="form-control edit_service" name="service">
											<?php $__currentLoopData = $listeDesServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($service->libelle); ?>"><?php echo e($service->libelle); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
	                                </div>
	                            </div>
	                            <div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Actif</label>
                                        <select class="form-control" name="actif" required>
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
	                                </div>
	                            </div>
                                <div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">PWD</label>
	                                    <input class="form-control" type="text" name="pwd" required/>
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Date d'insértion</label>
	                                    <input class="form-control" type="date" name="date_d_ajout" placeholder="City" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Locked</label><br />
	                                    <input class="form-check-input" type="checkbox" name="locked" value="1">
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdp" class="form-label">Image de profil</label>
        								<input type="file" class="form-control img_pdp" id="img_pdp" name="img_pdp" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdp_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdc" class="form-label">Image de couverture</label>
        								<input type="file" class="form-control img_pdc" id="img_pdc" name="img_pdc" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdc_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Biographie</label>
	                                    <textarea class="form-control edit_bio" rows="5" name="biographie" placeholder="Ajouter votre biographie"></textarea>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div>
	                                    <label class="form-label">Commentaire</label>
	                                    <textarea class="form-control" rows="5" name="commentaire" placeholder="Ajouter du commentaire sur cet utilisateur"></textarea>
	                                </div>
	                            </div>
                                <div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Date d'activation</label>
	                                    <input class="form-control" type="date" name="date_d_activation"/>
	                                </div>
	                            </div>
                            
                                <!-- <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Profil</label>
										<select class="form-control" name="id_profil">
											<?php $__currentLoopData = $listeDesProfils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profils): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($profils->id_profil); ?>"><?php echo e($profils->id_profil); ?> - <?php echo e($profils->libelle); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div> -->
                                <!-- <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">ID Personnel</label>
										<select class="form-control" name="id_personnel">
											<?php $__currentLoopData = $listeDesPersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnels): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($personnels->id_personnel); ?>"><?php echo e($personnels->id_personnel); ?> - <?php echo e($personnels->prenom); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div> -->
                                <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Droit d'accès</label>
										<select class="form-control" name="id_droitacces">
											<?php $__currentLoopData = $listeDesDroitsAcces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $droitacces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($droitacces->id_droitacces); ?>"><?php echo e($droitacces->libelle); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div>
                                
	                        </div>
	                    </div>
	                    <div class="card-footer text-end">
	                        <button class="btn btn-primary" type="submit">Enregistrer cet utilisateur</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
<!-- Fin contenu -->

<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/monscript.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/imageUploaded.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\viho-laravel-10\viho-laravel-10\resources\views/admin/apps/register.blade.php ENDPATH**/ ?>