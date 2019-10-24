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
   <div class="row card">
      <!-- <ul class="nav nav-tabs" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#class">Class</a>
         </li> 
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#section">Section</a>
         </li> 
      </ul> -->
      <div class="card-body">
         <!-- Tab panes -->
         <!-- <div class="tab-content">
             <div id="class" class=" tab-pane active">
               <h3>Class</h3>
               <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                     <tr>
                        <th> # </th>
                        <th> Class Name </th>
                        <th> Numeric Name </th>
                        <th> Teacher Name </th>
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
            <div id="section" class=" tab-pane fade">
               <h3>Section</h3>
               <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                     <tr>
                        <th> # </th>
                        <th> Teacher Name </th>
                        <th> Class Name </th>
                        <th> Section Name </th>
                        <th> Nick Name </th>
                        <th> Subject </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($sec)){ $i=0; foreach($sec as $row){ $i++;?>
                     <tr style="text-transform: capitalize;">
                        <td class="py-1">
                           <?php echo $i; ?>
                        </td>
                        <td> <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['className']; ?> </td>
                        <td>
                           <?php echo $row['sectionName']; ?>
                        </td>
                        <td>
                           <?php echo $row['nickName']; ?>
                        </td>
                        <td> <?php echo $row['subjectName']; ?> </td>
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
         </div> -->
         <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                     <tr>
                        <th> # </th>
                        <th> Teacher Name </th>
                        <th> Class Name </th>
                        <th> Section Name </th>
                        <th> Nick Name </th>
                        <th> Subject </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($sec)){ $i=0; foreach($sec as $row){ $i++;?>
                     <tr style="text-transform: capitalize;">
                        <td class="py-1">
                           <?php echo $i; ?>
                        </td>
                        <td> <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['className']; ?> </td>
                        <td>
                           <?php echo $row['sectionName']; ?>
                        </td>
                        <td>
                           <?php echo $row['nickName']; ?>
                        </td>
                        <td> <?php echo $row['subjectName']; ?> </td>
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