<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "metatokowoof";

$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error) {
    die("Connection to DB failed");
}