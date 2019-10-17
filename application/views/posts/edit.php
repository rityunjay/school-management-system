<div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> <?= $title; ?> </h3>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/users/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize;"><?php echo $post['title']; ?></li>
         </ol>
      </nav>
   </div>
   <?php echo form_open('admin/posts/update', 'class="forms-sample"'); ?>
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"><?php echo $title; ?></h4>
               <!-- <p class="card-description"> Basic form layout </p> -->
               <hr/>
               <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                  <label for="exampleInputName1">
                     <h4>Title</h4>
                  </label>
                  <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title" value="<?php echo $post['title']; ?>">
               </div>
               <div class="form-group">
                  <label>
                     <h4>Change Feature Image</h4>
                  </label>
                  <input type="file" name="img[]" class="file-upload-default">
                  <div class="input-group col-xs-12">
                     <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                     <!-- <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span> -->
                  </div>
               </div>
               <div class="form-group">
                  <label for="exampleTextarea1">
                     <h4>Content</h4>
                  </label>
                  <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
               </div>
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
         </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <!-- <h4 class="card-title">Horizontal Form</h4>
               <p class="card-description"> Horizontal form layout </p> -->
               <div class="form-group">
                  <label for="exampleTextarea1">
                     <h4>Category</h4>
                  </label>
                  <?php foreach($categories as $category): ?>
                  <div class="form-check">
                     <label class="form-check-label" id="<?php echo $category['cat_name']; ?>">
                     <input type="checkbox" name="category_id" id="<?php echo $category['cat_name']; ?>" value="<?php echo $category['id']; ?>" <?php if($post['category_id'] == $category['id']){ echo "checked";}?> class="form-check-input"> <?php echo $category['cat_name']; ?>
                     </label>                     
                   </div>
                   <?php endforeach; ?>
               </div>
               <hr/>
               <div class="form-group">
                  <label for="exampleTextarea1">
                     <h4>Feature Image</h4>
                  </label>
                  <div class="profile-image">
                     <img src="<?php echo site_url('/assets/images/posts/'); ?><?php echo $post['post_image']; ?>" class="img-responsive feature-image">
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   </form>
</div>