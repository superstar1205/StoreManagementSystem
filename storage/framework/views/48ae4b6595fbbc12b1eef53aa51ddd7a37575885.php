<ul class="menu-sub">
  <?php if(isset($menu)): ?>
  <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  
  <?php
  $activeClass = null;
  $active = 'active open';
  $currentRouteName = Route::currentRouteName();

  if ($currentRouteName === $submenu->slug) {
  $activeClass = 'active';
  }
  elseif (isset($submenu->submenu)) {
  if (gettype($submenu->slug) === 'array') {
  foreach($submenu->slug as $slug){
  if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
  $activeClass = $active;
  }
  }
  }
  else{
  if (str_contains($currentRouteName,$submenu->slug) and strpos($currentRouteName,$submenu->slug) === 0) {
  $activeClass = $active;
  }
  }
  }
  ?>

  <li class="menu-item <?php echo e($activeClass); ?>">
    <a href="<?php echo e(isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)'); ?>" class="<?php echo e(isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link'); ?>" <?php if(isset($submenu->target) and !empty($submenu->target)): ?> target="_blank" <?php endif; ?>>
      <?php if(isset($submenu->icon)): ?>
      <i class="<?php echo e($submenu->icon); ?>"></i>
      <?php endif; ?>
      <div><?php echo e(isset($submenu->name) ? __($submenu->name) : ''); ?></div>
    </a>

    
    <?php if(isset($submenu->submenu)): ?>
    <?php echo $__env->make('layouts.sections.menu.submenu',['menu' => $submenu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</ul>
<?php /**PATH E:\Web\Laravel\StoreSystem\StoreMsystem - nn\resources\views/layouts/sections/menu/submenu.blade.php ENDPATH**/ ?>