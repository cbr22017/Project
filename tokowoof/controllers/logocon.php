<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time() - 10, "/", null);
setcookie("password", "", time() - 10, "/", null);
header('location: ./../index.php');