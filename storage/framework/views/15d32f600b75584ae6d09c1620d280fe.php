

<?php $__env->startSection('title'); ?>Edit Profile
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Droits d'utilisateur</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">Parametrages</li>
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
	                    <div class="card-header">                            
                                <div>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                        Nouveaux droits
                                    </button>
                                </div>
                                <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un droit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?php echo e(route('create-droit')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="mb-3 col-md-12 mt-0">
                                                <label for="con-name">Libellé</label>
                                                <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="name_droit" type="text" required="" placeholder="Nom du droit" autocomplete="off">
                                                </div>
                                                <div class="col-sm-6">   
                                                    <input class="form-control" name="code" type="text" required="" placeholder="CODE" autocomplete="off">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Créer</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                </div>
                                <div class="mt-3 mb-3">
                                    <i data-feather="users"></i><span class="ms-2">Liste des droits</span>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $droitaccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $droit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <a class="show" data-bs-toggle="modal" data-bs-target="#modalCreate"><span class="title"><?php echo e($droit->libelle); ?></span></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <p>Hello word</p>
	            </div>
	        </div>
	    </div>
	</div>

	
	<?php $__env->startPush('scripts'); ?>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\viho-laravel-10\viho-laravel-10\resources\views/admin/apps/droit-utilisateur.blade.php ENDPATH**/ ?>