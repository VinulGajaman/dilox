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


</html>


<body onload="collection(1);">

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>
            <hr class="border border-warning border-3">
            <!-- <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-12 ">
                        <img src="resourses/home_img/wp.jpg" class="img-fluid" />
                    </div>
                </div>
            </div> -->
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <div class="input-group rounded-2 rounded">
                            <input type="text" class="form-control border-secondary border" id="search" onkeyup="collection(1);"/>
                            <!-- <button class="btn btn-outline-dark col-3 fw-bold" onclick="">Search</button> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="btn-group col-12 align-content-end" role="group">
                            <?php
                            $rs = Database::search("SELECT * FROM `category`;");
                            $n = $rs->num_rows;
                            ?>
                            <select class="btn border border-secondary col-6 d-grid" id="select" onchange="collection(1);">
                                <option value="0">All Categories</option>
                                <?php
                                for ($x = 0; $x < $n; $x++) {
                                    $category = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select class="btn border border-secondary col-6" id="filter1" onchange="collection(1);">
                                <option value="0">Filters</option>
                                <option value="1">Sort by Latest</option>
                                <option value="2">Sort by price: Low to High</option>
                                <option value="3">Sort by price: High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border border-warning border-3">
            <div class="col-12 mb-3">
                <div class="row justify-content-center" id="loadProduct">

                </div>
            </div>
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
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>