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
      <ul id="pills-tab" role="tablist">
        <li class="active"><a href="<?php echo base_url('/teachers/studentProfile/'.$stds['id']); ?>">Home</a></li>
        <li><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Attendance Record</a></li>
        <li><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Personal Details</a></li>
        <li><a id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Parents Details</a></li>
        <li><a href="#">Site Setting</a></li>
      </ul>
      <!-- <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                      </li>
                    </ul> -->
    </nav>
    
    <!-- Wil hyped X-->
    <div class="unit user-hyped">
      

      <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="media">
                          <img class="mr-3 w-25 rounded" src="../../../assets/images/samples/300x300/12.jpg" alt="sample image">
                          <div class="media-body">
                            <h5 class="mt-0">I'm doing mental jumping jacks.</h5>
                            <p>Only you could make those words cute. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. I am not a killer. I feel like a jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</p>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="media">
                          <img class="mr-3 w-25 rounded" src="../../../assets/images/samples/300X300/10.jpg" alt="sample image">
                          <div class="media-body">
                            <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is computerized. Tell him time is of the essence. Somehow, I doubt that. You have a good heart, Dexter.</p>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="media">
                          <img class="mr-3 w-25 rounded" src="../../../assets/images/samples/300x300/14.jpg" alt="sample image">
                          <div class="media-body">
                            <p> I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. You all right, Dexter? </p>
                            <p> I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. I catch killers. Hello, Dexter Morgan. </p>
                          </div>
                        </div>
                      </div>
                    </div>



              




    </div>
    
  </section>
</div>


  
  

   </div>
</div>

