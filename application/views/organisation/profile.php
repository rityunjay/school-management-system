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
   .here, .here1{
      border: none;
      background: #fff !important;
      text-transform: capitalize;
      font-size: 15px;
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
               <img src="<?php echo base_url('/assets/images/faces/organisation/'.$orgs['profilePic']); ?>" class="inner">
            </div>
            <div class="left-side">
               <h2 class="card-title mb-0 font-weight-bold mt-2" style="text-transform: capitalize;"><b><?php echo $orgs['orgName']; ?> <span style="text-transform: uppercase;">(<?php echo $orgs['nickName']; ?>)</span></b></h2>
               <small class="d-block text-muted font-weight-semibold mb-0"><?php echo $orgs['email']; ?></small>
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
                  <!-- <li class=""><a class="" data-toggle="tab" href="#parents-h" role="tab" aria-controls="parents">Parents Details</a></li>
                  <li class=""><a class="" data-toggle="tab" href="#attendance-h" role="tab" aria-controls="attendance">Attendance Record</a></li> -->
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
                              
                              <div class="row">
                                 <div class="col-md-12">
                                    <?php  
                                       if(!empty($update_msg)){ 
                                           echo '<h6 class="font-weight-light text-success">'.$update_msg.'</h6>'; 
                                       }elseif(!empty($update_error_msg)){ 
                                           echo '<h6 class="font-weight-light text-danger">'.$update_error_msg.'</h6>'; 
                                       } 
                                       ?>
                                    <form class="pt-3" method="post" enctype="multipart/form-data">
                                      <input value="<?php echo $orgs['id']; ?>" class="form-control here" name="pid" readonly type="hidden">
                                       <div class="form-group row">
                                          <label for="username" class="col-4 col-form-label">Organisation Name</label> 
                                          <div class="col-8">
                                             <input value="<?php echo $orgs['orgName']; ?>" name="orgName" class="form-control here myText" readonly type="text">
                                             <?php echo form_error('orgName','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="name" class="col-4 col-form-label">Nick Name</label> 
                                          <div class="col-8">
                                             <input value="<?php echo $orgs['nickName']; ?>" name="nickName" class="form-control here myText" type="text" readonly>
                                             <?php echo form_error('nickName','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="lastname" class="col-4 col-form-label">Email</label> 
                                          <div class="col-8">
                                             <input value="<?php echo $orgs['email']; ?>" name="email" class="form-control here myText" type="text" readonly>
                                             <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="lastname" class="col-4 col-form-label">Organisation Logo</label> 
                                          <div class="col-8">
                                             <input  name="userfile" class="form-control here myText" type="file" disabled>
                                             <input type="hidden" name="old"  value="<?php echo $orgs['profilePic']; ?>">
                                             <?php echo form_error('profilePic','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       
                                       
                                       <div class="form-group row">
                                          <label for="lastname" class="col-4 col-form-label">Mobile</label> 
                                          <div class="col-8">
                                             <input value="<?php echo $orgs['mobile']; ?>" name="mobile" class="form-control here myText" type="text" readonly>
                                             <?php echo form_error('mobile','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="lastname" class="col-4 col-form-label">Address</label> 
                                          <div class="col-8">
                                             <textarea name="address" class="form-control here myText" readonly><?php echo $orgs['address']; ?></textarea>
                                             <?php echo form_error('address','<p class="text-danger">','</p>'); ?>
                                          </div>
                                       </div>
                                       
                                       
                                       <input type="submit" name="updateProfile" class="btn btn-primary mr-2 btn-md show" value="Update" hidden="">
                                       <button type="back" value="Reset" class="btn btn-warning mr-2 btn-md show" hidden="">Reset</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="tab-pane" id="parents-h" role="tabpanel">
                     <div class="sv-tab-panel">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4>Parent Detail</h4>
                                    <button onclick="editParent()" class="btn btn-info btn-sm float-right" style="margin-top: -32px;">Edit Profile</button>
                                    <hr>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                  <?php  
                                       if(!empty($update_msg)){ 
                                           echo '<h6 class="font-weight-light text-success">'.$update_msg.'</h6>'; 
                                       }elseif(!empty($update_error_msg)){ 
                                           echo '<h6 class="font-weight-light text-danger">'.$update_error_msg.'</h6>'; 
                                       } 
                                       ?>
                                     <form class="pt-3" method="post">
                                       <div class="form-group row">
                                         <label for="username" class="col-4 col-form-label">Father Name</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $orgs['fatherName']; ?>" name="fatherName" class="form-control here1 myText1" readonly type="text">
                                           <?php echo form_error('fatherName','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="name" class="col-4 col-form-label">Mother Name</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $orgs['motherName']; ?>" name="motherName" class="form-control here1 myText1" type="text" readonly>
                                           <?php echo form_error('motherName','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="lastname" class="col-4 col-form-label">Father Email</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $orgs['fatherEmail']; ?>" name="fatherEmail" class="form-control here1 myText1" type="text" readonly>
                                           <?php echo form_error('fatherEmail','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="lastname" class="col-4 col-form-label">Father Mobile</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $orgs['fatherMobile']; ?>" name="fatherMobile" class="form-control here1 myText1" type="text" readonly>
                                           <?php echo form_error('fatherMobile','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="lastname" class="col-4 col-form-label">Father Occupation</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $orgs['fatherOccupation']; ?>" name="fatherOccupation" class="form-control here1 myText1" type="text" readonly>
                                           <?php echo form_error('fatherOccupation','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="lastname" class="col-4 col-form-label">Mother Occupation</label> 
                                         <div class="col-8">
                                           <input value="<?php echo $principal['motherOccupation']; ?>" name="motherOccupation" class="form-control here1 myText1" type="text" readonly>
                                           <?php echo form_error('motherOccupation','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                         <label for="publicinfo" class="col-4 col-form-label">Address</label> 
                                         <div class="col-8">
                                           <textarea cols="40" rows="4" class="form-control here1 myText1" name="address" readonly=""><?php echo $principal['address']; ?></textarea>
                                           <?php echo form_error('address','<p class="text-danger">','</p>'); ?>
                                         </div>
                                       </div>
                                       <input type="submit" name="submit" class="btn btn-primary mr-2 btn-md show1" value="Update" hidden="">
                                       <button type="back" value="Reset" class="btn btn-warning mr-2 btn-md show1" hidden="">Reset</button>
                                    </form> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="attendance-h" role="tabpanel">
                     <div class="sv-tab-panel">Settings Panel</div>
                  </div> -->
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

      $( "input" ).removeClass( "here" );
      $( "textarea" ).removeClass( "here" );
   }


   
</script>