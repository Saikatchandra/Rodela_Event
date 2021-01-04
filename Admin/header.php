<?php
session_start();
require_once '../dbcon.php';
  //Page active
  $page = explode('/', $_SERVER['PHP_SELF']);
  $page = end($page);
    
    if(!isset($_SESSION['admin_login'])){
        header('location: login.php');
    }
//Admin info......
    $admin_login = $_SESSION['admin_login'];
    $data = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$admin_login'");
    $admin_info = mysqli_fetch_assoc($data);
?>


<!doctype html>
<html lang="en" class="fixed left-sidebar-top">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin</title>
    <!--load progress bar-->
    <script src="assets/vendor/pace/pace.min.js"></script>
    <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
    <!--dataTable-->
    <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">



</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>Rodela Event</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
                   
                    <!--alerts notices-->
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">7</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">8 Bugs</span>
                                                    <span class="subtitle">reported today</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                <div class="text">
                                                    <span class="title">Error</span>
                                                    <span class="subtitle">sevidor C down</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                <div class="text">
                                                    <span class="title">New Configuration</span>
                                                    <span class="subtitle"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                <div class="text">
                                                    <span class="title">14 Task</span>
                                                    <span class="subtitle">completed</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                <div class="text">
                                                    <span class="title">21 Menssage</span>
                                                    <span class="subtitle"> (see more)</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="images/admin-profile/jamil.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords($admin_info['fname'].' '. ucwords($admin_info['lname'])) ?></span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="admin-profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item ' : '' ?>"><a href="index.php"><i class="fa fa-dashboard" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'users.php' ? 'active-item ' : '' ?>"><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a></li>

                                <li class="<?= $page == 'booking.php' ? 'active-item ' : '' ?>"><a href="booking.php"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Booking</span></a></li>

                                <li class="has-child-item close-item <?= $page == 'add-events.php' ? 'open-item ' : '' ?><?= $page == 'manage-events.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-table" aria-hidden="true"></i><span>Event</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-events.php' ? 'active-item ' : '' ?>"><a href="add-events.php">Add Event</a></li>
                                        <li class="<?= $page == 'manage-events.php' ? 'active-item ' : '' ?>"><a href="manage-events.php">Manage Event</a></li>
                                    </ul>


                                    <li class="has-child-item close-item <?= $page == 'add-venues.php' ? 'open-item ' : '' ?><?= $page == 'manage-venues.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-home" aria-hidden="true"></i><span>Venue</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-vanues.php' ? 'active-item ' : '' ?>"><a href="add-venues.php">Add Venue</a></li>
                                        <li class="<?= $page == 'manage-venues.php' ? 'active-item ' : '' ?>"><a href="manage-venues.php">Manage Venue</a></li>
                                    </ul>
                                    <li class="<?= $page == 'add-preferFor.php' ? 'active-item ' : '' ?>"><a href="add-preferFor.php"><i class="fa fa-film" aria-hidden="true"></i><span>Venue prefer for</span></a></li>

                                    <li class="has-child-item close-item <?= $page == 'add-location.php' ? 'open-item ' : '' ?><?= $page == 'manage-location.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-map-marker" aria-hidden="true"></i><span>Location</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-location.php' ? 'active-item ' : '' ?>"><a href="add-location.php">Add Location</a></li>
                                        <li class="<?= $page == 'manage-location.php' ? 'active-item ' : '' ?>"><a href="manage-location.php">Manage Location</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-hotels.php' ? 'open-item ' : '' ?><?= $page == 'manage-hotels.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-hotel" aria-hidden="true"></i><span>Hotel</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-hotels.php' ? 'active-item ' : '' ?>"><a href="add-hotels.php">Add Hotel</a></li>
                                        <li class="<?= $page == 'manage-hotels.php' ? 'active-item ' : '' ?>"><a href="manage-hotels.php">Manage Hotel</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-entertainments.php' ? 'open-item ' : '' ?><?= $page == 'manage-entertainments.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-laptop" aria-hidden="true"></i><span>Entertainment</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-entertainments.php' ? 'active-item ' : '' ?>"><a href="add-entertainments.php">Add Entertainment</a></li>
                                        <li class="<?= $page == 'manage-entertainments.php' ? 'active-item ' : '' ?>"><a href="manage-entertainments.php">Manage Entertainment</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-decorations.php' ? 'open-item ' : '' ?><?= $page == 'manage-decorations.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-archive" aria-hidden="true"></i><span>Decoration</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-decorations.php' ? 'active-item ' : '' ?>"><a href="add-decorations.php">Add Decoration</a></li>
                                        <li class="<?= $page == 'manage-decorations.php' ? 'active-item ' : '' ?>"><a href="manage-decorations.php">Manage Decoration</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-photoshoots.php' ? 'open-item ' : '' ?><?= $page == 'manage-photoshoots.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-camera" aria-hidden="true"></i><span>Photo Shoot</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-photoshoots.php' ? 'active-item ' : '' ?>"><a href="add-photoshoots.php">Add Photo Shoot</a></li>
                                        <li class="<?= $page == 'manage-photoshoots.php' ? 'active-item ' : '' ?>"><a href="manage-photoshoots.php">Manage Photo Shoot</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-videoshoots.php' ? 'open-item ' : '' ?><?= $page == 'manage-videoshoots.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-camera" aria-hidden="true"></i><span>Video Shoot</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-videoshoots.php' ? 'active-item ' : '' ?>"><a href="add-videoshoots.php">Add Video Shoot</a></li>
                                        <li class="<?= $page == 'manage-videoshoots.php' ? 'active-item ' : '' ?>"><a href="manage-videoshoots.php">Manage Video Shoot</a></li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-category.php' ? 'open-item ' : '' ?><?= $page == 'manage-category.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-table" aria-hidden="true"></i><span>Event Category</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-category.php' ? 'active-item ' : '' ?>"><a href="add-category.php">Add Category</a></li>
                                        <li class="<?= $page == 'manage-category.php' ? 'active-item ' : '' ?>"><a href="manage-category.php">Manage Category</a></li>
                                        </li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-member.php' ? 'open-item ' : '' ?><?= $page == 'manage-member.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-users" aria-hidden="true"></i><span>Team Members</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-member.php' ? 'active-item ' : '' ?>"><a href="add-member.php">Add Member</a></li>
                                        <li class="<?= $page == 'manage-member.php' ? 'active-item ' : '' ?>"><a href="manage-member.php">Manage Members</a></li>
                                        </li>
                                    </ul>

                                    <li class="has-child-item close-item <?= $page == 'add-worker.php' ? 'open-item ' : '' ?><?= $page == 'manage-worker.php' ? 'open-item ' : '' ?>">
                                    <a><i class="fa fa-users" aria-hidden="true"></i><span>Employee</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-worker.php' ? 'active-item ' : '' ?>"><a href="add-worker.php">Add Employee</a></li>
                                        <li class="<?= $page == 'manage-worker.php' ? 'active-item ' : '' ?>"><a href="manage-worker.php">Manage Employee</a></li>
                                        </li>
                                    </ul>
                                   
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <Script>
    $(document).ready(function() {
    $('#dataTableId').DataTable();
} );
</Script>