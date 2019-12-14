<?php
    require "./../database/db.php";
    $productId = $_GET['productId'];
    $sql = "DELETE FROM product WHERE productId = $productId";

    $conn->query($sql);
    echo $sql;
    header('location: ./../index.php');
?>