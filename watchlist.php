<?php

session_start();

require "connection.php";



?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Watchlist</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


</head>
<?php


if (isset($_SESSION["u"])) {

    $uemail = $_SESSION["u"]["email"];
?>

    <body onload="watchlistSearch(1);">
        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12 mt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="text-dark"><i class="bi bi-bookmark-heart"></i> | WATCHLIST</h1>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-2">
                <?php
                $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $uemail . "' ;");
                $wn = $watchlistrs->num_rows;

                if ($wn == 0) {

                ?>
                    <!-- without items -->

                    <div class="col-12 offset-lg-2 col-lg-9 mt-3">
                        <div class="row text-center">
                            <div class="col-12"><i class="bi bi-bookmark-plus" style="font-size: 150px;"></i></div>
                            <lable class="form-lable fs-1 mb-3 fw-bolder">You have no items in your watchlist</lable>
                        </div>
                    </div>

                    <!-- without items -->

                <?php


                } else {
                ?>
                    <div class="col-12 offset-lg-4 col-lg-4 mb-3 mb-lg-0">
                        <div class="input-group rounded-2 rounded">
                            <input type="text" class="form-control border-secondary border" id="search" placeholder="Search in Watchlist..." onkeyup="watchlistSearch(1);"/>
                            <!-- <button class="btn btn-outline-dark col-3 fw-bold" onclick="">Search</button> -->
                        </div>
                    </div>

                    <div class="col-12 mb-3 mt-3">
                        <div class="row justify-content-center" id="load" >
                            
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