<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/simple-line-icons/css/simple-line-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css');?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/daterangepicker/daterangepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/vendors/chartist/chartist.min.css');?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css');?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url('/assets/images/favicon.png');?>" />
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="<?php echo base_url('/assets/images/logo.svg');?>" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url('/assets/images/logo-mini.svg');?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex" style="text-transform: capitalize;">Welcome <?php if($teacher['gender'] == 'male' ) {
            echo 'mr.';
           }elseif($teacher['gender'] == 'female' ){ echo 'mrs.'; }?> <?php echo $teacher['first_name']; ?></h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url('/assets/images/faces/face10.jpg');?>" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url('/assets/images/faces/face12.jpg');?>" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url('/assets/images/faces/face1.jpg');?>" alt="image" class="img-sm profile-pic"> </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-3">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
                <span class="profile-text font-weight-normal">English</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-us"></i> English </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-fr"></i> French </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ru"></i> Russian </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="<?php echo base_url('/assets/images/faces/teacher/'.$teacher['profilePic']); ?>" alt="Profile image"> <span class="font-weight-normal"> <?php echo $teacher['first_name']; ?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?php echo base_url('/assets/images/faces/teacher/'.$teacher['profilePic']); ?>" alt="Profile image">
                  <p class="mb-1 mt-3"><?php echo $teacher['first_name']; ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $teacher['email']; ?></p>
                </div>
                <a class="dropdown-item" href="<?php echo base_url('/teachers/teacherProfile/'); ?><?php echo $teacher['id']; ?>"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile </a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
                <a class="dropdown-item" href="<?php echo base_url('teachers/logout'); ?>"><i class="dropdown-item-icon icon-power text-primary"></i>Logout</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
     
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?php echo base_url('/assets/images/faces/teacher/'.$teacher['profilePic']); ?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $teacher['first_name']; ?></p>
                  <p class="designation">Teacher</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/teachers/dashboard/'); ?>">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('teachers/leaveCard/') ?>">
                <span class="menu-title">Leave & Attendance</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Students Corner</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages">
                <span class="menu-title">Class & Section</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('teachers/sectionClass'); ?>"> All Class & Section</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('teachers/allStudents'); ?>"> All Students</a></li>
                  <li class="nav-item"> <a class="nav-link" href=""> Students Attendance</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Posts</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="posts">
                <span class="menu-title">General Posts</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="posts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('teachers/contact/'); ?>"> Contact </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/posts/create/'); ?>"> Add Post </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/categories/'); ?>"> Categories </a></li>
                  <li class="nav-item"> <a class="nav-link" href=""> Tags </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Appearance</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#appearance" aria-expanded="false" aria-controls="appearance">
                <span class="menu-title">All Appearance</span>
                <i class="icon-grid menu-icon"></i>
              </a>
              <div class="collapse" id="appearance">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href=""> Themes </a></li>
                  <li class="nav-item"> <a class="nav-link" href=""> Menus </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/setting/'); ?>">Site Setting</a></li>
                  
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="https://www.bootstrapdash.com/product/stellar-admin-template/" target="_blank"> <i class="icon-badge mx-2"></i> Upgrade to Pro</a>
              </span>
            </li> -->
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
