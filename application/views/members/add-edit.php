<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> <?php echo $title; ?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('/users/dashboard/'); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $title; ?></h4>
                    <?php if(!empty($success_msg)){ ?>
                    <p class="card-description text-success"> <?php echo $success_msg; ?> </p>
                    <?php }elseif(!empty($error_msg)){ ?>
                        <p class="card-description text-danger"> <?php echo $error_msg; ?> </p>
                    <?php } ?>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="<?php echo !empty($member['first_name'])?$member['first_name']:''; ?>" >
                        <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="<?php echo !empty($member['last_name'])?$member['last_name']:''; ?>" >
                        <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo !empty($member['email'])?$member['email']:''; ?>" >
                        <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?php echo !empty($member['password'])?$member['password']:''; ?>" >
                        <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password" value="<?php echo !empty($member['conf_password'])?$member['conf_password']:''; ?>" >
                        <?php echo form_error('conf_password','<p class="text-danger">','</p>'); ?>
                      </div>
                      
                      <input type="submit" name="memSubmit" class="btn btn-primary mr-2" value="Submit">
                      <a href="<?php echo site_url('members'); ?>" class="btn btn-light">Back</a>
                    </form>
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>