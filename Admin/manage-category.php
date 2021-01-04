<?php
    require_once 'header.php';
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="test.php">Manage event</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle text-center"><b>All User's View:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                            <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length"><label>Show <select name="basic-table_length" aria-controls="basic-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="basic-table_filter" class="dataTables_filter">
                    <!--Search filter -->    
                        <form action=""  method="POST">
                            <div class="col-md-">
                            <input type="text" name="search"  class="form-control" placeholder="Serach by name..." value="<?= isset($searchKey) ? $searchKey: '' ?>">   
                            <button class="btn btn-primary" name="submit">Search</button>
                            </div>
                        </form>

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">

                                    <thead>
                                    <tr>
                                        <th>Event Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category creation date</th>
                                        <th>Is it active</th>
                                        <th>Action</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                         
                                         // Event display
                                      
                                         if(isset($_POST['submit'])){
                                        $searchKey = $_POST['search'];
                                         $query = mysqli_query($con, "SELECT * FROM `category` WHERE CONCAT(name, description) LIKE '%$searchKey%' ");
                                         $count = mysqli_num_rows($query);
                                         
                                         if($count == 0){
                                            //$output = "There was no search results!";
                                      
                                        }
                                        else
                                        {
                                           while ($category_row = mysqli_fetch_array($query,)) {
                                       
                                      ?>
                                       <tr>
                                          <td><?= ucwords($category_row['name'] ) ?> </td>
                                          
                                          <td><?= $category_row['description'] ?></td>
                                          
                                          <td><?= date('d-M-y', strtotime($category_row['Category_date'] ))?> </td>
                                          
                                          <td><?= $category_row['status'] == 1 ? 'Active': 'Inactive' ?></td>
                                          <td>
                                                <?php
                                                    if($category_row['status'] == 1){
                                                        ?>
                                                        <a href="category-inactive.php?id=<?= base64_encode($category_row['category_id']) ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                                    <?php
                                                    }else{
                                                        ?>
                                                         <a href="category-active.php?id=<?= base64_encode($category_row['category_id']) ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                                         <?php
                                                    }
                                                    ?>
                                               
                                            </td>
                                          
                                          <td>
                                              
                                             <!--Update Button for model-->
                                              <a href="javascript: avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#event-update<?= $category_row['category_id'] ?>"><i class="fa fa-pencil"></i></a>
                                              
                                          </td>
                                          <td>
                                              
                                             <!--Delete Button for model-->
                                        
                                              <a href="delete.php?category-delete=<?= base64_encode($category_row['category_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this category?')"><i class="fa fa-trash-o"></i></a>
                                              
                                          </td>
                                          <td>
                                             
                                          </td>
                                      </tr>
                                      <?php
                                            }
                                        
                                        
                                            
                                        }
                                        
                                    }
                                      ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

<!--Update event Info in model-->
<?php
    $category_result = mysqli_query($con, "SELECT * FROM `category`");
    while ($category_row = mysqli_fetch_assoc($category_result)){

    $id = $category_row['category_id'];
    $category_info = mysqli_query($con, "SELECT * FROM `category` WHERE `category_id` = '$id'");
    $category_info_row = mysqli_fetch_assoc($category_info);
    
?>
    <div class="modal fade" id="event-update<?= $category_row['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                </div>
                <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
    		                            <label for="event_name">Category name <span class="require"></span></label>
    		                            <input type="text" class="form-control" name="name" placeholder="category event name" value="<?= $category_info_row['name'] ?>" required/>
                                        <input type="hidden" class="form-control" name="category_id" value="<?= $category_info_row['category_id'] ?>" required/>
    		                        </div>
                            <div class="form-group">
    		                    <label for="event_price">Event Description</label>
    		                    <input type="text" class="form-control" name="description" placeholder="Enter Category description" value="<?= $category_info_row['description'] ?>" required/>
    		                </div>
                                        <div class="form-group">
                                            <button type="submit" name="update-category" class="btn btn-primary"> <i class="fa fa-save"></i>Update Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                        
            </div>
        </div>
    </div>

    <?php
        }
?>

<?php
//Update post
if(isset($_POST['update-category'])){
    $id = $_POST['category_id'];
    $category_name = $_POST['name'];
    $description = $_POST['description'];

    $category_result = mysqli_query($con, "UPDATE `category` SET `name`='$category_name',`description`='$description' WHERE `category_id`='$id'");

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  /*if($result){
     header('location: your-post.php');
  }*/
}
  ?>



<?php
    require_once 'footer.php';
?>
