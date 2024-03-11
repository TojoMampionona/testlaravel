<?php $__env->startSection('title'); ?>User Cards
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>User Cards</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">User Cards</li>
	<?php echo $__env->renderComponent(); ?>
	
	<div class="container-fluid user-card">
	    <div class="row">
			<?php $__currentLoopData = $utilisateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilisateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
					<div class="card custom-card">
						<div class="card-header"><img class="img-fluid custom-card-image" src="<?php echo e(asset('/'. $utilisateur->img_pdc)); ?>" alt="" /></div>
						<div class="card-profile"><img class="rounded-circle pdp" src="<?php echo e(asset('/'. $utilisateur->img_pdp)); ?>" alt="" /></div>
						<ul class="card-social">
							<li>
								<a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-rss"></i></a>
							</li>
						</ul>
						<div class="text-center profile-details">
							<a href="#"> <h4><?php echo e($utilisateur->nom); ?> <?php echo e($utilisateur->prenom); ?></h4></a>
							<h6><?php echo e($utilisateur->service); ?></h6>
						</div>
						<div class="card-footer row">
							<div class="col-4 col-sm-4">
								<a class="btn btn-pill btn-outline-success btn-xs" type="button" href="<?php echo e(route('edit-profile', ['id_utilisateur' => $utilisateur->id_utilisateur])); ?>" style="font-size:14px">Détails</a>
							</div>
							<div class="col-4 col-sm-4">
								<form action="<?php echo e(route('utilisateur.destroy', $utilisateur->id_utilisateur)); ?>" method="post">
									<?php echo csrf_field(); ?>
									<?php echo method_field('DELETE'); ?>
									<button type="button" class="btn btn-pill btn-outline-primary btn-xs" data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo e($utilisateur->id_utilisateur); ?>" style="font-size:14px">
										Supprimer
									</button>
									<div class="modal fade" id="modalDelete<?php echo e($utilisateur->id_utilisateur); ?>" tabindex="-1" aria-labellebdy="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p>Voulez-vous vraiment supprimer <?php echo e($utilisateur->nom); ?> <?php echo e($utilisateur->prenom); ?></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
													<button type="submit" class="btn btn-primary" >Oui</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-4 col-sm-4">
								<form action="<?php echo e(route('toggle-lock', ['id_utilisateur' => $utilisateur->id_utilisateur])); ?>" method="post">
									<?php echo csrf_field(); ?>
									<button class="btn btn-pill btn-outline-danger  btn-xs" type="submit" style="font-size:14px"><?php echo e($utilisateur->locked ? 'Débloquer' : 'Bloquer'); ?></button>
								</form>
							</div>
						</div>
					</div>
	        	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </div>
	</div>
	
	<?php $__env->startPush('scripts'); ?>
		
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\viho-laravel-10\viho-laravel-10\resources\views/admin/apps/user-cards.blade.php ENDPATH**/ ?>