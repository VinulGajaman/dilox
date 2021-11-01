<?php

session_start();



?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>


<body>

    <div class="container justify-content-center">

        <div class="row r1 g-0 mt-5 mb-4">
            <div class="col-lg-5 d-lg-block d-none">
                <img src="resourses/index.jpg" class="img-fluid login_img" alt="" style="background-size: contain;" />
            </div>
            <!-- <div class="col-lg-5 d-lg-none d-block">
                <img src="resourses/index_small.jpg" class="img-fluid login_img" alt="" style="background-size: contain;" />
            </div> -->
            <div class="col-lg-7 text-center mt-4">
                <div class="row">
                    <div class="col-12 d-lg-block">
                        <h1 class="animate__animated animate__fadeIn animate__infinite infinite title1" style="font-size: 5rem;">Dilox Clothing</h1>
                    </div>
                </div>

                <div class="row p-3 pb-3">
                    <div class="col-12 g-5">
                        <h3>Sign In to your Account</h3>
                    </div>
                    <p id="msg2" class="text-danger"></p>

                    <?php

                    $e = "";
                    $p = "";

                    if (isset($_COOKIE["e"])) {
                        $e = $_COOKIE["e"];
                    }

                    if (isset($_COOKIE["p"])) {
                        $p = $_COOKIE["p"];
                    }

                    ?>

                    <div class="offset-1 col-10 mt-4 rounded rounded-2 ">
                        <input type="text" class="form-control border border-secondary" value="<?php echo $e; ?>" placeholder="Email" id="e" />
                    </div>

                    <div class="col-10 mt-4 offset-1 col-lg-5 d-grid">
                        <a class="btn btn-primary" onclick="adminVerification();">Send verification code to login</a>
                    </div>

                    <div class="offset-lg-0 offset-1 col-10 mt-4 col-lg-5 d-grid">
                        <a href="index.php" class="btn btn-dark">Back to users login</a>
                    </div>

                </div>

            </div>

            <!-- footer -->
            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy; 2021 Dilox.lk ALL Rights Reserved</p>
            </div>
            <!-- footer -->
        </div>


    </div>

    <!-- model -->

    <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="text-danger fw-bold" id="msg"></label>
                    <label for="" class="form-label">Enter the Verification Code you got by an Email</label>
                    <input type="text" class="form-control" id="vc" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <!-- model -->





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>


</body>

</html>