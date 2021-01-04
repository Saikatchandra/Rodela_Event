<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['save_pre'])){
    $pre_name = $_POST['pre-name'];  
    $description = $_POST['description'];   
 
  $image = explode('.', $_FILES['preferFor-image']['name']);
  $image_ext = end($image);

 $image = date('Ymdhis.').$image_ext;


        
 
  $result = mysqli_query($con, "INSERT INTO `preferedfor`(`pre_name`, `description`, `image`, `status`) VALUES ('$pre_name', '$description', '$image',  '0')");

  if($result){
      move_uploaded_file($_FILES['preferFor-image']['tmp_name'], 'images/preferFor-images/'.$image);
      
      $success = "Prefere For venue created successfully";
  }else{
      $error = "Prefer For venue not save";
      

     
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="add-preferFor.php">Add prefer</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create a Prefer:</h1>
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
    		        <label for="title">Prefered name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="pre-name" placeholder="Enter prefer name" value="<?= isset($pre_name) ? $pre_name: '' ?>" required/>
    		    </div>
                    		    
    		    <div class="form-group">
    		        <label for="description">Prefer description</label>
    		        <textarea rows="5" class="form-control" name="description" placeholder="Enter event descripion" value="<?= isset($description) ? $description: '' ?>"></textarea>
    		    </div>
                <div class="form-group">
                <label for="title">prefer image</label>
                    <input type="file" class="form-control-file border" name="preferFor-image" value="<?= isset($image) ? $image: '' ?>">
                </div>
             <div class="form-group">
                    <div class="col-sm-offset- col-sm-8">
                    <button type="submit" name="save_pre" class="btn btn-primary"><i class="fa fa-save"></i> Save Prefer</button>
                    </div>
                </div>
    		    
    		</form>
		</div>
		
	</div>
</div>

<!-------++++++++++++++++++++++++++++++++++-->
 <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle text-center"><b>All Prefer's View:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                            <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length">
                            

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Prefer Id</th>
                                        <th>Prefer Name</th>
                                        <th>Prefer Image</th>
                                        <th>Description</th>
                                        <th>Created Date</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
   
                                    <?php
                     // Location display
                          $parpage = 4;
                          $result = mysqli_query($con, "SELECT * FROM `preferedFor`");
                      
                          while ($prefer_row = mysqli_fetch_array($result)){
                                        
                    ?>
                                         <tr>
                                         <td><?= $prefer_row['pre_id'] ?></td>
                                            <td><?= ucwords($prefer_row['pre_name']) ?> </td>
                                            <td> <img src="images/preferFor-images/<?= $prefer_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $prefer_row['description'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($prefer_row['dateTime'] ))?> </td>
                                            <!--Button for model-->
                                            
                                            <td>
                                                <a href="delete.php?preferdelete=<?= base64_encode($prefer_row['pre_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this prefer?')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                       
     
                                       </tbody>
                                </tbody>
                            </table>
  
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>



<?php
    require_once 'footer.php';
?>
