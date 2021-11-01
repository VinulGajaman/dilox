<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>


<head>


    <title>Dilox| Collection</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</html>
<?php
if (isset($_SESSION["u"])) {

    $uemail = $_SESSION["u"]["email"];
?>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                require "header.php";
                ?>
                <hr class="border border-warning border-3">
                <div class="col-12 mt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="text-dark"><i class="bi bi-currency-dollar"></i> | TRANSACTION HISTORY</h1>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-3 d-block d-lg-none">
                                        <div class="card-body bg-dark">
                                            <a href="#"> <i class="bi bi-x-lg text-light" style="padding-left: 400px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="resourses/product/1.JPEG" class="img-fluid rounded-start" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title title1" style="font-size: 35px;">Product Name</h5>
                                            <span class="card-text"><b> Order Id</b> : #00000000</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="card-text"><b>Price</b> : Rs. 1500.00</span>
                                            <p class="card-text mt-3 fs-5"><b>AMOUNT</b> : <label class="form-label text-danger"> Rs. 1800.00/=</label></p>
                                            <span class="card-text text-end"><small class="text-muted">2021-10-21 22:33:02</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-lg-block d-none">
                                        <div class="card-body">
                                            <a href="#"> <i class="bi bi-x-lg text-dark" style="padding-left: 120px;"></i></a>
                                        </div>
                                        <div class="card-body button1" style="margin-top: 110px;">
                                            <a href="#" class="text-dark fs-5 p-2"><i class="bi bi-info-square"></i> Feedback </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-block d-lg-none text-center">
                                        <div class="card-body button1">
                                            <a href="#" class="text-dark fs-5 p-2"><i class="bi bi-info-square"></i> Feedback </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-3 d-block d-lg-none">
                                        <div class="card-body bg-dark">
                                            <a href="#"> <i class="bi bi-x-lg text-light" style="padding-left: 400px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="resourses/product/1.JPEG" class="img-fluid rounded-start" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title title1" style="font-size: 35px;">Product Name</h5>
                                            <span class="card-text"><b> Order Id</b> : #00000000</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="card-text"><b>Price</b> : Rs. 1500.00</span>
                                            <p class="card-text mt-3 fs-5"><b>AMOUNT</b> : <label class="form-label text-danger"> Rs. 1800.00/=</label></p>
                                            <span class="card-text text-end"><small class="text-muted">2021-10-21 22:33:02</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-lg-block d-none">
                                        <div class="card-body">
                                            <a href="#"> <i class="bi bi-x-lg text-dark" style="padding-left: 120px;"></i></a>
                                        </div>
                                        <div class="card-body button1" style="margin-top: 110px;">
                                            <a href="#" class="text-dark fs-5 p-2"><i class="bi bi-info-square"></i></i> Feedback </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-block d-lg-none">
                                        <div class="card-body button1 text-center">
                                            <a href="#" class="text-dark fs-5 p-2 "><i class="bi bi-info-square"></i> Feedback </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

    <!-- model -->

<?php
}
?>