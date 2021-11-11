<?php
    $q1 = mysqli_query($sql, "select count(*) as count from complaints where status='0'");
    $q2 = mysqli_query($sql, "select count(*) as count from complaints where status='1'");
    $q3 = "select id, category, type, details, status, added, updated from complaints order by status asc, added desc, updated desc";

    $p = mysqli_fetch_assoc($q1);
    $r = mysqli_fetch_assoc($q2);
?>
<div class="main-content">
    <div class="main-content-headers row">
        <button class="col btn btn-info margin-right margin-left-none"> Complaints: <?php echo htmlentities($p['count'] + $r['count']);?> </button>
        <button class="col btn btn-success margin-right margin-left"> Resolved: <?php echo htmlentities($r['count']);?> </button>
        <button class="col btn btn-warning margin-left"> Pending: <?php echo htmlentities($p['count']);?> </button>
    </div>
    <div class="main-content-headers-2">
        All Complaints
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
            $ret = mysqli_query($sql, $q3);
            while($row = mysqli_fetch_array($ret)) {
        ?>
            <tr class="clickable-row" data-href="/cms/admin/details.php" data-id="<?php echo htmlentities($row['id']);?>">
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
                            echo htmlentities('Open');
                        } else {
                            echo htmlentities('Closed');
                        }
                    ?>
                </td>
            </tr>
        <?php } ?>
        <?php
            $ret = mysqli_query($sql, $q3);
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
