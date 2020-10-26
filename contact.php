 <?php
 include('includes/header.php');
 include('database/security.php');
 include('includes/navbar.php');
 include('database/dbconfig.php');

 if (isset($_POST["contact"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["msg"];

  $sql = "insert into contactus(name,email,phone,message)values('$name','$email','$phone','$message')";
  $ex = $con->query($sql);
  echo "<script>
  alert('Your Message Send Successfully...!')
  window.location='index.php';
  </script>";
}
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Contact</li>
      </ol>
      <h2>Contact</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <p>A108 Adam Street, Gujarat, IN 363001</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>support@foodstuff.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>+91 9512******</p>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-6 ">
          <img src="img/contact.jpg" style="border:0; width: 100%; height: 384px" >
        </div>

        <div class="col-lg-6 info-box ">
          <form action="" method="POST" class="px-5">
            <div class="text-center">
              <h4>Query Box</h4>
            </div>
            <div class="form-group  ">
              <input type="text" class="form-control" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email address" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" cols="6" placeholder="Your message" name="msg"required></textarea>
            </div>
            <div class="form-group text-center">
              <input type="submit" class="btn btn-primary" name="contact" value="Send">
            </div>

          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>