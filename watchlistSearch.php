<?php

session_start();

require "connection.php";

$txt = $_POST["t"];
$pageno = $_POST["p"];
$uemail = $_SESSION["u"]["email"];

$results_per_page = 4;

if (!isset($txt)) {

    $product = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id = product.id WHERE `user_email`='" . $uemail . "' ;");
    $d = $product->num_rows;
    $row =  $product->fetch_assoc();
    $result_per_page = 4;
    $number_of_pages = ceil($d / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $textSearch = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id = product.id WHERE `user_email`='" . $uemail . "' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n = $textSearch->num_rows;
} else {
    $product = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id = product.id WHERE `user_email`='" . $uemail . "' AND `title` LIKE '%" . $txt . "%' ;");
    $d = $product->num_rows;
    $row =  $product->fetch_assoc();
    $result_per_page = 4;
    $number_of_pages = ceil($d / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $textSearch = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id = product.id WHERE `user_email`='" . $uemail . "' AND `title` LIKE '%" . $txt . "%' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n = $textSearch->num_rows;
}

if (empty($txt) && $n <= 0) {
?>

    <!-- without items -->

    <div class="col-12 offset-lg-1 col-lg-9 mt-3">
        <div class="row text-center">
            <div class="col-12"><i class="bi bi-bookmark-plus" style="font-size: 150px;"></i></div>
            <lable class="form-lable fs-1 mb-3 fw-bolder">You have no items in your watchlist</lable>
        </div>
    </div>

    <!-- without items -->
<?php
}else if ($n <= 0) {
?>
    <div class="col-12 text-center">
        <label class="form-label fs-1 fw-bolder">No Matched Items.</label>
    </div>
<?php
}

?>


<?php

for ($i = 0; $i < $n; $i++) {

?>
    <div class="card col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
        <div class="card-body">
            <?php
            $wr = $textSearch->fetch_assoc();
            $wid = $wr["product_id"];
            ?>
            <a onclick="deleteFromWatchlist(<?php echo $wid; ?>)"> <i class="bi bi-x-lg text-dark"></i></a>
        </div>

        <?php
        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wid . "';");
        $pn = $productrs->num_rows;

        if ($pn == 1) {
            $pr = $productrs->fetch_assoc();
            $prodid = $pr["id"];
        }

        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prodid . "';");
        $in = $imagers->num_rows;

        $arr;

        for ($x = 0; $x < $in; $x++) {

            $ir = $imagers->fetch_assoc();
            $arr[$x] = $ir["code"];
        }
        ?>


        <div class="inner">
            <img src="<?php echo $arr[0]; ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $pr["title"]; ?></h5>
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                <?php

                $type = Database::search("SELECT DISTINCT `color` FROM `types` WHERE `product_id`='" . $prodid . "';");
                $typenum = $type->num_rows;

                for ($j = 0; $j < $typenum; $j++) {
                    $typedata = $type->fetch_assoc();
                ?>


                    <label class="btn btn-outline-dark btn-sm" for="Wcolors<?php echo $j; ?>"><?php echo $typedata["color"]; ?></label>
                <?php
                }
                ?>
            </li>
            <li class="list-group-item fw-bold text-danger">Rs. <?php echo $pr["price"]; ?> .00</li>
        </ul>
        <div class="card-body">
            <a href="singleProductView.php?id=<?php echo $prodid; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>

        </div>
    </div>
<?php

}
?>
<!-- pagination -->
<div class="col-12 mb-3 mt-3">
    <div class="pagination d-flex justify-content-center">
        <?php
        if ($pageno != 1) {
        ?>
            <button class=" btn btn-outline-dark" onclick="watchlistSearch(<?php echo  $pageno - 1; ?>);">&laquo;</button>
            <?php
        }

        for ($page = 1; $page <= $number_of_pages; $page++) {
            if ($page == $pageno) {
            ?>
                <button class="ms-1 btn btn-outline-dark active" onclick="watchlistSearch(<?php echo  $page; ?>);"><?php echo $page; ?></button>
            <?php
            } else {
            ?>
                <button class="ms-1 btn btn-outline-dark" onclick="watchlistSearch(<?php echo  $page; ?>);"><?php echo $page; ?></button>
        <?php
            }
        }
        ?>
        <?php
        if ($pageno < $number_of_pages) {
        ?>
            <button class="ms-1 btn btn-outline-dark" onclick="watchlistSearch(<?php echo  $pageno + 1; ?>);">&raquo;</button>
        <?php
        }
        ?>
    </div>
</div>
<!-- pagination -->


<?php

?>