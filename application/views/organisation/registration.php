<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/simple-line-icons/css/simple-line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css'); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>"> <!-- End layout styles -->
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
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <?php  
                    if(!empty($success_msg)){ 
                        echo '<h6 class="text-success">'.$success_msg.'</h6>'; 
                    }elseif(!empty($error_msg)){ 
                        echo '<h6 class="text-danger">'.$error_msg.'</h6>'; 
                    } 
                ?>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="orgName" value="<?php echo !empty($org['orgName'])?$org['orgName']:''; ?>" id="exampleInputUsername1" placeholder="Organisation Name">
                    <?php echo form_error('orgName','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo !empty($org['email'])?$org['email']:''; ?>">
                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                  </div>
                  
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="password" name="conf_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
                    <?php echo form_error('conf_password','<p class="text-danger">','</p>'); ?>
                  </div>

                  <!-- <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="terms" class="form-check-input" value="1"> I agree to all Terms & Conditions </label>
                        <?php echo form_error('terms','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div> -->
                  <div class="mt-3">
                    <input type="submit" name="signupSubmit" value="CREATE ACCOUNT" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?php echo base_url('organisations/login/'); ?>" class="text-primary">Login</a>
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