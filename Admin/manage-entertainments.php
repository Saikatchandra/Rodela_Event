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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="manage-entertainments.php">Manage Entertainmen</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle text-center"><b>All Entertainmen's View:</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                            <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length">
                            

                            </div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Entertainmen Id</th>
                                        <th>Entertainmen Name</th>
                                        <th>Description</th>
                                        <th>Entertainmen Image</th>
                                        <th>Entertainmen price</th>
                                        <th>Created Date</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
   
                     <?php
                     // hotel display
                          $parpage = 4;
                          $result = mysqli_query($con, "SELECT * FROM `entertainment`");
                      
                        
                          $total_data = mysqli_num_rows($result);
                          $total_page = ceil($total_data / $parpage);
                      
                          if(isset($_GET['page'])){
                              $page = $_GET['page'];
                          }else{
                              $page = 1;
                          }
                          
                          $limit = ($page - 1) * $parpage;
                      
                          $result = mysqli_query($con, "SELECT * FROM `entertainment` LIMIT ". $limit . ','.$parpage);
                      
                          while ($entertainment_row = mysqli_fetch_array($result)){
                                        
                    ?>
                                         <tr>
                                         <td><?= $entertainment_row['e_id'] ?></td>
                                            <td><?= ucwords($entertainment_row['e_name']) ?> </td>
                                            <td><?= $entertainment_row['description'] ?></td>
                                            <td> <img src="images/entertainment-images/<?= $entertainment_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            <td><?= $entertainment_row['price'] ?></td>
                                            
                                            <td><?= date('d-M-y', strtotime($entertainment_row['dateTime'] ))?> </td>
                                            <!--Button for model-->
                                            
                                            <td>
                                                <a href="delete.php?entertainmentdelete=<?= base64_encode($entertainment_row['e_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this entertainment?')"><i class="fa fa-trash-o"></i></a>
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
        
        <li><a href="manage-entertainment.php?page=<?= $page-1 ?>" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="manage-entertainment.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="manage-entertainment.php?page=<?= $page+1 ?>"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
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


<?php
    require_once 'footer.php';
?>
