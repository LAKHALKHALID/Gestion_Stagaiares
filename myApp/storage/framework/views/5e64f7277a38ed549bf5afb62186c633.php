<?php ($noNav = true); ?>
<?php $__env->startSection('content'); ?>



<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Kept responsive layout while maintaining the ideal mobile-to-desktop card proportion -->
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">
            
            <!-- Modern Card: Flat borderless background, deep elevation shadow, and soft tracking corners -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <div class="card-body p-4 p-sm-5">
                    <!-- Headings Header Section -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark mb-1"><?php echo e(__('Create Account')); ?></h2>
                        <p class="text-muted small"><?php echo e(__('Get started with your free account today')); ?></p>
                    </div>

                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Name Input Block -->
                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control rounded-3 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="John Doe" required autocomplete="name" autofocus>
                            <label for="name" class="text-muted"><?php echo e(__('Full Name')); ?></label>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback px-1" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Email Input Block -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control rounded-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required autocomplete="email">
                            <label for="email" class="text-muted"><?php echo e(__('Email address')); ?></label>

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback px-1" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Password Input Block -->
                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control rounded-3 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Password" required autocomplete="new-password">
                            <label for="password" class="text-muted"><?php echo e(__('Password')); ?></label>

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback px-1" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Confirm Password Input Block -->
                        <div class="form-floating mb-4">
                            <input id="password-confirm" type="password" class="form-control rounded-3" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password-confirm" class="text-muted"><?php echo e(__('Confirm Password')); ?></label>
                        </div>

                        <!-- Primary Action: Big block layout submission button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold rounded-3 shadow-sm py-2 fs-6">
                                <?php echo e(__('Register')); ?>

                            </button>
                        </div>

                        <!-- Utility Redirection Route -->
                        <div class="text-center mt-3 small">
                            <span class="text-secondary"><?php echo e(__('Already have an account?')); ?></span>
                            <a class="text-decoration-none fw-semibold link-primary ms-1" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('Sign In')); ?>

                            </a>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/auth/register.blade.php ENDPATH**/ ?>