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
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-2 d-lg-none d-block">
                <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="title2 pt-3">Dashboard</h1>
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-primary rounded" style="background-color: #e7f2ff;">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <?php
                                            $invoice = Database::search("SELECT SUM(`total`) AS month FROM `invoice` WHERE MONTH(`date`)=MONTH(CURDATE()) AND YEAR(`date`)=YEAR(CURDATE());");
                                            $invoiceMonth = $invoice->fetch_assoc();
                                            ?>
                                            <label class="from-label fw-bold">EARNINGS&nbsp;&nbsp;(MONTHLY):</label>
                                            <br />
                                            <label class="from-label mt-1"> Rs .<?php echo $invoiceMonth["month"]; ?>. 00</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-success rounded" style="background-color:rgb(183, 255, 189);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <?php
                                            $invoice = Database::search("SELECT SUM(`total`) AS year FROM `invoice` WHERE YEAR(`date`)=YEAR(CURDATE());");
                                            $invoiceMonth = $invoice->fetch_assoc();
                                            ?>
                                            <label class="from-label fw-bold">EARNINGS&nbsp;&nbsp;(ANNUAL):</label>
                                            <br />
                                            <label class="from-label mt-1"> Rs .<?php echo $invoiceMonth["year"]; ?>. 00</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-danger rounded" style="background-color: rgb(255, 198, 198);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <label class="from-label fw-bold">TOTAL ENGAGEMENTS</label>
                                            <br />
                                            <?php
                                            $users = Database::search("SELECT * FROM `user`;");
                                            $un = $users->num_rows;

                                            ?>
                                            <label class="from-label mt-1"><?php echo $un; ?> Members</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2">

                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-warning rounded" style="background-color: rgb(250, 249, 173);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <?php
                                            $invoice = Database::search("SELECT COUNT(*) AS sellmonth FROM invoice_item i, invoice v WHERE MONTH(v.`date`)=MONTH(CURDATE()) AND i.invoice_id=v.id;");
                                            $invoiceMonth = $invoice->fetch_assoc();
                                            ?>
                                            <label class="from-label fw-bold">SELLINGS&nbsp;&nbsp;(MONTHLY):</label>
                                            <br />
                                            <label class="from-label mt-1"><?php echo $invoiceMonth["sellmonth"]; ?> Items</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-secondary rounded" style="background-color:rgb(235, 229, 220);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <?php
                                            $invoice = Database::search("SELECT COUNT(*) AS selltoday FROM invoice_item i, invoice v WHERE DATE(v.`date`)=DATE(CURDATE()) AND i.invoice_id=v.id;");
                                            $invoiceMonth = $invoice->fetch_assoc();
                                            ?>
                                            <label class="from-label fw-bold">SELLINGS&nbsp;&nbsp;(TODAY):</label>
                                            <br />
                                            <label class="from-label mt-1"> <?php echo $invoiceMonth["selltoday"]; ?> Items</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 col-11 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-dark rounded" style="background-color: rgb(168, 165, 165);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <?php
                                            $invoice = Database::search("SELECT COUNT(*) AS selltotal FROM invoice_item ;");
                                            $invoiceMonth = $invoice->fetch_assoc();
                                            ?>
                                            <label class="from-label fw-bold">TOTAL SELLING</label>
                                            <br />
                                            <label class="from-label mt-1"><?php echo $invoiceMonth["selltotal"]; ?> Items</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <hr>
                                </div>

                                <div class="offset-lg-2 col-lg-8 col-11 mt-3">
                                    <div class="card mb-3" style="max-width: 600px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="resourses/product/1.JPEG" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <?php
                                                    $soldItem = Database::search("SELECT COUNT(`product_id`) AS selltotal,`product_id` FROM invoice_item GROUP BY `product_id` ORDER BY selltotal DESC LIMIT 1;");
                                                    $SId = $invoice->fetch_assoc();
                                                    ?>
                                                    <h4 class="text-warning fw-bold">MOST SOLD ITEM <i class="bi bi-star-fill"></i></h4>
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <hr>
                                </div>
                                <div class="offset-lg-1 col-lg-11 col-11 mt-3 text-center">
                                    <h3 class="text-dark fw-bold">PRODUCTS SELLING HISTORY</h3>
                                </div>

                                <div class="offset-lg-1 col-lg-5 col-5 mt-3 text-center mb-3">
                                    <label class="form-label fw-bold">From Date</label>
                                    <input type="date" class="form-control" id="" />
                                </div>
                                <div class="offset-lg-1 col-lg-5 col-5 mt-3 text-center mb-3">
                                    <label class="form-label fw-bold">To Date</label>
                                    <input type="date" class="form-control" id="" />
                                </div>
                                <div class="offset-lg-1 col-lg-11 col-12 mt-3 mb-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="d-lg-table-cell d-none">Order Id</th>
                                                <th>Product</th>
                                                <th>Buyer</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-lg-table-cell d-none">#12121212</td>
                                                <td>Solid Pant </td>
                                                <td>Vinul Gajaman</td>
                                                <td>Rs.3000.00</td>
                                                <td>24</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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