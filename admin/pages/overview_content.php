<?php

$result = $obj_admin->select_medicine_record_all();

?>
<div class="section overview">
    <h3>Stock report - Overview</h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Medicine Name</th>
            <th>Group</th>
            <th>Brand</th>
            <th>Quantity</th>
        </tr>
        <?php while($medicine_info = mysql_fetch_array($result)) : ?>
        <tr>
            <td><?php echo $medicine_info['medicine_name']; ?></td>
            <td><?php echo $medicine_info['group_name']; ?></td>
            <td><?php echo $medicine_info['brand_name']; ?></td>
            <td><?php echo $medicine_info['quantity']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>