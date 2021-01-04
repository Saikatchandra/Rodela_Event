<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_entertainment'])){
    $e_id = $_POST['e-id']; 
    $e_name = $_POST['e-name'];   
    $description = $_POST['description'];   
    $price = $_POST['price'];  
 
  $image = explode('.', $_FILES['entertainment-image']['name']);
  $image_ext = end($image);
 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `entertainment`(`e_id`, `e_name`, `description`, `image`, `price`, `status`) VALUES ('$e_id', '$e_name', '$description', '$image', '$price', '0')");

  if($result){
      move_uploaded_file($_FILES['entertainment-image']['tmp_name'], 'images/entertainment-images/'.$image);
      
      $success = "Entertainment created successfully";
  }else{
      $error = "Entertainment not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-entertainments.php">Add entertainment</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a entertainment:</h1>
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
    		        <label for="title">Entertainment Id <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="e-id" placeholder="Enter intertainment Id" value="<?= isset($e_id) ? $e_id: '' ?>" required/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Entertainment name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="e-name" placeholder="Enter intertainment name" value="<?= isset($e_name) ? $e_name: '' ?>"/>
    		    </div>
                    		    
    		    <div class="form-group">
    		        <label for="description">Entertainment description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter intertainment descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">Entertainment image</label>
                    <input type="file" class="form-control-file border" name="entertainment-image" value="<?= isset($image) ? $image: '' ?>">
                </div>
            <div class="form-group has-error">
    		        <label for="slug">Entertainment Price <span class="require"></span></label>
    		        <input type="text" class="form-control" name="price" placeholder="Enter intertainment price" value="<?= isset($price) ? $price: '' ?>"/>
    		    </div>
             <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="save_entertainment" class="btn btn-danger"><i class="fa fa-save"></i> Save Entertainment</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
