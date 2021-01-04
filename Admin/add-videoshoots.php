<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_video'])){
    $v_id = $_POST['v-id']; 
    $v_name = $_POST['v-name'];  
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['videoshoot-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `videoshoot`(`v_id`, `v_name`, `description`, `image`, `price`, `status`) VALUES ('$v_id', '$v_name', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['videoshoot-image']['tmp_name'], 'images/videoshoot-images/'.$image);
      
      $success = "Videoshoot created successfully";
  }else{
      $error = "Videoshoot not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-photoshoots.php">Add video shoot</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create A Video Shoot:</h1>
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
    		        <label for="title">Video Shoot Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="v-id" placeholder="Enter video shoot Id" value="<?= isset($v_id) ? $v_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Video Shoot name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="v-name" placeholder="Enter video shoot name" value="<?= isset($v_name) ? $v_name: '' ?>"/>
    		    </div>	    
    		    <div class="form-group">
    		        <label for="description">Video Shoot description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter video shoot descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Video Shoot image</label>
                    <input type="file" class="form-control-file border" name="videoshoot-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Video Shoot Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter video shoot price" value="<?= isset($price) ? $price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" name="save_video" class="btn btn-primary"><i class="fa fa-save"></i> Save Video Shoot</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
