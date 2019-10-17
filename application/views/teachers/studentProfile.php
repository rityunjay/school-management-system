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
      <img src="<?php echo base_url('/assets/images/faces/'.$stds['profilePic']); ?>" class="inner">
    </div>
    <div class="left-side">

    <h2 class="card-title mb-0 font-weight-bold mt-4" style="text-transform: capitalize;"><b><?php echo $stds['first_name']; ?> <?php echo $stds['last_name']; ?></b></h2>
    <small class="d-block text-muted font-weight-semibold mb-0 mt-2"><?php echo $stds['email']; ?></small>
    <small class="d-block text-muted font-weight-semibold mb-0 mt-2"><?php echo $stds['created']; ?></small>
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
                        <div class="table-responsive border rounded p-1">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="font-weight-bold">First Name</th>
                                <th class="font-weight-bold">Last Name</th>
                                <th class="font-weight-bold">Email</th>
                                <th class="font-weight-bold">Created at</th>
                                <th class="font-weight-bold">Modified at</th>
                                <th class="font-weight-bold">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $stds['first_name']; ?></td>
                                <td><?php echo $stds['last_name']; ?></td>
                                <td><?php echo $stds['email']; ?></td>
                                <td><?php echo $stds['created']; ?></td>
                                <td><?php echo $stds['modified']; ?></td>
                                <td>
                                  <?php if ($stds['status'] ==1) {
                                    echo '<div class="badge badge-success p-2">Active</div>';
                                  }else{ echo '<div class="badge badge-danger p-2">Pending</div>'; } ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                          <!-- <table class="table">
                            <thead>
                              <tr>
                                <th class="font-weight-bold">Roll No.</th>
                                <th class="font-weight-bold">Class</th>
                                <th class="font-weight-bold">Section</th>
                                <th class="font-weight-bold">Session</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $stds['roll']; ?></td>
                                <td><?php echo $stds['class']; ?></td>
                                <td><?php echo $stds['section']; ?></td>
                                <td><?php echo $stds['session']; ?></td>
                                
                              </tr>
                            </tbody>
                          </table> -->
                        </div>
                      </div>
                    </div>
                     <div class="tab-pane" id="parents-h" role="tabpanel"><div class="sv-tab-panel">Messages  Panel</div></div>
                     <div class="tab-pane" id="attendance-h" role="tabpanel"><div class="sv-tab-panel">Settings Panel</div></div>
                  </div>

    </div>
    
  </section>
</div>


  
  

   </div>
</div>

