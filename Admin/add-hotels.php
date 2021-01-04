<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_hotel'])){
    $hotel_id = $_POST['h-id']; 
    $hotel_name = $_POST['h-name'];
    $address = $_POST['address'];   
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['hotel-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `hotel`( `h_id`, `h_name`, `address`, `description`, `image`, `price`, `status`) VALUES ('$hotel_id', '$hotel_name', '$address', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['hotel-image']['tmp_name'], 'images/hotel-images/'.$image);
      
      $success = "Hotel created successfully";
  }else{
      $error = "Hotel not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-hotels.php">Add location</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a hotel:</h1>
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
    		        <label for="title">Hotel Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="h-id" placeholder="Enter hotel Id" value="<?= isset($hotel_id) ? $hotel_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Hotel name <span class="require"></span></label>
    		        <input type="text" class="form-control" name="h-name" placeholder="Enter hotel name" value="<?= isset($hotel_name) ? $hotel_name: '' ?>"/>
    		    </div>
    		    <div class="form-group">
    		        <label for="description">Hotel Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter hotel address" value="<?= isset($address) ? $address: '' ?>"/>
    		    </div>                    		    
    		    <div class="form-group">
    		        <label for="description">Hotel description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Hotel image</label>
                    <input type="file" class="form-control-file border" name="hotel-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Hotel Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter hotel price" value="<?= isset($price) ? $price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" name="save_hotel" class="btn btn-primary"><i class="fa fa-save"></i> Save Hotel</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
