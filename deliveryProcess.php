<?php

require "connection.php";



if(isset($_GET["id"])){
    $id = $_GET["id"];
    $productrs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$id."' ");
    $num = $productrs->num_rows;

    if($num == 1){
        $row = $productrs->fetch_assoc();
        $ps = $row["delivery"];

        if($ps == "1"){
            Database::iud("UPDATE `invoice` SET `delivery`='0' WHERE `id`='".$id."' ");
            echo "success1";
        } else{
            Database::iud("UPDATE `invoice` SET `delivery`='1' WHERE `id`='".$id."' ");
            echo "success2";
        }
    }
}
