<?php
require_once("../../includes/config.php");

if (!empty($_POST['email'])) {
	$email = $_POST["email"];
	$result = mysqli_query($sql, "SELECT email FROM users WHERE email='$email'");
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		echo "<span style='color:red'> Email already exists .</span>";
 		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {
		echo "<span style='color:green'> Email available for Registration $email.</span>";
 		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>
