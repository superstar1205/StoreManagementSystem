<?php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

?>

<!-- Navbar -->
<?php if(isset($navbarDetached) && $navbarDetached == 'navbar-detached'): ?>
<nav class="layout-navbar <?php echo e($containerNav); ?> navbar navbar-expand-xl <?php echo e($navbarDetached); ?> align-items-center bg-navbar-theme" id="layout-navbar">
  <?php endif; ?>
  <?php if(isset($navbarDetached) && $navbarDetached == ''): ?>
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="<?php echo e($containerNav); ?>">
      <?php endif; ?>

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      <?php if(isset($navbarFull)): ?>
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="<?php echo e(url('/')); ?>" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <?php echo $__env->make('_partials.macros',["width"=>25,"withbg"=>'#696cff'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </span>
          <span class="app-brand-text demo menu-text fw-bolder"><?php echo e(config('variables.templateName')); ?></span>
        </a>
      </div>
      <?php endif; ?>

      <!-- ! Not required for layout-without-menu -->
      <?php if(!isset($navbarHideToggle)): ?>
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0<?php echo e(isset($menuHorizontal) ? ' d-xl-none ' : ''); ?> <?php echo e(isset($contentNavbar) ?' d-xl-none ' : ''); ?>">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      <?php endif; ?>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">
          </div>
        </div> -->
        <!-- /Search -->

        <!-- Short -->
        <ul class="navbar-nav ">
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="bx bx-grid-alt bx-sm"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-start py-0">
              <div class="dropdown-shortcuts-list scrollable-container ps">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx bx-command fs-4"></i>
                    </span>
                    <a href="/home" class="stretched-link">General</a>
                    <small class="text-muted mb-0">Gneral page</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-food-menu fs-4"></i>
                    </span>
                    <a href="/newinvoice" class="stretched-link">New Invoice</a>
                    <small class="text-muted mb-0">Create New Invoice</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx bx-spreadsheet fs-4"></i>
                    </span>
                    <a href="/salsehistory" class="stretched-link">Invoices</a>
                    <small class="text-muted mb-0">Invoice List</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx bx-band-aid fs-4"></i>
                    </span>
                    <a href="/newproduct" class="stretched-link">Product</a>
                    <small class="text-muted mb-0">Record new product</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-store-alt fs-4"></i>
                    </span>
                    <a href="/showproducts" class="stretched-link">Store</a>
                    <small class="text-muted mb-0">Product of Store</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-add-to-queue fs-4"></i>
                    </span>
                    <a href="/addproduct" class="stretched-link">Add Product</a>
                    <small class="text-muted mb-0">Add product to Store</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-credit-card fs-4"></i>
                    </span>
                    <a href="/newexpense" class="stretched-link">Expense</a>
                    <small class="text-muted mb-0">Record New Expense</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-group fs-4"></i>
                    </span>
                    <a href="/partners" class="stretched-link">My Partners</a>
                    <small class="text-muted mb-0">Partners List</small>
                  </div>
                </div>
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

          <!-- Place this tag where you want the button to render. -->

          <!-- shortcut -->
          
          <!-- User -->

          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar ">
                <img src="<?php echo e(Auth::user()->avatar); ?>" class="w-px-40 h-px-40 rounded-circle border border-primary">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:void(0);">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="<?php echo e(Auth::user()->avatar); ?>" class="w-px-40 h-px-40 rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block"><?php echo e(Auth::user()->f_name); ?> <?php echo e(Auth::user()->l_name); ?></span>
                      <!-- <small class="text-muted">Admin</small> -->
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              
              <li>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class='bx bx-power-off me-2'></i>
                  <span class="align-middle">Log Out</span>
                </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

      <?php if(!isset($navbarDetached)): ?>
    </div>
    <?php endif; ?>
  </nav>
  <!-- / Navbar -->
<?php /**PATH E:\Web\Laravel\StoreSystem\StoreMsystem - nn\resources\views/layouts/sections/navbar/navbar.blade.php ENDPATH**/ ?>