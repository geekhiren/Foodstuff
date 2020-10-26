  <?php
  include('includes/header.php');
  include('database/security.php');
  include('includes/navbar.php');
  include('database/dbconfig.php');
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>About Us</li>
        </ol>
        <h2>About Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3 class="text-center mb-4">FoodStuff</h3>        
            <ul>
              <li><i class="icofont-check-circled"></i> Foodstuff Restaurant is online food delivering application. The main objective builds the system is to provide ordering and reservation service online to the customer.</li>
              <li><i class="icofont-check-circled"></i> This way ordering and reservation table will become easier. The user needs to register first, then they can access the other part of the site.</li>
              <li><i class="icofont-check-circled"></i> This foodstuff restaurant management system website can be used by the employees in a restaurant to handle the clients, their orders, reservation and can help them easily find free tables or place orders.</li>
            </ul>
            <p>
              Foodstuff Restaurant set up menu online and the customers easily place the order and get at home. 
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Honer Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Partnership</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="testimonial-item">
              <img src="img/dc1.jpg" class="testimonial-img" alt="">
              <h3>Hiren Shekhda</h3>
              <h4>Designer &amp; Coder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                I'm Hiren Shekhda.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="testimonial-item mt-4 mt-lg-0">
              <img src="img/p2.jpg" class="testimonial-img" alt="">
              <h3>Harsh Limbadiya</h3>
              <h4>Designer &amp; Coder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                I'm Harsh Limbadiya.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  
  <?php 
  include('includes/footer.php');
  include('includes/scripts.php');
  ?>