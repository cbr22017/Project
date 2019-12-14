<?php
require "./../database/db.php";

//username, password, remember, signin
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    $username = mysqli_real_escape_string( $conn, $_POST['username']);
    $password = mysqli_real_escape_string( $conn, $_POST['password']);
    $user_answer = (int) $_POST['useranswer'];
   $answer =(int) $_POST['answer']   ;

    $hash_password = sha1($password);
 
    // $sql = "SELECT * FROM user WHERE username = '$username' limit 1";

    // $result = $conn->query($sql);
   
    // --->hash
    session_start();
    $n=10; 
    function getName($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString = $characters[$index]; 
        } 
      
        return $randomString; 
    } 



$hasil = $user_answer - $answer;    

if($hasil == 0 ){

 $statement = $conn->prepare("SELECT * FROM user WHERE username = ? limit 1");
    $statement->bind_param("s",$username);
    $statement->execute();
    $result = $statement->get_result() ;
if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            if($row['username']=='admin'){
                session_regenerate_id();
                $_SESSION['username'] = $username;
                
                if(isset($_POST['remember'])) {
                    getname($n);
                    setcookie("username", getName($n) . sha1($username). getName($n), time() + 60 * 60 * 24 * 3, "/", null, false, true);
                    setcookie("password", getName($n) . md5($password). getName($n), time() + 60 * 60 * 24 * 3, "/", null, false, true);
                }
                header("location: ./../index.php");
            }
            else{
                session_regenerate_id();
                $_SESSION['username'] = $username;
                
                if(isset($_POST['remember'])) {
                    setcookie("username", $randomString .sha1($username). $randomString, time() + 60 * 60 * 24 * 3, "/", null, false, true);
                    setcookie("password", $randomString .md5($password). $randomString, time() + 60 * 60 * 24 * 3, "/", null, false, true);
                }
                header("location: ./../index.php");
            }
        } 
        else{
            $_SESSION['error'] = 'Wrong username or password';
            header("location: ./../login.php");
        }
    } 
    else{
        $_SESSION['error'] = 'Wrong username or password';
        header("location: ./../login.php");
    }

}
else{
    $_SESSION['error'] = 'Wrong Captcha';
    header("location: ./../login.php");
}
}
    
   
