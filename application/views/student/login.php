<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hello! let&#39;s get started</title>

<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/simple-line-icons/css/simple-line-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/flag-icon-css/css/flag-icon.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css'); ?>">

<link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>"> 
<link rel="shortcut icon" href="<?php echo base_url('/assets/images/favicon.png'); ?>" />
</head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?php echo base_url('/assets/images/logo.svg'); ?>">
                </div>
                <h4>Hello! let&#39;s get started</h4>
                <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
                <!-- Status message -->
                <?php  
                    if(!empty($success_msg)){ 
                        echo '<h6 class="text-success">'.$success_msg.'</h6>'; 
                    }elseif(!empty($error_msg)){ 
                        echo '<h6 class="text-danger">'.$error_msg.'</h6>'; 
                    } 
                ?>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo set_value('email');?>">
                    <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    <?php echo form_error('password','<span class="text-danger">','</span>'); ?>
                  </div>
                  
                  <div class="mt-3">
                    <input type="submit" name="loginSubmit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <!-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                  </div>-->
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?php echo base_url('students/registration/'); ?>" class="text-primary">Create</a> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url('/assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url('/assets/js/off-canvas.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/misc.js'); ?>"></script>
    <!-- endinject -->
  </body>
</html>