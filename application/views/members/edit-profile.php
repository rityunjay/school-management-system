<div class="content-wrapper">
   <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="aligner-wrapper">
                  <!-- <div class="chartjs-size-monitor">
                     <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                     </div>
                     <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                     </div>
                  </div> -->
                  <canvas id="sessionsDoughnutChart" height="310" style="display: block; width: 443px; height: 310px;" width="443" class="chartjs-render-monitor"></canvas>
                  <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                     <!-- <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                        <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small> -->
                     <!-- <img class="rounded-circle" src="http://localhost/grit/assets/images/faces/no-profile-photo.jpg" alt="" style="width:100%"> -->
                     
                     <!-- <img class="rounded-circle" src="<?php echo site_url('/assets/images/faces/'.$member['memberPic']); ?>" style="width:100%"> -->
                     <form method="post" enctype="multipart/form-data" action="<?php echo base_url('/members/picupdate'); ?>">
                       <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                       <input type="hidden" name="old_photo" value="<?php echo $member['memberPic']; ?>">
                       <input type="file" name="userfile" value="<?php echo $member['memberPic']; ?>">
                       <?php if ($member['memberPic']){ ?>
                        <img src="<?php echo base_url('/assets/images/faces/'.$member['memberPic']); ?>">
                         <?php }else{ ?>
                          <img src="<?php echo base_url('/assets/images/faces/noimage.jpg'); ?>">
                       <?php } ?>
                       <button type="submit">Update</button>
                     </form>

                     
                  </div>
               </div>
               <h2 class="card-title text-center mb-0 font-weight-bold mt-4" style="text-transform: capitalize;"><b><?php echo $member['first_name']; ?> <?php echo $member['last_name']; ?></b></h2>
               <small class="d-block text-center text-muted font-weight-semibold mb-0 mt-2"><?php echo $member['email']; ?></small>
               <small class="d-block text-center text-muted font-weight-semibold mb-0 mt-2"><?php echo $member['country']; ?></small>
               <!-- <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                  <div class="d-flex">
                    <span class="square-indicator bg-danger ml-2"></span>
                    <p class="mb-0 ml-2">Assigned</p>
                  </div>
                  <div class="d-flex">
                    <span class="square-indicator bg-success ml-2"></span>
                    <p class="mb-0 ml-2">Not Assigned</p>
                  </div>
                  <div class="d-flex">
                    <span class="square-indicator bg-warning ml-2"></span>
                    <p class="mb-0 ml-2">Reassigned</p>
                  </div>
                  </div> -->
            </div>
         </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
         <div class="card">

            <div class="card-body">
                    <h4 class="card-title"><?php echo $title; ?></h4>
                    <?php if(!empty($success_msg)){ ?>
                    <p class="card-description text-success"> <?php echo $success_msg; ?> </p>
                    <?php }elseif(!empty($error_msg)){ ?>
                        <p class="card-description text-danger"> <?php echo $error_msg; ?> </p>
                    <?php } ?>
                    <?php echo form_open_multipart('/members/edit/'.$member['id'], 'class="row forms-sample"'); ?>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="first_name" placeholder="Enter First Name" value="<?php echo !empty($member['first_name'])?$member['first_name']:''; ?>" >
                        <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputName1">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="last_name" placeholder="Enter Last Name" value="<?php echo !empty($member['last_name'])?$member['last_name']:''; ?>" >
                        <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Enter Email" value="<?php echo !empty($member['email'])?$member['email']:''; ?>" >
                        <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputPassword4">Country</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" name="country" placeholder="Enter Country" value="<?php echo !empty($member['country'])?$member['country']:''; ?>" >
                        <?php echo form_error('country','<p class="text-danger">','</p>'); ?>
                      </div>
                      
                      <div class="form-group col-sm-12">
                        <label>Member Picture</label>
                        <!-- <input type="file" name="img[]" class="file-upload-default"> -->
                        <div class="input-group col-xs-12">
                          <input type="file" class="form-control file-upload-info" name ="userfile" placeholder="Upload Image" value="<?php echo !empty($member['memberPic'])?$member['memberPic']:''; ?>" >
                        <?php echo form_error('memberPic','<p class="text-danger">','</p>'); ?>
                        </div>
                      </div>
                      <div class="form-group form-check form-check-flat form-check-primary col-sm-12">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="terms" value="1" <?php if($member['terms'] == 1){ echo "checked";}?> disabled=""> I Agree to all Terms & Conditions <i class="input-helper"></i></label>
                      </div>
                      
                      <input type="submit" name="memSubmit" class="btn btn-primary mr-2" value="Submit">
                    </form>
                  </div>
         </div>
      </div>
   </div>
 </div>