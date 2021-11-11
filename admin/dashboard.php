<?php
session_start();
error_reporting(0);

include('../includes/config.php');

if ($_SESSION['type'] != $_COOKIE['type']) {
    header('location:index.php');
}
?>

<?php include("../includes/meta.php"); ?>
<?php include("../includes/header.php"); ?>

<main class="flex-shrink-0">
    <div class="container">
        <?php include("includes/dashboard-content.php"); ?>
    </div>
</main>

<script>
    document.getElementsByTagName("title")[0].innerText = "CMS | <?php echo $_COOKIE['typeu']; ?>";
</script>
<?php include("includes/header-js.php"); ?>
<?php include("../includes/footer.php"); ?>
