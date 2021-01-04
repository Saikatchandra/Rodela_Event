<?php
    require_once 'header.php';
?>


 <!-- CONTENT -->
 <!-- ========================================================= -->
 <div class="content">
     <!-- content HEADER -->
     <!-- ========================================================= -->
     <div class="content-header">
         <!-- leftside content header -->
         <div class="leftside-content-header">
             <ul class="breadcrumbs">
                 <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                 <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a></li>
             </ul>
         </div>
     </div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <div class="row">
 <?php
     $user = mysqli_query($con, "SELECT * FROM `user` ");
     $total_user = mysqli_num_rows($user);
 ?>
         <!--BOX Style 1-->
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8 bg-lighter-2 color-light text-center">
                 <a href="users.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-users"></i> <?= $total_user ?> </h1>
                         <h4 class="subtitle color-darker-1">Total Users</h4>
                     </div>
                 </a>
             </div>
         </div> 
<?php
    $events = mysqli_query($con, "SELECT * FROM `events` ");
    $total_events = mysqli_num_rows($events);
?>
         <!--BOX Style 1-->
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8 bg-warning color-light text-center">
                 <a href="manage-events.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-th"></i> <?= $total_events ?> </h1>
                         <h4 class="subtitle color-darker-1">Total Events</h4>
                     </div>
                 </a>
             </div>
         </div> 
<?php
    $member = mysqli_query($con, "SELECT * FROM `team_member` ");
    $total_team_member = mysqli_num_rows($member);
?>
         <!--BOX Style 1-->
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8  bg-danger color-light text-center">
                 <a href="manage-member.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-th"></i> <?= $total_team_member ?> </h1>
                         <h4 class="subtitle color-darker-1">Total Team Member</h4>
                     </div>
                 </a>
             </div>
         </div> 
<?php
    $worker = mysqli_query($con, "SELECT * FROM `worker` ");
    $total_worker = mysqli_num_rows($worker);
?>
         <!--BOX Style 1-->
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8  bg-success color-light text-center">
                 <a href="manage-worker.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-th"></i> <?= $total_worker ?> </h1>
                         <h4 class="subtitle color-darker-1">Total Employee</h4>
                     </div>
                 </a>
             </div>
         </div>

 <!--BOX Style 1-->
 <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8 bg-info color-light text-center">
                 <a href="manage-events.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-th"></i> 6 </h1>
                         <h4 class="subtitle color-darker-1">Todays Event Booking</h4>
                     </div>
                 </a>
             </div>
         </div> 
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8 bg-secondary color-light text-center">
                 <a href="manage-events.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> <i class="fa fa-th"></i> 6 </h1>
                         <h4 class="subtitle color-darker-1">Last Weekly Event Booking</h4>
                     </div>
                 </a>
             </div>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="panel widgetbox wbox-8 bg-primary color-light text-center">
                 <a href="manage-events.php">
                     <div class="panel-content">
                         <h1 class="title color-darker-2 pl-3 "> 6 </h1>
                         <h4 class="subtitle color-darker-1">Last Month Event Booking</h4>
                     </div>
                 </a>
             </div>
         </div>

      </div>
    </div>       
  </div>
      </div>
    </div>       
  </div>

<!---Bar chart --->



<?php
    require_once 'footer.php';
?>
