<?php
    require_once 'header.php';
?>

<?php
if(isset($_POST['submit'])){
    $searchKey = $_POST['search'];
   $worker_row =  mysqli_query($con, "SELECT * FROM `worker` WHERE fname LIKE '%$searchKey%");
    }else{
     $worker_row = mysqli_query($con, "SELECT * FROM `worker`");
    $searchKey = "";
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="test.php">Manage Workers</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle text-center"><b>All Worker View:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length"><label>Show <select name="basic-table_length" aria-controls="basic-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                                
                                <div class="col-sm-6"><div id="basic-table_filter" class="dataTables_filter">
<form action="">
    <div class="col-md-">
      <input type="text" name="search" size="30"  class="form-control" placeholder="Serach by name..." value="<?= isset($searchKey) ? $searchKey: '' ?>">  
      <button class="btn btn-primary" name="submit">Search</button>
    </div>
</form>
                                </div></div></div><div class="row"><div class="col-sm-12">
                                
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">

                                    <tbody>
                           <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%"> 
                                    <tr>
                                        <th>Worker Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Position</th>
                                        <th>Sallery</th>
                                        <th>Details</th>
                                        <th>Worker joining date</th>
                                        <th>View</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Show all members-->
                                <?php
                                    //$worker_result = mysqli_query($con, "SELECT * FROM `worker`");
                                    //while ($worker_row = mysqli_fetch_assoc($worker_result)){ 
                                        
                                         $parpage = 4;
                                         $result = mysqli_query($con, "SELECT * FROM `worker`");
                                     
                                       
                                         $total_data = mysqli_num_rows($result);
                                         $total_page = ceil($total_data / $parpage);

                                         
                                            
                                      
                                     
                                         if(isset($_GET['page'])){
                                             $page = $_GET['page'];
                                         }else{
                                             $page = 1;
                                         }
                                         
                                         $limit = ($page - 1) * $parpage;
                                     
                                         $result2 = mysqli_query($con, "SELECT * FROM `worker` LIMIT ". $limit . ','.$parpage);
                                        // $result = mysqli_query($result2, "SELECT * FROM `worker` WHERE `fname` LIKE 'jibon' ");
                                     
                                         while ($worker_row = mysqli_fetch_array($result)){
                                                                                        
                                ?>                                           
                                         <tr>
                                            <td><?= ucwords($worker_row['fname'] . ' '. $worker_row['lname']) ?> </td>
                                            <td><?= $worker_row['phone'] ?></td>
                                            <td><?= $worker_row['email'] ?></td>
                                            <td><?= $worker_row['address'] ?></td>
                                            <td> <img src="images/worker-images/<?= $worker_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $worker_row['position'] ?></td>
                                            <td><?= $worker_row['sallery'] ?></td>
                                            <td><?= $worker_row['details'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($worker_row['joiningDate'] ))?> </td>
                                            
                                            <!--Button for model-->
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#worker-<?= $worker_row['worker_id'] ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#worker-update<?= $worker_row['worker_id'] ?>"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="delete.php?workerdelete=<?= base64_encode($worker_row['worker_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this worker?')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                            
                                        } 
                                        ?>
                                       
                                    </tbody>

                                </table>
                                </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing <?= $page ?> of <?= $total_page ?> Pages</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous">
<?php

    if($page > 1){?>
        
        <li><a href="manage-worker.php?page=<?= $page-1 ?>" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="manage-worker.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="manage-worker.php?page=<?= $page+1 ?>"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Next</a></li><li class="paginate_button next" id="basic-table_next">
        <?php
    }
?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>




  
<!--Show worker Info in model-->
<?php
    $worker_result = mysqli_query($con, "SELECT * FROM `worker`");
    while ($worker_row = mysqli_fetch_assoc($worker_result)){ 
?>
            <div class="modal fade" id="worker-<?= $worker_row ['worker_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Worker Info:</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                            <tr>
                                                <th>Worker name:</th>
                                                <td><?= ucwords($worker_row['fname'] . ' '. $worker_row['lname']) ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td><?= $worker_row['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?= $worker_row['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td><?= $worker_row['address'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Image:</th>
                                                <td> <img src="images/worker-images/<?= $worker_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            </tr>
                                            <tr>
                                                <th>Position:</th>
                                                <td><?= $worker_row['position'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Worker Sallery:</th>
                                                <td><?= $worker_row['sallery'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Worker details:</th>
                                                <td><?= $worker_row['details'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Worker joining date time:</th>
                                                <td><?= date('d-M-y', strtotime($worker_row['joiningDate'] ))?> </td>
                                            </tr>
                                           </table>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                             ?>
<!--Update worker Info in model-->
<?php
    $worker_result = mysqli_query($con, "SELECT * FROM `worker`");
    while ($worker_row = mysqli_fetch_assoc($worker_result)){ 

    $id = $worker_row['worker_id'];
    $worker_info = mysqli_query($con, "SELECT * FROM `worker` WHERE `worker_id` = '$id'");
    $worker_info_row = mysqli_fetch_assoc($worker_info);
    
?>
    <div class="modal fade" id="worker-update<?= $worker_row['worker_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update worker info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                </div>
                <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
    		                                <label for="">worker first name: </span></label>
    		                                <input type="text" class="form-control" name="fname" placeholder="Enter first name" value="<?= $worker_info_row['fname'] ?>" required/>
                                            <input type="hidden" class="form-control" name="worker_id" value="<?= $worker_info_row['worker_id'] ?>" required/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">worker last name: </span></label>
    		                                <input type="text" class="form-control" name="lname" placeholder="Enter last name" value="<?= $worker_info_row['lname'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Phone: </span></label>
    		                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone number" value="<?= $worker_info_row['phone'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Email: </span></label>
    		                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?= $worker_info_row['email'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Address: </span></label>
    		                                <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?= $worker_info_row['address'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="position">Position: </span></label>
    		                                <input type="text" class="form-control" name="position" placeholder="Enter worker position" value="<?= $worker_info_row['position'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="position">Sellery: </span></label>
    		                                <input type="text" class="form-control" name="sallery" placeholder="Enter worker Sellery" value="<?= $worker_info_row['sallery'] ?>"/>
    		                            </div>
                                   
                                        <div class="form-group">
    		                                <label for="details">Member details</label>
    		                                <textarea rows="5" class="form-control" name="details" placeholder="Enter worker details" value="<?= isset($details) ? $details: '' ?>" ></textarea>
    		                            </div> 
                                        
                                        <div class="form-group">
                                            <button type="submit" name="update-worker" class="btn btn-primary"> <i class="fa fa-save"></i>Worker Update</button>
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
//Update worker
if(isset($_POST['update-worker'])){
    $id = $_POST['worker_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $sallery = $_POST['sallery'];
    $details = $_POST['details'];
  

    $result = mysqli_query($con, "UPDATE `team_member` SET `fname`='$fname', `lname`='$lname', `phone`='$phone', `email`='$email', `address`='$address', `position`='$position', `sallery`='$sallery', `details`='$details' WHERE `worker_id`='$id'");


  /*if($result){
     header('location: your-post.php');
  }*/
}
  ?>



<?php
    require_once 'footer.php';
?>
