<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo e(route('register_user')); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <?php
            $name_error_messages = [];
            $email_error_messages = [];
            $password_error_messages = [];
            $password_confirmation_error_messages = [];
            $account_type_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'name') {
                $name_error_messages = $error_messages;
              }
              if ($field_name === 'email') {
                $email_error_messages = $error_messages;
              }
              if ($field_name === 'password') {
                $password_error_messages = $error_messages;
              }
              if ($field_name === 'password_confirmation') {
                $passwordConfirmation_error_messages = $error_messages;
              }
              if ($field_name === 'account_type') {
                $account_type_error_messages = $error_messages;
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
          <div class="form-group <?php echo e($email_error_messages ? 'has-error' : ''); ?>">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
            <?php $__currentLoopData = $email_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="form-group <?php echo e($password_error_messages ? 'has-error' : ''); ?>">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" value="">
            <?php $__currentLoopData = $password_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="form-group <?php echo e($password_confirmation_error_messages ? 'has-error' : ''); ?>">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" class="form-control" value="">
            <?php $__currentLoopData = $password_confirmation_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="form-group <?php echo e($account_type_error_messages ? 'has-error' : ''); ?>">
            <label>Account Type <span class="text-danger">*</span></label>
            <br>
            <input type="radio" name="account_type" value="student" <?php echo e(old('account_type') == 'student' ? 'checked' : ''); ?>> Student
            <input type="radio" name="account_type" value="organiser" <?php echo e(old('account_type') == 'organiser' ? 'checked' : ''); ?>> Organiser

            <?php $__currentLoopData = $account_type_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="text-danger"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="form-group" align="right">
            <input type="submit" class="btn btn-primary" value="Register">
          </div>
          <p align="right">Already have an account? <a href="<?php echo e(route('login')); ?>">Login here</a>.</p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>