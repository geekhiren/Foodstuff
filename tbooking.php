<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
include('database/dbconfig.php');


if (isset($_POST["tsubmit"])) {
    $name = $_POST["tname"];
    $email = $_POST["temail"];
    $phone = $_POST["tphone"];
    $date = $_POST["tdate"];
    $time = $_POST["ttime"];
    $person = $_POST["tperson"];


    $sql = "insert into reservation(name,email,phone,date,time,person)values('$name','$email','$phone','$date','$time','$person')";
    $ex = $con->query($sql);
    echo "<script>
			alert('Your Message Send Successfully...!')
			window.location='index.php';
			</script>";
}
?>

<!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Table Booking</li>
      </ol>
      <h2>Table Booking</h2>

    </div>
  </section><!-- End Breadcrumbs -->

<section class="px-4 mt-0 ftco-section img" data-stellar-background-ratio="0.5">
    <div class="container ">
        <div class="row d-flex ">
            <div class="col-md-7 mx-auto ftco-animate makereservation p-4 px-md-5 pb-md-5">
                <div class="heading-section ftco-animate mb-5 text-center">
                    <h2 class="mb-4">Table Reservation</h2>
                </div>
                <form action="tbooking.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="tname" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="temail" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="tel" class="form-control" name="tphone" placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="tdate" placeholder="Date">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="ttime" placeholder="Time">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Person</label>
                                <input type="number" class="form-control" name="tperson" placeholder="Person">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group text-center">
                                <input type="submit" name="tsubmit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>