<?php

include('database/dbconfig.php');
include('database/security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<?php
$id = $_SESSION['id'];
$sql = "select * from users where id = $id";
$query = mysqli_query($con, $sql);
//get row
$row = mysqli_fetch_assoc($query);
?>
<?php

if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $mobileno = $_POST['mobileno'];
    $id = $_SESSION['id'];
    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', password = '$password', address = '$address', mobileno = '$mobileno'
                      WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script> alert('Update Successfully !!');</script>";
        echo "<script> window.location='index.php';</script>";
    } else {
        echo "<script> alert('Update Unsuccessfully !!');</script>";
        echo "<script> window.location='editprofile.php';</script>";
    }
}
?>


<!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Edit Profile</li>
      </ol>
      <h2>Edit Profile</h2>

    </div>
  </section><!-- End Breadcrumbs -->


<section class="px-4 mt-0">
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 mt-3">
                <form action="" method="POST">
                    <div class="logo mr-auto">
                        <h1 class="h2 mb-3 font-weight-normal text-dark text-center">Edit Profile</h1>      
                    </div>
                    <div class="form-group">
                        <input type="text" name="id" class="form-control " placeholder="Id" value="<?php echo $row['id'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username'] ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password'] ?>" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="3" cols="40" name="address" class="form-control" placeholder="Address" required><?php echo $row['address'] ?></textarea>
                    </div>
                    <div class="form-group">

                        <input type="text" name="mobileno" class="form-control" placeholder="Phone" value="<?php echo $row['mobileno'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-lg btn-primary btn-block" name="edit" type="submit" value="Update" />
                    </div>
                    <div class="form-group text-center">
                        <a href="index.php">&#8920; Back</a>
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