<?php
    require_once("../../includes/config.php");
    $query = "DELETE FROM complaints WHERE id='" . $_COOKIE['cmpid'] . "'";
    $ret = mysqli_query($sql, $query);

    if ($ret) {
        header("location:/cms/user/");
    } else {
        $errormsg = "Failed to delete complaint.";
    }
?>
