<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Login</h2>
        <p>Please login.</p>
        <form action="<?php echo e(route('login_user')); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <?php
            $credentials_incorrect_error_messages = [];
            $email_error_messages = [];
            $password_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'failed') {
                $credentials_incorrect_error_messages = $error_messages;
              }
              if ($field_name === 'email') {
                $email_error_messages = $error_messages;
              }
              if ($field_name === 'password') {
                $password_error_messages = $error_messages;
              }
            }
          ?>

          <ul>
            <?php $__currentLoopData = $credentials_incorrect_error_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="text-danger"><?php echo e($error_message); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>

          <div class="form-group <?php echo e($email_error_messages ? 'has-error' : ''); ?>">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="<?php echo e($user ? $user->email : ''); ?>">
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
          <div class="form-group" align="center">
            <input type="submit" class="btn btn-primary" value="Login">
            <a class="btn btn-default" href="<?php echo e(route('register')); ?>">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>