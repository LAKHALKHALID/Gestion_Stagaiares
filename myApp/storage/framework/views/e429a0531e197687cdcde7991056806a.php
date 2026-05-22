<div class="main-header" data-background-color="blue">
			<div class="logo-header">
				<a href="" class="text-white text-decoration-none logo fw-semibold fs-4 d-flex align-items-center gap-2">
					
					OFPPT

				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<div class="navbar-nav ms-2">
						<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
							<form action="<?php echo e(route('document.index')); ?>" method="get" class="d-flex mb-0" role="search">
								<input class="form-control me-2" name="group_or_cef" type="search" placeholder="Search" aria-label="Search"/>
								<button class="btn btn-outline-light" type="submit">Search</button>
							</form>
						</div>
					</div>
				    <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                            <?php echo e(__('Profile')); ?>

                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <?php echo e(__('Log Out')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
            </ul>
				</div>
			</nav>
		</div><?php /**PATH C:\xampp\htdocs\myApp\resources\views/layout/navBar.blade.php ENDPATH**/ ?>