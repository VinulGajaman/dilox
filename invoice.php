<?php

session_start();

require "connection.php";



?>

<!DOCTYPE html>

<html>

<head>

    <title>Dilox | Invoice</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


</head>
<?php


if (isset($_SESSION["u"]) && isset($_GET["id"])) {

    $orderId = $_GET["id"];

    $uemail = $_SESSION["u"]["email"];
?>

    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="px-5">
                    <div id="GFG">
                        <div class="col-12">
                            <div class="header_logo">
                                <a href="home.php" class="fs-1"><span class="fs-1">Dilox</span> Clothing.</a>
                            </div>
                        </div>
                        <?php

                        $invoice = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $orderId . "';");
                        $inData = $invoice->fetch_assoc();
                        ?>
                        <div class="col-12 mt-4 text-center">
                            <h2 class="fw-bold fs-1 text-warning">INVOICE 0<?php echo $inData["id"]; ?></h2>
                            <span class="fw-bold">Date and Time of Invoice :</span>&nbsp;
                            <span class="fw-bold"><?php echo $inData["date"]; ?></span>
                            <br>
                            <span class="fw-bold">Order Id :</span>&nbsp;<span class="fw-bold"><?php echo $inData["order_id"]; ?></span>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="row mt-2" style="background-color: rgb(226, 224, 218);">
                            <div class="col-lg-5 col-12 p-3">
                                <h4 class="fw-bold ">INVOICE TO:</h4>
                                <span class="fs-4">Vinul Gajaman</span>
                                <br>
                                <span class="text-secondary">No.61 , Ellie House Lane</span>
                                <br>
                                <a class="text-primary text-decoration-underline">vinulgajaman2001@gmail.com</a>
                            </div>
                            <div class="offset-lg-2 col-lg-5 col-12 p-3 text-lg-end">
                                <h4 class="fw-bold text-warning fs-3 text-decoration-underline">Dilox Clothing</h4>
                                <span>Kohilawatte, Colombo 10, Sri Lanka</span>
                                <br>
                                <span class="text-secondary">dilox@gmail.com</span>
                                <br>
                                <a class="text-primary text-decoration-underline">+94112546978</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="fs-5">#</th>
                                        <th class="fs-5">Product</th>
                                        <th class="fs-5">Unit price(Rs.)</th>
                                        <th class="fs-5">Qty</th>
                                        <th class="fs-5 text-end">Total(Rs.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $item = Database::search("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $inData["id"] . "';");

                                    while ($itemdata = $item->fetch_assoc()) {


                                    ?>
                                        <tr>
                                            <td><?php echo $itemdata["product_id"]; ?></td>
                                            <?php
                                            $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $itemdata["product_id"] . "';");
                                            $productName = $product->fetch_assoc();
                                            ?>
                                            <td class="text-primary text-decoration-underline"><?php echo $productName["title"]; ?></td>
                                            <td><?php echo $itemdata["unit_price"]; ?> /=</td>
                                            <td><?php echo $itemdata["qty"]; ?></td>
                                            <td class="fw-bold text-end"><?php echo $itemdata["unit_price"] * $itemdata["qty"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-end">SHIPPING</td>
                                        <td colspan="4" class="text-end">Rs.<?php echo $inData["total_delivery"]; ?>.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end text-dark border-0 fw-bolder fs-5">GRAND TOTAL</td>
                                        <td class="text-end text-primary border-0">Rs. <?php echo $inData["total"]; ?> .00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5 mt-2">
                            <span class="fs-1 text-dark">Thank You !</span>
                        </div>
                        <div class="col-12 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-warning rounded" style="background-color: rgb(250, 249, 173);">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="from-label fs-5 fw-bold">NOTICE :</label>
                                    <br />
                                    <label class="from-label">Purchased items can return brefore 7 days of delivery.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border border-1 border-secondary" />
                        </div>

                        <div class="col-12 mb-3 text-center">
                            <label class="form-label fs-5 text-muted">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 btn-toolbar justify-content-end mb-3">
                    <button class="btn btn-dark me-2" onclick="printDiv();"><i class="bi bi-printer-fill"></i> Print</button>
                </div>

                <?php
                require "footer.php";
                ?>
            </div>
        </div>

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