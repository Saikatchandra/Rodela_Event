<?php
    require_once '../dbcon.php';
    
    
    $id = base64_decode($_GET['id']);
    
    mysqli_query($con, "UPDATE `user` SET `status` = '1' WHERE `id` = '$id'");
    header('location: users.php');
    
    
    
?>

