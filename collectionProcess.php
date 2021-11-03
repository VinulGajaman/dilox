<?php

session_start();

require "connection.php";


$f = $_POST["f"];
$cid = $_POST["c"];
$pageno = $_POST["p"];
$search = $_POST["s"];;
$category_id = "";
if (empty($search)) {

    $search = "";
}

if ($cid != "0") {

    $category_id = "`category_id`='" . $cid . "' AND";
}

if ($f == "0") {
    $category = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%';");

    $d = $category->num_rows;
    $results_per_page = 5;
    $number_of_pages = ceil($d / $results_per_page);
    $offset = ((int)$pageno - 1) * $results_per_page;
    $selectedproducts = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%' LIMIT $results_per_page OFFSET $offset");
    $spn = $selectedproducts->num_rows;
} else if ($f == "1") {

    $category = Database::search("SELECT * FROM `product` WHERE " . $category_id . "`title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC;");
    $d = $category->num_rows;
    $results_per_page = 5;
    $number_of_pages = ceil($d / $results_per_page);
    $offset = ((int)$pageno - 1) * $results_per_page;
    $selectedproducts = Database::search("SELECT * FROM `product` WHERE " . $category_id . "`title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC LIMIT $results_per_page OFFSET $offset");
    $spn = $selectedproducts->num_rows;
} else if ($f == "2") {
    $category = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%' ORDER BY `price` ASC;");
    $d = $category->num_rows;
    $results_per_page = 5;
    $number_of_pages = ceil($d / $results_per_page);
    $offset = ((int)$pageno - 1) * $results_per_page;
    $selectedproducts = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%' ORDER BY `price` ASC LIMIT $results_per_page OFFSET $offset");
    $spn = $selectedproducts->num_rows;
} else if ($f == "3") {
    $category = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%' ORDER BY `price` DESC;");
    $d = $category->num_rows;
    $results_per_page = 5;
    $number_of_pages = ceil($d / $results_per_page);
    $offset = ((int)$pageno - 1) * $results_per_page;
    $selectedproducts = Database::search("SELECT * FROM `product` WHERE " . $category_id . " `title` LIKE '%" . $search . "%' ORDER BY `price` DESC LIMIT $results_per_page OFFSET $offset");
    $spn = $selectedproducts->num_rows;
}

if ($spn <= 0) {
?>
    <div class="col-12 text-center">
        <label class="form-label fs-1 fw-bolder">No Matched Items.</label>
    </div>
<?php
}


for ($x = 0; $x < $spn; $x++) {
    $prod = $selectedproducts->fetch_assoc();

    $img = Database::search("SELECT* FROM `images` WHERE `product_id`='" . $prod["id"] . "';");
    $imgd = $img->fetch_assoc();
?>
    <div class="card shadow col-6 col-lg-3 mt-1 mb-1 ms-1" style="width: 18rem;">
        <div class="inner" style="height:400px;">
            <img src="<?php echo $imgd["code"]; ?>" class="card-img-top" alt="..." style="object-fit:cover; height: 400px">
        </div>

        <div class="card-body">
            <h5 class="card-title fw-bold" style="font-size: 18px;"><?php echo $prod["title"]; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <?php

                    $type = Database::search("SELECT DISTINCT `color` FROM `types` WHERE `product_id`='" . $prod["id"] . "';");
                    $typenum = $type->num_rows;

                    for ($i = 0; $i < $typenum; $i++) {
                        $typedata = $type->fetch_assoc();
                    ?>


                        <label class="btn btn-outline-dark btn-sm" for="Pcolors<?php echo $i . $prod["id"]; ?>"><?php echo $typedata["color"]; ?></label>
                    <?php
                    }
                    ?>
                </div>
            </li>
            <li class="list-group-item"> <?php

                                            $size = Database::search("SELECT DISTINCT `size` FROM `types` WHERE `product_id`='" . $prod["id"] . "';");
                                            $sizenum = $type->num_rows;

                                            while ($sizedata = $size->fetch_assoc()) {


                                            ?>

                    <button class="btn btn-outline-secondary btn-sm text-dark"><?php echo $sizedata["size"]; ?></button>
                <?php
                                            }
                ?>
            </li>
            <li class="list-group-item text-danger fw-bold">Rs. <?php echo $prod["price"]; ?> .00</li>
        </ul>
        <div class="card-body">
            <a href="singleProductView.php?id=<?php echo $prod["id"]; ?>" class="btn btn-outline-warning text-dark"><i class="bi bi-arrows-fullscreen"></i></a>
            <?php
            if (isset($_SESSION["u"])) {
            ?>
                <?php
                $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $prod["id"] . "';");
                $watchnum = $watchlist->num_rows;
                if ($watchnum == 1) {
                    $heart = "bi-heart-fill";
                } else {
                    $heart = "bi-heart";
                }
                ?>
                <a class="btn btn-outline-danger" onclick="addToWatchlist(<?php echo $prod['id']; ?>);"><i class="hart<?php echo $prod["id"]; ?> bi <?php echo  $heart; ?>"></i></a>
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

<!-- pagination -->
<div class="col-12 mb-3 mt-3">
    <div class="pagination d-flex justify-content-center">
        <?php
        if ($pageno != 1) {
        ?>
            <button class=" btn btn-outline-dark" onclick="collection(<?php echo  $pageno - 1; ?>);">&laquo;</button>
            <?php
        }

        for ($page = 1; $page <= $number_of_pages; $page++) {
            if ($page == $pageno) {
            ?>
                <button class="ms-1 btn btn-outline-dark active" onclick="collection(<?php echo  $page; ?>);"><?php echo $page; ?></button>
            <?php
            } else {
            ?>
                <button class="ms-1 btn btn-outline-dark" onclick="collection(<?php echo  $page; ?>);"><?php echo $page; ?></button>
        <?php
            }
        }
        ?>
        <?php
        if ($pageno < $number_of_pages) {
        ?>
            <button class="ms-1 btn btn-outline-dark" onclick="collection(<?php echo  $pageno + 1; ?>);">&raquo;</button>
        <?php
        }
        ?>
    </div>
</div>
<!-- pagination -->