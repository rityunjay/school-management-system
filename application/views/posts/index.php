<div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> <?= $title ?> </h3>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/users/dashboard/'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title;?></li>
         </ol>
      </nav>
   </div>
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"><?= $title ?></h4>
               <?php if($this->session->flashdata('post_updated')): ?>
               <?php echo '<p class="card-description alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
               <?php endif; ?>
               <?php if($this->session->flashdata('post_deleted')): ?>
               <?php echo '<p class="card-description alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
               <?php endif; ?>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th> # </th>
                        <th> Posts Title </th>
                        <th> Posts Category </th>
                        <th> Posts Date </th>
                        <th>Post by</th>
                        <th> Action </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=0; foreach($posts as $post) : $i++;?>
                     <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <a href="<?php echo site_url('/posts/'.$post['slug'].'/'); ?>" target="_blank"><?php echo $post['title']; ?></a> </td>
                        <td>
                           <?php echo $post['cat_name']; ?>
                        </td>
                        <td><span>
                            <i class="icon-calendar"></i> <?php 
                               $date = $post['post_created_at']; 
                               echo date('j<\s\up>S<\/\s\up> M, Y', strtotime($date));
                            ?>
                            </span>
                            <span>|</span>
                            <span>
                          <i class="icon-clock"></i> <?php echo date('H:i:s', strtotime($date)); ?>
                          </span>
                        </td>
                        <td>
                           <?php echo $post['name']; ?>
                        </td>
                        <td>
                           <?php if($this->session->userdata('user_id') == $post['user_id']): ?>
                           <a href="<?php echo base_url('admin/posts/edit/');?><?php echo $post['slug']; ?>" class="btn btn-info btn-sm">Edit</a>
                           <a href="<?php echo base_url('admin/posts/deletePost/');?><?php echo $post['slug']; ?>" class="btn btn-danger btn-sm">Delete</a>
                           <?php endif; ?>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
               <div class="post-pagination">
                  <?php //echo $this->pagination->create_links(); ?>
               </div>

               <div class="d-flex mt-4 flex-wrap">
                      <p class="text-muted">Showing 1 to 10 of 57 entries</p>
                      <!-- <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item"><a href="#" class="page-link">3</a></li>
                          <li class="page-item"><a href="#" class="page-link">4</a></li>
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                          <li class="page-item"><?php echo $this->pagination->create_links(); ?></li>
                        </ul>
                      </nav> -->
                      <div class="pagination-links">
                           <?php echo $this->pagination->create_links(); ?>
                     </div>
                    </div>
            </div>
         </div>
      </div>
   </div>
</div>