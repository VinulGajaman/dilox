<?php

session_start();
if (!isset($_SESSION["u"])) {



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
                            <h1 class="animate__animated animate__fadeIn animate__infinite infinite title1" style="font-size: 3.5rem;">WELCOME to Dilox</h1>
                        </div>
                        <div class="row p-3 pb-5" id="signUpBox">
                            <div class="col-12 g-5">
                                <h3>Create New Account</h3>
                            </div>
                            <p id="msg" class="text-danger"></p>

                            <div class="offset-1 col-5 mt-4 rounded rounded-2 ">
                                <input type="text" class="form-control border border-secondary" placeholder="First Name" id="fname" />
                            </div>
                            <div class="col-5 mt-4 rounded rounded-2">
                                <input type="text" class="form-control border border-secondary" placeholder="Last Name" id="lname" />
                            </div>
                            <div class=" offset-1 col-10 mt-4 rounded rounded-2">
                                <input type="email" class="form-control border border-secondary" placeholder="Email" id="email" />
                            </div>
                            <div class=" offset-1 col-10 mt-4 rounded rounded-2">
                                <input type="password" class="form-control border border-secondary" placeholder="Password" id="password" />
                            </div>
                            <div class="offset-1 col-5 mt-4 rounded rounded-2">
                                <input type="text" class="form-control border border-secondary" placeholder="Mobile" id="mobile" />
                            </div>
                            <div class="col-5 mt-4 rounded rounded-2">
                                <select class="form-select border border-secondary" id="gender">
                                    <?php

                                    require "connection.php";

                                    $r = Database::search("SELECT * FROM `gender`;");
                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-10 mt-4 offset-1 col-lg-5 d-grid">
                                <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="offset-lg-0 offset-1 col-10 mt-4 col-lg-5 d-grid">
                                <button class="btn btn-dark" onclick="changeView();">Already have an account? Sign In</button>
                            </div>

                            <div class="col-3 offset-9 mt-5 fw-bold">
                                <a class="fs-6 text-primary" style="cursor: pointer;" href="home.php">Skip >></a>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 pb-5 d-none" id="signInBox">
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
                            <input type="text" class="form-control border border-secondary" value="<?php echo $e; ?>" placeholder="Email" id="email2" />
                        </div>
                        <div class="offset-1 col-10 mt-4 rounded rounded-2">
                            <input type="password" class="form-control border border-secondary" value="<?php echo $p; ?>" placeholder="Password" id="password2" />
                        </div>
                        <div class="offset-1 col-lg-3 col-4 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label">Remember Me</label>
                            </div>
                        </div>

                        <div class="col-lg-8 col-7 mt-4">
                            <a href="#" onclick="forgotPassword();">Forgot Password?</a>
                        </div>

                        <div class="col-10 mt-4 offset-1 col-lg-5 d-grid">
                            <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                        </div>

                        <div class="offset-lg-0 offset-1 col-10 mt-4 col-lg-5 d-grid">
                            <button class="btn btn-dark" onclick="changeView();">New to Dilox? Sign Up</button>
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

        <div class="modal fade" tabindex="-1" id="forgetPasswordModel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Password Reset</h5>
                       
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row g-3">
                            <div class="col-12">
                            <p id="msg3" class="text-danger"></p>
                            </div>
                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="password" id="np" />
                                    <button class="btn btn-outline-primary" type="button" id="npb" onclick="showPassword1();">Show</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Re-type Password</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="password" id="rnp" />
                                    <button class="btn btn-outline-primary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label"> Enter Verification Code Got By Email</label>
                                <input class="form-control" type="text" id="vc" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- model -->





        <script src="script.js"></script>
        <script src="bootstrap.js"></script>


    </body>

    </html>

<?php
} else {

?>

    <script src="script.js"></script>
    <script>
        window.location = "home.php";
    </script>

<?php

}

?>