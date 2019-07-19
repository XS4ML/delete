<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Create an event</h2>

        <form action="<?php echo e(route('create_event')); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <?php
            $name_error_messages = [];
            $venue_error_messages = [];
            $category_error_messages = [];
            $starting_at_error_messages = [];
            $description_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'name') {
                $name_error_messages = $error_messages;
              }
              if ($field_name === 'venue') {
                $venue_error_messages = $error_messages;
              }
              if ($field_name === 'category') {
                $category_error_messages = $error_messages;
              }
              if ($field_name === 'starting_at') {
                $starting_at_error_messages = $error_messages;
              }
              if ($field_name === 'description') {
                $description_error_messages = $error_messages;
              }
            }
          ?>

          <div class="form-group <?php echo e($name_error_messages ? 'has-error' : ''); ?>">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
            <?php $__currentLoopData = $name_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="form-group <?php echo e($venue_error_messages ? 'has-error' : ''); ?>">
            <label>Venue <span class="text-danger">*</span></label>
            <input type="text" name="venue" class="form-control" value="<?php echo e(old('venue')); ?>">
            <?php $__currentLoopData = $venue_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="form-group <?php echo e($category_error_messages ? 'has-error' : ''); ?>">
            <label>Category <span class="text-danger">*</span></label>
            <select class="custom-select" name="category">
              <option <?php echo e(old('category') ? 'selected' : ''); ?> disabled>Please select</option>
              <option value="sport" <?php echo e(old('category') == 'sport' ? 'selected' : ''); ?>>Sport</option>
              <option value="culture" <?php echo e(old('category') == 'culture' ? 'selected' : ''); ?>>Culture</option>
              <option value="other" <?php echo e(old('category') == 'other' ? 'selected' : ''); ?>>Other</option>
            </select>
            <?php $__currentLoopData = $category_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="form-group <?php echo e($starting_at_error_messages ? 'has-error' : ''); ?>">
            <div style="display: inline-block;">
              <label style="display: inline;">Starting At <span class="text-danger">*</span></label>
              <p class="text-warning" style="display: inline;"><small>24 Hour clock format</small></p>
            </div>
            <input type="datetime-local" name="starting_at" class="form-control" value="<?php echo e(old('starting_at')); ?>">
            <?php $__currentLoopData = $starting_at_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="form-group <?php echo e($description_error_messages ? 'has-error' : ''); ?>">
            <label>Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control"><?php echo e(old('description')); ?></textarea>
            <?php $__currentLoopData = $description_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="form-group" align="right">
            <input type="submit" class="btn btn-primary" value="Create">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>