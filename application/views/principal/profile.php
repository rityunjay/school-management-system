<style type="text/css">
ul li{
  list-style: none;
}
.cover-photo {
  width: 80%;
  height: 250px;
  margin: 0 auto;
  background-color: #f5f5f5;
  position: relative;
  z-index: 1;
  background-image: url(http://placekitten.com/980/250);
}

.body {
  width: 80%;
  margin: 0 auto;
  z-index: 4;
  position: relative;
}

/*.left-col, .right-col {
  width: 226px;
  float: left;
  min-height: 400px;
  position: relative;
}*/
.left-col {
  width: 20%;
  float: left;
  min-height: 400px;
  position: relative;
}
.left-col {
  /*margin-right: 24px;*/
  position: relative;
  top: -150px;
  left: 8px;
}

.center-col {
  float: left;
  width: 80%;
  /*margin-right: 24px;*/
  min-height: 400px;
}

/*.right-col {
  background-color: blue;
}*/

/* LEFT COL */
.user-info h1 {
  font-size: 24px;
  font-weight: 600;
  line-height: 1.2;
  padding-top: 4px;
}
.user-info h2 {
  color: #666;
  font-size: 16px;
}
.user-info .meta {
  padding: 8px 0;
  font-size: 14px;
}
.user-info .meta p {
  line-height: 1.6;
}
.user-info .meta i {
  font-size: 0.95em;
  padding-right: 2px;
}

.profile-avatar {
  width: 218px;
  height: 218px;
  border: 1px solid #e1e1e1;
  background-color: #fff;
  right: 0;
}
.profile-avatar .inner {
  width: 206px;
  height: 206px;
  margin: 5px;
  background-image: url(http://placekitten.com/220/220);
}

/* CENTER */
.image-grid {
  width: 100%;
}
.image-grid li {
  float: left;
  background-color: #EFEFEF;
}
.image-grid.col-3 li {
  width: 32%;
  margin-right: 2%;
  margin-bottom: 2%;
  height: 0;
  padding-bottom: 30%;
  background-image: url(http://placekitten.com/200/200);
  -webkit-background-size: 100%;
  background-size: 100%;
}
.image-grid.col-3 li:nth-child(3n) {
  margin-right: 0;
}

.profile-nav {
  height: 46px;
  background-color: white;
  border-bottom: 2px solid #E1E1E1;
  margin-bottom: 8px;
}
.profile-nav ul > li {
  color: #999;
  font-size: 14px;
  float: left;
  line-height: 44px;
  font-weight: 600;
  padding: 0 22px;
  cursor: pointer;
}
.profile-nav li.active {
  color: #1E1E1E;
}

.content .unit {
  padding: 8px 0 10px 0;
  border-bottom: 2px solid #E1E1E1;
  margin-bottom: 8px;
  background: #fff;
}
.content .unit:last-child {
  margin-bottom: 16px;
}
.content .unit h3 {
  margin-bottom: 4px;
  color: #777;
}
.content .unit h3 a {
  color: #1e1e1e;
  font-weight: 600;
}
.content .unit p.time {
  color: #777;
  font-size: 14px;
  margin-bottom: 8px;
}
.content .unit .more {
  font-size: 14px;
  color: #777;
}
.content .unit .more a {
  color: #777;
}
.left-side{
  background: #fff;
  width: 218px;
  margin-top: 10px;
}
.left-side, h2, small{
  padding: 5px 0 0 10px; 
}
</style>

<div class="content-wrapper">
   <div class="row">


    
    
<!------ Include the above in your HEAD tag ---------->
<div class="cover-photo"></div>
<div class="body">
  <section class="left-col user-info">
    <div class="profile-avatar">
      <!-- <div class="inner"></div> -->
      <img src="<?php echo base_url('/assets/images/faces/'.$principal['profilePic']); ?>" class="inner">
    </div>
    <div class="left-side">

    <h2 class="card-title mb-0 font-weight-bold mt-2" style="text-transform: capitalize;"><b><?php echo $principal['first_name']; ?> <?php echo $principal['last_name']; ?></b></h2>
    <small class="d-block text-muted font-weight-semibold mb-0"><?php echo $principal['email']; ?></small>
    <small class="d-block text-muted font-weight-semibold mb-0 mt-2"></small>
    </div>
  </section>
  <section class="section center-col content">
    
    <!-- Nav -->
    <nav class="profile-nav">
      <ul class="nav nav-tabs" role="tablist">
                     <li class="">
                        <a class="active" data-toggle="tab" href="#home-h" role="tab" aria-controls="home">Home</a>
                     </li>
                     <li class=""><a class="" data-toggle="tab" href="#personal-h" role="tab" aria-controls="personal">Personal Details</a></li>
                     <li class=""><a class="" data-toggle="tab" href="#parents-h" role="tab" aria-controls="parents">Parents Details</a></li>
                     <li class=""><a class="" data-toggle="tab" href="#attendance-h" role="tab" aria-controls="attendance">Attendance Record</a></li>
                  </ul>
    </nav>
    
    <!-- Wil hyped X-->
    <div class="unit user-hyped">
          <div class="tab-content">
                     <div class="tab-pane active" id="home-h" role="tabpanel">
                      <div class="sv-tab-panel">
                        
                        

                      </div>
                    </div>
                     <div class="tab-pane" id="personal-h" role="tabpanel">
                      <div class="sv-tab-panel">
                        
                        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Personal Detail</h4>
                        <button onclick="editMp()" class="btn btn-info btn-sm float-right" style="margin-top: -25px;">Edit Profile</button>
                        <hr>
                    </div>
                </div>
                <!-- <div class="form-group row">
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
                  </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <?php  
                    if(!empty($success_msg)){ 
                        echo '<h6 class="font-weight-light text-success">'.$success_msg.'</h6>'; 
                    }elseif(!empty($error_msg)){ 
                        echo '<h6 class="font-weight-light text-danger">'.$error_msg.'</h6>'; 
                    } 
                ?>
                <form class="pt-3" method="post">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input value="<?php echo $principal['first_name']; ?>" name="first_name" class="form-control here myText" readonly type="text">
                                  <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input value="<?php echo $principal['last_name']; ?>" name="last_name" class="form-control here myText" type="text" readonly>
                                  <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input value="<?php echo $principal['email']; ?>" name="email" class="form-control here myText" type="text" readonly>
                                  <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mobile</label> 
                                <div class="col-8">
                                  <input value="<?php echo $principal['mobile']; ?>" name="mobile" class="form-control here myText" type="text" readonly>
                                  <?php echo form_error('mobile','<p class="text-danger">','</p>'); ?>
                                </div>
                              </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input myText" name="gender" id="membershipRadios1" value="male" disabled <?php if($principal['gender'] == 'male'){ echo "checked"; } ?>> Male <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input myText" name="gender" id="membershipRadios2" value="female" disabled <?php if($principal['gender'] == 'female'){ echo "checked"; } ?>> Female <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <?php echo form_error('gender','<p class="text-danger">','</p>'); ?>
                          </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Marital Status</label>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input myText" name="mStatus" id="membershipRadios1" value="married" disabled <?php if($principal['mStatus'] == 'married'){ echo "checked"; } ?>> Married <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input myText" name="mStatus" id="membershipRadios2" value="unmarried" disabled <?php if($principal['mStatus'] == 'unmarried'){ echo "checked"; } ?>> Unmarried <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <?php echo form_error('mStatus','<p class="text-danger">','</p>'); ?>
                          </div>
                              

                              <input type="submit" name="updateProfile" class="btn btn-primary mr-2 btn-md show" value="Update" hidden="">
                              
                        </form>
                    </div>
                </div>
                
            </div>
        </div>


                      </div>
                    </div>
                      <div class="tab-pane" id="parents-h" role="tabpanel">
                        <div class="sv-tab-panel">
                          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Parent Detail</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Father Name</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['father_name']; ?>" class="form-control here" readonly type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Mother Name</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['mother_name']; ?>" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Father Email</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['f_email']; ?>" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Father Mobile</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['f_mobile']; ?>" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Father Occupation</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['father_occupation']; ?>" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mother Occupation</label> 
                                <div class="col-8">
                                  <input value="<?php echo $teachs['mother_occupation']; ?>" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                  <textarea cols="40" rows="4" class="form-control" readonly=""><?php echo $teachs['address']; ?></textarea>
                                </div>
                              </div>
                              
                        </div> -->
                    </div>
                </div>
                
            </div>
        </div>

                        </div>
                      </div>
                     <div class="tab-pane" id="attendance-h" role="tabpanel"><div class="sv-tab-panel">Settings Panel</div></div>
                  </div>



    </div>
    
  </section>
</div>


  
  

   </div>
</div>



       

<script>
  function editMp(){
    $(".myText").removeAttr('readonly');
    $(".myText").removeAttr('disabled');
    $(".show").removeAttr('hidden');
  }

</script>




