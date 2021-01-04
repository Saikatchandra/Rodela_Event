<?php
    require_once '../dbcon.php';
    
    
    $id = base64_decode($_GET['id']);
    
    mysqli_query($con, "UPDATE `category` SET `status` = '0' WHERE `category_id` = '$id'");
    header('location: manage-category.php');
    
?>

