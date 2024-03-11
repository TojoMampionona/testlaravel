<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600"><?php echo e(auth()->user()->prenom); ?> <?php echo e(auth()->user()->nom); ?></h6></a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Applications</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/users')); ?>" href="javascript:void(0)"><i data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/users')); ?>;">
                            <!-- <li><a href="<?php echo e(route('user-profile')); ?>" class="<?php echo e(routeActive('user-profile')); ?>">Mon profil</a></li> -->
                            <li><a href="<?php echo e(route('user-cards')); ?>" class="<?php echo e(routeActive('user-cards')); ?>">Les utilisateurs</a></li>
                            <li><a href="<?php echo e(route('register')); ?>" class="<?php echo e(routeActive('register')); ?>">Ajouter</a></li>
                            <li><a href="<?php echo e(route('droits-utilisateur')); ?>" class="<?php echo e(routeActive('droits-utilisateur')); ?>">Droit d'utilisateur</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<?php /**PATH C:\wamp64\www\viho-laravel-10\viho-laravel-10\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>