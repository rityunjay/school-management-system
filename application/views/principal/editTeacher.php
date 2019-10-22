    <div class="content-wrapper">
      <div class="page-header">
              <h3 class="page-title"> <?php echo $title; ?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('principals/dashboard/'); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                </ol>
              </nav>
            </div>
    </div>
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
                    <input type="text" class="form-control form-control-lg" name="first_name" value="<?php echo !empty($member['first_name'])?$member['first_name']:''; ?>" id="exampleInputUsername1" placeholder="First Name">
                    <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="last_name" value="<?php echo !empty($member['last_name'])?$member['last_name']:''; ?>" id="exampleInputUsername1" placeholder="Last Name">
                    <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo !empty($member['email'])?$member['email']:''; ?>">
                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                  </div>
                  
                 <div class="form-group">
                  <label for="exampleSelectGender">Course</label>
                  <div class="row">
                    <?php foreach($principals as $row){ ?>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <label class="form-check-label" style="text-transform: capitalize;">
                          <input type="radio" class="form-check-input" name="desigName" id="<?php echo $row['id']; ?>" value="<?php echo $row['desigName']; ?>" <?php if(!$member['desigName'] == ''){ echo "checked";}?>> <?php echo $row['desigName']; ?> <i class="input-helper"></i>
                        </label>
                        <?php echo form_error('desigName','<p class="text-danger">','</p>'); ?>
                      </div>
                    </div>  
                    <?php } ?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleSelectGender">Teacher Status</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="1" <?php if($member['status'] == 1){ echo "checked";}?>> Active <i class="input-helper"></i>
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="0" <?php if($member['status'] == 0){ echo "checked";}?>> Block <i class="input-helper"></i>
                          </label>
                        </div>
                      </div>
                    </div>
                    <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
                  </div>

                  <div class="mt-3">
                    <input type="submit" name="teacherUpdate" value="Update Teacher" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
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
    