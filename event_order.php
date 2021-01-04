<?php
  session_start();
  require_once 'dbcon.php';
?>

<?php
$id = base64_decode($_GET['user_id']);
  if(isset ($id)){
      $user_id = $_GET['user_id'];
      //echo ( $user_id);
  
    
    $select_event_id = mysqli_query($con, "SELECT * FROM `events`");
    $event_row = mysqli_fetch_assoc($select_event_id);
    $event_id = $event_row['id'];

    $insert_user_order = "INSERT INTO `users_order`( `user_id`, `product_id`, `order_status`) VALUES ('$user_id', '$event_id', '0')";
    echo ($insert_user_order);
  }
?>
