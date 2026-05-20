<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>OFPPT</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="icon" href="<?php echo e(asset('assets/img/OFPPT.png')); ?>" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/azzara.min.css')); ?>">
    <link href="<?php echo e(asset('assets/styles.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/prism.css')); ?>" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>


    <div class="wrapper">
        <?php if(!isset($noNav)): ?>
            <?php echo $__env->make('layout.navBar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('layout.sideBar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        

        <div class="main-panel">
            <div class="content content-documentation">
                <div class="container-fluid">

                    <?php echo $__env->yieldContent('content'); ?>
                    
                </div>
            </div>
        </div>
    </div>

    </div>

     <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldContent("js_script"); ?>

    <script src="<?php echo e(asset('assets/js/setting-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/JsBarcode.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ready.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/jquery.3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')); ?>" charset="utf-8">
    </script>
    <script src="<?php echo e(asset('assets/js/plugin/chart-circle/circles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ready.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/prism.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/prism-normalize-whitespace.min.js')); ?>"></script>
    <script type="text/javascript">
        // Optional
        Prism.plugins.NormalizeWhitespace.setDefaults({
            'remove-trailing': true,
            'remove-indent': true,
            'left-trim': true,
            'right-trim': true,
        });

        // handle links with @href started with '#' only
        $(document).on('click', 'a[href^="#"]', function(e) {
            // target element id
            var id = $(this).attr('href');

            // target element
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }

            // prevent standard hash navigation (avoid blinking in IE)
            e.preventDefault();

            // top position relative to the document
            var pos = $id.offset().top - 80;

            // animated top scrolling
            $('body, html').animate({
                scrollTop: pos
            });
        });
    </script>

</body>

</html>
<?php /**PATH D:\Desktop\DEV203\My_project_of_syntese\Gestion_Stagaiares\myApp\resources\views/layout/app.blade.php ENDPATH**/ ?>