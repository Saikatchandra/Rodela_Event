<?php
    session_start();
    include "userheader.php";
    include "../dbcon.php";
    
    //include "../function.php";
    //$user_info = get_user_info();

?>

<body>


<section class="wrap">
    <div class="container">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            
           
        </div>
        
</section>


<section id="registration" class="py-5">
    <div class="container reg py-5">
    <h3 class="text-center mb-5">User Profile</h3>
        <div class="signUp text-left pb-5">
                <table class="table table-bordered">
                    <thead>
                        <tbody>
                        <!--Show user post Info in user post-->
                        <?php
                                         
                            //User Post display
                            $session_profile = $_SESSION['user_username'];
  
                            $user_profile = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$session_profile'");
                            $profile_row = mysqli_fetch_assoc($user_profile)
                            //print_r($post_row );
                                       
                                       
                        ?>
                            
                            <tr>

                                <th>First Name:</th>
                                <td><?= $profile_row['fname'] ?></td>
                            </tr>
                        </tbody>
                    </thead>
                    <thead>
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
                                <th>Phone Number:</th>
                                <td><?= $profile_row['phone'] ?></td>
                            </tr>
                        </tbody>
                    </thead>
                    <thead>
                    <thead>
                        <tbody>
                            <tr>
                                <th>Address:</th>
                                <td><?= $profile_row['address'] ?></td>
                            </tr>                           
                        </tbody>                        
                    </thead>
                    <thead>
                </table>               
                <a href="edit-profile.php" class="btn btn-warning"<?= $profile_row['id'] ?>>Edit Profile</a>             
        </div>                     
    </div>                                       
</section>

<?php

include "../footer.php";
?>
</body>
</html>