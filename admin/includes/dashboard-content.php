<?php
$type = $_SESSION['type'];
$q1 = mysqli_query($sql, "select count(*) as count from complaints where status='0'");
$q2 = mysqli_query($sql, "select count(*) as count from complaints where status='1'");
$query = "select id, category, type, details, status, added, updated, userId, userType from complaints order by status asc, added desc, updated desc";

$p = mysqli_fetch_assoc($q1);
$r = mysqli_fetch_assoc($q2);
?>
<div class="main-content">
    <div class="main-content-headers row">
        <button class="col-4 btn btn-secondary" id="download-report-all">
            <i class="fa fa-download"></i> &ensp; Download Report
        </button>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-info"> Complaints: <?php echo htmlentities($p['count'] + $r['count']); ?> </button>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-success"> Resolved: <?php echo htmlentities($r['count']); ?> </button>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-warning"> Pending: <?php echo htmlentities($p['count']); ?> </button>
    </div>
    <div class="main-content-headers-2">
        All Complaints
    </div>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-warning">
                <th scope="col">Id</th>
                <th scope="col">Filed By</th>
                <th scope="col">Designation</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Details</th>
                <th scope="col">Added</th>
                <th scope="col">Updated</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ret = mysqli_query($sql, $query);
            while ($row = mysqli_fetch_array($ret)) {
                $userId = $row['userId'];
                $userType = $row['userType'];
                $uret = mysqli_query($sql, "SELECT firstname, designation from $userType where uid='$userId'");
                $user = mysqli_fetch_assoc($uret);
            ?>
                <tr class="clickable-row" data-href="/cms/admin/details.php" data-id="<?php echo htmlentities($row['id']); ?>">
                    <th scope="row"><?php echo htmlentities($row['id']); ?></th>
                    <td><?php echo htmlentities(ucwords($user['firstname'])); ?></td>
                    <td><?php echo htmlentities(ucfirst($user['designation'])); ?></td>
                    <td><?php echo htmlentities($row['type']); ?></td>
                    <td><?php echo htmlentities($row['category']); ?></td>
                    <td class="details">
                        <?php
                        $details = $row['details'];
                        $max = 30;
                        $x = substr($details, 0, $max);
                        if (strlen($x) == $max) {
                            $x .= "...";
                        }
                        echo htmlentities($x);
                        ?>
                    </td>
                    <td><?php echo htmlentities(datetime_local2($row['added'])); ?></td>
                    <td><?php echo htmlentities(datetime_local2($row['updated'])); ?></td>
                    <td>
                        <?php
                        $status = $row['status'];
                        if ($status == 0) {
                            echo htmlentities('Open');
                        } else {
                            echo htmlentities('Closed');
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php
            $ret = mysqli_query($sql, $query);
            $num = mysqli_fetch_array($ret);
            if ($num == 0) { ?>
                <td>0</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('download-report-all').addEventListener("click", function(e) {
        e.preventDefault();
        let data = [];
        <?php
        $cret = mysqli_query($sql, $query);
        while ($row = mysqli_fetch_array($cret)) {
            $uret = mysqli_query($sql, "SELECT * FROM " . $row['userType'] . " WHERE uid='" . $row['userId'] . "'");
            $user = mysqli_fetch_assoc($uret);
        ?>
            data.push({
                uid: "<?php echo $user['uid'] ?>",
                firstname: "<?php echo $user['firstname']; ?>",
                lastname: "<?php echo $user['lastname']; ?>",
                department: "<?php echo $user['department']; ?>",
                designation: "<?php echo $user['designation']; ?>",
                gender: "<?php echo $user['gender']; ?>",
                mobile: "<?php echo $user['mobile']; ?>",
                email: "<?php echo $user['email']; ?>",
                cid: "<?php echo $row['id']; ?>",
                category: "<?php echo $row['category']; ?>",
                type: "<?php echo $row['type']; ?>",
                details: "<?php echo $row['details']; ?>",
                status: "<?php echo $row['status']; ?>",
                remarks: "<?php echo $row['remarks']; ?>",
                added: "<?php echo $row['added']; ?>",
                updated: "<?php echo $row['updated']; ?>",
            });
        <?php } ?>
        downloadReport({
            complaints: data,
        });
    });
</script>
