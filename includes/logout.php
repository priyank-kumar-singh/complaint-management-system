<?php
session_start();
include("includes/config.php");

$_SESSION['type'] == '';
session_unset();
header('location:../');
?>
