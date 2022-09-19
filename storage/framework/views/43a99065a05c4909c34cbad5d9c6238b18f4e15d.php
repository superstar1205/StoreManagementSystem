

<?php $__env->startSection('title', 'Store - Product Tables'); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Store /</span> Products
</h4>

<div class="card">
  <h5 class="card-header">Products</h5>
  <div  class="table-responsive text-nowrap p-2">
    <table id="examplebasictable" class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Amounts</th>
          <th>Total Price</th>
          <!-- <th>Partners</th> -->
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="text-center"><div class="img"><img class="w-100 rounded-1" src="<?php echo e($product->image); ?>"></div></td>
          <td ><?php echo e($product->product_name); ?></td>
          <td >₪ <?php echo e($product->product_price); ?></td>
          <td ><?php echo e($product->product_num); ?></td>
          <td >₪ <?php echo e($product->product_price * $product->product_num); ?></td>
          <!-- <td class="text-center">
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="<?php echo e(asset('assets/img/avatars/5.png')); ?>" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="<?php echo e(asset('assets/img/avatars/6.png')); ?>" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="<?php echo e(asset('assets/img/avatars/7.png')); ?>" alt="Avatar" class="rounded-circle">
              </li>
            </ul>
          </td> -->
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td colspan="2"></td>
          <?php 
          $tpro=0;
          $tpnum = 0;
          $tpro_t=0; 
          foreach($products as $key=> $product){
            $tpro +=  $product->product_price;
            $tpnum += $product->product_num;
            $tpro_t += $product->product_price*$product->product_num;
          }
          echo '<td>₪ '.$tpro.'</td>';
          echo '<td>'.$tpnum.'</td>';
          echo '<td>₪ '.$tpro_t.'</td>';
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!--/ Basic Bootstrap Table -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentNavbarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web\Laravel\StoreSystem\StoreMsystem - nn\resources\views/content/Stores/products-list.blade.php ENDPATH**/ ?>