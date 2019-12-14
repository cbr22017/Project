<?php
require "./../database/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    print_r($_FILES['productImage']);
    
    //Save ke DB
    $image_name = $_FILES['productImage']['name'];
    $folder_name = "assets/images";
    $productImagePath = "$folder_name/$image_name";

    //upload ke server
    $root_folder = $_SERVER['DOCUMENT_ROOT'];
    $project_Folder = "$root_folder/tokowoof";
    $target_file_path = "$project_Folder/$productImagePath";

    echo "<br> url sekarang: $target_file_path";

    $allowed_extension = ["jpg","png","jpeg"];
    $image_extension = pathinfo($image_name,PATHINFO_EXTENSION);
    $productId = $_GET['productId'];

    session_start();
    if(in_array($image_extension,$allowed_extension)== false){
        $_SESSION['error'] = "Must be an image";
        header("location: ./../update.php?productId=$productId");
    }
    else if($_FILES['productImage']['size'] > 5000000){
        $_SESSION['error'] = "image size cannot exceed 5mbs";
        header("location: ./../update.php?productId=$productId");
    }
    else{
        $productName = mysqli_real_escape_string( $conn, $_POST['productName']) ;
        $productPrice = mysqli_real_escape_string( $conn, $_POST['productPrice']);
        $productImage = $productImagePath;

        $sql = "UPDATE product SET productName = ?,
        productPrice =?, 
        productImage = ? 
        WHERE productId = ?";
        //$conn->query($sql);

        $statement = $conn->prepare($sql);
        $statement->bind_param("sisi",$productName,$productPrice,$productImagePath,$productId);
        $statement->execute();
        $result = $statement->get_result() ;
        

    move_uploaded_file($_FILES['productImage']['tmp_name'],$target_file_path);

    header("location: ./../index.php");
    }
}