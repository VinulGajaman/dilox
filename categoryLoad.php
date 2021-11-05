<?php

session_start();

require "connection.php";

$cid = $_GET["c"];

$category = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cid . "' AND `status_id`='1' LIMIT 4;");

$categorynum = $category->num_rows;

for ($x = 0; $x < $categorynum; $x++) {

    $sresults = $category->fetch_assoc();
    $imgd = Database::search("SELECT* FROM `images` WHERE `product_id`='" . $sresults["id"] . "';");
    $imgdd = $imgd->fetch_assoc();
?>
    <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
        <div class="inner">
            <img src="<?php echo $imgdd["code"]; ?>" class="card-img-top" />
        </div>
        <div class="card-body">
            <h5 class="card-title fw-bold" style="font-size: 18px;"><?php echo $sresults["title"]; ?></h5>
            <p class="text-danger">Rs.<?php echo $sresults["price"]; ?> .00 /=</p>
            <a href="singleProductView.php?id=<?php echo $sresults["id"]; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>

            <?php
            if (isset($_SESSION["u"])) {
            ?>
                <?php
                $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $sresults["id"] . "';");
                $watchnum = $watchlist->num_rows;
                if ($watchnum == 1) {
                    $heart = "bi-heart-fill";
                } else {
                    $heart = "bi-heart";
                }
                ?>
                <a class="btn btn-outline-danger" onclick="addToWatchlist(<?php echo $sresults['id']; ?>);"><i class="hart<?php echo $sresults["id"]; ?> bi <?php echo  $heart; ?>"></i></a>
            <?php
            } else {
            ?>
                <a class="btn btn-outline-danger" onclick="model();"><i class="bi bi-heart"></i></a>
            <?php
            }
            ?>

        </div>
    </div>

<?php
}

?>
<div class="col-3 col-lg-2 offset-9">
    <a href="seeCategory.php?c=<?php echo $cid; ?>" class="btn btn-outline-dark" style="font-size: 15px;">See All...</i></a>
</div>