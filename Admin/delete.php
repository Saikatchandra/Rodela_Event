<?php
    require_once '../dbcon.php';
    //Event delete
    if(isset($_GET['eventdelete'])){
        $id = base64_decode($_GET['eventdelete']);
        mysqli_query($con, "DELETE FROM `events` WHERE `id` = '$id'");
        header('location: manage-events.php');
    }
    //Venue delete
    if(isset($_GET['venuedelete'])){
        $id = base64_decode($_GET['venuedelete']);
        mysqli_query($con, "DELETE FROM `venue` WHERE `venue_Id` = '$id'");
        header('location: manage-venues.php');
    }
    //Prefer delete
    if(isset($_GET['preferdelete'])){
        $id = base64_decode($_GET['preferdelete']);
        mysqli_query($con, "DELETE FROM `preferedFor` WHERE `pre_id` = '$id'");
        header('location: add-preferFor.php');
    }
    //Location delete
    if(isset($_GET['locationdelete'])){
        $id = base64_decode($_GET['locationdelete']);
        mysqli_query($con, "DELETE FROM `location` WHERE `l_id` = '$id'");
        header('location: manage-location.php');
    }
    //hotel delete
    if(isset($_GET['hoteldelete'])){
        $id = base64_decode($_GET['hoteldelete']);
        mysqli_query($con, "DELETE FROM `hotel` WHERE `h_id` = '$id'");
        header('location: manage-hotels.php');
    }
    //entertainment delete
    if(isset($_GET['entertainmentdelete'])){
        $id = base64_decode($_GET['entertainmentdelete']);
        mysqli_query($con, "DELETE FROM `entertainment` WHERE `e_id` = '$id'");
        header('location: manage-entertainments.php');
    }
    //decoration delete
    if(isset($_GET['decorationdelete'])){
        $id = base64_decode($_GET['decorationdelete']);
        mysqli_query($con, "DELETE FROM `decoration` WHERE `d_id` = '$id'");
        header('location: manage-decorations.php');
    }
    //photoshoot delete
    if(isset($_GET['photoshootdelete'])){
        $id = base64_decode($_GET['photoshootdelete']);
        mysqli_query($con, "DELETE FROM `photoshoot` WHERE `p_id` = '$id'");
        header('location: manage-photoshoots.php');
    }
    //videoshoot delete
    if(isset($_GET['videoshootdelete'])){
        $id = base64_decode($_GET['videoshootdelete']);
        mysqli_query($con, "DELETE FROM `videoshoot` WHERE `v_id` = '$id'");
        header('location: manage-videoshoots.php');
    }
    //Post delete from user
    if(isset($_GET['userpostdelete'])){
        $id = base64_decode($_GET['userpostdelete']);
        mysqli_query($con, "DELETE FROM `post` WHERE `id` = '$id'");
        header('location: ../your-post.php');
    }
    
    //Category delete
    if(isset($_GET['category-delete'])){
        $id = base64_decode($_GET['category-delete']);
        mysqli_query($con, "DELETE FROM `category` WHERE `category_id` = '$id'");
        header('location: manage-category.php');
    }

    //Member delete
    if(isset($_GET['memberdelete'])){
        $id = base64_decode($_GET['memberdelete']);
        mysqli_query($con, "DELETE FROM `team_member` WHERE `memeber_id` = '$id'");
        header('location: manage-member.php');
    }

    //Worker delete
    if(isset($_GET['workerdelete'])){
        $id = base64_decode($_GET['workerdelete']);
        mysqli_query($con, "DELETE FROM `worker` WHERE `worker_id` = '$id'");
        header('location: manage-worker.php');
    }
?>
