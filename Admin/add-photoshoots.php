<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_photo'])){
    $p_id = $_POST['p-id']; 
    $p_name = $_POST['p-name'];  
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['photoshoot-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `photoshoot`(`p_id`, `p_name`, `description`, `image`, `price`, `status`) VALUES ('$p_id', '$p_name', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['photoshoot-image']['tmp_name'], 'images/photoshoot-images/'.$image);
      
      $success = "Photoshoot created successfully";
  }else{
      $error = "Photoshoot not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-photoshoots.php">Add photoshoot</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a photoshoot:</h1>
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
    		        <label for="title">Photoshoot Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="p-id" placeholder="Enter photoshoot Id" value="<?= isset($p_id) ? $p_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Photoshoot name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="p-name" placeholder="Enter photoshoot name" value="<?= isset($p_name) ? $p_name: '' ?>"/>
    		    </div>	    
    		    <div class="form-group">
    		        <label for="description">Photoshoot description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter photoshoot descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Photoshoot image</label>
                    <input type="file" class="form-control-file border" name="photoshoot-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Photoshoot Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter photoshoot price" value="<?= isset($price) ? $price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" name="save_photo" class="btn btn-primary"><i class="fa fa-save"></i> Save Photoshoot</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
