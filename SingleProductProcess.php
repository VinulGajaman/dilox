<?php

require "connection.php";

$c = $_POST["c"];
$id = $_POST["id"];

$product = Database::search("SELECT * FROM `types` WHERE `product_id`='" . $id . "' AND `color`='" . $c . "';");



?>

<label class="form-label text-dark">Select Size :</label>

<select class="form-select" id="sizeSelect" onchange="changeQty()" required>
    <?php

    while ($data = $product->fetch_assoc()) {
    ?>

        <option qty="<?php echo $data["qty"]; ?>" value="<?php echo $data["size"]; ?>"><?php echo $data["size"]; ?></option>
    <?php
    }
    ?>

</select>



<?php

?>