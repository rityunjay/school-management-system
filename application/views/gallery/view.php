<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5><?php echo !empty($gallery['title'])?$gallery['title']:''; ?></h5>
			
            <?php if(!empty($gallery['images'])){ ?>
                <div class="gallery-img">
                <?php foreach($gallery['images'] as $imgRow){ ?>
                    <div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
                        <img src="<?php echo base_url('/assets/uploads/gallery/images/'.$imgRow['file_name']); ?>">
                        <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo base_url('ManageGallery'); ?>" class="btn btn-primary">Back to List</a>
    </div>
</div>