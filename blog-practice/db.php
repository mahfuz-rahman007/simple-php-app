<?php
// database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "blog_practice";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
