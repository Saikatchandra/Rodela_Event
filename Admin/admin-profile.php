<?php
   // session_start();
    require_once 'header.php';

    
    //include "../function.php";
    //$user_info = get_user_info();

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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="admin-profile.php">Admin Profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
               
                <div class="row animated fadeInUp">
                 
                <div class=" col-sm-12 col-md-6">
                

                    <h4 class="section-subtitle text-center"><b>Admin Profile</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tbody>
                        <!--Show user post Info in user post-->
                        <?php
                                         
                            //User Post display
                            $session_profile = $_SESSION['admin_login'];
                            
                            $admin_profile = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$admin_login'");
                            $profile_row = mysqli_fetch_assoc($admin_profile)
                            //print_r($post_row );
                            
   
                                       
                        ?>
                        <div class="center">
                        <div class="profile-photo mb-3">
                        <!--<td> <img src="admin/images/profile-images/<?= $profile_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>-->
                            <img alt="User photo" src="images/admin-profile/jamil.jpg" width="200px" height="150px"; >
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"><?= ucwords($profile_row['fname'] . ' '. $profile_row['lname']) ?></h2>
                            <h5 class="user-position">Admin</h5>
                            <div class="user-social-media">
                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                            </div>
                        </div>
                    </div>
                    <br></br>
                    <thead> 
                            <tr>

                                <th>First Name:</th>
                                <td><?= $profile_row['fname'] ?></td>
                            </tr>
                        </tbody>
                    </thead>

                    <thead>
                        <tbody>
                            <tr>
                                <th>Last Name:</th>
                                <td><?= $profile_row['lname'] ?></td>
                            </tr>
                        </tbody>
                    </thead>
                    <thead>
                        <tbody>
                            <tr>
                                <th>Username:</th>
                                <td><?= $profile_row['username'] ?></td>
                            </tr>
                        </tbody>
                    </thead>
                   
                    <thead>
                        <tbody>
                            <tr>
                                <th>Email ddress:</th>
                                <td><?= $profile_row['email'] ?></td>
                            </tr>                           
                        </tbody>                        
                    </thead>
                    <thead>
                   
                    </table> 

                    <a href="admin-profile-edit.php" class="btn btn-warning"<?= $profile_row['id'] ?>>Edit Profile</a> 
                           
                </div>  
                   
            </div>   

            </section>

            </div>

<?php

require_once 'footer.php';
?>
</body>
</html>