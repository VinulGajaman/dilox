<?php

session_start();

require "connection.php";



?>

<!DOCTYPE html>

<html>


<head>


    <title>Dilox| Home</title>

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
            <!-- header -->
            <?php

            require "header.php";
            ?>
            <!-- header -->
            <hr class="border border-warning border-2">

            <div class="col-12 mb-2 mt-0">
                <div class="row">
                    <!-- <div class="col-lg-5">
                        <img src="resourses/home_img/1.jpg" height="800px" class=" p-0" />
                    </div>
                    <div class="col-lg-7">
                        <img src="resourses/home_img/6.jpg" height="400px" class=" p-0" />

                        <img src="resourses/home_img/3.jpg" height="400px" class=" p-0" />


                    </div> -->
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resourses/carosel/1.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resourses/carosel/2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resourses/carosel/3.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resourses/carosel/4.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border border-warning border-3 d-lg-block d-none mt-4">

            <!-- product -->
            <div class="col-12 py-2 mb-4">
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <h2 class="fw-bold title2 animate__animated animate__pulse animate__infinite infinite">New Products</h2>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/home_img/card.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="label1 badge bg-danger">New</div>
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

                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/home_img/card.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="label1 badge bg-danger">New</div>
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
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/home_img/card3.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="label1 badge bg-danger">New</div>
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
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/home_img/card2.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="label1 badge bg-danger">New</div>
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
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/home_img/card.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="label1 badge bg-danger">New</div>
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
                </div>
            </div>

            <hr class="border border-warning border-3 d-lg-block d-none mt-2">

            <div class="col-12 mb-4 mt-3">
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <h2 class="fw-bold title2 animate__animated animate__pulse animate__infinite infinite">Featured Products</h2>
                    </div>
                    <div class="col-12 text-center">
                        <div class="row">
                            <div class="col-8 offset-2 d-grid">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <?php
                                    $rs = Database::search("SELECT * FROM `category`;");
                                    $n = $rs->num_rows;

                                    for ($i = 0; $i < $n; $i++) {

                                        $category = $rs->fetch_assoc();
                                    ?>
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio<?php echo $i; ?>" autocomplete="off" id="category<?php echo $category["id"]; ?>" <?php if($i==0){ echo "checked"; }?> >
                                        <label class="btn btn-outline-dark" for="btnradio<?php echo $i; ?>"><?php echo $category["name"]; ?></label>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row justify-content-center">
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/product/1.JPEG" class="card-img-top" />
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                                    <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                                </div>
                            </div>
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/product/2.JPEG" class="card-img-top" />
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                                    <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                                </div>
                            </div>
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/product/3.JPEG" class="card-img-top" />
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                                    <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                                </div>
                            </div>
                            <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                <div class="inner">
                                    <img src="resourses/product/4.JPEG" class="card-img-top" />
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-basket2-fill"></i></a>
                                    <a href="#" class="btn btn-outline-danger "><i class="bi bi-heart-fill"></i></a>
                                </div>
                            </div>
                            <div class="col-3 col-lg-2 offset-9">
                                <a href="seeCategory.php" class="btn btn-outline-dark" style="font-size: 15px;">See All...</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <img src="resourses/carosel/4.png" class="img-fluid" />
                <!-- <h1 class="head1">Epic Daily Deals</h1>
                <h2 >Shop Early, Save Now</h2> -->
            </div>
            <div class="col-12 mt-3 mb-2" style="background-color: rgb(231, 226, 226);">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 text-center">
                        <img src="resourses/home_img/chat.svg" height="100px" />
                        <h1>Сonsultation</h1>
                        <p>Our team of sales managers and specialists will be happy to help you find the right products and offers.</p>
                    </div>
                    <div class="col-lg-4 col-12 text-center">
                        <img src="resourses/home_img/trans.svg" height="100px" />
                        <h1>Shipping & Payments</h1>
                        <p>We accept payments through online payment systems, credit cards and bank transfers.</p>
                    </div>
                    <div class="col-lg-4 col-12 text-center">
                        <img src="resourses/home_img/msg.svg" height="100px" />
                        <h1>Newsletter</h1>
                        <p>Be the first to know about upcoming sales, new collections and special offers.</p>
                    </div>
                </div>
            </div>

            <!-- product -->
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