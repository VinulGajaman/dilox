<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>


<head>


    <title>Dilox| Transaction History</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</html>
<?php
if (isset($_SESSION["u"])) {

    $uemail = $_SESSION["u"]["email"];
?>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                require "header.php";
                ?>
                <hr class="border border-warning border-3">
                <div class="col-12 mt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="text-dark"><i class="bi bi-currency-dollar"></i> | TRANSACTION HISTORY</h1>
                        </div>
                    </div>
                </div>
                <hr class="border border-warning border-2">
                <?php
                $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $uemail . "' ;");
                $in = $invoicers->num_rows;
                ?>
                <div class="col-12">
                    <div class="row">
                        <?php
                        if ($in == 0) {
                        ?>
                            <div class="col-12 text-center" style="height: 450px;">
                                <span class="fs-1 fw-bold d-block" style="margin-top: 150px;">You Have no items in your Transaction History yet.....</span>
                            </div>
                            <?php
                        } else {
                            while ($ind = $invoicers->fetch_assoc()) {
                                $invoiceItem = Database::search("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $ind["id"] . "' ;");
                                $inI = $invoiceItem->num_rows;
                                while ($inId = $invoiceItem->fetch_assoc()) {
                            ?>
                                    <div class="col-12 col-lg-6">
                                        <div class="card shadow mb-3" style="max-width: 800px;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-block d-lg-none">
                                                    <div class="card-body">
                                                        <a class="d-flex text-end float-end mb-2" onclick="addDelete('<?php echo $inId['product_id']; ?>');"> <i class="bi bi-x-lg text-dark"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <?php
                                                    $prod = Database::search("SELECT * FROM `product` WHERE `id`='" . $inId["product_id"] . "';");
                                                    $prodrs = $prod->fetch_assoc();

                                                    $img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prodrs["id"] . "';");
                                                    $imgrs = $img->fetch_assoc();
                                                    ?>
                                                    <img src="<?php echo $imgrs["code"]; ?>" class="img-fluid rounded-start" />
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $prodrs["title"]; ?></h5>
                                                        <span class="card-text"><b> Order Id</b> : <?php echo $ind["order_id"]; ?></span>
                                                        <br>
                                                        <span class="card-text"><strong>Qty </strong> : <?php echo $inId["qty"]; ?></span>
                                                        <br>
                                                        <span class="card-text text-danger"><strong>Price</strong> : Rs. <?php echo $inId["unit_price"]; ?>.00 /=</span>
                                                        <p class="card-text mt-2 fs-5"><b>AMOUNT</b> : <label class="form-label text-danger"> Rs. <?php echo $inId["unit_price"] * $inId["qty"] + $inId["delivery_fee"] ?>.00/=</label></p>
                                                        <span class="card-text text-end"><small class="text-muted"><?php echo $ind["date"]; ?></small></span>
                                                        <br>
                                                        <a href="invoice.php?id=<?php echo $ind["order_id"]; ?>" class="fw-bold text-decoration-underline">See Invoice >>></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-lg-block d-none">
                                                    <div class="card-body">
                                                        <a class="d-flex text-end float-end mb-2" onclick="addDelete('<?php echo $inId['product_id']; ?>');"><i class="bi bi-x-lg text-dark"></i></a>
                                                    </div>
                                                    <div class="card-body button1 position-absolute bottom-0 end-0" onclick="addFeedback(<?php echo $prodrs['id']; ?>);">
                                                        <a class="text-dark fs-5 p-2"><i class="bi bi-info-square"></i> Feedback </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-block d-lg-none text-center">
                                                    <div class="card-body button1" onclick="addFeedback(<?php echo $prodrs['id']; ?>);">
                                                        <a class="text-dark fs-5 p-2"><i class="bi bi-info-square"></i> Feedback </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="feedbackModal<?php echo $prodrs["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $prodrs["title"]; ?>&nbsp;&nbsp;&nbsp;<i class="bi bi-chat-left-text-fill"></i></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea id="feedtxt<?php echo $prodrs["id"]; ?>" cols="30" rows="10" class="form-control fs-5"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" onclick="saveFeedback('<?php echo $prodrs['id']; ?>');">Save Feedback</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $prodrs["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger fw-bolder" id="exampleModalLabel">WARNING...<i class="bi bi-exclamation-triangle-fill"></i></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure You Want To Remove This Product From Trasaction History?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" onclick="deleteHistory('<?php echo $prodrs['id']; ?>');">Yes</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->

                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


                <?php
                require "footer.php";
                ?>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

    <!-- model -->

<?php
}
?>