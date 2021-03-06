<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_worker'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $position = $_POST['position'];
  $sallery = $_POST['sallery'];
  $details = $_POST['details'];

  $image = explode('.', $_FILES['worker-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


  $result = mysqli_query($con, "INSERT INTO `worker`(`fname`, `lname`, `phone`, `email`, `address`, `image`, `position`, `sallery`, `details`, `status`) VALUES ('$fname', '$lname', '$phone', '$email', '$address', '$image', '$position', '$sallery', '$details', '0')");



  if($result){
      move_uploaded_file($_FILES['worker-image']['tmp_name'], 'images/worker-images/'.$image);
      
      $success = "Worker added successfully";
  }else{
      $error = "Worker added not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-worker.php">Add Worker</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Added Worker:</h1>
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
    		        <label for="title">First Name: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="fname" placeholder="Enter first name" value="<?= isset($fname) ? $fname: '' ?>" required/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Last Name: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="lname" placeholder="Enter last name" value="<?= isset($lname) ? $lname: '' ?>" required/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Phone Number: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="<?= isset($phone) ? $phone: '' ?>" required/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Email Address: <span class="require"></span></label>
    		        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="<?= isset($email) ? $email: '' ?>" required/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Address: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?= isset($address) ? $address: '' ?>" required/>
    		    </div>
                
                <div class="form-group">
                <label for="title">Worker image</label>
                    <input type="file" class="form-control-file border" name="worker-image" value="<?= isset($image) ? $image: '' ?>" required>
                </div>
                <div class="form-group">
    		        <label for="title">Worker Position: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="position" placeholder="Enter member position" value="<?= isset($position) ? $position: '' ?>" required/>
    		    </div>
                <div class="form-group">
    		        <label for="title">Worker Sallery: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="sallery" placeholder="Enter Worker Sallery" value="<?= isset($position) ? $position: '' ?>"/>
    		    </div>
                <div class="form-group">
    		        <label for="details">Worker Details</label>
    		        <textarea rows="5" class="form-control" name="details" placeholder="Enter member details" value="<?= isset($details) ? $details: '' ?>" ></textarea>
    		    </div> 
             <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="save_worker" class="btn btn-danger"><i class="fa fa-save"></i>Add Worker</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
