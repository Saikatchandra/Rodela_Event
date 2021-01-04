<?php
    session_start();
    include "userheader.php";
    include "../dbcon.php";
    
    //include "../function.php";
    //$user_info = get_user_info();
    
?>

<!-------++++++++++++++++++++++++++++++++++-->
<div class="row animated fadeInRight py-5">
                <div class="col-sm-12 ml-2">
                    <h4 class="section-subtitle text-center"><b>Your Booking:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                         
                            

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>View invoice</th>
                                        <th>#</th>
                                        <th>venueName</th>
                                        <th>venuePrice</th>
                                        <th>preferedFor</th>
                                        <th>location</th>
                                        <th>locationPrice</th>
                                        <th>hotelName</th>
                                        <th>hotelPrice</th>
                                        <th>Entertainment</th>
                                        <th>entertainmentPrice</th>
                                        <th>Decoration</th>
                                        <th>decorationPrice</th>
                                        <th>PhotoShoot</th>
                                        <th>photoShootPrice</th>
                                        <th>videoShoot</th>
                                        <th>videoShootPrice</th>
                                        <th>BookingDate</th>
                                        <th>advancePayment</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>

                    <?php
                     // Booking display
                        $session_profile = $_SESSION['user_username'];
                        $user_profile = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$session_profile'");
                        $profile_row = mysqli_fetch_assoc($user_profile);

                        $id = $profile_row['id'];
                        $result = mysqli_query($con, "SELECT * FROM `booking` WHERE `c_id` = '$id'");

                          
                          
                      
                          while ($book_row = mysqli_fetch_array($result)){
                                        
                    ?>
                                         <tr>
                                         <td>
                                                <a href="view-invoice.php" class="btn btn-info">View Invoice</a>
                                            </td>
                                         <td><?= $book_row['book_id'] ?></td>
                                         
                                         <td><?= $book_row['vanue'] ?></td>
                                         <td><?= $book_row['venue_price'] ?></td>
                                         <td><?= $book_row['preferedFor'] ?></td>
                                         <td><?= $book_row['location'] ?></td>
                                         <td><?= $book_row['l_price'] ?></td>
                                         <td><?= $book_row['hotel'] ?></td>
                                         <td><?= $book_row['h_price'] ?></td>
                                         <td><?= $book_row['entertainment'] ?></td>
                                         <td><?= $book_row['e_price'] ?></td>
                                         <td><?= $book_row['decoration'] ?></td>
                                         <td><?= $book_row['d_price'] ?></td>
                                         <td><?= $book_row['photoshoot'] ?></td>
                                         <td><?= $book_row['p_price'] ?></td>
                                         <td><?= $book_row['videoshoot'] ?></td>
                                         <td><?= $book_row['v_price'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($book_row['dateTime'] ))?> </td>
                                            <td><?= $book_row['advancePayment'] ?></td>
                                            <!--Button for model-->
                                            
                                            <td>
                                                <a href="" class="btn btn-danger">Pending</a>
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                       
     
                                       </tbody>
                                </tbody>
                            </table>
  
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>





<!--Cart Section-->
<?php
$id = base64_decode($_GET['user-cart']);
 //if(isset($_SESSION['user_login'])){
 
    if (isset($_POST["add"])){
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

<?php
$result = mysqli_query($con, "SELECT * FROM `events` WHERE `id` = '$id'");
while ($row = mysqli_fetch_assoc($result)){
?>
<body>

     <!-- Event Entries Column -->
     <div class="col-md-8">

<div class="card mb-4">
<form action="user-cart.php?action=add&id=<?php echo $row["id"]; ?>" method="POST">


    <input type="hidden" name="hidden_name" value="<?php echo $row["event_name"]; ?>">
    <input type="hidden" name="hidden_price" value="<?php echo $row["event_price"]; ?>">

  
 </form>
    
  </div>
</div>
</div>

<?php
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


<?php

include "../footer.php";
?>
</body>
</html>