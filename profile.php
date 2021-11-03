<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | User Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>


<body>

    <?php


    if (isset($_SESSION["u"])) {

    ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>
            </div>
        </div>

        <div class="container justify-content-center">

            <div class="row r1 g-0 mt-5 mb-4">
                <div class="col-12 text-center pt-3 d-lg-block">
                    <h2 class="title1" style="font-size: 4.5rem;">Profile Settings</h2>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column align-items-center text-center">

                        <?php

                        $profileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ;");
                        $pn = $profileImg->num_rows;

                        if ($pn == 1) {
                            $p = $profileImg->fetch_assoc();
                        ?>
                            <img src="<?php echo $p["code"]; ?>" class="rounded-circle mt-5 img-fluid" width="250px" id="proImg" />
                        <?php
                        } else {

                        ?>

                            <img src="resourses/home_img/user.svg" class="rounded-circle mt-5 img-fluid" width="250px" id="proImg">
                        <?php

                        }

                        ?>

                        <?php

                        $userall = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["u"]["email"] . "' ;");
                        $userdata = $userall->fetch_assoc();
                        ?>

                        <span class="fw-bold fs-4"><?php echo $userdata["fname"] . " " . $userdata["lname"]; ?></span>
                        <span class="text-secondary"><?php echo $userdata["email"]; ?></span>
                        <input class="d-none" type="file" id="profileimg" accept="image/*" />
                        <label class="button1 fw-bold mt-3" for="profileimg" onclick="changeProfileImg();">Update Profile Picture</label>


                    </div>
                </div>

                <div class="offset-lg-1 col-12 col-lg-11 text-center mt-1 p-lg-0 p-3">
                    <div class="row">

                        <div class="row p-3 pb-5">

                            <div class="row mt-2">
                                <div class="col-lg-4 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Fisrt Name</label>
                                    <input type="text" id="fname" class="form-control" placeholder="First Name" value="<?php echo $userdata["fname"]; ?>" />
                                </div>
                                <div class="col-lg-4 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Surname</label>
                                    <input type="text" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $userdata["lname"]; ?>" />
                                </div>

                                <div class="col-lg-4 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Mobile Number</label>
                                    <input type="text" id="mobile" class="form-control" placeholder="Enter Phone Number" value="<?php echo $userdata["mobile"]; ?>" />
                                </div>
                            </div>
                            <div class="row mt-lg-4 mt-2 mt-lg-0 mt-2">
                                <div class="col-lg-4 col-12">
                                    <label class="form-label fw-bold">Password</label>
                                    <input type="text" class="form-control" placeholder="Password" readonly value="<?php echo $_SESSION["u"]["password"]; ?>" />
                                </div>
                                <div class="col-lg-4 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter email id" value="<?php echo $_SESSION["u"]["email"]; ?>" readonly />
                                </div>
                                <div class="col-lg-4 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Registered Date & Time</label>
                                    <input type="text" class="form-control" placeholder="Registered Date" readonly value="<?php echo $_SESSION["u"]["register_date"]; ?>" />
                                </div>
                            </div>
                            <?php

                            $useremail = $_SESSION["u"]["email"];
                            $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $useremail . "' ;");
                            $n = $address->num_rows;


                            if ($n == 1) {

                                $d = $address->fetch_assoc();

                            ?>
                                <div class="row mt-lg-4 mt-2">
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Address Line 01</label>
                                        <input type="text" id="line1" class="form-control" placeholder="Enter Address Line 01" value="<?php echo $d["line1"]; ?>" />
                                    </div>
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Address Line 02</label>
                                        <input type="text" id="line2" class="form-control" placeholder="Enter Address Line 02" value="<?php echo $d["line2"]; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php

                                    $cityId = $d["city_id"];
                                    $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityId . "';");
                                    $c = $ucity->fetch_assoc();

                                    $districtId = $c["district_id"];
                                    $udist = Database::search("SELECT * FROM `district` WHERE `id`='" . $districtId . "';");
                                    $k = $udist->fetch_assoc();

                                    $provinceId = $k["province_id"];
                                    $uprovince = Database::search("SELECT * FROM `province` WHERE `id`='" . $provinceId . "';");
                                    $l = $uprovince->fetch_assoc();

                                    ?>
                                    <div class="col-lg-3 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Province</label>
                                        <select id="province" class="form-select">
                                            <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>
                                            <?php

                                            $provinces = Database::search("SELECT * FROM `province` WHERE `id` !='" . $l["id"] . "';");
                                            $pn = $provinces->num_rows;

                                            for ($i = 0; $i < $pn; $i++) {
                                                $pr = $provinces->fetch_assoc();

                                                // if ($l["id"] !== $pr["id"]) {
                                            ?>
                                                <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>

                                            <?php
                                                // }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">District</label>
                                        <select id="district" class="form-select">
                                            <option value="<?php echo $k["id"]; ?>"><?php echo $k["name"]; ?></option>
                                            <?php

                                            $districts = Database::search("SELECT * FROM `district` WHERE `id` !='" . $k["id"] . "';");
                                            $dn = $districts->num_rows;

                                            for ($i = 0; $i < $dn; $i++) {
                                                $dr = $districts->fetch_assoc();

                                                // if ($l["id"] !== $pr["id"]) {
                                            ?>
                                                <option value="<?php echo $dr["id"]; ?>"><?php echo $dr["name"]; ?></option>

                                            <?php
                                                // }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City" value="<?php echo $c["name"]; ?>" />
                                    </div>
                                    <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Postal Code</label>
                                        <input type="text" id="postalCode" class="form-control" placeholder="Postal Code" value="<?php echo $c["postal_code"]; ?>" />
                                    </div>

                                <?php

                            } else {

                                ?>
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Address Line 01</label>
                                        <input type="text" id="line1" class="form-control" placeholder="Enter Address Line 01" value="" />
                                    </div>
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Address Line 02</label>
                                        <input type="text" id="line2" class="form-control" placeholder="Enter Address Line 02" value="" />
                                    </div>

                                    <div class="col-lg-3 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Province</label>
                                        <select id="province" class="form-control">
                                            <option value="<?php echo $l["id"]; ?>"></option>
                                            <?php

                                            $provinces = Database::search("SELECT * FROM `province`;");
                                            $pn = $provinces->num_rows;

                                            for ($i = 0; $i < $pn; $i++) {
                                                $pr = $provinces->fetch_assoc();

                                                // if ($l["id"] !== $pr["id"]) {
                                            ?>
                                                <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>

                                            <?php
                                                // }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">District</label>
                                        <select id="district" class="form-control">
                                            <option value="<?php echo $k["id"]; ?>"></option>
                                            <?php

                                            $districts = Database::search("SELECT * FROM `district`;");
                                            $dn = $districts->num_rows;

                                            for ($i = 0; $i < $dn; $i++) {
                                                $dr = $districts->fetch_assoc();

                                                // if ($l["id"] !== $pr["id"]) {
                                            ?>
                                                <option value="<?php echo $dr["id"]; ?>"><?php echo $dr["name"]; ?></option>

                                            <?php
                                                // }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City" value="" />
                                    </div>
                                    <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                        <label class="form-label fw-bold">Postal Code</label>
                                        <input type="text" id="postalCode" class="form-control" placeholder="Postal Code" value="" />
                                    </div>


                                <?php
                            }

                                ?>
                                <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                    <label class="form-label fw-bold">Gender</label>

                                    <?php

                                    $genderId = $_SESSION["u"]["gender_id"];
                                    $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $genderId . "' ;");
                                    $g = $ugender->fetch_assoc();

                                    ?>
                                    <input type="text" class="form-control" placeholder="Gender" value="<?php echo $g["name"];  ?>" readonly />
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="button2" onclick="updateProfile();">Update Profile</button>
                                </div>

                                </div>
                        </div>




                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="msg"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="close();">Close</button>
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
    } else {

?>

   


    <body onload="GotoIndex();">

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

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    
<?php
    }

?>