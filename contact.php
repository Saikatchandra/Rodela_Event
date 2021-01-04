<?php
include "header.php";
include "carousel.php";
?>

<body>
  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4 text-center">Please fill out this form to contact us</h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Last Name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Phone Number" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea cols="30" rows="5" placeholder="Message" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" class="btn  btn-block btn-dark" value="Send">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4>Get In Touch</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.</p>
              <h4>Address</h4>
              <p>House #100, Uttara, Dhaka</p>
              <h4>Email</h4>
              <p>test@gmail.com</p>
              <h4>Phone</h4>
              <p class="mb-2">+434 3434 3433</p>
              <p>+433 4343 6567</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  
<?php
  include "footer.php";
?>

</body>
</html>