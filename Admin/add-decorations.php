<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_decoration'])){
    $d_id = $_POST['d-id']; 
    $d_name = $_POST['d-name'];  
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['decoration-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `decoration`(`d_id`, `d_name`, `description`, `image`, `price`, `status`) VALUES ('$d_id', '$d_name', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['decoration-image']['tmp_name'], 'images/decoration-images/'.$image);
      
      $success = "Decoration created successfully";
  }else{
      $error = "Decoration not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-decorations.php">Add Decoration</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a decoration:</h1>
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
    		        <label for="title">Decoration Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="d-id" placeholder="Enter decoration Id" value="<?= isset($d_id) ? $d_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Decoration name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="d-name" placeholder="Enter decoration name" value="<?= isset($d_name) ? $d_name: '' ?>"/>
    		    </div>	    
    		    <div class="form-group">
    		        <label for="description">Decoration description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter decoration descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Decoration image</label>
                    <input type="file" class="form-control-file border" name="decoration-image" value="<?= isset($image) ? $image: '' ?>">
                </div>


    		    
    		    
            <div class="form-group has-error">
    		        <label for="slug">Venue Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter decoration price" value="<?= isset($venue_price) ? $venue_price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" name="save_decoration" class="btn btn-primary"><i class="fa fa-save"></i> Save Decoration</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
