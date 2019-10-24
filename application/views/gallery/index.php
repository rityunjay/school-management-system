<div class="container">
    <h2>Multiple Images Management</h2>
	
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="col-md-12 head">
            <h5><?php echo $title; ?></h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="<?php echo base_url('ManageGallery/add'); ?>" class="btn btn-success"><i class="plus"></i> New Gallery</a>
            </div>
        </div>
        
        <!-- Data list table --> 
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th width="5%">#</th>
                    <th width="10%"></th>
                    <th width="40%">Title</th>
                    <th width="19%">Created</th>
                    <th width="8%">Status</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($gallery)){ $i=0;  
                    foreach($gallery as $row){ $i++; 
                        $defaultImage = !empty($row['default_image'])?'<img src="'.base_url().'/assets/uploads/gallery/images/'.$row['default_image'].'" alt="" />':''; 
                        $statusLink = ($row['status'] == 1)?site_url('ManageGallery/block/'.$row['id']):site_url('ManageGallery/unblock/'.$row['id']);  
                        $statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active';  
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $defaultImage; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
                    <td>
                        <a href="<?php echo base_url('ManageGallery/view/'.$row['id']); ?>" class="btn btn-primary">view</a>
                        <a href="<?php echo base_url('ManageGallery/edit/'.$row['id']); ?>" class="btn btn-warning">edit</a>
                        <a href="<?php echo base_url('ManageGallery/delete/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="6">No gallery found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function deleteImage(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "<?php echo base_url('ManageGallery/deleteImage'); ?>", {id:id}, function(resp) {
            if(resp == 'ok'){
                $('#imgb_'+id).remove();
                alert('The image has been removed from the gallery');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
    }
}
</script>