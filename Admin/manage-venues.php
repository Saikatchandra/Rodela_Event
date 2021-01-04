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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="manage-venues.php">Manage venue</a></li>
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
                            <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length">
                            

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Venue Id</th>
                                        <th>Venue Name</th>
                                        <th>Venue Address</th>
                                        <th>Venue Image</th>

                                        <th>Description</th>
                                        <th>Venue price</th>
                                        <th>Created Date</th>
                                        <th>View</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                 <!--Show  events-->
   
                     <?php
                     // Event display
            
                     //$result = mysqli_query($con, "SELECT * FROM `events`");
                      //while ($event_row = mysqli_fetch_assoc($result)){ 
                          $parpage = 4;
                          $result = mysqli_query($con, "SELECT * FROM `venue`");
                      
                        
                          $total_data = mysqli_num_rows($result);
                          $total_page = ceil($total_data / $parpage);
                      
                          if(isset($_GET['page'])){
                              $page = $_GET['page'];
                          }else{
                              $page = 1;
                          }
                          
                          $limit = ($page - 1) * $parpage;
                      
                          $result = mysqli_query($con, "SELECT * FROM `venue` LIMIT ". $limit . ','.$parpage);
                      
                          while ($venue_row = mysqli_fetch_array($result)){
                                        
                    ?>
                                         <tr>
                                         <td><?= $venue_row['venue_Id'] ?></td>
                                            <td><?= ucwords($venue_row['venue_name']) ?> </td>
                                            <td><?= $venue_row['venue_address'] ?></td>
                                            <td> <img src="images/venue-images/<?= $venue_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $venue_row['description'] ?></td>
                                            <td><?= $venue_row['venue_price'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($venue_row['venue_date'] ))?> </td>
                                            <!--Button for model-->
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#venue-<?= $venue_row['venue_Id'] ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#venue-update<?= $venue_row['venue_Id'] ?>"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="delete.php?venuedelete=<?= base64_encode($venue_row['venue_Id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this venue?')"><i class="fa fa-trash-o"></i></a>
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
    <!-- Pagination --->
                        </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing <?= $page ?> of <?= $total_page ?> Pages</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous">
<?php

    if($page > 1){?>
        
        <li><a href="manage-vanue.php?page=<?= $page-1 ?>" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="manage-vanue.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="manage-vanue.php?page=<?= $page+1 ?>"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
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
  
<!--Show venue Info in model-->
<?php
    $result = mysqli_query($con, "SELECT * FROM `venue`");
    while ($venue_row = mysqli_fetch_assoc($result)){
?>
            <div class="modal fade" id="venue-<?= $venue_row['venue_Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Venue Info</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                           <tr>
                                                <th>Venue Id:</th>
                                                <td><?= ucwords($venue_row['venue_Id']) ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Venue name:</th>
                                                <td><?= ucwords($venue_row['venue_name']) ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Post image:</th>
                                                <td> <img src="images/venue-images/<?= $venue_row['image'] ?>" alt="" width="150px" height="150px" class="fluid"> </td>
                                            
                                            </tr>
                                            <tr>
                                                <th>Venue Address:</th>
                                                <td><?= $venue_row['venue_address'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Venue description:</th>
                                                <td><?= $venue_row['description'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Venue price:</th>
                                                <td><?= $venue_row['venue_price'] ?></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th>Date time:</th>
                                                <td><?= date('d-M-y', strtotime($venue_row['venue_date'] ))?> </td>
                                            
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
<!--Update event Info in model-->
<?php
    $result = mysqli_query($con, "SELECT * FROM `venue`");
    while ($venue_row = mysqli_fetch_assoc($result)){

    $id = $venue_row['venue_Id'];
    $venue_info = mysqli_query($con, "SELECT * FROM `venue` WHERE `venue_Id` = '$id'");
    $venue_info_row = mysqli_fetch_assoc($venue_info);
    
?>
    <div class="modal fade" id="venue-update<?= $venue_row['venue_Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update venue info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                </div>
                <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                        <label for="venue_Id">Venue Id <span class="require">*</span></label>
                                        <input type="text" class="form-control" name="venue_Id" value="<?= $venue_info_row['venue_Id'] ?>" required/>
    		                            <label for="venue_name">Venue name <span class="require">*</span></label>
    		                            <input type="text" class="form-control" name="venue_name" placeholder="Enter venue name" value="<?= $venue_info_row['venue_name'] ?>"/>
                                        
    		                        </div>
                                    <label for="venue_name">Venue Address <span class="require"></span></label>
    		                            <input type="text" class="form-control" name="venue_address" placeholder="Enter venue address" value="<?= $venue_info_row['venue_address'] ?>"/>
                                    <label for="venue_name">Venue price <span class="require">*</span></label>
    		                        <input type="text" class="form-control" name="venue_name" placeholder="Enter venue price" value="<?= $venue_info_row['venue_price'] ?>"/>
                                    
                                        <div class="form-group">
                                            <button type="submit" name="update-venue" class="btn btn-primary"> <i class="fa fa-save"></i>Venue Update</button>
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
if(isset($_POST['update-venue'])){
$venue_Id = $POST['venue_Id'];
  $venue_name = $_POST['venue_name'];
  $venue_address = $_POST['venue_address'];
  //$venue_price = $_POST['venue_price'];
 
 

  $result = mysqli_query($con, "UPDATE `venue` SET  `venue_name`='$venue_name', `venue_address`='$venue_address',  WHERE `venue_Id`='$venue_Id'");

}
  ?>



<?php
    require_once 'footer.php';
?>
