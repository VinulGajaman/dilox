<?php

session_start();

require "connection.php";

if (!isset($_GET["c"])) {

    header("location:home.php");
} else {

    $id = $_GET["c"];
}

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


<body onload="filter(0,<?php echo $id; ?>,1);">

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>
            <hr class="border border-warning border-3">
            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-12 text-center">
                        <?php
                        $category = Database::search("SELECT * FROM `category` WHERE `id`='" . $id . "';");
                        $cdata = $category->fetch_assoc();
                        ?>
                        <p class="title2 animate__animated animate__pulse animate__infinite infinite" style="font-size: 55px;">All <?php echo $cdata["name"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <select class="col-6 form-control fw-bold" id="filter" onchange="filter(value,<?php echo $id; ?>,1);">
                            <option class="fw-bold" value="0">Filters</option>
                            <option class="fw-bold" value="1">Sort by Latest</option>
                            <option class="fw-bold" value="2">Sort by price: Low to High</option>
                            <option class="fw-bold" value="3">Sort by price: High to Low</option>
                        </select>
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