<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><b>Toko Woof</b></h5>
    <?php
        session_start();
        if(isset($_SESSION['username'])) {
    ?>
            <h6 class="my-0 font-weight-normal">Welcome, <?php echo htmlspecialchars($_SESSION['username']) ?></span>
            <a class="btn btn-outline-primary ml-1 mr-1" href="./controllers/logocon.php">Logout</a>
    <?php
        } else {
    ?>
            <a class="btn btn-outline-primary ml-1 mr-1" href="./login.php">Login</a>
            <a class="btn btn-outline-primary ml-1 mr-1" href="./register.php">Register</a>
    <?php 
        }
    ?>
</div>