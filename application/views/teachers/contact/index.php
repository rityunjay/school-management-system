<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> <?php echo $title; ?> </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('teachers/dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contact</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58407.40907481109!2d86.39914453500076!3d23.802127160344327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f6a30804ccfc6d%3A0xfa151e1b85f764e7!2sDhanbad%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1573160728624!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                  </div>
                </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contact Form</h4>

                    <!-- Display the status message -->
                    <?php if(!empty($status)){ ?>
                    <p class="card-description status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></p>
                    <?php } ?>
                    <form class="forms-sample" role="form" method="post">
                      <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $teacher['first_name']; ?> <?php echo $teacher['last_name']; ?>" id="fullname" placeholder="Full Name" readonly>
                        <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="email1">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $teacher['email']; ?>" id="email1" placeholder="Email" readonly>
                        <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" class="form-control" placeholder="Subject">
                        <?php echo form_error('subject','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" placeholder="Message" rows="5"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                        <?php echo form_error('message','<p class="text-danger">','</p>'); ?>
                      </div>
                      
                      <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
                      <input type="submit" name="contactSubmit" class="btn btn-primary mr-2" value="Submit">
                    </form>
                  </div>
                </div>
              </div>
  </div>

</div>