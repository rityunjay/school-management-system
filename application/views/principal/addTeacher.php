    
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                
                <h4><?php echo $title; ?></h4>
                <?php  
                    if(!empty($success_msg)){ 
                        echo '<h6 class="font-weight-light text-success">'.$success_msg.'</h6>'; 
                    }elseif(!empty($error_msg)){ 
                        echo '<h6 class="font-weight-light text-danger">'.$error_msg.'</h6>'; 
                    } 
                ?>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="first_name" value="<?php echo set_value('first_name');?>" id="exampleInputUsername1" placeholder="First Name">
                    <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="last_name" value="<?php echo set_value('last_name');?>" id="exampleInputUsername1" placeholder="Last Name">
                    <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
                  </div>

                  <!-- <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo !empty($principal['email'])?$principal['email']:''; ?>">
                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                  </div> -->
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo set_value('email');?>">
                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                  </div>
                  
                  <div class="form-group row">
                    <?php foreach($principals as $row){ ?>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <label class="form-check-label" style="text-transform: capitalize;">
                          <input type="radio" class="form-check-input" name="desigID" id="<?php echo $row['desigName']; ?>" value="<?php echo $row['id']; ?>" > <?php echo $row['desigName']; ?> <i class="input-helper"></i>
                        </label>
                        <?php echo form_error('desigID','<p class="text-danger">','</p>'); ?>
                      </div>
                    </div>  
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="password" name="conf_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
                    <?php echo form_error('conf_password','<p class="text-danger">','</p>'); ?>
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="signupSubmit" value="Add Teacher" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
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
    