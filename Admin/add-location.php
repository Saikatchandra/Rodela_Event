<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_location'])){
    $location_id = $_POST['l-id']; 
    $location_name = $_POST['l-name'];   
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['location-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `location`(`l_id`, `l_name`, `description`, `image`, `price`, `status`) VALUES ('$location_id', '$location_name', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['location-image']['tmp_name'], 'images/location-images/'.$image);
      
      $success = "Location created successfully";
  }else{
      $error = "Location not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-location.php">Add location</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a location:</h1>
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
    		        <label for="title">Location Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="l-id" placeholder="Enter location Id" value="<?= isset($location_id) ? $location_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Location name <span class="require"></span></label>
    		        <input type="text" class="form-control" name="l-name" placeholder="Enter location name" value="<?= isset($location_name) ? $location_name: '' ?>"/>
    		    </div>
                    		    
    		    <div class="form-group">
    		        <label for="description">Location description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Location image</label>
                    <input type="file" class="form-control-file border" name="location-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Location Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter location price" value="<?= isset($price) ? $price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" name="save_location" class="btn btn-primary"><i class="fa fa-save"></i> Save Location</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
