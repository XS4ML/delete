<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php $__currentLoopData = $organised_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-2 d-flex align-items-stretch">
          <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?php echo e(asset('/img/placeholder_image.png')); ?>" alt="Card image cap">
            <div class="card-body" style="padding-bottom: 60px;">
              <h5 class="card-title" style="font-size: 16px;"><?php echo e($oe->name); ?></h5>
              <p class="card-text" style="font-size: 12px;"><?php echo e(strlen($oe->description) > 300 ? substr($oe->description, 0, 200) . '...' : $oe->description); ?></p>
              <div style="position: absolute; bottom: 15px; left: 50%;">
                <div style="position: relative; left: -50%;">
                  <a href="#" class="btn btn-warning">View Event</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>