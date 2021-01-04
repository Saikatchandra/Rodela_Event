<?php
    session_start();
    include "../dbcon.php";
    
    if(isset($_SESSION['admin_login'])){
        header('location: index.php');
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
        $result = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$email' OR `username` = '$email'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if( $row['password'] == $password){
                
               

                    $_SESSION['admin_login'] = $email;
                    header('location: index.php');

               

            }else{
                $error = "Password wrong";
            }
        }else{
                $error = "Email or Username invalid";
           
        }
    }
        
    }
?>



<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">Rodela Event</h1>
        </div>
        
        <div class="box">
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
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" id="email" value="<?= isset($email) ? $email: '' ?>" placeholder="Email">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 
                                if(isset($input_errors ['email'])){
                                    echo '<span class="input-error">'. $input_errors['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                if(isset($input_errors ['password'])){
                                    echo '<span class="input-error">'. $input_errors['password'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="submit" value="sign-in" class="btn btn-primary btn-block" name="login">
                          
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="assets/javascripts/template-script.min.js"></script>
<script src="assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
