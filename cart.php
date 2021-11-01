<?php

session_start();

require "connection.php";



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
                                <div class="card shadow mb-3" style="max-width: 700px;">
                                    <div class="row g-0">
                                        <div class="col-md-3 d-block d-md-none d-lg-none">
                                            <div class="card-body bg-dark opacity-50">
                                                <a href="#"> <i class="bi bi-x-lg text-light" style="padding-left: 400px;"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="resourses/product/1.JPEG" class="img-fluid rounded-start" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-lg-block d-none">
                                            <div class="card-body">
                                                <a href="#"> <i class="bi bi-x-lg text-dark" style="padding-left: 120px;"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-5 col-12" style="background-color: rgb(218, 216, 213);">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mt-2">
                                <div class="col-12 p-5">
                                    <h1 style="color: rgb(216, 153, 37);">Total Summary</h1>
                                </div>
                                <hr class="border border-2 border-dark">
                                <div class="col-6">
                                    <p class="fs-5">Items(1)</p>
                                </div>
                                <div class="offset-2 col-3">
                                    <p class="fs-5">Rs.84,000.00</p>
                                </div>
                                <div class="col-6 mt-2">
                                    <span class="fs-5">Shipping</span>
                                </div>
                                <div class="offset-2 col-3 mt-2">
                                    <p class="fs-5">Rs.200.00</p>
                                </div>
                                <hr class="border border-2 border-dark">
                                <div class="col-6 mt-2">
                                    <span class="fw-bold fs-5">Total Cost :</span>
                                </div>
                                <div class="offset-2 col-3 mt-2">
                                    <p class="fs-5">Rs.84,000.00</p>
                                </div>
                                <div class="col-12 mt-2 button1 text-center" style="cursor: pointer;">
                                    <span class="fs-3">CHECKOUT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                    } else {
            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="offset-lg-5 col-lg-6 offset-4 col-5"><i class="bi bi-bag-plus" style="font-size: 150px;"></i></div>
                        <div class="col-12 text-center">
                            <label class="form-label fs-1 fw-bolder">You Have no Items in Your Cart.</label>
                        </div>
                        <div class="offset-2 offset-lg-4 col-10 col-lg-4 d-grid mb-4">
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
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>


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