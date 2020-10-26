<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><b>FoodStuff Dashboard</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="order.php">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reserved.php">Reserved Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact_fetch.php">Contact Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">User</a>
      </li>
      
    </ul>

    <div class="nav-item dropdown border form-inline my-1 my-lg-0">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../logout.php">Logout</a>
        </div>
</div>
    
    
    </form>
  </div>
</nav>