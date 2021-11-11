<?php
session_start();
error_reporting(0);
include("../includes/config.php");

if ($_SESSION['type'] == $_COOKIE['type']) {
    header('location:dashboard.php');
}

if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $type = $_COOKIE['type'];

    console_log('XX'.$designation);

    if ($designation == "") {
        $designation = 'student';
    }

    $ret = mysqli_query($sql, "insert into users(uid, firstname, lastname, department, designation, gender, mobile, email, password) values('$uid', '$firstname','$lastname', '$department', '$designation', '$gender', '$mobile', '$email', '$password')");

    if ($ret) {
        $_SESSION['uid'] = $uid;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $type;
        $_SESSION['fname'] = $firstname;
        $_SESSION['lname'] = $lastname;
        $_SESSION['dep'] = $department;
        $_SESSION['desig'] = $designation;
        $_SESSION['tel'] = $mobile;

        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $extra = "dashboard.php";
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $errormsg = 'Invalid Credentials';
    }
}
?>

<?php include("../includes/meta.php"); ?>

<body>
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "includes/user_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
    <?php include("includes/form-register.php"); ?>
    <script>
        document.getElementsByTagName("title")[0].innerText = "CMS | New <?php echo $_COOKIE['typeu']; ?>";
        document
            .getElementsByTagName("body")[0]
            .setAttribute(
                "style",
                "background-image: url('/cms/assets/img/login-bg.jpg');"
            );

        document.getElementsByClassName("form-login-heading")[0].innerText = "<?php echo $_COOKIE['typeu']; ?> Registration";
    </script>
    <?php include("../includes/footer-empty.php"); ?>
