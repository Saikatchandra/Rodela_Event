<?php

    require_once 'header.php';
?>

<?php
//Get user id from session...

if(!empty($_SESSION['user_username'])){
    $session_profile = $_SESSION['user_username'];
    $user_profile = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$session_profile'");
    $profile_row = mysqli_fetch_assoc($user_profile);

    $id = $profile_row['id'];
    $profile_info = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$id'");
    $profile_info_row = mysqli_fetch_assoc($profile_info);
}

?>



<?php

if(isset($_POST['save_event'])){
    if(!isset($_SESSION['user_login'])){
        echo '<script>alert("Login Required")</script>';
        echo '<script>window.location="user/sign-in.php"</script>';
    }else{
  $c_id = $_POST['c_id'];
  $c_name = $_POST['c_name'];
  $venue = $_POST['venue'];
  //$venue_price = $_POST['venue-price'];
  $preferedFor = $_POST['prefer'];
  $location =  $_POST['location'];
  //$l_price =  $_POST['l_price'];
  $hotel =  $_POST['hotel'];
  //$h_price =  $_POST['h_price'];
  $entertainment =  $_POST['entertainment'];
  //$e_price =  $_POST['e_price'];
  $decoration =  $_POST['decoration'];
  //$d_price =  $_POST['d_price'];
  $photoshoot =  $_POST['photoshoot'];
  //$p_price =  $_POST['p_price'];
  $videoshoot =  $_POST['videoshoot'];
  //$v_price =  $_POST['v_price'];
  $member =  $_POST['member'];
  $phone =  $_POST['phone'];
  $address =  $_POST['address'];
  $payment =  $_POST['payment'];


  $image = explode('.', $_FILES['booking-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;

  $result = mysqli_query($con, "INSERT INTO `booking`( `c_id`, `c_name`, `vanue`, `preferedFor`, `location`, `hotel`, `entertainment`,  `decoration`, `photoshoot`, `videoshoot`, `image`, `member`, `phone`, `address`, `advancePayment`, `status`)VALUES ( '$c_id', '$c_name', '$venue', '$preferedFor', '$location', '$hotel', '$entertainment', '$decoration', '$photoshoot', '$videoshoot', '$image', '$member', '$phone', '$address', '$payment', '0')");

  if($result){
      move_uploaded_file($_FILES['booking-image']['tmp_name'], 'admin/images/booking-images/'.$image);

      $success = "Booking created successfully";
      echo '<script>window.location="user/booking-success.php"</script>';
  }else{
      $error = "Booking not save";


  }
  }
}
?>

<section class="booking-event">
 <div class="container">
<div class="booking-event2">
	<div class="row ">
	    <div class="col-md-2"></div>
	    <div class="col-md-8 col-md-offset-2 py-5">

    		<h1>Create Booking Event:</h1>
    		 <!---Add post successfull messages--->
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
    		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="c_id" value="<?= $profile_info_row['id'] ?>" />
                <div class="form-group">
    		        <label for="title">Your full name </label>
    		        <input type="text" class="form-control" name="c_name" placeholder="Enter name" value="<?= isset($fname) ? $fname: '' ?>"/>
                </div>
                <div class="form-group" id="prefer">
    		        <label for="title">Prefered For <span class="require">:</span></label>

                <select name="prefer" id="" class="form-control">
                <?php
                    //Display prefer
                    $result = mysqli_query($con, "SELECT * FROM `preferedFor`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['pre_name'] ?>"><?=$row['pre_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group" id="event1">
    		        <label for="title">Select a Venue <span class="require">:</span></label>

                <select name="venue" id="" class="form-control">
                <?php
                    //Display venue
                    $result = mysqli_query($con, "SELECT * FROM `venue`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['venue_name'] ?>"><?=$row['venue_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>

                <div class="form-group" id="location">
    		        <label for="title">Select Location <span class="require">:</span></label>

                <select name="location" id="lll" class="form-control">
                <?php
                    //Display location
                    $result = mysqli_query($con, "SELECT * FROM `location`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option id="locationid" value="<?=$row['id'] ?>"><?=$row['l_name'] ?></option>

                <?php
                    }
                ?>
                    </select>
                </div>



                <div class="form-group" id="hotel">
    		        <label for="title">Select Hotel <span class="require">:</span></label>

                <select name="hotel" id="" class="form-control">
                <?php
                    //Display hotel
                    $result = mysqli_query($con, "SELECT * FROM `hotel`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['h_name'] ?>"><?=$row['h_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group" id="entertainment">
    		        <label for="title">Select Entertainment <span class="require">:</span></label>

                <select name="entertainment" id="" class="form-control">
                <?php
                    //Display event category
                    $result = mysqli_query($con, "SELECT * FROM `entertainment`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['e_name'] ?>"><?=$row['e_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group" id="decoration">
    		        <label for="title">Select Decoration <span class="require">:</span></label>

                <select name="decoration" id="" class="form-control">
                <?php
                    //Display decoration
                    $result = mysqli_query($con, "SELECT * FROM `decoration`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['d_name'] ?>"><?=$row['d_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group" id="photoshoot">
    		        <label for="title">Select Photo Shoot <span class="require">:</span></label>

                <select name="photoshoot" id="" class="form-control">
                <?php
                    //Display photo shoot
                    $result = mysqli_query($con, "SELECT * FROM `photoshoot`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['p_name'] ?>"><?=$row['p_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group" id="videoshoot">
    		        <label for="title">Select Video Shoot <span class="require">:</span></label>

                <select name="videoshoot" id="" class="form-control">
                <?php
                    //Display video shoot
                    $result = mysqli_query($con, "SELECT * FROM `videoshoot`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['v_name'] ?>"><?=$row['v_name'] ?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="title">Event sample image</label>
                    <input type="file" class="form-control border" name="booking-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


                <div class="form-group">
    		        <label for="title">Event created date</label>
    		        <input type="date" class="form-control" name="purchase-date"  value="<?= isset($purchase_date) ? $purchase_date: '' ?>" required/>
    		    </div>

    		    <div class="form-group">
    		        <label for="description">Event description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>


            <div class="form-group has-error">
    		        <label for="slug">No of Member<span class="require">*</span></label>
    		        <input type="text" class="form-control" name="member" placeholder="Enter No of member" value="<?= isset($member) ? $member: '' ?>"/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Phone number </label>
    		        <input type="text" class="form-control" name="phone" placeholder="+8801******" value="<?= isset($phone) ? $phone: '' ?>"/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Your Address</label>
    		        <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?= isset($address) ? $address: '' ?>"/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Advance Payment </label>
    		        <input type="text" class="form-control" placeholder="Enter your advance payment" name="payment" value="<?= isset($payment) ? $payment: '' ?>">
    		    </div>

             <div class="form-group">
    		    <div class="event-button form-group">
                    <button type="submit" name="save_event" class="btn btn-danger"><i class="fa fa-save"></i>Book Now</button>
                </div>


    		</form>
		</div>

	</div>
</div>
</div>

</section>




<?php
    require_once 'footer.php';

    if(isset($_POST['values'])){
       $id= $_POST['values'];
       echo $id;
    }
?>

<script>



$(document).ready(function(){
  $("#lll").click(function(){
    alert($('#lll').val());

    var valu=('#lll').val();

    $.ajax({
        url: "create-event.php",
        type: "post",
        data: {values: valu},
        success: function (response) {

            alert('hiii');

           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
  });
});
</script>