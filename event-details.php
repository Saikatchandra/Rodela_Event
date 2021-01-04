<?php
include "header.php";
include "carousel.php";
require_once 'dbcon.php';


?>



<body>

<!-- Event Details Section -->
<section id="event-Details">
<div class="container py-5">
<div class="row">
<?php
$id = base64_decode($_GET['event-details']);
    
$result = mysqli_query($con, "SELECT * FROM `events` WHERE `id` = '$id'");
while ($row = mysqli_fetch_assoc($result)){
?>
      <!-- Event Entries Column -->
      <div class="col-md-8">

        <div class="card mb-4">
  <form action="event-details.php?action=add&id=<?php echo $row["id"]; ?>" method="POST">
        <img src="admin/images/event-images/<?= $row['event_image'] ?>" alt="" width="1200px" height="100px" class="fluid">
          <div class="card-body">

            <h2 class="card-title"><?= ucwords($row['event_name']) ?></h2>
            <small class="text-muted"><span>Event Category: </span><b><?= $row['event_category'] ?></b></small>
            <small class="text-muted"><span>Event Price: </span><b><?= $row['event_price'] ?></b></small>
                  <hr>
            <p class="card-text"><?= $row['description'] ?></p>

            <input type="hidden" name="hidden_name" value="<?php echo $row["event_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["event_price"]; ?>">

            <div class="event-details-button">							
                <a href="event_order.php?user_id=<?= base64_encode($user_id)?>" class="btn btn-danger">Book Now</a>
                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
            </div>
          </div>
        
          <div class="card-footer text-light">
            Event created on: <?= date('d-M-y', strtotime($row['datetime'] ))?>
            
          </div>
        </div>
        </div>
        
        <?php
            }
          ?>
<!-- Contact form -->
    <div class="col-md-4 contact-details">
          <div class="card">
            <div class="card-body">
              <h4>Get In Touch</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.</p>
              <h4>Address</h4>
              <p>House #100, Uttara, Dhaka</p>
              <h4>Email</h4>
              <p>test@gmail.com</p>
              <h4>Phone</h4>
              <p class="mb-2">+434 3434 3433</p>
              <p>+433 4343 6567</p>
              <div class="social-bnr-agileits footer-icons-agileinfo">
            <ul class="social-icons3">
                    <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                    <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                    <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
                    
                  </ul>
          </div>
            </div>
            </form>
          </div>
        </div> 
</div>

</div>
</section>

<!--===============================================-->
<!--Cart Section-->
<?php
  
 
    if (isset($_POST["add"])){
      if(!isset($_SESSION['user_login'])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'id' => $_GET["id"],
                    'event_name' => $_POST["hidden_name"],
                    'event_price' => $_POST["hidden_price"],

                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="event-details.php"</script>';
            }else{
                echo '<script>alert("Event is already Added to Cart")</script>';
                echo '<script>window.location="event-details.php"</script>';
            }
        }else{
          echo '<script>window.location="user/sign-in.php"</script>';
        }
      }
        else{
            $item_array = array(
              'id' => $_GET["id"],
              'event_name' => $_POST["hidden_name"],
              'event_price' => $_POST["hidden_price"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
  

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="event-details.php"</script>';
                }
            }
        }
    }
?>

<div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["event_name"]; ?></td>
                            <td><?php echo $value["event_price"]; ?></td>
  
                            <td>
                                $ <?php //echo number_format( $value["event_price"]); ?></td>
                            <td><a href="event-details.php?action=delete&id=<?php echo $value["id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        //$total = $value["event_price"];
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

    </div>





<section class="cart">
  <div class="container py-5">
      <div clss="d-flex justify-content-between mb-2">
        <h3>Cart</h3>
        <a href="event-details.php?action=empty" class="btn btn-danger">Empty Cart</a>
      </div>
      <div class="row">
          <table class="table">
            <tbody>
              <tr>
                <th class="text-left">name</th>
                <th class="text-left">price</th>
              </tr>
            </tbody>
          </table>
      </div>
  </div>
</section>


<?php

include "footer.php";
?>

</body>
</html>
