<div class="container">
    <h1><?php echo $title; ?></h1>
    <hr>
    
    <!-- Display status message -->
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo !empty($gallery['title'])?$gallery['title']:''; ?>" >
                    <?php echo form_error('title','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Images:</label>
                    <input type="file" name="images[]" class="form-control" multiple>
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
                
                <a href="<?php echo base_url('ManageGallery'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($gallery['id'])?$gallery['id']:''; ?>">
                <input type="submit" name="imgSubmit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>