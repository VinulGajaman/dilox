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

    <body>
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
                            <input type="text" class="form-control border-secondary border" id="basic_Search_txt" placeholder="Search in Watchlist..." />
                            <button class="btn btn-outline-dark col-3 fw-bold">Search</button>
                        </div>
                    </div>

                    <div class="col-12 mb-3 mt-3">
                        <div class="row justify-content-center">
                            <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="card-body">
                                    <a href="#"> <i class="bi bi-x-lg text-dark"></i></a>
                                </div>
                                <div class="inner">
                                    <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="offset-7 btn btn-outline-secondary text-dark"><i class="bi bi-basket2-fill"></i></a>

                                </div>
                            </div>
                            <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="card-body">
                                    <a href="#"> <i class="bi bi-x-lg text-dark"></i></a>
                                </div>
                                <div class="inner">
                                    <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="offset-7 btn btn-outline-secondary text-dark"><i class="bi bi-basket2-fill"></i></a>

                                </div>
                            </div>
                            <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="card-body">
                                    <a href="#"> <i class="bi bi-x-lg text-dark"></i></a>
                                </div>
                                <div class="inner">
                                    <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="offset-7 btn btn-outline-secondary text-dark"><i class="bi bi-basket2-fill"></i></a>

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