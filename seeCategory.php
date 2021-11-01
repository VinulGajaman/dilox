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


<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>
            <hr class="border border-warning border-3">
            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="title2 animate__animated animate__pulse animate__infinite infinite" style="font-size: 55px;">All Tops</p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <select class="col-6 form-control fw-bold" id="filter_Select">
                            <option class="fw-bold" value="0">Filters</option>
                            <option class="fw-bold" value="">Sort by Latest</option>
                            <option class="fw-bold" value="">Sort by price: Low to High</option>
                            <option class="fw-bold" value="">Sort by price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr class="border border-warning border-3">
            <div class="col-12 mb-3">
                <div class="row justify-content-center">
                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
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
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                            <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                        </div>
                    </div>

                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                        <div class="inner">
                            <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                            <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                        </div>
                    </div>
                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                        <div class="inner">
                            <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                            <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                        </div>
                    </div>
                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                        <div class="inner">
                            <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                            <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                        </div>
                    </div>
                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                        <div class="inner">
                            <img src="resourses/home_img/12.jpeg" class="card-img-top" alt="...">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                            <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
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