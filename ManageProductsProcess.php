<?php

session_start();

require "connection.php";


$m = $_POST["m"];
$pageno = $_POST["p"];



$search = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $m . "%';");
$d = $search->num_rows;
$results_per_page = 8;
$number_of_pages = ceil($d / $results_per_page);
$offset = ((int)$pageno - 1) * $results_per_page;
$selectedproducts = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $m . "%' LIMIT $results_per_page OFFSET $offset");
$spn = $selectedproducts->num_rows;






if ($spn <= 0) {
?>
    <tr>
        <td colspan="5">
            <div class="col-12 text-center">
                <label class="form-label fs-1 fw-bolder">No Matched Items.</label>
            </div>
        </td>
    </tr>
<?php
}

while ($srow = $selectedproducts->fetch_assoc()) {

?>
    <tr>
        <td class="d-lg-table-cell d-none"><?php echo $srow["id"]; ?></td>
        <?php
        $profileimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "' ");
        $pnum = $profileimg->num_rows;
        if ($pnum = 1) {
            $pcode = $profileimg->fetch_assoc();
        ?>
            <td class="d-lg-table-cell d-none"><img src="<?php echo $pcode["code"]; ?>" style="height: 100px;"></td>
        <?php
        } else {
        ?>
            <td class="d-lg-table-cell d-none"><img src="resourses/home_img/user.svg" style="height: 80px;"></td>
        <?php
        }
        ?>

        <td class="fw-bold" onclick="viewModel(<?php echo $srow['id']; ?>);"><?php echo $srow["title"] ?></td>
        <td>Rs.<?php echo $srow["price"]; ?>.00</td>
        <td class="d-lg-table-cell d-none"><?php
                                            $rd = $srow["datetime_added"];
                                            $splitrd = explode(" ", $rd);
                                            echo $splitrd[0];
                                            ?></td>
        <td>
            <?php
            $s = $srow["status_id"];
            if ($s == "1") {
            ?>
                <a class="btn btn-danger" onclick="blockProduct('<?php echo $srow['id']; ?>');" id="blockbtn<?php echo $srow['id']; ?>">Block</a>
            <?php
            } else {
            ?>
                <a class="btn btn-success" onclick="blockProduct('<?php echo $srow['id']; ?>');" id="blockbtn<?php echo $srow['id']; ?>">Unblock</a>
            <?php
            }
            ?>
            <br>
            <a href="updateProduct.php?id=<?php echo $srow['id']; ?>" class="btn btn-primary mt-2">Update</a>
            <br>

        </td>

    </tr>
    <!-- view model -->
    <div class="modal" tabindex="-1" id="viewProduct<?php echo $srow['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><span class="text-warning">Dilox</span> clothing</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <img src="<?php echo $pcode["code"]; ?>" style="height: 200px;">
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p class="fw-bold"><?php echo $srow["title"] ?></p>
                        <p class="fw-bold text-danger">Rs. <?php echo $srow["price"] ?>.00 /=</p>
                        <?php

                        $size = Database::search("SELECT DISTINCT `size` FROM `types` WHERE `product_id`='" . $srow["id"] . "';");
                        $sizenum = $size->num_rows;

                        while ($sizedata = $size->fetch_assoc()) {

                        ?>

                            <button class="btn btn-outline-secondary btn-sm text-dark"><?php echo $sizedata["size"]; ?></button>
                        <?php
                        }
                        ?>
                        <hr class="mt-1 mb-1">
                        <?php

                        $type = Database::search("SELECT DISTINCT `color` FROM `types` WHERE `product_id`='" . $srow["id"] . "';");
                        $typenum = $type->num_rows;

                        for ($i = 0; $i < $typenum; $i++) {
                            $typedata = $type->fetch_assoc();
                        ?>


                            <label class="btn btn-outline-dark btn-sm" for="Pcolors<?php echo $i; ?>"><?php echo $typedata["color"]; ?></label>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->
    <?php
}
    ?>

    <!-- pagination -->
    <tr>
        <td colspan="5">
            <div class="offset-4 col-8 mb-3 mt-3 ">
                <div class="pagination d-flex justify-content-center">
                    <?php
                    if ($pageno != 1) {
                    ?>
                        <button class=" btn btn-outline-dark" onclick="manageProducts(<?php echo  $pageno - 1; ?>);">&laquo;</button>
                        <?php
                    }

                    for ($page = 1; $page <= $number_of_pages; $page++) {
                        if ($page == $pageno) {
                        ?>
                            <button class="ms-1 btn btn-outline-dark active" onclick="manageProducts(<?php echo  $page; ?>);"><?php echo $page; ?></button>
                        <?php
                        } else {
                        ?>
                            <button class="ms-1 btn btn-outline-dark" onclick="manageProducts(<?php echo  $page; ?>);"><?php echo $page; ?></button>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    if ($pageno < $number_of_pages) {
                    ?>
                        <button class="ms-1 btn btn-outline-dark" onclick="manageProducts(<?php echo  $pageno + 1; ?>);">&raquo;</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </td>
    </tr>
    <!-- pagination -->