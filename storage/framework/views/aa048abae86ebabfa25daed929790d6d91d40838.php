

<?php
/* Display elements */
$contentNavbar = true;
$containerNav = ($containerNav ?? 'container-xxl');
$isNavbar = ($isNavbar ?? true);
$isMenu = ($isMenu ?? true);
$isFlex = ($isFlex ?? false);
$isFooter = ($isFooter ?? true);
$customizerHidden = ($customizerHidden ?? '');
$pricingModal = ($pricingModal ?? false);

/* HTML Classes */
$navbarDetached = 'navbar-detached';

/* Content classes */
$container = ($container ?? 'container-xxl');

?>

<?php $__env->startSection('layoutContent'); ?>
<div class="layout-wrapper layout-content-navbar <?php echo e($isMenu ? '' : 'layout-without-menu'); ?>">
  <div class="layout-container">

    <?php if($isMenu): ?>
    <?php echo $__env->make('layouts/sections/menu/verticalMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <!-- Layout page -->
    <div class="layout-page">
      <!-- BEGIN: Navbar-->
      <?php if($isNavbar): ?>
      <?php echo $__env->make('layouts/sections/navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
      <!-- END: Navbar-->


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        <?php if($isFlex): ?>
        <div class="<?php echo e($container); ?> d-flex align-items-stretch flex-grow-1 p-0">
          <?php else: ?>
          <div class="<?php echo e($container); ?> flex-grow-1 container-p-y">
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>

            <!-- pricingModal -->
            <?php if($pricingModal): ?>
            <?php echo $__env->make('_partials/_modals/modal-pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <!--/ pricingModal -->

          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php if($isFooter): ?>
          <?php echo $__env->make('layouts/sections/footer/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <?php if($isMenu): ?>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <?php endif; ?>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web\Laravel\StoreSystem\StoreMsystem - nn\resources\views/layouts/contentNavbarLayout.blade.php ENDPATH**/ ?>