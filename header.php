<!DOCTYPE html>

<html>


<head>


    <title>Dilox| Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


</html>


<body>

    <div class="col-12" style="background-color: rgb(248, 232, 200);">
        <div class="row">
            <div class="col-lg-3">
                <div class="header_logo">
                    <a href="home.php"><span>Dilox</span> Clothing.</a>
                </div>
            </div>
            <hr class="border border-warning border-2 d-lg-none d-block">
            <div class="col-lg-6">
                <nav class="header_menu d-lg-block d-none">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="collection.php">Collection</a></li>
                        <li><a href="watchlist.php">Watchlist</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="purshaceHistory.php">Puchase History</a></li>

                    </ul>
                </nav>
            </div>
            <div class=" offset-10 col-2 d-lg-none d-block">
                <div class="dropdown">
                    <button class=" button1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-list"></i>
                    </button>
                    <ul class="dropdown-menu form-control shadow" style="background-color:#f8e8c8;" aria-labelledby="dropdownMenuButton1">
                        <li class="p-2"><a href="home.php" class="text-dark fw-bold">Home</a></li>
                        <br>
                        <li class="p-2"><a href="collection.php" class="text-dark fw-bold">Collection</a></li>
                        <br>
                        <li class="p-2"><a href="watchlist.php" class="text-dark fw-bold">Watchlist</a></li>
                        <br>
                        <li class="p-2"><a href="cart.php" class="text-dark fw-bold">Cart</a></li>
                        <br>
                        <li class="p-2"><a href="profile.php" class="text-dark fw-bold">Profile</a></li>
                        <br>
                        <li class="p-2"><a href="purshaceHistory.php" class="text-dark fw-bold">Purchase histroy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="header_right">
                    <div class="header_right_auth">
                        <span class="text-start fs-5"><b>Welcome</b>

                            <?php
                            if (isset($_SESSION["u"])) {
                                $user = $_SESSION["u"];
                                echo $user["fname"];

                            ?>

                                |<span class="text-start fs-5" style="cursor: pointer;" onclick="signOut();"> Sign Out</span>



                            <?php

                            } else {

                            ?>
                                |<a href="index.php" class="text-warning fs-5" style="cursor: pointer;"> Sign In or Register</a>

                            <?php
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js">
    </script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>