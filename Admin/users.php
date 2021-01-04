<?php
    require_once 'header.php';
    require_once "../dbcon.php";
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
                            <li><a href="javascript: avoid(0)">Users</a></li>
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
                                        <th>User Name</th>
                                        <th>Username</th>
                                        <th>Phone No.</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Show user Info in admin pannel-->
                                        <?php
                                           //$result = mysqli_query($con, "SELECT * FROM `user`");
                                            //while ($row = mysqli_fetch_assoc($result)){
                                                $parpage = 4;
                                                $result = mysqli_query($con, "SELECT * FROM `user`");
                                            
                                              
                                                $total_data = mysqli_num_rows($result);
                                                $total_page = ceil($total_data / $parpage);
                                            
                                                if(isset($_GET['page'])){
                                                    $page = $_GET['page'];
                                                }else{
                                                    $page = 1;
                                                }
                                                
                                                $limit = ($page - 1) * $parpage;
                                            
                                                $result = mysqli_query($con, "SELECT * FROM `user` LIMIT ". $limit . ','.$parpage);
                                            
                                                while ($row = mysqli_fetch_array($result)){
                                        ?>
                                         <tr>
                                            <td><?= ucwords($row['fname'] . ' '. $row['lname']) ?> </td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td> <img src="<?= $row['image'] ?>" alt=""> </td>
                                            <td><?= $row['status'] == 1 ? 'Active': 'Inactive' ?></td>
                                            <td>
                                                <?php
                                                    if($row['status'] == 1){
                                                        ?>
                                                        <a href="status-inactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                         <a href="status-active.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                                         <?php
                                                    }
                                                    ?>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                </tbody>
                            </table>
                        </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing <?= $page ?> of <?= $total_page ?> Pages</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous">
<?php

    if($page > 1){?>
        
        <li><a href="users.php?page=<?= $page-1 ?>" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="users.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="users.php?page=<?= $page+1 ?>"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
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
