<?php ($noNav = true); ?>
<?php $__env->startSection('content'); ?>



<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Kept col-md-8 container but restricted inner content max-width for a clean mobile-friendly look -->
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">
            
            <!-- Modernized Card: Removed harsh borders, added deep shadow and soft corners -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <div class="card-body p-4 p-sm-5">
                    <!-- Clean Title Section -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark mb-1"><?php echo e(__('Welcome Back')); ?></h2>
                        <p class="text-muted small"><?php echo e(__('Please enter your details to sign in')); ?></p>
                    </div>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-3 small" role="alert">
                            <?php echo e(session('status')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Email Input Block using Bootstrap Floating Labels -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control rounded-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required autocomplete="email" autofocus>
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

                        <!-- Password Input Block using Bootstrap Floating Labels -->
                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control rounded-3 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Password" required autocomplete="current-password">
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

                        <!-- Utilities: Remember Me & Forgot Password aligned perfectly -->
                        <div class="d-flex justify-content-between align-items-center mb-4 small">
                            <div class="form-check m-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label text-secondary" for="remember">
                                    <?php echo e(__('Remember me')); ?>

                                </label>
                            </div>
                            
                            <?php if(Route::has('password.request')): ?>
                                <a class="text-decoration-none fw-semibold link-primary" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Modern Full-Width Action Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold rounded-3 shadow-sm py-2 fs-6">
                                <?php echo e(__('Sign In')); ?>

                            </button>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\myApp\resources\views/auth/login.blade.php ENDPATH**/ ?>