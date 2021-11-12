<?php
session_start();
error_reporting(0);
include("../includes/config.php");

if ($_SESSION['type'] == $_COOKIE['type']) {
    header('location:dashboard.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $type = $_COOKIE['type'];

    console_log($_POST['email'] . ' ' . $_POST['password'] . ' ' . $_COOKIE['type']);
    $ret = mysqli_query($sql,  "SELECT * FROM users WHERE email='$email' AND password='$password' AND type='$type'");
    $num = mysqli_fetch_array($ret);

    if ($num > 0) {
        console_log("I am in 3");
        $uret = mysqli_query($sql, "SELECT * FROM " . $_COOKIE['type'] . " WHERE email='" . $_POST['email'] . "'");
        $pret = mysqli_query($sql, "UPDATE users SET last_access=current_timestamp() WHERE email='" . $_POST['email'] . "'");

        $user = mysqli_fetch_assoc($uret);

        $_SESSION['uid'] = $user['uid'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['type'] = $_COOKIE['type'];
        $_SESSION['fname'] = $user['firstname'];
        $_SESSION['lname'] = $user['lastname'];
        $_SESSION['dept'] = $user['department'];
        $_SESSION['designation'] = $user['designation'];
        $_SESSION['mobile'] = $user['mobile'];

        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $extra = "dashboard.php";
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $errormsg = "Invalid username or password";
    }
}
?>

<?php include("../includes/meta.php"); ?>

<body>
    <?php include("includes/form-login.php"); ?>
    <script>
        document.getElementsByTagName("title")[0].innerText = "CMS | <?php echo $_COOKIE['typeu']; ?> Login";
        document
            .getElementsByTagName("body")[0]
            .setAttribute(
                "style",
                "background-image: url('/cms/assets/img/login-bg.jpg');"
            );
        document.getElementsByClassName("form-login-heading")[0].innerText = "<?php echo $_COOKIE['typeu']; ?> Login";
    </script>
    <?php include("../includes/footer-empty.php"); ?>
