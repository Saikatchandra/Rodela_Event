<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_event'])){
  $event_name = $_POST['event-name'];
  $purchase_date = $_POST['purchase-date'];
  $description = $_POST['description'];
  $event_price = $_POST['event-price'];
  $event_qty = $_POST['event-qty'];
  $available_qty =  $_POST['available-qty'];
  $event_category =  $_POST['event-category'];
 
  $image = explode('.', $_FILES['event-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `events`(`event_name`, `event_image`, `event_category`, `description`, `event_purchase_date`, `event_price`, `event_qty`, `available_qty`, `status`) VALUES ('$event_name', '$image', '$event_category', '$description', '$purchase_date', '$event_price', '$event_qty', '$available_qty', '0')");

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  if($result){
      move_uploaded_file($_FILES['event-image']['tmp_name'], 'images/event-images/'.$image);
      
      $success = "Event created successfully";
  }else{
      $error = "Event not save";
      

     
  }
}
?>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-events.php">Add event</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create an event:</h1>
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

    		    <div class="form-group">
    		        <label for="title">Event name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="event-name" placeholder="Enter event name" value="<?= isset($event_name) ? $event_name: '' ?>" required/>
    		    </div>
                
                <div class="form-group">
                <label for="title">Event image</label>
                    <input type="file" class="form-control border" name="event-image" value="<?= isset($image) ? $image: '' ?>" required>
                </div>
               
                <div class="form-group">
    		        <label for="title">Select Event Category <span class="require">:</span></label>

                <select name="event-category" id="" class="form-control">
                <?php
                    //Display event category                                    
                    $result = mysqli_query($con, "SELECT * FROM `category`");
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?=$row['name'] ?>"><?=$row['name'] ?></option>
                <?php
                    }
                ?>
                    </select>
    		    </div>

                     
                
                <div class="form-group">
    		        <label for="title">Event created date</label>
    		        <input type="date" class="form-control" name="purchase-date"  value="<?= isset($purchase_date) ? $purchase_date: '' ?>" required/>
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Event description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>" required></textarea>
    		    </div>
    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Event price <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="event-price" placeholder="Enter event price" value="<?= isset($event_price) ? $event_price: '' ?>" required/>
    		    </div>
                <div class="form-group has-error">
    		        <label for="slug">Event quantity <span class="require">*</span></label>
    		        <input type="number" class="form-control" name="event-qty" placeholder="" value="<?= isset($event_qty) ? $event_qty: '' ?>" required/>
    		    </div>
                <div class="form-group has-error">
    		        <label for="slug">Available quantity <span class="require">*</span></label>
    		        <input type="number" class="form-control" name="available-qty" placeholder="" value="<?= isset($available_qty) ? $available_qty: '' ?>" required/>
    		    </div>

    		    
             <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="save_event" class="btn btn-danger"><i class="fa fa-save"></i> Save Event</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
