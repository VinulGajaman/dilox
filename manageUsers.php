<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<?php
if (isset($_SESSION["a"])) {
?>

    <body>

        <div class="container justify-content-center vh-100">

            <div class="row r1 g-0 mt-5 mb-4">

                <div class="col-lg-3 col-12 border-end border-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="header_logo">
                                <a href="home.php"><span>Dilox</span> Clothing.</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border border-warning border-2">
                        </div>
                        <div class="col-12">
                            <div class="nav flex-column nav-pills me-3 mt-1" role="tablist" aria-orientation="vertical">
                                <nav class="nav flex-column">
                                    <a class="nav-link text-secondary fs-5" aria-current="page" href="adminPanel.php">Dashboard</a>
                                    <a class="nav-link text-secondary fs-5" href="manageUsers.php">Manage Users</a>
                                    <a class="nav-link text-secondary fs-5" href="manageProduct.php">Manage Products</a>
                                    <a class="nav-link text-secondary fs-5" href="addProduct.php">Add Products</a>
                                    <a class="nav-link text-danger fs-5" style="cursor: pointer;" onclick="signOutAdmin();">Log Out</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-2 d-lg-none d-block">
                <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="title2 pt-3">Manage Users</h1>
                        </div>
                        <div class="col-12 p-2">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class="fs-5">#</th>
                                        <th class="fs-5 d-lg-table-cell d-none">User Image</th>
                                        <th class="fs-5 d-lg-table-cell d-none">Email</th>
                                        <th class="fs-5 ">Username</th>
                                        <th class="fs-5 d-lg-table-cell d-none">Register Date</th>
                                    </tr>
                                </thead>
                                <?php

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }


                                $usersrs = Database::search("SELECT * FROM `user` ");
                                $d = $usersrs->num_rows;
                                $row = $usersrs->fetch_assoc();
                                $result_per_page = 10;
                                $number_of_pages = ceil($d / $result_per_page);
                                $page_first_result = ((int)$pageno - 1) * $result_per_page;
                                $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                $srn = $selectedrs->num_rows;

                                $c = 0;
                                ?>
                                <tbody>
                                    <?php
                                    while ($srow = $selectedrs->fetch_assoc()) {
                                        $c = $c + 1;
                                    ?>



                                        <tr>
                                            <td><?php echo $c; ?></td>
                                            <?php
                                            $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $srow["email"] . "' ");
                                            $pnum = $profileimg->num_rows;
                                            if ($pnum == 1) {
                                                $pcode = $profileimg->fetch_assoc();
                                            ?>
                                                <td class="d-lg-table-cell d-none"><img src="<?php echo $pcode["code"]; ?>" style="height: 100px;"></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td class="d-lg-table-cell d-none"><img src="resourses/home_img/user.svg" style="height: 80px;"></td>
                                            <?php
                                            }
                                            ?>

                                            <td class="d-lg-table-cell d-none"><?php echo $srow["email"] ?></td>
                                            <td><?php echo $srow["fname"] . " " . $srow["lname"] ?></td>
                                            <td class="d-lg-table-cell d-none"><?php
                                                                                $rd = $srow["register_date"];
                                                                                $splitrd = explode(" ", $rd);
                                                                                echo $splitrd[0];
                                                                                ?></td>
                                            <td><?php
                                                $s = $srow["status_id"];
                                                if ($s == "1") {
                                                ?>
                                                    <button class="btn btn-danger" onclick="blockUser('<?php echo $srow['email']; ?>');" id="blockbtn<?php echo $srow['email']; ?>">Block</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-success" onclick="blockUser('<?php echo $srow['email']; ?>');" id="blockbtn<?php echo $srow['email']; ?>">Unblock</button>
                                                <?php
                                                }
                                                ?>
                                            </td>

                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>


                        </div>

                        <!-- pagination -->
                        <div class="col-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 text-center fs-5 fw-bold mt-2">
                                    <div>
                                        <?php

                                        if ($pageno != 1) {
                                            echo "<a href=\"?page=" . ($pageno - 1) . "class=\"ms-1 btn btn-outline-dark\">&laquo;</a>";
                                        }

                                        ?>

                                        <?php
                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                            if ($page == $pageno) {

                                        ?>
                                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-outline-dark active"><?php echo $page; ?></a>

                                            <?php

                                            } else {

                                            ?>

                                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-outline-dark"><?php echo $page; ?></a>

                                        <?php

                                            }
                                        }
                                        ?>
                                        <?php

                                        if ($pageno != $number_of_pages) {
                                        ?><a href="<?php echo "?page=" . ($pageno + 1); ?>" class="ms-1 btn btn-outline-dark">&raquo;</a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pagination -->

                    </div>


                </div>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="admin();">OK</button>
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