<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Manage Products</title>

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

    <body onload="manageProducts(1);">

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
                            <h1 class="title2 pt-3">Manage All Products</h1>
                        </div>
                        <div class="offset-2 col-8 text-center mt-3 mb-3">
                            <input type="text" class="form-control" placeholder="Search any product..." onkeyup="manageProducts(1);" id="manageProducts">
                        </div>
                        <div class="col-12 p-2">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class="fs-5 d-lg-table-cell d-none">#</th>
                                        <th class="fs-5 d-lg-table-cell d-none">Product Image</th>
                                        <th class="fs-5">Title</th>
                                        <th class="fs-5 ">Price</th>
                                        <th class="fs-5 d-lg-table-cell d-none">Register Date</th>
                                    </tr>
                                </thead>

                                <tbody id="loadProducts">

                                </tbody>
                            </table>


                        </div>
                        <hr>
                        <div class="col-12">
                            <h3 class="text-dark">Manage Categories</h3>
                        </div>
                        <hr class="border border-info border-2">
                        <?php

                        $categoryrs = Database::search("SELECT * FROM `category`;");
                        $num = $categoryrs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $row = $categoryrs->fetch_assoc();
                        ?>

                            <div class="col-10 col-lg-3 mt-1 mb-1">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center bg-body border border-2 border-secondary shadow rounded">
                                        <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"]; ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                        <div class="col-10 col-lg-3 mt-1 mb-1">
                            <div class="row g-1 px-1">
                                <div class="col-12 text-center bg-body border border-2 border-secondary shadow rounded">
                                    <label class="form-label fs-4 fw-bold py-3" style="cursor: pointer;" onclick="addnewModal();">Add(+)</label>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal" tabindex="-1" id="addnewModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <p>Add New Category.</p>
                                            <p id="msg" class="text-danger"></p>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Caregory Name :</label>
                                            <input type="text" class="form-control" id="categorytext" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="saveCategory();">Save Changes</button>
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancle</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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