<div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> <?php echo $title; ?> </h3>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('teachers/dashboard/'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
         </ol>
      </nav>
   </div>

   <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                   
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">EARNED LEAVE</span>
                          <h4>$32123</h4>
                          <span class="report-count"> 2 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">HOSPITALIZATION LEAVE</span>
                          <h4>95,458</h4>
                          <span class="report-count"> 3 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">APPLY LEAVE</span>
                          <h4>2650</h4>
                          <span class="report-count"> 5 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">PENDING LEAVE</span>
                          <h4>25,542</h4>
                          <span class="report-count"> 9 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

   <div class="row card">
      <div class="card-body">
         <input type="text" id="from" readonly>
<label>TO</label>
<input type="text" id="to" readonly>
      </div>
   </div>
</div>

<link href="http://demos.codexworld.com/bootstrap-datetimepicker-add-date-time-picker-input-field/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="http://demos.codexworld.com/bootstrap-datetimepicker-add-date-time-picker-input-field/js/bootstrap-datetimepicker.min.js"></script>


<script>
    var today = new Date();
    $('#from').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate : today
    }).on('changeDate', function(ev){
        $('#to').datetimepicker('setStartDate', ev.date);
    });
    
    $('#to').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate : today
    }).on('changeDate', function(ev){
        $('#from').datetimepicker('setEndDate', ev.date);
    });
</script>

<!-- jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Bootstrap library -->
<link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet">
<script src="http://demos.codexworld.com/includes/js/bootstrap.js"></script>

            