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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body onload="">
    <?php


    if (isset($_GET["id"])) {

        $pid = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $pid . "' ;");
        $pn = $productrs->num_rows;

        if ($pn == 1) {
            $pd = $productrs->fetch_assoc();
            $pid = $pd["id"];
        }

    ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-6 col-12 mt-3">
                            <p class="title1" style="font-size: 50px;"><?php echo $pd["title"]; ?></p>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-3 col-lg-7 mt-0">
                <div class="col-lg-7 col-12 mt-4">
                    <div class="row mb-3">
                        <div class="offset-lg-2 offset-1 col-lg-5 col-10">
                            <?php

                            $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ;");
                            $in = $imagesrs->num_rows;
                            $dr = $imagesrs->fetch_assoc();

                            $img2 = $dr["code"];
                            ?>

                            <div class="align-items-center border border-1 p-4">
                                <div style="background-image:url(<?php echo $img2; ?>); background-repeat:no-repeat; background-size: contain; height: 450px;" id="mainImg"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 order-lg-1 order-2">
                            <ul>
                                <?php

                                $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ;");
                                $in = $imagesrs->num_rows;
                                $img1;

                                for ($x = 0; $x < $in; $x++) {

                                    $d = $imagesrs->fetch_assoc();



                                    $img1 = $d["code"];


                                ?>
                                    <li class="justify-content-center align-items-center border border-1 inner">
                                        <img src="<?php echo $img1; ?>" height="164px" class="mt-1 mb-1" id="pimg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?> );" style="object-fit:cover" />
                                    </li>


                                <?php

                                }
                                ?>

                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-12 border border-end border-2 pt-1">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $c = Database::search("SELECT * FROM `category` WHERE `id`='" . $pd["category_id"] . "';");
                            $cdata = $c->fetch_assoc();
                            ?>
                            <p class="badge bg-secondary"><img src="resourses/hanger.png" class="text-light"> <?php echo $cdata["name"]; ?> </p>
                        </div>
                        <hr class="border border-warning border-3 col-4 mt-0">
                        <div class="col-12">
                            <p class="title2" style="font-size:20px;"><?php echo $pd["title"]; ?></p>
                        </div>
                        <hr class="border border-warning border-1">

                        <!--//////////////////////////// from/////////////////////////// -->

                        <form id="cartForm">

                            <div class="col-12 mt-2">
                                <label class="form-label fs-5">Price :</label> &nbsp;
                                <span class="text-danger fs-5">Rs. <?php echo $pd["price"]; ?>.00 /=</span>
                            </div>

                            <div class="col-12 mt-2">
                                <label class="form-label text-secondary fs-6">COLOURS :</label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <?php
                                    $type = Database::search("SELECT DISTINCT `color` FROM `types` WHERE `product_id`='" . $pid . "';");
                                    $typenum = $type->num_rows;
                                    for ($i = 0; $i < $typenum; $i++) {
                                        $typedata = $type->fetch_assoc();
                                    ?>

                                        <input type="radio" class="btn-check" value="<?php echo $typedata["color"]; ?>" name="radioCart" id="btnradio<?php echo $i; ?>" autocomplete="off" onclick="loadSize('<?php echo $typedata['color']; ?>',<?php echo $pid; ?>);" required>
                                        <label class="btn btn-outline-dark" for="btnradio<?php echo $i; ?>"><?php echo $typedata["color"]; ?></label>
                                    <?php
                                    }
                                    ?>
                                    <input type="hidden" value="<?php echo $pid; ?>" id="cartProduct">
                                </div>
                            </div>
                            <!-- ////////////////////////// -->

                            <div class="col-12 mt-2" id="sizeLoad">

                            </div>
                            <div class="col-12 mt-3">
                                <label class="text-secondary">AVAILABLITY :</label>
                                <span class="text-danger" id="changeStock"></span>
                            </div>
                            <!-- ////////////////////////// -->
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
                            <div class="row">
                                <div class="col-3 mb-3">
                                    <input type="number" min="1" max="" id="pqty" class="form-control" placeholder="Qty" required />
                                </div>
                                <div class="col-5 mb-3 d-grid">
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                    ?>
                                        <button type="sumbit" class="button1 fw-bold" id="addToCart">Add to Cart</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="button1 fw-bold" onclick="model();">Add to Cart</button>
                                    <?php
                                    }
                                    ?>

                                </div>

                                <div class="col-3 mb-3">
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                    ?>
                                        <?php
                                        $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "';");
                                        $watchnum = $watchlist->num_rows;
                                        if ($watchnum == 1) {
                                            $heart = "bi-heart-fill";
                                        } else {
                                            $heart = "bi-heart";
                                        }
                                        ?>
                                        <a class="btn btn-outline-danger" onclick="addToWatchlist(<?php echo $pid; ?>);"><i class="hart<?php echo $pid; ?> bi <?php echo  $heart; ?>"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-outline-danger"><i class="bi bi-heart" onclick="model();"></i></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                         <!--//////////////////////////// from/////////////////////////// -->
                    </div>
                </div>
                <hr class="border border-warning border-3 mt-0">
                <div class="offset-lg-1 col-lg-10 col-12 p-3">
                    <label class="form-label fw-bold fs-5 text-dark">Product Details :</label>
                    <textarea class="form-control fs-5" cols="100" rows="10" name="desc" required><?php echo $pd["description"]; ?></textarea>
                </div>
                <!-- realted items -->
                <div class="offset-lg-10 col-lg-2 col-12 mt-3 mb-3">
                    <a class="fw-bold" style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">More From This Category >></a>


                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel" class="fw-bold">More From This Category >></h5>

                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                        </div>
                        <div class="offcanvas-body" style="overflow-y: scroll;">

                            <div class="row justify-content-center">
                                <?php
                                $c = Database::search("SELECT * FROM `category` WHERE `id`='" . $pd["category_id"] . "';");
                                $cdata = $c->fetch_assoc();
                                $catid = $cdata["id"];

                                $related = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $catid . "' LIMIT 4;");
                                $realtednum = $related->num_rows;

                                while ($relateddata = $related->fetch_assoc()) {
                                ?>

                                    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
                                        <div class="inner">
                                            <?php
                                            $reltaedImg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $relateddata["id"] . "';");
                                            $relatedImgData = $reltaedImg->fetch_assoc();

                                            ?>
                                            <img src="<?php echo $relatedImgData["code"]; ?>" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $relateddata["title"]; ?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item text-danger fw-bold">Rs. <?php echo $relateddata["price"]; ?> .00 /=</li>
                                            <li class="list-group-item">
                                                <a href="singleProductView.php?id=<?php echo $relateddata["id"]; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>

                                                <?php
                                                if (isset($_SESSION["u"])) {
                                                ?>
                                                    <?php
                                                    $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $relateddata["id"] . "';");
                                                    $watchnum = $watchlist->num_rows;
                                                    if ($watchnum == 1) {
                                                        $heart = "bi-heart-fill";
                                                    } else {
                                                        $heart = "bi-heart";
                                                    }
                                                    ?>
                                                    <a class="btn btn-outline-danger" onclick="addToWatchlist(<?php echo $relateddata['id']; ?>);"><i class="hart<?php echo $relateddata["id"]; ?> bi <?php echo  $heart; ?>"></i></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-outline-danger" onclick="model();"><i class="bi bi-heart"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                        <!-- <div class="card-body">
                                            <a href="singleProductView.php?id=<?php echo $relateddata["id"]; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                                        </div> -->
                                    </div>

                                <?php

                                }
                                ?>
                                <a href="seeCategory.php?c=<?php echo $catid; ?>" class="fw-bold text-primary">See More>>></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- realted items -->

                <hr class="border border-warning border-3 mt-0">
                <div class="col-12 mt-3">
                    <h2 class="title1 " style="font-size: 50px;">Feedbacks....</h2>
                </div>
                <div class="col-12 mb-3">
                    <div class="row">
                        <?php

                        $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "' ;");
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
                                <div class="col-12 col-lg-3 border border-1 border-secondary rounded">
                                    <div class="row">
                                        <div class="col-3">
                                            <?php

                                            $profileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ;");
                                            $pn = $profileImg->num_rows;

                                            if ($pn == 1) {
                                                $p = $profileImg->fetch_assoc();
                                            ?>

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
        <?php
    } else {
        ?>
            <script>
                window.location = "home.php";
            </script>
        <?php
    }

        ?>
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
        </div>


        <!--Add to Cart model -->
        <div class="modal" tabindex="-1" id="success">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                    </div>
                    <div class="modal-body">
                        <p class="fw-bold text-danger" id="msg"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->


        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>


</body>

</html>
<?php
// } 
?>