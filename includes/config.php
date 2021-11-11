<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "complaint-management";
    $sql = mysqli_connect($host, $user, $password, $database) or die("Could not connect database");

    include("functions.php");
?>
