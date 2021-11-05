<?php

session_start();

require "connection.php";

$total = "0";
$subtotal = "0";
$shipping = "0";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Cart</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<?php


if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];
?>

    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-lg-7 col-12 mt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="text-dark"><i class="bi bi-basket"></i> | YOUR SHOPPING CART</h1>
                        </div>
                    </div>
                    <hr class="border border-warning border-2">
                    <?php

                    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $umail . "';");
                    $cn = $cartrs->num_rows;

                    if ($cn !== 0) {
                    ?>
                        <div class="row mt-3">
                            <div class="offset-lg-1 col-lg-10 col-12">
                                <?php
                                for ($i = 0; $i < $cn; $i++) {

                                    $cr = $cartrs->fetch_assoc();
                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "' ;");
                                    $pr = $productrs->fetch_assoc();

                                    $total = $total + ($pr["price"] * $cr["qty"]);

                                    if ($i == 0) {
                                        $shipping = $pr["delivery_fee"];
                                    } else {

                                        $shipping = $shipping + $pr["delivery_fee"]/2;
                                    }
                                    $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pr["id"] . "';");
                                    $imd = $imagers->fetch_assoc();
                                ?>

                                    <div class="card shadow mb-3" style="max-width: 700px;">
                                        <div class="row g-0">
                                            <div class="col-md-3 d-block d-md-none d-lg-none">
                                                <div class="card-body">
                                                    <a onclick="deleteModelPop(<?php echo $pr['id']; ?>);" class="d-flex text-end float-end"> <i class="bi bi-x-lg text-dark fs-5"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="<?php echo $imd["code"]; ?>" class="img-fluid rounded-start" data-bs-toggle="popover" title="PRODUCT DETAILS" data-bs-content="<?php echo $pr["description"]; ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bolder fs-5"><?php echo $pr["title"]; ?></h5>
                                                    <hr>
                                                    <span class="card-text fw-bold">COLOUR :</span>&nbsp;<span class="text-secondary fw-bold"><?php echo $cr["color"]; ?></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="card-text fw-bold">SIZE :</span>&nbsp;<span class="text-secondary fw-bold"><?php echo $cr["size"]; ?></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="card-text fw-bold">QTY :</span>&nbsp;<span class="text-secondary fw-bold"><?php echo $cr["qty"]; ?></span>
                                                    <hr>
                                                    <span class="card-text fw-bold">Price :</span>&nbsp;<span class="text-danger fw-bolder">Rs. <?php echo $pr["price"]; ?> .00 /=</span>

                                                    <hr>
                                                    <span class="fw-bolder text-secondary">Requested Total <i class="bi bi-info-circle"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span class="fw-bold text-dark">Rs. <?php echo ($pr["price"] * $cr["qty"]); ?>.00 /=</span>
                                                    <br>
                                                    <a href="singleProductView.php?id=<?php echo $pr["id"]; ?>" class="text-primary fw-bold float-start">View Product >></a>
                                                </div>
                                            </div>


                                            <div class="col-md-3 d-lg-block d-none">
                                                <div class="card-body">
                                                    <a onclick="deleteModelPop(<?php echo $pr['id']; ?>);" class="d-flex text-end float-end"> <i class="bi bi-x-lg text-dark"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Delete model -->
                                    <div class="modal" tabindex="-1" id="deleteCart<?php echo $pr["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are You Sure Want to Remove This Product From Cart ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" onclick="deleteFromCart(<?php echo $cr['id']; ?>,<?php echo $pr['id']; ?>);">Remove</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- model -->
                                <?php
                                }
                                ?>
                            </div>
                            <!-- alert model -->
                            <div class="modal" tabindex="-1" id="paydismiss">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p id="alert3"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- model -->
                            <!-- success model -->
                            <div class="modal" tabindex="-1" id="paydismiss">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p id="alert3"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="goToProfile();">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- model -->

                        </div>
                </div>
                <div class="col-lg-5 col-12" style="background-color: rgb(226, 225, 223);">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mt-2">
                                <div class="col-12 p-5">
                                    <h1 style="color: rgb(216, 153, 37);">Total Summary</h1>
                                </div>
                                <hr class="border border-2 border-dark">
                                <div class="col-5 col-lg-6">
                                    <p class="fs-5 fw-bolder">Items <span class="text-secondary fw-bolder">(<?php echo $cn; ?>)</span></p>
                                </div>
                                <div class="offset-2 col-5 col-lg-4">
                                    <p class="fs-5 fw-bolder">Rs. <?php echo $total; ?>.00 /=</p>
                                </div>
                                <div class="col-5 col-lg-6 mt-2">
                                    <span class="fs-5 fw-bolder">Shipping</span>
                                </div>
                                <div class="offset-2 col-5 col-lg-4 mt-2">
                                    <p class="fs-5 fw-bolder">Rs. <?php echo $shipping; ?>.00 /=</p>
                                </div>
                                <hr class="border border-2 border-dark">
                                <div class="col-5 col-lg-6 mt-2">
                                    <span class="fw-bold fs-4">Total Cost :</span>
                                </div>
                                <div class="offset-2 col-5 col-lg-4 mt-2">
                                    <p class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?>.00 /=</p>
                                </div>
                                <div class="col-12 mt-2 button1 text-center" style="cursor: pointer;" onclick="payNow();">
                                    <span class="fs-3">CHECKOUT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                    } else {
            ?>
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center"><i class="bi bi-bag-plus" style="font-size: 150px;"></i></div>
                    <div class="col-12 text-center">
                        <label class="form-label fs-1 fw-bolder">You Have no Items in Your Cart.</label>
                    </div>
                    <div class="col-12 text-center mb-4">
                        <a href="home.php" class="btn button2 border border-warning border-3 rounded-2 rounded">Start Shopping</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
                    }

    ?>

    <?php
    require "footer.php";
    ?>

    </div>


    <script src="script.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script type="text/javascript">
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>


    </body>

</html>
<?php
} else {

?>




    <body onload="GotoIndex();">

        <!-- model -->
        <div class="modal" tabindex="-1" id="alert">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                    </div>
                    <div class="modal-body">
                        <p>Please You Have to Sign In First.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="index();">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>


<?php
}

?>