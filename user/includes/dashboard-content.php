<?php
    $q1 = mysqli_query($sql, "select count(*) as count from complaints where userId='".$_SESSION['uid']."' and status='0'");
    $q2 = mysqli_query($sql, "select count(*) as count from complaints where userId='".$_SESSION['uid']."' and status='1'");

    $p = mysqli_fetch_assoc($q1);
    $r = mysqli_fetch_assoc($q2);
?>
<div class="main-content">
    <div class="main-content-headers row">
        <a class="col-4 btn btn-secondary" type="button" href="/cms/user/complaint.php">
            <i class="fa fa-plus"></i> &ensp; Lodge Complaint
        </a>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-info"> Complaints: <?php echo htmlentities($p['count'] + $r['count']);?> </button>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-success"> Resolved: <?php echo htmlentities($r['count']);?> </button>
        <!-- <span class="col"></span> -->
        <button class="col btn btn-warning"> Pending: <?php echo htmlentities($p['count']);?> </button>
    </div>
    <div class="main-content-headers-2">
        My Complaints
    </div>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-warning">
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Type</th>
                <th scope="col">Details</th>
                <th scope="col">Added</th>
                <th scope="col">Updated</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $ret = mysqli_query($sql, "select id, category, type, details, status, added, updated from complaints where userId='".$_SESSION['uid']."' order by status asc, added desc");
            while($row = mysqli_fetch_array($ret)) {
        ?>
            <tr class="clickable-row" data-href="http://localhost/cms/user/details.php" data-id="<?php echo htmlentities($row['id']);?>">
                <th scope="row"><?php echo htmlentities($row['id']);?></th>
                <td><?php echo htmlentities($row['category']);?></td>
                <td><?php echo htmlentities($row['type']);?></td>
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
                <td><?php echo htmlentities(datetime_local2($row['added']));?></td>
                <td><?php echo htmlentities(datetime_local2($row['updated']));?></td>
                <td>
                    <?php
                        $status = $row['status'];
                        if ($status == 0) {
                            echo htmlentities('In Process');
                        } else {
                            echo htmlentities('Closed');
                        }
                    ?>
                </td>
            </tr>
        <?php } ?>
        <?php
            $ret = mysqli_query($sql, "select id, category, type, details, status, added, updated from complaints where userId='".$_SESSION['uid']."' order by status asc, added desc");
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
