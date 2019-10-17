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
      <img src="<?php //echo base_url('/assets/images/faces/'.$principal['memberPic']); ?>" class="inner">
    </div>
    <div class="left-side">

    <h2 class="card-title mb-0 font-weight-bold mt-4" style="text-transform: capitalize;"><b><?php echo $principal['first_name']; ?> <?php echo $principal['last_name']; ?></b></h2>
    <small class="d-block text-muted font-weight-semibold mb-0 mt-2"><?php echo $principal['email']; ?></small>
    <small class="d-block text-muted font-weight-semibold mb-0 mt-2"><?php //echo $principal['country']; ?></small>
    </div>
  </section>
  <section class="section center-col content">
    
    <!-- Nav -->
    <nav class="profile-nav">
      <ul>
        <li class="active"><a href="<?php echo base_url('/principals/profile/'.$principals['id']); ?>">Home</a></li>
        <li><a href="#" onclick="openTab(event, 'Servers')">Posts</a></li>
        <li><a href="#" onclick="openTab(event, 'teachers')">Pages</a></li>
        <li><a href="#" onclick="openTab(event, 'Workers')">category</a></li>
        <li><a href="#teachers" class="btn btn-large btn-info active" data-toggle="tab">setting</a></li>
      </ul>
    </nav>
    
    <!-- Wil hyped X-->
    <div class="unit user-hyped">

<?php if(!empty($teachers)){ ?>
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Member ID </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Email </th>
                            <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($teachers as $row){ $i++;?>
                        <tr>
                          <td class="py-1">
                            <?php echo $i; ?>
                          </td>
                          <td> <?php echo $row['id']; ?> </td>
                          <td> <?php echo $row['first_name']; ?> </td>
                          <td>
                            <?php echo $row['last_name']; ?>
                          </td>
                          <td> <?php echo $row['email']; ?> </td>
                          <td> 
                            <a href="<?php echo site_url('principals/view/'.$row['id']); ?>" class="btn btn-primary"><i class="icon-eye"></i></a>
                            <a href="<?php echo site_url('principals/edit/'.$row['id']); ?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
                            <a href="<?php echo site_url('principals/deleteTeacherRecord/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="icon-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php }else{?>
                      <div class="col-xs-12">
                        <div class="card-description alert alert-danger">No Student's found...</div>
                      </div>
                    <?php } ?>



    </div>
    
  </section>
</div>


  
  

   </div>
</div>
