<div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> <?php echo $title; ?> </h3>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/principals/dashboard/'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
         </ol>
      </nav>
   </div>
   <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"> <?= $title ;?></h4>
               <p class="card-description"> 
                  <?php echo validation_errors(); ?> 
               </p>
               <?php  
                    if(!empty($success_msg)){ 
                        echo '<h6 class="font-weight-light alert alert-success">'.$success_msg.'</h6>'; 
                    }elseif(!empty($error_msg)){ 
                        echo '<h6 class="font-weight-light alert alert-danger">'.$error_msg.'</h6>'; 
                    } 
                ?>
               <?php echo form_open_multipart('principals/addDesignation'); ?>
               <div class="form-group">
                  <div class="input-group">
                     <input type="text" class="form-control" name="desigName" placeholder="Enter Dasignation Name" value="<?php echo set_value('desigName');?>" style="text-transform: capitalize;">
                     <?php echo form_error('desigName','<p class="text-danger">','</p>'); ?>
                  </div>
               </div>
               
               <div class="mt-3">
                  <input type="submit" name="add" value="Add Designation" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
               </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
         <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Designation&#39;s List</h4>
                    <?php if(!empty($success_msg)){ ?>
                    <div class="col-xs-12">
                        <div class="card-description alert alert-success"><?php echo $success_msg; ?></div>
                    </div>
                    <?php }elseif(!empty($error_msg)){ ?>
                    <div class="col-xs-12">
                        <div class="card-description alert alert-danger"><?php echo $error_msg; ?></div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($principals)){ ?>
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($principals as $row){ $i++;?>
                        <tr>
                          <td class="py-1">
                            <?php echo $i; ?>
                          </td>
                          <td style="text-transform: capitalize;"> <?php echo $row['desigName']; ?> </td>
                          <td> 
                            <a href="<?php echo site_url('principals/view/'.$row['id']); ?>" class="btn btn-primary btn-sm"><i class="icon-eye"></i></a>
                            <a href="<?php echo site_url('principals/edit/'.$row['id']); ?>" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                            <a href="<?php echo site_url('principals/deleteDesignationRecord/'.$row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="icon-trash"></i></a>
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
                    <div class="d-flex mt-4 flex-wrap">
                      <!-- <p class="text-muted">Showing 1 to 10 of 57 entries</p> -->
                      <nav class="ml-auto pagination">
                        <ul class="pagination separated pagination-info">
                          <?php echo $this->pagination->create_links(); ?>
                        </ul> 
                      </nav>
                      <!-- Display pagination links -->
                    </div>
                  </div>
                </div>
      </div>
   </div>
</div>