<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_category'])){
  $category_name = $_POST['category-name'];
  $description = $_POST['description'];

  $category_result = mysqli_query($con, "INSERT INTO `category`(`name`, `description`, `status`) VALUES ('$category_name', '$description', '0')");

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  if($category_result){   
      $success = "Add category successfully";
  }else{
      $error = "Category not save";
      

     
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
	        
    		<h1>Add Category:</h1>
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
    		        <label for="title">Category Name: <span class="require"></span></label>
    		        <input type="text" class="form-control" name="category-name" placeholder="Enter category name" value="<?= isset($category_name) ? $category_name: '' ?>" required/>
    		    </div>	    
    		    <div class="form-group">
    		        <label for="description">Category description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter category descripion" value="<?= isset($description) ? $description: '' ?>" ></textarea>
    		    </div>  
             <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="save_category" class="btn btn-danger"><i class="fa fa-save"></i> Save Category</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


<?php
    require_once 'footer.php';
?>
