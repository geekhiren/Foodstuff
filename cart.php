<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
include('database/dbconfig.php');
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Cart Product</li>
    </ol>
    <h2>Cart Product</h2>


</div>
</section><!-- End Breadcrumbs -->

<section class="px-4 mt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: <?php if (isset($_SESSION['showAlert'])) {
                    echo $_SESSION['showAlert'];
                } else {
                    echo 'none';
                }
                unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                unset($_SESSION['showAlert']); ?></strong>
            </div>

            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <td colspan="7">
                                <h4 class="text-center text-info m-0">Products in your cart</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>
                                <a href="action.php?clear=all" class="badge-danger badge p-1"  onclick="return confirm('Are you sure want to clear your cart ?');" ><i class="fa fa-trash" aria-hidden="true" ></i>&nbsp;&nbsp;Clear cart</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        $stmt = $con->prepare("SELECT * FROM cart");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while ($row = $result->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                <td><img src="admin/<?= $row['product_image'] ?>" width="50"></td>
                                <td><?= $row['product_name'] ?></td>

                                <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<?= number_format($row['product_price'], 2); ?></td>
                                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">

                                <td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px"></td>
                                <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<?= number_format($row['total_price'], 2); ?></td>
                                <td>
                                    <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php $grand_total += $row['total_price']; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="3">
                                <a href="menu.php" class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;&nbsp;Continue Shopping</a>
                            </td>
                            <td colspan="2"><b>Grand Total</b></td>
                            <td><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<?= number_format($grand_total, 2); ?>
                        </td>
                        <td>
                            <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? "" : "disabled"; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;&nbsp;Checkout</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</div>

</div>
</section>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".itemQty").on('change', function() {
            var $el = $(this).closest('tr');

            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            location.reload(true);
            $.ajax({
                url: 'action.php',
                method: 'post',
                cache: false,
                data: {
                    qty: qty,
                    pid: pid,
                    pprice: pprice
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });

        load_cart_item_number();

        function load_cart_item_number() {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {
                    cartItem: "cart_item"
                },
                success: function(response) {
                    $("#cart-item").html(response);
                }
            });
                // body...
            }

        });
    </script>

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>