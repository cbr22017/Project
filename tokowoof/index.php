<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/homepage.css">
    <link rel="stylesheet" href="./assets/css/background.css">
</head>
<body>
    <?php include './layouts/header.php'?>
    <div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <?php
        if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin' ){
            ?>
                    <form class="form-signin mt-5" action="./controllers/insprod.php" method="post" enctype="multipart/form-data">
                        <h1 class="h2 mb-4 font-weight-normal">Products</h1>
                        <input type="text" id="" class="form-control mb-1 mt-1" placeholder="Product Name" name="productName" required="" autofocus="">
                        <input type="number" id="" class="form-control mb-1 mt-1" placeholder="Product Price" name="productPrice" required="">
                        <div class="text-left mb-1 mt-1">
                            <input type="file" name="productImage" class="w-100" id="inputFile" required="">
                        </div>
                        <?php 
                            if(isset($_SESSION['error'])) {
                        ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($_SESSION['error'])?>
                                </div>
                        <?php
                                unset($_SESSION['error']);
                            }
                        ?>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="insert">Insert</button>
                    </form>
                <?php
                }
            ?>
    
            <?php
                if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
                    ?>
                    <table class="table table-striped mt-5">
                    <table bgcolor="#FFFFFFF">
                        <thead>
                            <tr>
                                <td style="width:25%"></td>
                                <td style="width:50%"><table><tr><td>
                                <th scope="col"></th>
                                </td></tr></table></td>
                                <td style="width:25%"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require "./database/db.php";
                                $sql = "SELECT * FROM product";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><img src=<?php echo htmlspecialchars($row['productImage'])?> alt="" width="200"></td>
                                            <td scope="row"><?php echo htmlspecialchars($row['productName'])?></td>
                                            <td><?php echo htmlspecialchars($row['productPrice'])?></td>
                                            <td>
                                                <a href="./update.php?productId=<?php echo $row['productId']?>" role="button" class="btn btn-success">Update</a>
                                                <a href="./controllers/delprod.php?productId=<?php echo htmlspecialchars($row['productId']) ?>" role="button" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }


        else{
                ?> 
                <table class="table table-striped mt-5">
                <table bgcolor="#FFFFFFF">
                    <thead>
                        <tr>
                            <td style="width:25%"></td>
                            <td style="width:50%"><table><tr><td>
                            <th scope="col"></th>
                            </td></tr></table></td>
                            <td style="width:25%"></td>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                            require "./database/db.php";
                            $sql = "SELECT * FROM product";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><img src=<?php echo htmlspecialchars($row['productImage'])?> alt="" width="200"></td>
                                        <td scope="row"><?php echo htmlspecialchars($row['productName'])?></td>
                                        <td><?php echo htmlspecialchars($row['productPrice'])?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <?php
            }
        ?>
    </div>
    <div class="container">
        <?php include './layouts/footer.php'?>
    </div>
</body>
</html>