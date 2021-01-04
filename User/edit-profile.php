<?php
    session_start();
    include "userheader.php";
    include "../dbcon.php";
    
    //include "../function.php";
    //$user_info = get_user_info();

?>

<body>

<?php
    $session_profile = $_SESSION['user_username'];
    $user_profile = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$session_profile'");
    $profile_row = mysqli_fetch_assoc($user_profile);

    $id = $profile_row['id'];
    $profile_info = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$id'");
    $profile_info_row = mysqli_fetch_assoc($profile_info);
    
?>

<section id="registration" class="py-5">
    <div class="container reg py-5">
    <h3 class="text-center mb-5">User Profile</h3>
        <div class="signUp text-left pb-5">
        <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
    		                            <label for="event_name">First name <span class="require">*</span></label>
    		                            <input type="text" class="form-control" name="fname" placeholder="Enter your first name" value="<?= $profile_info_row['fname'] ?>" required/>
                                        <input type="hidden" class="form-control" name="id" value="<?= $profile_info_row['id'] ?>" required/>
    		                        </div>
                            <div class="form-group">
    		                    <label for="event_price">Last name</label>
    		                    <input type="text" class="form-control" name="lname" placeholder="Enter your last name" value="<?= $profile_info_row['lname'] ?>" required/>
    		                </div>
                            <div class="form-group">
    		                    <label for="event_price">Phone number</label>
    		                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" value="<?= $profile_info_row['phone'] ?>" required/>
    		                </div>
                            <div class="form-group">
    		                    <label for="event_price">Address</label>
    		                    <input type="text" class="form-control" name="address" placeholder="Enter your address" value="<?= $profile_info_row['address'] ?>" required/>
    		                </div>
                        
                                        <div class="form-group">
                                            <button type="submit" name="update-profile" class="btn btn-danger"> <i class="fa fa-save"></i>Profile Update</button>
                                            <a href="user-profile.php" class="btn btn-danger">My Profile</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>  
                    
    </div>
    <?php
        
?>
                                       
</section>

<?php
//Update post
if(isset($_POST['update-profile'])){
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  //$description = $_POST['description'];
 
 

  $result = mysqli_query($con, "UPDATE `user` SET `fname`='$fname',`lname`='$lname', `phone`='$phone', `address`='$address' WHERE `id`='$id'");
  

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  /*if($result){
     header('location: your-post.php');
  }*/
}
  ?>


<?php

include "../footer.php";
?>
</body>
</html>