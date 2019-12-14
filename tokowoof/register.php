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



    <form class="form-signin" action="./controllers/regcon.php" method="post">
    
        <h1 class="h2 mb-4 font-weight-normal">Register</h1>
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
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control mb-1 mt-1" placeholder="Username" name="username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-1 mt-1" placeholder="Password" name="password" required="">
        <input type="password" id="inputPassword" class="form-control mb-1 mt-1" placeholder="Confirm Password" name="confirm_password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
        <span class="mt-2 d-inline-block">Already have an account? Sign in <a href="./login.php">here</a></span>
        <p class="mt-5 mb-3 text-muted"></p>
    </form>
</body>
</html>