<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_venue'])){
    $venue_Id = $_POST['venue-Id']; 
    $venue_name = $_POST['venue-name'];  
    $venue_address = $_POST['venue-address'];  
    $prefered_for = $_POST['prefered-for'];  
    $description = $_POST['description'];  
    $capecity = $_POST['capecity']; 
    $venue_price = $_POST['vanue-price'];  
 
  $image = explode('.', $_FILES['venue-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `venue`(`venue_Id`, `venue_name`, `venue_address`, `prefered_for`, `venue_price`, `image`, `description`, `capecity`) VALUES ('$venue_Id', '$venue_name', '$venue_address', '$prefered_for', '$venue_price', '$image', '$description', '$capecity', '0')");

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  if($result){
      move_uploaded_file($_FILES['venue-image']['tmp_name'], 'images/venue-images/'.$image);
      
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-venues.php">Add venue</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create an vanue:</h1>
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
    		        <label for="title">Venue Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="venue-Id" placeholder="Enter venue Id" value="<?= isset($venue_Id) ? $venue_Id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Venue name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="venue-name" placeholder="Enter venue name" value="<?= isset($venue_name) ? $venue_name: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Venue Address <span class="require"></span></label>
    		        <input type="text" class="form-control" name="venue-address" placeholder="Enter venue name" value="<?= isset($venue_address) ? $venue_address: '' ?>"/>
    		    </div>
                    		    
    		    <div class="form-group">
    		        <label for="description">Vanue description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">venue image</label>
                    <input type="file" class="form-control-file border" name="venue-image" value="<?= isset($image) ? $image: '' ?>">
                </div>

                <div class="form-group">
    		        <label for="title">Event created date</label>
    		        <input type="date" class="form-control" name="purchase-date"  value="<?= isset($purchase_date) ? $purchase_date: '' ?>" required/>
    		    </div>

    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Venue price <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="venue-price" placeholder="Enter venue price" value="<?= isset($venue_price) ? $venue_price: '' ?>" required/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="save_venue" class="btn btn-danger"><i class="fa fa-save"></i> Save Venue</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
