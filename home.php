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


<body onload="selectCategory(1);">

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
                            <?php
                            $resultset = Database::search("SELECT DISTINCT product.id AS `pid`,`category_id`,`title`,`price` FROM `product` INNER JOIN `types` ON product.id = types.product_id WHERE `status_id`='1' AND `qty`>'0' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0 ;");
                            $nr = $resultset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resultset->fetch_assoc();

                                $img = Database::search("SELECT* FROM `images` WHERE `product_id`='" . $prod["pid"] . "';");
                                $imgd = $img->fetch_assoc();
                            ?>
                                <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                    <div class="inner" style="height:400px;">
                                        <img src="<?php echo $imgd["code"]; ?>" class="card-img-top" alt="..." style="object-fit:cover; height: 400px">
                                    </div>
                                    <div class="label1 badge bg-danger">New</div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold" style="font-size: 18px;"><?php echo $prod["title"]; ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <?php

                                                $type = Database::search("SELECT DISTINCT `color` FROM `types` WHERE `product_id`='" . $prod["pid"] . "';");
                                                $typenum = $type->num_rows;

                                                for ($i = 0; $i < $typenum; $i++) {
                                                    $typedata = $type->fetch_assoc();
                                                ?>


                                                    <label class="btn btn-outline-dark btn-sm" for="Pcolors<?php echo $i; ?>"><?php echo $typedata["color"]; ?></label>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li class="list-group-item"> <?php

                                                                        $size = Database::search("SELECT DISTINCT `size` FROM `types` WHERE `product_id`='" . $prod["pid"] . "';");
                                                                        $sizenum = $size->num_rows;

                                                                        while ($sizedata = $size->fetch_assoc()) {

                                                                        ?>

                                                <button class="btn btn-outline-secondary btn-sm text-dark"><?php echo $sizedata["size"]; ?></button>
                                            <?php
                                                                        }
                                            ?>
                                        </li>
                                        <li class="list-group-item text-danger fw-bold">Rs. <?php echo $prod["price"]; ?> .00 /=</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="singleProductView.php?id=<?php echo $prod["pid"]; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                        <?php
                                        if (isset($_SESSION["u"])) {
                                        ?>
                                            <?php
                                            $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $prod["pid"] . "';");
                                            $watchnum = $watchlist->num_rows;
                                            if ($watchnum == 1) {
                                                $heart = "bi-heart-fill";
                                            } else {
                                                $heart = "bi-heart";
                                            }
                                            ?>
                                            <a class="btn btn-outline-danger" onclick="addToWatchlist(<?php echo $prod['pid']; ?>);"><i class="hart<?php echo $prod["pid"]; ?> bi <?php echo  $heart; ?>"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="btn btn-outline-danger" onclick="model();"><i class="bi bi-heart"></i></a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>



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
                                        <input type="radio" class="btn-check" name="categoryP" id="categoryP<?php echo $i; ?>" autocomplete="off" id="category<?php echo $category["id"]; ?>" <?php if ($i == 0) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                } ?>>
                                        <label onclick="selectCategory(<?php echo $category['id']; ?>); " class="btn btn-outline-dark" for="categoryP<?php echo $i; ?>"><?php echo $category["name"]; ?></label>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row justify-content-center" id="load">

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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>