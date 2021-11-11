<?php
$ret = mysqli_query($sql, "SELECT * FROM complaints WHERE id='" . $_COOKIE['cmpid'] . "'");
$row = mysqli_fetch_assoc($ret);

$uret = mysqli_query($sql, "SELECT * FROM users WHERE uid='" . $row['userId'] . "'");
$user = mysqli_fetch_assoc($uret);
?>

<div class="main-content">
    <div class="main-content-headers-2" style="padding: 0;">
        User Details
        <?php
        if ($row['status'] == 0) {
            echo '<a id="delete-comp" style="float: right; margin-left: 20px;" href="includes/complaint-delete.php" title="Withdraw Complaint"><i class="fa fa-trash-o"></i></a>';
            echo '<a style="float: right;" href="edit.php" title="Edit Complaint"><i class="fa fa-edit"></i></a>';
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
        if ($designation != 'student') {
            echo '<div class="col">';
            echo '<div class="input-group mb-3">';
            echo '<span class="input-group-text">Designation</span>';
            echo '<div class="form-control">';
            echo ucfirst($designation);
            echo '</div></div></div>';
        }
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
                <div class="form-control">
                    <?php echo htmlentities($row['remarks']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("delete-comp").addEventListener("click", function(event) {
        event.preventDefault();
        const yes = confirm('You\'re about to withdraw this complaint. This complaint will be removed from database. Confirm?');
        if (yes) {
            window.document.location = "includes/complaint-delete.php";
        }
    });
</script>
