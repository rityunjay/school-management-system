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
                <div class="col-md-12 search-panel">
            <!-- Search form -->
            <!-- <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by keyword..." value="<?php //echo $searchKeyword; ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-outline-secondary" value="Search">
                        <input type="submit" name="submitSearchReset" class="btn btn-outline-secondary" value="Reset">
                    </div>
                </div>
            </form> -->
            
            <!-- Add link -->
            <div class="float-right">
              <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addClass"><i class="icon-plus"></i> Add Class</a>
            </div>
        </div>
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $title; ?></h4>
                    
                    <?php if(!empty($success_msg)){ ?>
                    <div class="col-xs-12">
                        <div class="card-description alert alert-success"><?php echo $success_msg; ?></div>
                    </div>
                    <?php }elseif(!empty($error_msg)){ ?>
                    <div class="col-xs-12">
                        <div class="card-description alert alert-danger"><?php echo $error_msg; ?></div>
                    </div>
                    <?php } ?>
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Class Name </th>
                            <th> Numeric Name </th>
                            <th> Teacher Name </th>
                            <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($cls)){ $i=0; foreach($cls as $row){ $i++;?>
                        <tr style="text-transform: capitalize;">
                          <td class="py-1">
                            <?php echo $i; ?>
                          </td>
                          <td> <?php echo $row['className']; ?> </td>
                          <td>
                            <?php echo $row['numericName']; ?>
                          </td>
                          <td> <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </td>
                          
                          
                          <td> 
                            <a href="<?php echo site_url('principals/teacherProfile/'.$row['id']); ?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-eye"></i></a>
                            <a href="<?php echo site_url('principals/editClass/'.$row['id']); ?>" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                            <a href="<?php echo site_url('principals/deleteClass/'.$row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="icon-trash"></i></a>
                          </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr>
                          <td colspan="7">
                            No Section(s) found...
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>





<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="addClass" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="card-title">Add Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
      
      <div class="card">
                  <div class="card-body">
                    
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Class Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Class Name" name="className">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputUsername1">Numeric Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Numeric Name" name="numericName">
                      </div>

                      <?php if(!empty($clst)){ ?>
                      <div class="form-group">
                        <label for="exampleSelectGender">Teacher Name</label>
                        <select class="form-control" id="exampleSelectGender" name="tid">
                          <option>Please Select One</option>
                          <?php foreach($clst as $row){?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['first_name']; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                      <?php } ?>
                      
                      <input type="submit" class="btn btn-primary mr-2" name="addClass">
                      <button class="btn btn-light">Cancel</button>

                    </form>
                  </div>
                </div>
    
    </div>
  </div>
</div>
