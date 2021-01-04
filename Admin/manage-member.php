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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="test.php">Manage members</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle text-center"><b>All Team member View:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                            <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length"><label>Show <select name="basic-table_length" aria-controls="basic-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="basic-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="basic-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                
                                    <thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Psition</th>
                                        <th>Details</th>
                                        <th>Member added date</th>

                                        <th>View</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Show all members-->
                                        <?php
                                         
                                           // Member display
                                        
                                           $member_result = mysqli_query($con, "SELECT * FROM `team_member`");
                                            while ($member_row = mysqli_fetch_assoc($member_result)){ 
                                         
                                        ?>
                                         <tr>
                                            <td><?= ucwords($member_row['fname'] . ' '. $member_row['lname']) ?> </td>
                                            <td><?= $member_row['phone'] ?></td>
                                            <td><?= $member_row['email'] ?></td>
                                            <td><?= $member_row['Address'] ?></td>
                                            <td> <img src="images/member-images/<?= $member_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $member_row['position'] ?></td>
                                            <td><?= $member_row['details'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($member_row['dateTime'] ))?> </td>
                                            
                                            <!--Button for model-->
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#event-<?= $member_row['memeber_id'] ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#event-update<?= $member_row['memeber_id'] ?>"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="delete.php?memberdelete=<?= base64_encode($member_row['memeber_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this member?')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 30 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous"><a href="#" aria-controls="basic-table" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="basic-table" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="basic-table" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="basic-table" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button next" id="basic-table_next"><a href="#" aria-controls="basic-table" data-dt-idx="4" tabindex="0">Next</a></li></ul></div></div></div></div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
  
<!--Show events Info in model-->
<?php
    $member_result = mysqli_query($con, "SELECT * FROM `team_member`");
    while ($member_row = mysqli_fetch_assoc($member_result)){ 
?>
            <div class="modal fade" id="event-<?= $member_row['memeber_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Member Info:</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                            <tr>
                                                <th>Member name:</th>
                                                <td><?= ucwords($member_row['fname'] . ' '. $member_row['lname']) ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td><?= $member_row['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?= $member_row['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td><?= $member_row['Address'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Image:</th>
                                                <td> <img src="images/member-images/<?= $member_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            </tr>
                                            <tr>
                                                <th>Position:</th>
                                                <td><?= $member_row['position'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Member details:</th>
                                                <td><?= $member_row['details'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Member added date time:</th>
                                                <td><?= date('d-M-y', strtotime($member_row['dateTime'] ))?> </td>
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
<!--Update member Info in model-->
<?php
    $member_result = mysqli_query($con, "SELECT * FROM `team_member`");
    while ($member_row = mysqli_fetch_assoc($member_result)){ 

    $id = $member_row['memeber_id'];
    $member_info = mysqli_query($con, "SELECT * FROM `team_member` WHERE `memeber_id` = '$id'");
    $member_info_row = mysqli_fetch_assoc($member_info);
    
?>
    <div class="modal fade" id="event-update<?= $member_row['memeber_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update member info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                </div>
                <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
    		                                <label for="">Member first name: </span></label>
    		                                <input type="text" class="form-control" name="fname" placeholder="Enter first name" value="<?= $member_info_row['fname'] ?>" required/>
                                            <input type="hidden" class="form-control" name="memeber_id" value="<?= $member_info_row['memeber_id'] ?>" required/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Member last name: </span></label>
    		                                <input type="text" class="form-control" name="lname" placeholder="Enter last name" value="<?= $member_info_row['lname'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Phone: </span></label>
    		                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone number" value="<?= $member_info_row['phone'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Email: </span></label>
    		                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?= $member_info_row['email'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="">Address: </span></label>
    		                                <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?= $member_info_row['Address'] ?>"/>
    		                            </div>
                                        <div class="form-group">
    		                                <label for="position">Position: </span></label>
    		                                <input type="text" class="form-control" name="position" placeholder="Enter member position" value="<?= $member_info_row['position'] ?>"/>
    		                            </div>
                                   
                                        <div class="form-group">
    		                                <label for="details">Member details</label>
    		                                <textarea rows="5" class="form-control" name="details" placeholder="Enter member details" value="<?= isset($details) ? $details: '' ?>" ></textarea>
    		                            </div> 
                                        
                                        <div class="form-group">
                                            <button type="submit" name="update-member" class="btn btn-primary"> <i class="fa fa-save"></i>Member Update</button>
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
//Update member
if(isset($_POST['update-member'])){
    $id = $_POST['memeber_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $details = $_POST['details'];
  

    $result = mysqli_query($con, "UPDATE `team_member` SET `fname`='$fname', `lname`='$lname', `phone`='$phone', `email`='$email', `address`='$address', `position`='$position', `details`='$details' WHERE `memeber_id`='$id'");


  /*if($result){
     header('location: your-post.php');
  }*/
}
  ?>



<?php
    require_once 'footer.php';
?>
