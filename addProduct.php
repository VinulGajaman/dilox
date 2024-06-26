<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Add Products</title>

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
                    <form action="addProductprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1 class="title2 pt-3">Products Listing</h1>
                            </div>

                            <?php
                            if (isset($_GET["inserted"])) {
                                if ($_GET["inserted"] == "true") {
                            ?>
                                    <div class="col-11 col-lg-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Product Added Successfully.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                <?php
                                }
                                if ($_GET["inserted"] == "false") {
                                ?>
                                    <div class="col-11 col-lg-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Error!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                            <?php
                                }
                            }

                            ?>
                            <?php
                            if (isset($_GET["image"])) {
                                if ($_GET["image"] == 'error') {
                            ?>
                                    <div class="col-11 col-lg-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Please Insert a Valid Image.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                            <?php
                                }
                            }

                            ?>
                            <div class="offset-lg-1 col-lg-5 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Select Product Category</label>
                                <select class="form-select" id="" style="width: 250px;" name="ca" required>
                                    <option hidden></option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `category`;");
                                    $n = $rs->num_rows;

                                    for ($i = 0; $i < $n; $i++) {

                                        $category = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Prodcut Title</label>
                                <input class="form-control" type="text" name="ti" required />
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="offset-lg-1 col-lg-11 col-12">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Qty</th>
                                            <th class="fs-5"><button type="button" class="btn btn-outline-dark" onclick="addRow();"><i class="bi bi-plus-circle"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><select class="form-select" name="size[]">
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                </select></td>
                                            <td><input class="form-control" type="text" name="color[]" required /></td>
                                            <td><input class="form-control" type="number" min="0" name="qty[]" required /></td>
                                            <td class="fs-5"><button class="btn btn-outline-dark" id="trash" type="button" onclick="m(this);"><i class="bi bi-trash"></i></button></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="offset-lg-1 col-lg-5 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Cost per Item</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="number" class="form-control" aria-label="Amount (to the nearest rupee)" name="cost" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Delivery Fee</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="number" class="form-control" aria-label="Amount (to the nearest rupee)" name="delivery" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>
                            <div class="offset-lg-1 col-lg-10 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Product Description</label>
                                <textarea class="form-control fs-5" cols="100" rows="10" style="background-color:honeydew;" name="desc" required></textarea>
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>
                            <div class="offset-lg-1 col-lg-11 col-12 p-3">
                                <label class="form-label fw-bold fs-5 text-dark">Add Product Images</label>
                                <br>
                                <img class="col-6 col-lg-3 ms-2 img-thumbnail mt-1" src="resourses/iconnn.png" id="prev0" />
                                <img class="col-6 col-lg-3 ms-2 img-thumbnail mt-1" src="resourses/iconnn.png" id="prev1" />
                                <img class="col-6 col-lg-3 ms-2 img-thumbnail  mt-1" src="resourses/iconnn.png" id="prev2" />
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-8 col-lg-5 mt-2 offset-3 offset-lg-4">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input class="d-none" type="file" accept="image/*" id="imguploader" name="image[]" multiple />
                                                <label class="btn btn-outline-dark col-6 col-lg-12" for="imguploader" onclick="changeImg();">Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>
                            <div class="col-12 mt-1">
                                <div class="row">
                                    <div class="offset-0 offset-lg-4 col-8 col-lg-4 d-grid">
                                        <button class="button1 fw-bold" type="sumbit">Add Product</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>

        <script src="script.js"></script>


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