<div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> Delete Post </h3>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/users/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title;?></li>
         </ol>
      </nav>
   </div>
   <div class="row">
      <div class="col-lg-8 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"><?= $title;?></h4>
               <p class="card-description" style="text-transform: capitalize;"> are you sure you want to <code><strong>DELETE</strong></code> this post!</p>
               <table>
                  <tr>
                     <td>
                        <a href="<?php echo base_url('admin/posts/');?>" class="btn btn-info btn-sm">Cancel</a>
                        <a href="<?php echo base_url('admin/posts/delete/');?><?php echo $post['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>