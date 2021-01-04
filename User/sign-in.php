<?php
    session_start();
    include "../dbcon.php";
    
    if(isset($_SESSION['user_login'])){
        header('location: ../index.php');
    }

    if(isset($_POST ['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $input_errors = array();
        if(empty($email)){
            $input_errors['email'] = "PLease enter your email or username";
        }
        if(empty($password)){
            $input_errors ['password'] = "Enter your password";
        }

        if (count($input_errors) == 0){
        $result = mysqli_query($con, "SELECT * FROM `user` WHERE `email` = '$email' OR `username` = '$email'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if( $row['password'] == $password){
                
                if($row['status'] == 1){

                    $_SESSION['user_login'] = $email;
                    $_SESSION['user_username'] = $row['username'];
                    $_SESSION['cart'] = $row['cart'];
                    header('location: ../index.php');

                }else{
                    $error = "Your status inactive";
                }

            }else{
                $error = "Password wrong";
            }
        }else{
                $error = "Email or Username invalid";
           
        }
    }
        
    }
?>


<?php
include "userheader.php";
?>

<body>

<section id="signin-form" class="py-5">
    <div class="container sign py-5">
        
        <div class="row ml-3 mr-3 ">
            <div class="col-12">
                    <div class="sign-in  mb-4 center">
                        <h3>Sign In </h3>
                    </div>
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

                <div class="signup-form">
                <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md pb-2">
                            <span class="input-with-icon">
                                <input type="text" name="email" class="form-control" id="email" value="<?= isset($email) ? $email: '' ?>" placeholder="Username or Email">
                                
                            </span>
                            <?php 
                                if(isset($input_errors ['email'])){
                                    echo '<span class="input-error">'. $input_errors['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </span>
                            <?php 
                                if(isset($input_errors ['password'])){
                                    echo '<span class="input-error">'. $input_errors['password'].'</span>';
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <div class="checkbox-custom ml-2">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check  ml-1" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        
                        <div class="signup-button form-group">
                            <input class="btn  btn-block" type="submit" name="login" value="SignIn">
                        </div>
                        
                        <div class="signup-button form-group text-center">
                            <span>Don't have an account?</span> <a href="register.php">Register</a>
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
