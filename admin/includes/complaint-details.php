<?php
$ret = mysqli_query($sql, "SELECT * FROM complaints WHERE id='" . $_COOKIE['cmpid'] . "'");
$row = mysqli_fetch_assoc($ret);

$uret = mysqli_query($sql, "SELECT * FROM users WHERE uid='" . $row['userId'] . "'");
$user = mysqli_fetch_assoc($uret);


if (isset($_POST['submit'])) {
    console_log($_POST['remarks']);
    $query = "UPDATE complaints SET remarks='".$_POST['remarks']."', updated=current_timestamp(), status=1 WHERE id='" . $_COOKIE['cmpid'] . "'";
    $ret = mysqli_query($sql, $query);

    console_log($ret);
    if ($ret) {
        $msg = 'Complaint Closed.';
    } else {
        $errormsg = 'Operation Failed';
    }

}

?>

<div class="main-content">
    <form name="remark-complaint" method="post">
            <?php
                if ($errormsg) {
                    echo "<span style='padding-left:4%; padding-top:2%;  color:red'> Operation Failed </span><br><br>";
                } else if ($msg) {
                    echo "<span style='padding-left:4%; padding-top:2%;  color:green'> Complaint Closed. Refresh Page to See Changes. </span><br><br>";
                }
            ?>
        <div class="main-content-headers-2" style="padding: 0;">
            User Details
            <?php
            if ($row['status'] == 0) {
                echo '<button name="submit" style="float: right;" class="btn btn-secondary"><i class="fa fa-save"></i> &nbsp;Save and Mark Close</a>';
            }
            ?>
        </div>
        <br><br>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">Username</span>
                    <div class="form-control"><?php echo htmlentities($user['firstname'] . ' ' . $user['lastname']); ?></div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Department</span>
                    <div class="form-control">
                        <?php
                        $dep = $user['department'];
                        if ($dep == 'CSE') {
                            $dep = 'Computer Science and Engineering';
                        } else if ($dep == 'ECE') {
                            $dep = 'Electronics and Communications Engineering';
                        } else {
                            $dep = 'Other Department';
                        }
                        echo htmlentities($dep);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">UID</span>
                    <div class="form-control"><?php echo htmlentities($row['userId']); ?></div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">Email &nbsp;&emsp;&ensp;</span>
                    <div class="form-control"><?php echo htmlentities($user['email']); ?></div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Mobile&emsp;&emsp;&nbsp;</span>
                    <div class="form-control"><?php echo htmlentities($user['mobile']); ?></div>
                </div>
            </div>
            <?php
            $designation = $user['designation'];
            // if ($designation != 'student') {
            echo '<div class="col">';
            echo '<div class="input-group mb-3">';
            echo '<span class="input-group-text">Designation</span>';
            echo '<div class="form-control">';
            echo ucfirst($designation);
            echo '</div></div></div>';
            // }
            ?>
        </div>
        <div class="main-content-headers-2" style="padding: 0;">
            Complaint Details
        </div>
        <br><br>
        <div class="row g-3">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">ID</span>
                    <div class="form-control"><?php echo htmlentities($row['id']); ?></div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Category</span>
                    <div class="form-control">
                        <?php
                        $cat = $row['category'];
                        if ($cat == 'C1') {
                            $cat = 'Category 1';
                        } else if ($cat == 'C2') {
                            $cat = 'Category 2';
                        } else if ($cat == 'C3') {
                            $cat = 'Category 3';
                        } else {
                            $cat = 'Other';
                        }

                        echo htmlentities($cat);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Type</span>
                    <div class="form-control"><?php echo htmlentities($row['type']); ?></div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Added</span>
                    <div class="form-control">
                        <?php echo htmlentities(datetime_local($row['added'])); ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Updated</span>
                    <div class="form-control">
                        <?php echo htmlentities(datetime_local($row['updated'])); ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Status</span>
                    <div class="form-control">
                        <?php
                        $status = $row['status'];
                        if ($status == 0) {
                            echo htmlentities('In Process');
                        } else {
                            echo htmlentities('Closed');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Details</span>
                    <div class="form-control">
                        <?php echo htmlentities($row['details']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Remarks</span>
                    <?php
                    if ($row['status'] == 1) {
                        echo '<div class="form-control">';
                        echo $row["remarks"];
                        echo '</div>';
                    } else {
                        echo '<input name="remarks" maxlength="500" class="form-control" maxlength="200" placeholder="word limit: 500" required></input>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>
