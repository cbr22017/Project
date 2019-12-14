<?php 
    require './helpers/auth.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
  
</head>
<body class="text-center">

    <form class="form-signin" action="./controllers/logicon.php" method="post">
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
        <h1 class="h2 mb-4 font-weight-normal">Sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" class="form-control mb-1 mt-1" placeholder="Username" name="username" required="" autofocus="" value=<?php if(isset($_COOKIE['username'])) {echo htmlspecialchars($_COOKIE['username']);}?>>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-1 mt-1" placeholder="Password" name="password" required="" value=<?php if(isset($_COOKIE['password'])) {echo htmlspecialchars($_COOKIE['password']);}?>>
        <div class="elem-group">
            <label for="captcha">Please Enter the Captcha </label>
           
            <?php 
         include 'captcha.php'; 
         $first_num = rand(1,100);
         $second_num= rand(1,100);
     
         $operators = array("+","-","*");
         $operator  = rand(0, count($operators)-1);
         $operator = $operators[$operator]; 
         $answer = 0;
     
     switch($operator){
     
             case "+" :
             $answer = $first_num + $second_num;
             break;
             case "-" :
             $answer = $first_num - $second_num;
             break;
             case "*":
             $answer = $first_num * $second_num;
             break;
     }
     $_SESSION["answer"] = $answer;
     
           ?>
   
            <?php echo $first_num . " " . $operator . " " . $second_num . " = ";
           $answer = $_SESSION['answer'] ;
           
            ?>
            <input type="hidden" id="answer" name="answer" value = "<?php echo $answer; ?>  " >
        
            <input type="number" id="useranswer" name="useranswer" >
            
            <br>
            
        </div>
        
        <div class="checkbox mb-2 mt-2">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>

    
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
        <span class="mt-2 d-inline-block">Doesn't have an account yet? Register <a href="./register.php">here</a></span>
        <p class="mt-5 mb-3 text-muted"></p>
    </form>
</body>
</html>