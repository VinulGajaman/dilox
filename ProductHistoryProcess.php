<?php

session_start();

require "connection.php";


$f = $_POST["f"];
$t = $_POST["t"];
$pageno = $_POST["p"];

$from = "";
$to = "";

if (!empty($f)) {

    $from = "WHERE invoice.date > '" . $f . "' ";

    if (!empty($t)) {
        $to = "AND invoice.date < '" . $t . "' ";
    }
} else if (!empty($t)) {

    $to = "WHERE invoice.date < '" . $t . "' ";
}

$invoice = Database::search("SELECT * FROM `invoice` " . $from . $to . " ORDER BY `delivery` ASC ;");
$invoiceNum = $invoice->num_rows;

if ($invoiceNum > 0) {

    for ($i = 0; $i < $invoiceNum; $i++) {
        $invoicers = $invoice->fetch_assoc();



?>
        <tr>
            <td class="d-lg-table-cell d-none"><?php echo $invoicers["order_id"]; ?></td>
            
            <td><?php echo $invoicers["id"]; ?></td>
            <?php
            $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $invoicers["user_email"] . "';");
            $userdata = $user->fetch_assoc();
            ?>
            <td><?php echo $userdata["fname"] . " " . $userdata["lname"]; ?></td>
           
            <?php
           

            if ($invoicers["delivery"] == "1") {
            ?>
                <td>Rs.<?php echo $invoicers["total"]; ?>/= &nbsp;&nbsp;<button id="btn<?php echo $invoicers['id']; ?>" class="btn btn-success" onclick="deliver('<?php echo $invoicers['id']; ?>');">Delivered</button></td>
            <?php
            } else {
            ?>
                <td>Rs.<?php echo $invoicers["total"]; ?>/= &nbsp;&nbsp;<button id="btn<?php echo $invoicers['id']; ?>" class="btn btn-danger" onclick="deliver('<?php echo $invoicers['id']; ?>');">Deliver</button></td>
            <?php
            }
            ?>


        </tr>

        

    <?php




    }
} else {
    ?>
    <tr>
        <td colspan="5">
            <span class="fs-4 fw-bold">You haven't sell anything today.</span>
        </td>
    </tr>
<?php
}
