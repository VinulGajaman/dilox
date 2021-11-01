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

</head>


<body>

    <div class="container justify-content-center">

        <div class="row r1 g-0 mt-5 mb-4">

            <div class="col-lg-3 col-12 border-end border-2">
                <div class="row">
                    <div class="col-12">
                        <div class="header_logo">
                            <a href="home.php"><span>Dilox</span> Clothing.</a>
                        </div>
                        <hr class="border border-warning border-2">
                    </div>
                    <div class="col-12">
                        <div class="nav flex-column nav-pills me-3 mt-1" role="tablist" aria-orientation="vertical">
                            <nav class="nav flex-column">
                                <a class="nav-link text-secondary fs-5" aria-current="page" href="#">Dashboard</a>
                                <a class="nav-link text-secondary fs-5" href="manageUsers.php">Manage Users</a>
                                <a class="nav-link text-secondary fs-5" href="manageProduct.php">Manage Products</a>
                                <a class="nav-link text-secondary fs-5" href="addProduct.php">Add Products</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border border-warning border-2 d-lg-none d-block">
            <div class="col-lg-8 col-12 pb-3 ps-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title2 pt-3">Update Products</h1>
                    </div>
                    <div class="offset-lg-1 col-lg-5 col-12 p-3">
                        <label class="form-label fw-bold fs-5 text-dark">Select Product Category</label>
                        <select class="form-select" id="" style="width: 250px;" id="ca">
                            <option value="0">Select Category</option>
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
                    <div class="col-lg-5 col-12 p-3">
                        <label class="form-label fw-bold fs-5 text-dark">Prodcut Title</label>
                        <input class="form-control" type="text"  id="ti"/>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12 offset-lg-1 col-lg-5">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold fs-5 text-dark">Prodcut Colour</label>
                                <input class="form-control" type="text" id="clr"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="offset-lg-1  col-lg-5 col-12 p-3">
                        <label class="form-label fw-bold fs-5 text-dark">Product Quantity</label>
                        <input class="form-control" type="number" style="width: 200px;" />
                    </div>
                    <div class="col-lg-5 col-12 p-3">
                        <label class="form-label fw-bold fs-5 text-dark">Cost per Item</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs.</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="offset-lg-1 col-lg-10 col-12 p-3">
                        <label class="form-label fw-bold fs-5 text-dark">Product Description</label>
                        <textarea class="form-control fs-5" cols="100" rows="10" style="background-color:honeydew;" id="desc"></textarea>
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
                            <div class="col-12 col-lg-5 mt-2 offset-3 offset-lg-4">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input class="d-none" type="file" accept="image/*" id="imguploader" multiple />
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
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid">
                                <button class="button1 fw-bold" onclick="addproduct();">Add Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    




    <script src="script.js"></script>
    <script src="bootstrap.js"></script>


</body>

</html>