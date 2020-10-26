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
        <li>Menu</li>
    </ol>

    <h2>Menu</h2>
    

</div>
</section><!-- End Breadcrumbs -->

<section class="px-4 mt-0">
    <div class="container">
        <div id="message"></div>
        <div class="row mt-2 pb-3">
            <?php
            $stmt = $con->prepare("SELECT * FROM product");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) :

                ?>

                <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card-deck">
                        <div class="card p-2 border-secondary mb-2">
                            <img src="admin/<?= $row['product_image'] ?>" class="card-img-top" height="250">
                            <div class="card-body p-1">
                                <h4 class="card-title text-center text-info">
                                    <?= $row['product_name'] ?>
                                </h4>
                                <h5 class="card-text text-center text-danger">
                                    <i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<?= number_format($row['product_price'], 2) ?>/-
                                </h5>
                            </div>
                            <div class="card-footer p-1">
                                <form class="form-submit" action="">
                                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                    <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                    <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                                    <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                    <button class="btn btn-info btn-block addItemBtn "><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
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
        $(".addItemBtn").click(function(e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    pid: pid,
                    pname: pname,
                    pprice: pprice,
                    pimage: pimage,
                    pcode: pcode
                },
                success: function(response) {
                    $("#message").html(response);
                    window.scrollTo(0, 0);
                    load_cart_item_number();
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
        }

    });
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>