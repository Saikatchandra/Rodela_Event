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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="manage-events.php">Manage event</a></li>
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
                            
                        <form action="">
                            <div class="col-md-">
                            <input type="text" name="search" size="30"  class="form-control" placeholder="Serach by name..." value="<?= isset($searchKey) ? $searchKey: '' ?>">  
                            <button class="btn btn-primary" name="submit">Search</button>
                            </div>
                        </form>

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Event image</th>
                                        <th>Event Category</th>
                                        <th>Description</th>
                                        <th>Event created date</th>
                                        <th>Event price</th>
                                        <th>Date time</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                          $result = mysqli_query($con, "SELECT * FROM `events`");
                      
                        
                          $total_data = mysqli_num_rows($result);
                          $total_page = ceil($total_data / $parpage);
                      
                          if(isset($_GET['page'])){
                              $page = $_GET['page'];
                          }else{
                              $page = 1;
                          }
                          
                          $limit = ($page - 1) * $parpage;
                      
                          $result = mysqli_query($con, "SELECT * FROM `events` LIMIT ". $limit . ','.$parpage);
                      
                          while ($event_row = mysqli_fetch_array($result)){
                                        
                    ?>
                                         <tr>
                                            <td><?= ucwords($event_row['event_name'] . ' '. $event_row['event_name']) ?> </td>
                                            <td> <img src="images/event-images/<?= $event_row['event_image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $event_row['event_category'] ?></td>
                                            <td><?= $event_row['description'] ?></td>
                                            <td><?= $event_row['event_purchase_date'] ?></td>
                                            <td><?= $event_row['event_price'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($event_row['datetime'] ))?> </td>
                                            
                                            <td><?= $event_row['status'] == 1 ? 'Active': 'Inactive' ?></td>
                                            <td>

                                            </td>
                                            <!--Button for model-->
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#event-<?= $event_row['id'] ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="javascript: avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#event-update<?= $event_row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="delete.php?eventdelete=<?= base64_encode($event_row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this event?')"><i class="fa fa-trash-o"></i></a>
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
        
        <li><a href="manage-events.php?page=<?= $page-1 ?>" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="manage-events.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="manage-events.php?page=<?= $page+1 ?>"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
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
  
<!--Show events Info in model-->
<?php
    $result = mysqli_query($con, "SELECT * FROM `events`");
    while ($event_row = mysqli_fetch_assoc($result)){
?>
            <div class="modal fade" id="event-<?= $event_row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Event Info</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                            <tr>
                                                <th>Event name:</th>
                                                <td><?= ucwords($event_row['event_name'] . ' '. $event_row['event_name']) ?> </td>
                                            
                                            </tr>
                                            <tr>
                                                <th>Post image:</th>
                                                <td> <img src="images/event-images/<?= $event_row['event_image'] ?>" alt="" width="150px" height="150px" class="fluid"> </td>
                                            
                                            </tr>
                                            <tr>
                                                <th>Event Category:</th>
                                                <td><?= $event_row['event_category'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Event description:</th>
                                                <td><?= $event_row['description'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Event created date:</th>
                                                <td><?= $event_row['event_purchase_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Event price:</th>
                                                <td><?= $event_row['event_price'] ?></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th>Date time:</th>
                                                <td><?= date('d-M-y', strtotime($event_row['datetime'] ))?> </td>
                                            
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
    $result = mysqli_query($con, "SELECT * FROM `events`");
    while ($event_row = mysqli_fetch_assoc($result)){

    $id = $event_row['id'];
    $event_info = mysqli_query($con, "SELECT * FROM `events` WHERE `id` = '$id'");
    $event_info_row = mysqli_fetch_assoc($event_info);
    
?>
    <div class="modal fade" id="event-update<?= $event_row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update event info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                </div>
                <div class="modal-body">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
    		                            <label for="event_name">Event name <span class="require">*</span></label>
    		                            <input type="text" class="form-control" name="event_name" placeholder="Enter event name" value="<?= $event_info_row['event_name'] ?>" required/>
                                        <input type="hidden" class="form-control" name="id" value="<?= $event_info_row['id'] ?>" required/>
    		                        </div>
                                    
                                    <div class="form-group">
    		                             <label for="title">Select Event Category <span class="require">:</span></label>

                                        <select name="event-category" id="">
                                     <?php
                                         //Display event category                                    
                                            $result = mysqli_query($con, "SELECT * FROM `category`");
                                            while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                            <option value="<?=$row['name'] ?>"><?=$row['name'] ?></option>
                                        <?php
                                            }
                                     ?>
                                            </select>
    		                            </div>

                            <div class="form-group">
    		                    <label for="event_price">Event price</label>
    		                    <input type="text" class="form-control" name="event_price" placeholder="Enter event price" value="<?= $event_info_row['event_price'] ?>" required/>
    		                </div>
                        <!--Don't show description
    		                <div class="form-group">
    		                    <label for="description">Description</label>
    		                    <textarea rows="5" class="form-control" name="description" placeholder="Enter post descripion" value="<?= $event_info_row['description'] ?>" required></textarea>
    		                </div>
                        -->
                            <!--
                            <div class="form-group">
                                <input type="file" class="form-control-file border mb-2" name="image" required>
                                <img style="width: 70px; height: 70px; " src="images/post-images/<?= $event_info_row['image'] ?>" alt="">
                            </div> -->
                                        <div class="form-group">
                                            <button type="submit" name="update-event" class="btn btn-primary"> <i class="fa fa-save"></i>Event Update</button>
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
if(isset($_POST['update-event'])){
  $id = $_POST['id'];
  $event_name = $_POST['event_name'];
  $event_price = $_POST['event_price'];
  $event_category = $_POST['event-category'];
  //$description = $_POST['description'];
 
 

  $result = mysqli_query($con, "UPDATE `events` SET `event_name`='$event_name', `event_category`='$event_category', `event_price`='$event_price' WHERE `id`='$id'");

  //$result = mysqli_query($con, "INSERT INTO `post`(`title`, `category`, `description`, `tags`, `image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES ('$title', '$category', '$description', '$tages', 'image', '', '', '', '', '0')");

  /*if($result){
     header('location: your-post.php');
  }*/
}
  ?>



<?php
    require_once 'footer.php';
?>
