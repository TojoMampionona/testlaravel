<?php $__env->startSection('title'); ?>Edit Profile
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Edit Profile</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">Edit Profile</li>
	<?php echo $__env->renderComponent(); ?>
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
	                        <h4 class="card-title mb-0">My Profile</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <form>
	                            <div class="row mb-2">
	                                <div class="profile-title">
	                                    <div class="media">
	                                        <img class="img-70 rounded-circle" alt="" src="<?php echo e(asset('/'. $utilisateur->img_pdp)); ?>" />
	                                        <div class="media-body">
	                                            <h3 class="mb-1 f-20 txt-primary nom_utilisateur"><?php echo e($utilisateur->nom); ?> </h3>
												<h4 class="mb-1 f-20 txt-primary prenom_utilisateur"> <?php echo e($utilisateur->prenom); ?></h4>
	                                            <p class="f-12 nom_service"><?php echo e($utilisateur->service); ?></p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <h6 class="form-label">Bio</h6>
	                                <textarea class="form-control biographie" rows="5" disabled><?php echo e($utilisateur->biographie); ?></textarea>
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Email-Address</label>
	                                <input class="form-control mail" placeholder="your-email@domain.com" value="<?php echo e($utilisateur->email); ?>" disabled/>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <form method="POST" id="formEditProfile" action="<?php echo e(route ('update-profile', ['id_utilisateur' => $utilisateur->id_utilisateur])); ?>" enctype="multipart/form-data" class="card">
                    <?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
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
										<input class="form-control edit_nom" type="text" name="lastname" placeholder="Nom" value="<?php echo e($utilisateur->nom); ?>" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Prénom</label>
	                                    <input class="form-control edit_prenom" type="text" name="firstname" placeholder="Prénom" value="<?php echo e($utilisateur->prenom); ?>" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Email address</label>
	                                    <input class="form-control edit_email" type="email" name="email" placeholder="Email" value="<?php echo e($utilisateur->email); ?>"/>
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
                                            <option value="1" <?php echo e($utilisateur->actif == 1 ? 'selected' : ''); ?>>Oui</option>
                                            <option value="0" <?php echo e($utilisateur->actif == 0 ? 'selected' : ''); ?>>Non</option>
                                        </select>
	                                </div>
	                            </div>
                                <div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">PWD</label>
	                                    <input class="form-control" type="password" name="pwd" value="<?php echo e($utilisateur->pwd); ?>" required/>
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Date d'insértion</label>
	                                    <input class="form-control" type="date" name="date_d_ajout" value="<?php echo e($utilisateur->date_insertion); ?>" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Locked</label><br />
	                                    <input class="form-check-input" type="checkbox" name="locked" value="1" <?php echo e($utilisateur->locked == 1 ? 'checked' : ''); ?>>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdp" class="form-label">Image de profil</label>
										<?php if($utilisateur->img_pdp): ?>
										<p>Nom de votre image de profil: <?php echo e($utilisateur->img_pdp); ?></p>
										<?php else: ?>
										<p>Aucune image de profil actuelle.</p>
										<?php endif; ?>
        								<input type="file" class="form-control" id="img_pdp" name="img_pdp" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdp_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdc" class="form-label">Image de couverture</label>
										<?php if($utilisateur->img_pdc): ?>
										<p>Nom de votre image de couverture: <?php echo e($utilisateur->img_pdc); ?></p>
										<?php else: ?>
										<p>Aucune image de couverture actuelle.</p>
										<?php endif; ?>
        								<input type="file" class="form-control" id="img_pdc" name="img_pdc" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdc_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Biographie</label>
	                                    <textarea class="form-control edit_bio" rows="5" name="biographie" placeholder="Ajouter votre biographie" ><?php echo e($utilisateur->biographie); ?></textarea>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div>
	                                    <label class="form-label">Commentaire</label>
	                                    <textarea class="form-control" rows="5" name="commentaire" placeholder="Ajouter du commentaire sur cet utilisateur" ><?php echo e($utilisateur->commentaire); ?></textarea>
	                                </div>
	                            </div>
                                
                                <div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Date d'activation</label>
	                                    <input class="form-control" type="date" name="date_d_activation" value="<?php echo e($utilisateur->date_locked); ?>"/>
	                                </div>
	                            </div>
                            
                                <!-- <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Profil</label>
										<select class="form-control" name="id_profil">
											<?php $__currentLoopData = $listeDesProfils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($utilisateur->id_profil); ?>" <?php echo e($utilisateur->id_profil == $profil->id_profil ? 'selected' : ''); ?>><?php echo e($profil->id_profil); ?> - <?php echo e($profil->libelle); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div> -->
                                <!-- <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">ID Personnel</label>
										<select class="form-control" name="id_personnel">
											<?php $__currentLoopData = $listeDesPersonnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($utilisateur->id_personnel); ?>" <?php echo e($utilisateur->id_personnel == $personnel->id_personnel ? 'selected' : ''); ?>><?php echo e($personnel->id_personnel); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div> -->
                                <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Droit d'accès</label>
										<select class="form-control" name="id_droitacces">
											<?php $__currentLoopData = $listeDesDroitsAcces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $droitacces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($utilisateur->id_droitacces); ?>" <?php echo e($utilisateur->id_droitacces == $droitacces->id_droitacces ? 'selected' : ''); ?>><?php echo e($droitacces->libelle); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                </div>
                                
	                        </div>
	                    </div>
	                    <div class="card-footer text-end">
	                        <button class="btn btn-primary" type="submit">Modifier</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

	
	<?php $__env->startPush('scripts'); ?>
		<script src="<?php echo e(asset('assets/js/monscript.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/imageUploaded.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\viho-laravel-10\viho-laravel-10\resources\views/admin/apps/edit-profile.blade.php ENDPATH**/ ?>