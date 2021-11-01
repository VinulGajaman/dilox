<?php

session_start();

require "connection.php";



?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />



</head>

<body>
    <?php


    // if (isset($_GET["id"])) {

    //     $pid = $_GET["id"];

    //     $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $pid . "' ;");
    //     $pn = $productrs->num_rows;

    //     if ($pn == 1) {
    //         $pd = $productrs->fetch_assoc();
    //     }
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
            require "header.php";
            ?>

            <div class="col-12">
                <div class="row">
                    <div class="offset-lg-1 col-lg-6 col-12">
                        <p class="title1" style="font-size: 75px;">Summer Top</p>
                    </div>
                </div>
            </div>
            <hr class="border border-warning border-3 col-lg-7 mt-0">
            <div class="col-lg-7 col-12 mt-4">
                <div class="row mb-3">
                    <div class="offset-lg-2 offset-1 col-lg-5 col-10">
                        <div class="align-items-center border border-1 p-4">
                            <div style="background-image: url(resourses/home_img/card.jpg); background-repeat:no-repeat; background-size: contain; height: 492px;" id="mainImg"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2 d-none d-lg-block">
                        <ul>
                            <?php

                            // $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ;");
                            // $in = $imagesrs->num_rows;

                            // $img1;



                            // for ($x = 0; $x < $in; $x++) {

                            //     $d = $imagesrs->fetch_assoc();



                            //     $img1 = $d["code"];

                            // 
                            ?>
                            <!-- <li class="d-flex flex-column justify-content-center align-items-center border border-1 inner">
                                        <img src="resourses/home_img/card.jpg" height="164px" class="mt-1 mb-1" id="pimg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?> );" />
                                    </li> -->


                            <?php

                            // }
                            ?>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="164px" class="mt-1 mb-1" />
                            </li>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="164px" class="mt-1 mb-1" />
                            </li>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="164px" class="mt-1 mb-1" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2 d-block d-lg-none">
                        <ul>
                            <?php

                            // $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ;");
                            // $in = $imagesrs->num_rows;

                            // $img1;



                            // for ($x = 0; $x < $in; $x++) {

                            //     $d = $imagesrs->fetch_assoc();



                            //     $img1 = $d["code"];

                            // 
                            ?>
                            <!-- <li class="d-flex flex-column justify-content-center align-items-center border border-1 inner">
                                        <img src="resourses/home_img/card.jpg" height="200px" class="mt-1 mb-1" id="pimg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?> );" />
                                    </li> -->


                            <?php

                            // }
                            ?>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="200px" class="mt-1 mb-1" />
                            </li>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="200px" class="mt-1 mb-1" />
                            </li>
                            <li class="justify-content-center align-items-center border border-1 inner">
                                <img src="resourses/home_img/card.jpg" height="200px" class="mt-1 mb-1" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-12 border border-end border-2 pt-1">
                <div class="row">
                    <div class="col-12">
                        <p class="badge bg-secondary"><img src="resourses/hanger.png" class="text-light"> Tops </p>
                    </div>
                    <hr class="border border-warning border-3 col-4 mt-0">
                    <div class="col-12">
                        <p class="title1" style="font-size:55px;">Summer Top</p>
                    </div>
                    <hr class="border border-warning border-1">
                    <div class="col-12 mt-2">
                        <label class="form-label fs-5">Price :</label> &nbsp;
                        <span class="text-danger fs-5">Rs. 2800.00 /=</span>
                    </div>
                    <div class="col-12 mt-2">
                        <label class="form-label text-secondary fs-6">COLOURS :</label>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-dark" for="btnradio1">Red</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-dark" for="btnradio2">Blue</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-dark" for="btnradio3">Green</label>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <label class="form-label text-dark">Select Size :</label>
                        <select class="form-select" id="">
                            <option value="">S</option>
                            <option value="">M</option>
                            <option value="">L</option>
                            <option value="">XL</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="text-secondary">AVAILABLITY :</label>
                        <span class="text-warning">In Stock</span>
                    </div>
                    <hr class="border border-warning border-3 mt-0">
                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Approved Payment Methods</label>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="offset-1 col-2 pm1"></div>
                                    <div class="col-2 pm2"></div>
                                    <div class="col-2 pm3"></div>
                                    <div class="col-2 pm4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-warning border-3 mt-0">
                    <div class="col-3 mb-3">
                        <input type="number" min="1" class="form-control" placeholder="Qty" />
                    </div>
                    <div class="col-6 mb-3 d-grid">
                        <button class="button1 fw-bold">Add to Cart</button>
                    </div>
                    <!-- realted items -->
                    <div class="offset-lg-7 col-lg-5 col-12 mb-3">
                        <a class="fw-bold" style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">More From This Brand >></a>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel" class="fw-bold">More From This Brand >></h5>

                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                            </div>
                            <div class="offcanvas-body" style="overflow-y: scroll;">

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
                    <!-- realted items -->
                </div>
            </div>
            <hr class="border border-warning border-3 mt-0">
            <div class="col-12 mt-3">
                <h2 class="title1 " style="font-size: 50px;">Feedbacks....</h2>
            </div>
            <div class="col-12 mb-3">
                <div class="row g-1">
                    <?php

                    $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='16' ;");
                    $feed = $feedbackrs->num_rows;

                    if ($feed == 0) {
                    ?>

                        <div class="col-12 text-center">
                            <label class="form-label fs-3 text-black-50">There are no Feedbacks to view.</label>
                        </div>

                        <?php
                    } else {


                        for ($a = 0; $a < $feed; $a++) {
                            $feedrow = $feedbackrs->fetch_assoc();
                        ?>
                            <div class="col-12 col-lg-3 border border-1 border-secondary rounded p-1">
                                <div class="row">
                                    <?php

                                    $profileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ;");
                                    $pn = $profileImg->num_rows;

                                    if ($pn == 1) {
                                        $p = $profileImg->fetch_assoc();
                                    ?>
                                        <div class="col-3">
                                            <img src="resourses/home_img/vinul.png" width="80" class="rounded-circle">


                                        <?php
                                    } else {

                                        ?>

                                            <img src="resourses/home_img/user.svg" width="80" class="rounded-circle">
                                        <?php

                                    }

                                    $user = Database::search("SELECT * FROM `user` WHERE `email` ='" . $feedrow["user_email"] . "' ;");
                                    $userData = $user->fetch_assoc();

                                        ?>
                                        </div>
                                        <div class="col-7">
                                            <span class="fw-bold text-secondary"><?php echo $userData["fname"] . " " . $userData["lname"]; ?></span>
                                            <br />
                                            <p class=" fs-5 text-dark fw-bold"><?php echo $feedrow["feed"]; ?></p>

                                        </div>
                                        <div class="col-12 text-end">
                                            <span class="text-black-50"><?php echo $feedrow["date"]; ?></span>
                                        </div>
                                </div>
                            </div>

                    <?php
                        }
                    }

                    ?>

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
// } 
?>