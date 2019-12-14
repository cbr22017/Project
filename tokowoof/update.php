<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php 
        include './layouts/header.php';
        include './database/db.php';

        if(isset($_SESSION['username']) == false) {
            header("location: ./index.php");
        }

        $productId = $_GET['productId'];
        $sql = "SELECT * FROM product WHERE productId = $productId";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
    ?>

    <form class="form-signin p-4 pl-5" action="./controllers/updcon.php?productId=<?php echo $productId?>" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_SESSION['error'])) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']?>
                </div>
        <?php
                unset($_SESSION['error']);
            }
        ?>
        <h1 class="h2 mb-4 font-weight-normal">Update Product</h1>
        <div class="row">
            <div class="col">
                <input type="text" id="productName" class="form-control mb-1 mt-1" placeholder="Product Name" name="productName" required="" autofocus="" value="<?php echo $data['productName']?>">
                <input type="number" id="productPrice" class="form-control mb-1 mt-1" placeholder="Product Price" name="productPrice" required="" value="<?php echo $data['productPrice']?>">
                <input type="file" name="productImage" id="productImage">
            </div>
            <div class="col">
                <img class="w-50 mx-auto d-block" src="<?php echo $data['productImage']?>" alt="Product Image">
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="update">Update</button>
    </form>
</body>