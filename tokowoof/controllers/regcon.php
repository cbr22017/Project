<?php
require "./../database/db.php";
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn,$_POST['username']) ;
    $password = mysqli_real_escape_string($conn,$_POST['password']) ;
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']) ;

    if($password != $confirm_password){
        $_SESSION['error'] = 'Password not match !';
        header("location: ./../register.php");
    }

   
    else if($password == $confirm_password) {

 $user_data = $username;
  
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    
        $user_duplicate_check = "SELECT username FROM user WHERE username = '$username' limit 1 ";
        $result = $conn->query($user_duplicate_check);
        $get_rows = mysqli_num_rows($result);

    if($get_rows < 1 ){

    $sql = "INSERT INTO user VALUES(null, ?, ?)";
  //  $sql = "INSERT INTO user VALUES(null, '$username', '$hash_password')";
  //  $conn->query($sql);

    $statement = $conn->prepare($sql);
    $statement->bind_param("ss",$username,$hash_password);
    $statement->execute();
    $result = $statement->get_result() ;
   header("location: ./../login.php"); 
        
    }
    if($username == 'admin'){

        $_SESSION['error'] = 'Prohibited username !'  ;
        header ("location:../register.php");
        
    }
    
  

    else if ($get_rows > 0){
  
        $_SESSION['error'] = 'Duplicated username ! ';

         header("location: ./../register.php");
          
    }
   


    }
   
    
}