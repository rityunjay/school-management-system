<div class="content-wrapper">
  <div class="page-header">
              <h3 class="page-title"> <?php echo $title; ?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('/users/dashboard/'); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                </ol>
              </nav>
            </div>

  <?php if(!empty($stds)){ ?>
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
            
            
        </div>
              <?php foreach($stds as $row){ ?>
              <div class="col-md-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold" style="text-transform: capitalize;"><a href="<?php echo site_url('teachers/studentProfile/'.$row['id']); ?>"><?php echo $row['first_name'] .' '. $row['last_name']; ?></a></h5> <span class="ml-auto"><a href="<?php echo site_url('teachers/view/'.$row['id']); ?>"><i class="icon-pencil"></i></a></span> 
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Class: <?php echo $row['class']; ?></span>
                          <h4>Roll No: <?php echo $row['roll']; ?></h4>
                          <span class="report-count"> Session: <?php echo $row['session']; ?></span>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <img class="img-sm" src="https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg">
                        </div>
                      </div>
                      
                    </div> -->
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="col-sm-12 d-flex mt-4 flex-wrap">
                      <!-- <p class="text-muted">Showing 1 to 10 of 57 entries</p> -->
                      <nav class="ml-auto pagination">
                        <ul class="pagination separated pagination-info">
                          <?php echo $this->pagination->create_links(); ?>
                        </ul> 
                      </nav>
                      <!-- Display pagination links -->
                    </div>
            </div>
  <?php }else{?>
    <div class="row card">
      <div class="card-body">
        <div class="card-description alert alert-danger">No Student's found...</div>
      </div>
    </div>
  <?php } ?>          
</div>