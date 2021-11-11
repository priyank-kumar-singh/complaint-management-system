<?php
session_start();
error_reporting(0);

include('../includes/config.php');

if ($_SESSION['type'] != $_COOKIE['type']) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $uid = $_SESSION['uid'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['type'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $details = $_POST['details'];

    $ret = mysqli_query($sql, "insert into complaints(userId, userType, category, type, details) values('$uid', '$userType', '$category', '$type', '$details')");
    if ($ret) {
        header('location:index.php');
    } else {
        $errormsg = "Failed to Lodge Complaint.";
    }
}
?>

<?php include("../includes/meta.php"); ?>
<?php include("../includes/header.php"); ?>

<main class="flex-shrink-0">
    <div class="container">
        <?php include("includes/complaint-form.php"); ?>
    </div>
</main>

<script>
    document.getElementsByTagName("title")[0].innerText = "CMS | <?php echo $_COOKIE['typeu']; ?>";
</script>
<?php include("includes/header-js.php"); ?>
<?php include("../includes/footer.php"); ?>
