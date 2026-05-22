<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
  <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

</head>
<body>
  



<nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top py-0 transition-all navbar-transparent">
  <div class="container">
    <a class="navbar-brand" href="#home">
        <img style="width: 50px" src="<?php echo e(asset('images/OFPPT.png')); ?>" alt="Logo" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active custom-nav-link position-relative px-2 mx-1" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link position-relative px-2 mx-1" href="#about">about</a>
        </li>
        <li class="nav-item">
            <a class="nav-link custom-nav-link position-relative px-2 mx-1" href="#how-it-works">
                Comment ça marche
            </a>
        </li>
      </ul>
      <div>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary me-2">Login</a>
        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Register</a> <!-- Changed to filled button for contrast -->
      </div>
    </div>
  </div>
</nav>


<?php echo $__env->make('components.landingPage', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.about', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.howItsWork', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<hr class="border-secondary opacity-25 my-4 container">
<?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('mainNavbar');
        
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
            navbar.classList.remove('navbar-transparent');
        } else {
            navbar.classList.add('navbar-transparent');
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\myApp\resources\views/welcome.blade.php ENDPATH**/ ?>