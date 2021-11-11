<?php
$ret = mysqli_query($sql, "select * from complaints where id='" . $_COOKIE['cmpid'] . "'");
$row = mysqli_fetch_assoc($ret);

if (isset($_POST['cancel'])) {
    header("location:/cms/user/details.php");
}

if (isset($_POST['submit'])) {
    $query = "UPDATE complaints SET category='" . $_POST['category'] . "', type='" . $_POST['type'] . "', details='" . $_POST['details'] . "', updated=current_timestamp() WHERE id='".$_COOKIE['cmpid']."'";
    $ret = mysqli_query($sql, $query);

    if ($ret) {
        header("location:/cms/user/details.php");
    } else {
        $errormsg = "Failed to update details.";
    }
}

?>

<div class="main-content">
    <span style="padding-left:4%; padding-top:2%;  color:red">
        <?php if ($errormsg) echo htmlentities($errormsg); ?>
    </span>
    <div class="main-content-headers-2" style="padding: 0;">
        Edit Complaint Details
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
    </div>
    <br>
    <form name="complaint-edit" method="post">
        <div class="row g-3">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Category</span>
                    <select id="cat" name="category" class="form-select" required>
                        <option value="C1">Category 1</option>
                        <option value="C2">Category 2</option>
                        <option value="C3">Category 3</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Type</span>
                    <select id="compType" name="type" class="form-select" required>
                        <option value="General">General Query</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Details</span>
                    <input name="details" class="form-control" maxlength="500" placeholder="word limit: 500" value="<?php echo htmlentities($row['details']); ?>" required></input>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-secondary" name="cancel"> Cancel </button> &nbsp;
        <button class="btn btn-theme" name="submit"> &nbsp;Save&nbsp; </button>
    </form>
</div>
<script>
    const category = '<?php echo $row['category']; ?>';
    const catOps = document.getElementById("cat").getElementsByTagName("option");
    for (let i = 0; i < catOps.length; ++i) {
        if (catOps[i].value === category) {
            catOps[i].setAttribute("selected", "true");
            break;
        }
    }

    const types = '<?php echo $row['type']; ?>';
    const comOps = document.getElementById("compType").getElementsByTagName("option");
    for (let i = 0; i < comOps.length; ++i) {
        if (comOps[i].value === types) {
            comOps[i].setAttribute("selected", "true");
            break;
        }
    }
</script>
