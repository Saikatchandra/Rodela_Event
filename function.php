<?php
    //session_start();
    include "dbcon.php";

    /*function check_email($email){
        global $con;
        $sql = "select * from user where email = '$email'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);

        return $row;
    }*/

    function get_user_info(){
        global $con;
        $id = $_SESSION ['id'];
        $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);

        return $row;
    }

?>