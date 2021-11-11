<?php
session_start();
error_reporting(0);
include("../includes/config.php");

if ($_SESSION['type'] == $_COOKIE['type']) {
    header('location:dashboard.php');
}

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM users WHERE email='" . $_POST['email'] . "' AND password='" . md5($_POST['password']);
    if ($_COOKIE['type'] == 'student') {
        $query .= "' AND designation='student'";
    } else if ($_COOKIE['type'] == 'faculty') {
        $query .= "' AND NOT designation='student' AND NOT designation='admin'";
    } else {
        $query .= "' AND designation='admin'";
    }

    $ret = mysqli_query($sql, $query);
    $num = mysqli_fetch_array($ret);

    if ($num > 0) {
        $_SESSION['uid'] = $num['uid'];
        $pret = mysqli_query($sql, "UPDATE users SET last_access=current_timestamp() WHERE uid='" . $_SESSION['uid'] . "'");
        if ($pret) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['type'] = $_COOKIE['type'];
            $_SESSION['fname'] = $num['firstname'];
            $_SESSION['lname'] = $num['lastname'];
            $_SESSION['dep'] = $num['department'];
            $_SESSION['desig'] = $num['designation'];
            $_SESSION['tel'] = $num['mobile'];

            $host = $_SERVER['HTTP_HOST'];
            $uip = $_SERVER['REMOTE_ADDR'];
            $extra = "dashboard.php";
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            header("location:http://$host$uri/$extra");
            exit();
        } else {
            $errormsg = "Unknown Error";
        }
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
