<?php
include "header.php";
include "carousel.php";
?>

<body>


    <section id="Welcome-event" class="pt-5 pb-3 bg-light text-center ">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2>Welcome to <strong>OUR EVENT PACKAGES & RATED</strong></h2>
            <h3>#Great Services  #Great Support  #Great Ideas</h3>
          </div>
        </div>
      </div>
    </section>

 <!-- Event package & rates -->
 <!-- Event package & rates -->
<section class="plans-section pb-2 pb-5" id="events">
    <div class="container">   
    <div class="row priceing-table-main py-5">
 <?php
  //Display events                                      
  $result = mysqli_query($con, "SELECT * FROM `events` WHERE `event_category`='Wedding Stage'");
  while ($row = mysqli_fetch_assoc($result)){
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
      </div>
      </div>
<?php

include "footer.php";
?>

</body>
</html>
