<?php

if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $warning = $obj_admin->delete_info_by_id($delete_id);
}

$update_query = $obj_admin->select_medicine_record_all();


?>

<div class="section manage">
    <h3>Update records</h3>
    <?php if(isset($warning)):?><p class="label label-warning pull-right"><?php echo $warning; ?></p><?php endif;?>
    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Group</th>
            <th>Brand</th>
            <th>Action</th>
        </tr>
        <?php while($update_query_info = mysql_fetch_array($update_query)) : ?>
        <tr>
            <td><?php echo $update_query_info['medicine_name']; ?></td>
            <td><?php echo $update_query_info['group_name']; ?></td>
            <td><?php echo $update_query_info['brand_name']; ?></td>
            <td>
                <a href="edit_item.php?id=<?php echo $update_query_info['medicine_id']; ?>">Edit</a> | <a href="?delete=<?php echo $update_query_info['medicine_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>