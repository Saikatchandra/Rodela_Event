<?php
include "header.php";
include "carousel.php";
?>

<body>
  
  

    <!--Welcome to EVENT MANAGEMENT -->
  <section id="Welcome-event" class="py-5 bg-light text-center ">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Welcome to <strong>RODELA EVENT MANAGEMENT</strong></h2>
          <p class="lead">From Wedding Functions to Birthday Parties or Corporate Events to Musical Functions,<br>
            We offer full range of Events Management Services that scale to your needs & budget.</p>
          <h3>#Great Services  #Great Support  #Great Ideas</h3>
        </div>
      </div>
    </div>
  </section>

<!-- Event package & rates -->
<section class="plans-section pb-2 pb-5" id="events">
    <div class="container">   
    <div class="row priceing-table-main py-5">
<?php
  //Display events                                      
 // $result = mysqli_query($con, "SELECT * FROM `events`");
  //while ($row = mysqli_fetch_assoc($result)){
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

    while ($row = mysqli_fetch_array($result)){  
?>
    <div class="col-md-4 price-grid py-5">
       <div class="price-block agile">
           <div class="price-gd-top">
           <img src="admin/images/event-images/<?= $row['event_image'] ?>" alt=" " class="img-responsive" />
               <h4><?= $row['event_name'] ?></h4>
              
           </div>
           <div class="price-gd-bottom">
                  <div class="price-list">
                       <ul>
                          <li><span>Review: </span><i class="fa fa-star " aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                       
                        </ul>
               </div>
               <div class="price-selet">	
                   <h3><span>Tk.</span><?= $row['event_price'] ?></h3>	
                   <!--
                   <a href="javascript: avoid(0)" class=" details btn btn-danger mb-5"  data-toggle="modal" data-target="#event1-<?= $row['id'] ?>">VIEW DETAILS</i></a>-->
                   
                   <a href="event-details.php?event-details=<?= base64_encode($row['id']) ?>" class="btn btn-danger">VIEW DETAILS</a>

               </div>
           </div> 
               
       </div>  
       
      </div>
      <?php
            }
      ?>  
 </div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing <?= $page ?> of <?= $total_page ?> Pages</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous">
<?php



    if($page > 1){?>
        
        <li><a href="index.php?page=<?= $page-1 ?>" class="btn btn-info pl-3" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled" >Previous</a></li><li class="paginate_button">
        <?php
    }
    for($i = 1; $i <= $total_page; $i++){?>
        <a href="index.php?page=<?= $i ?>" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-info <?= $page == $i ? 'active':' '?>"><?= $i ?></a></li><li class="paginate_button">
        <?php
    }
    if( ($i > $page) && ($page < $total_page)){?>
        <a href="index.php?page=<?= $page+1 ?>" class="btn btn-info" aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary">Next</a></li><li class="paginate_button next" id="basic-table_next">
        
        <?php
    }else{?>
        <a href="javasript:avoid(0)"  aria-controls="basic-table" data-dt-idx="0" tabindex="0" class="btn btn-secondary disabled">Next</a></li><li class="paginate_button next" id="basic-table_next">
        <?php
    }
?> 
      </div>
 

<!--Get user Id-->

<?php/*
    $session_user= $_SESSION['user_username'];
    $select_user = "SELECT * FROM user WHERE username='$session_user'";
    $run_user = mysqli_query($con, $select_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_id = $row_user['id'];
    echo($user_id); */
?>

<!--Show events Details in model-->
<?php
  $result = mysqli_query($con, "SELECT * FROM `events`");
  while ($row = mysqli_fetch_assoc($result)){
   
?>
            <div class="modal fade" id="event1-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Event Detaills:</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                           
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                            <tr>
                                                <th>Event name:</th>
                                                <td><?= ucwords($row['event_name'] ) ?> </td>
                                            
                                            </tr>
                                            <tr>
                                                <th>Post image:</th>
                                                <td> <img src="admin/images/event-images/<?= $row['event_image'] ?>" alt="" width="100%" height="150px" class="fluid"> </td>
                                            
                                            </tr>
                                            <tr>
                                                <th>Event description:</th>
                                                <td><?= $row['description'] ?></td>
                                            </tr>
                                    
                                            <tr>
                                                <th>Event price:</th>
                                                <td><?= $row['event_price'] ?></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th>Date time:</th>
                                                <td><?= date('d-M-y', strtotime($row['datetime'] ))?> </td>
                                            
                                            </tr>
                                           
                                           
                                           </table>
                                        </div>
                                        <div class="price-selet">							
                                           <a href="event_order.php?user_id=<?= base64_encode($user_id)?>" class="btn btn-danger">Book Now</a>
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
       
<!--// Event Package end -->

<section>
  <!-- pagination -->
  
</div>

</section>

 

 

  <!--=====================================================================
                    team_section section start here
=========================================================================-->


 <section id="team_section" class="pd100px">
  <div class="container">  
    <div class="row">
      <div class="col">  
        <div class="section-title mt-4 text-center zoomIn wow" data-wow-duration="1.5s">
          <h2>Our Team Member</h2>
          <p>Our team member are ready for help you</p>
        </div>
      </div>
    </div>

    <div class="row py-5">
<!--Display events-->
<?php                                 
  $result = mysqli_query($con, "SELECT * FROM `team_member`");
  while ($member_row = mysqli_fetch_assoc($result)){
?>

      <div class="col-md-4 wow bounceInUp" data-wow-duration="1.2s">
        <div class="single-team">        
        <img src="admin/images/member-images/<?= $member_row['image'] ?>" alt=" " class="img-responsive" />
          <div class="team-content">
            <h3><?= ucwords($member_row['fname'] . ' '. $member_row['lname']) ?></h3>
            <div>Position:
            <span>(<?= $member_row['position'] ?>)</span></div>
            <p> <?= $member_row['details'] ?> </p>
              <a href="#linkhere"><i class="social-icon fa fa-twitter"></i></a>
              <a href="#linkhere"><i class="social-icon fa  fa-google"></i></a>
              <a href="#linkhere"><i class="social-icon fa   fa-facebook"></i></a>
              <a href="#linkhere"><i class="social-icon  fa fa-instagram"></i></a>
              <button href="javascript: avoid(0)"  class="btn portfolio-btn" data-toggle="modal" data-target="#event-<?= $member_row['memeber_id'] ?>">View Portfolio<i class="fa fa-arrow-right"></i></button>
             
          </div>
        </div>
      </div>
<?php
    }
?> 
  </div>
</section> 
<!--=====================================================================
                    team_section section end here
=========================================================================-->
<!--Show events Info in model-->
<?php
    $member_result = mysqli_query($con, "SELECT * FROM `team_member`");
    while ($member_row = mysqli_fetch_assoc($member_result)){ 
?>
            <div class="modal fade" id="event-<?= $member_row['memeber_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>My Info:</h4>
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
                                                <td> <img src="admin/images/member-images/<?= $member_row['image'] ?>" alt="" width="100px" height="100px" class="fluid"> </td>
                                            </tr>
                                            <tr>
                                                <th>Position:</th>
                                                <td><?= $member_row['position'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Member details:</th>
                                                <td><?= $member_row['details'] ?></td>
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
<?php

include "footer.php";
?>

</body>
</html>
