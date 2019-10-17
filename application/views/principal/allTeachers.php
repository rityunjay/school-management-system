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
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by keyword..." value="<?php echo $searchKeyword; ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-outline-secondary" value="Search">
                        <input type="submit" name="submitSearchReset" class="btn btn-outline-secondary" value="Reset">
                    </div>
                </div>
            </form>
            
            <!-- Add link -->
            <!-- <div class="float-right">
                <a href="<?php echo site_url('members/add/'); ?>" class="btn btn-success"><i class="plus"></i> New Member</a>
            </div> -->
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
                            <th> Member ID </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Email </th>
                            <th> Department </th>
                            <th> Class </th>
                            <th> Section </th>
                            <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($teachers)){ $i=0; foreach($teachers as $row){ $i++; ?>
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
                          <td> <?php if ($row['role'] == 2){ echo "Teacher";} ?> </td>
                          
                          <td> 
                            <a href="<?php echo site_url('members/view/'.$row['id']); ?>" class="btn btn-primary"><i class="icon-eye"></i></a>
                            <a href="<?php echo site_url('members/edit/'.$row['id']); ?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
                            <a href="<?php echo site_url('members/delete/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="icon-trash"></i></a>
                          </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr>
                          <td colspan="7">
                            No Teacher's found...
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
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