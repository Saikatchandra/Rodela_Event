<?php
    include "userheader.php";


    if(isset($_SESSION['user_login'])){
        header('location: ../index.php');
    }
?>


<?php
    require '../dbcon.php';

    if(isset ($_POST['users-register'])){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_md5 = md5($password);
        $Cpassword = $_POST['Cpassword'];
        

        $input_errors = array();
        if(empty($fname)){
            $input_errors['fname'] = "First name is required";
        }
        if(empty($lname)){
            $input_errors ['lname'] = "Last name is required!";
        }

        if(empty($username)){
            $input_errors ['username'] = "Username is required!";
        }

        if(empty($phone)){
            $input_errors ['phone'] = "Phone number is required!";
        }

        if(empty($address)){
            $input_errors ['address'] = "Address is required!";
        }

        if(empty($email)){
            $input_errors ['email'] = "Email is required!";
        }

        if(empty($password)){
            $input_errors ['password'] = "Password is required!";
        }

        if($password !== $Cpassword){
            $input_errors ['Cpassword'] = "Password don't match!";
        }

        if(empty($Cpassword)){
            $input_errors ['Cpassword'] = "Confirm password is required!";
        }

        

        if (count($input_errors) == 0){
           
            //email check
            
           $email_check = mysqli_query($con, "SELECT * FROM `rodelaevent` WHERE `email`=`$email`");
            $email_check_row = mysqli_num_rows($email_check);

            if($email_check_row == 0){
            
            //Username check
            $username_check = mysqli_query($con, "SELECT * FROM `user` WHERE `username`=`$username`");
            $username_check_row = mysqli_num_rows($username_check);
            
            
            
            if($username_check_row == 0){
                if(strlen($username) > 6){
                    if(strlen($password) > 7){

                        //Password hash
                   //$password_md5 = md5($password);

                    $result = mysqli_query($con, "INSERT INTO `user`(`fname`, `lname`, `username`, `phone`, `address`, `email`, `password`, `status`) VALUES ('$fname','$lname','$username','$phone','$address','$email','$password','1')");

                    if(isset($result)){
                        $success = "Registration Successfully";
                        $fname=$lname=$username=$email=$phone='';
                        }else{
                        $error = "Somthing error";
                    }

                    }else{
                        $password_error = "Password more than 8 characters";
                    }
                    

                }else{
                    $username_exists = "Username more than 7 characters";
                }
                
            }else{
                $username_exists = "This username already exists";
            }
            
                
            }else{
                $email_exists = "This email already exists";
            }
            

        
        }
        
        
        
    }

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
        <div class="signUp text-center pb-5">
            <h3>Create an account</h3>
            <span>Get started with your free account</span>
        </div>
        <div class="row ml-3 mr-3">
            <div class="col-12">

             <!---Registrtion successfull messages--->
             <?php
                    if(isset($success)){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <?php
                    }
                    ?>
                    <!---Error messages--->
                <?php
                    if(isset($error)){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <?php
                    }
                    ?>

                <!---Email exists--->
                <?php
                    if(isset($email_exists)){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $email_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <?php
                    }
                    ?>
                    <!---Username exists--->
                <?php
                    if(isset($username_exists)){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $username_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <?php
                    }
                    ?>
                    <!---Password error--->
                <?php
                    if(isset($password_error)){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $password_error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <?php
                    }
                    ?>
                

                <div class="signup-form">
            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= isset($fname) ? $fname: '' ?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['fname'])){
                                    echo '<span class="input-error">'. $input_errors['fname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?= isset($lname) ? $lname: '' ?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['lname'])){
                                    echo '<span class="input-error">'. $input_errors['lname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= isset($username) ? $username: '' ?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['username'])){
                                    echo '<span class="input-error">'. $input_errors['username'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01******" name="phone" value="<?= isset($phone) ? $phone: ''?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['phone'])){
                                    echo '<span class="input-error">'. $input_errors['phone'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Address" name="address" value="<?= isset($address) ? $address: ''?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['address'])){
                                    echo '<span class="input-error">'. $input_errors['address'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? $email: '' ?>">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['email'])){
                                    echo '<span class="input-error">'. $input_errors['email'].'</span>';
                                }
                            ?>
                        </div>
                        
                        
                        
                        
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['password'])){
                                    echo '<span class="input-error">'. $input_errors['password'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="Cpassword">
                               
                            </span>
                            <?php 
                                if(isset($input_errors ['Cpassword'])){
                                    echo '<span class="input-error">'. $input_errors['Cpassword'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" name="check" type="checkbox" id="autoSizingCheck">
                            <label class="form-check-label" for="autoSizingCheck">
                            I agree all statements in <span>Terms of Condition</span> 
                            </label>
                        </div>

                        <div class="signup-button form-group">
                            <input class="btn  btn-block" type="submit" name="users-register" value="Create account">
                        </div>
                        
                        <div class="signup-button form-group text-center">
                            <span>Have an account?</span> <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                    </div>
            </div>
        </div>                
    </div>
</section>


<?php

include "../footer.php";
?>
</body>
</html>
