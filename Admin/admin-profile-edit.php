<?php
    //session_start();
    require_once 'header.php';

    
    //include "../function.php";
    //$user_info = get_user_info();

?>

<?php
                                         
    //User Post display
    $session_profile = $_SESSION['admin_login'];
               
    $admin_profile = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$admin_login'");
    $profile_row = mysqli_fetch_assoc($admin_profile);
    //print_r($post_row );


    $id = $profile_row['id'];
    $profile_info = mysqli_query($con, "SELECT * FROM `admin` WHERE `id` = '$id'");
    $profile_info_row = mysqli_fetch_assoc($profile_info);
               
               
                                             
?>
<body>


<!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript: avoid(0)">Admin Profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12 col-md-6">
                    <h4 class="section-subtitle text-center"><b>Admin Profile</b></h4>
                    <div class="panel">
                        <div class="panel-content">

                        <!--Show user post Info in user post-->

                        <div class="center">
                        <div class="profile-photo mb-3">
                        <!--<td> <img src="admin/images/profile-images/<?= $profile_info_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>-->
                            <img alt="User photo" src="images/admin-profile/jamil.jpg" width="200px" height="150px"; >
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"><?= ucwords($profile_info_row['fname'] . ' '. $profile_info_row['lname']) ?></h2>
                            <h5 class="user-position">Admin</h5>
                            <div class="user-social-media">
                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                            </div>
                        </div>
                    </div>
                    
                            <form method="POST" action="">
                            <div class="form-group">
                <label for="title">Update Your Photo</label>
                    <input type="file" class="form-control-file border" name="profile-image" value="<?= isset($image) ? $image: '' ?>">
                </div>
                                        <div class="form-group">
    		                            <label for="event_name">First name <span class="require">*</span></label>
    		                            <input type="text" class="form-control" name="fname" placeholder="Enter your first name" value="<?= $profile_info_row['fname'] ?>"/>

                                        <input type="hidden" class="form-control" name="id" value="<?= $profile_info_row['id'] ?>"/>
    		                        </div>
                            <div class="form-group">
    		                    <label for="lname">Last name</label>
    		                    <input type="text" class="form-control" name="lname" placeholder="Enter your last name" value="<?= $profile_info_row['lname'] ?>" />
    		                </div>
                           
                  
                             <div class="form-group">
                                            <button type="submit" name="update-profile" class="btn btn-danger"> <i class="fa fa-save"></i>Profile Update</button>
                                            <a href="admin-profile.php" class="btn btn-danger">My Profile</a>
                                        </div>
            </form>            
        </div>                     
    </div>   

</section>

</div>

<?php
//Update profile
if(isset($_POST['update-profile'])){
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

  


  $result = mysqli_query($con, "UPDATE `admin` SET `fname`='$fname',`lname`='$lname', `image`='$image' WHERE `id`='$id'");

  
}
  ?>


<?php

require_once 'footer.php';
?>
</body>
</html>