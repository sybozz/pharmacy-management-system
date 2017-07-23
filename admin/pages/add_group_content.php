<?php

$brand_result = $obj_admin->select_brand_info();

if(isset($_POST['btn'])) {
    $success = $obj_admin->insert_group_info($_POST);
}

$group_result = $obj_admin->select_group_info();

?>

<div class="section add-group">
    <div class="page-header">
        <h2>Add a new group</h2>
    </div>
    <div class="jumbotron">
        <form action="" method="post" class="form-horizontal form-insert">
            <div class="form-group">
                <label class="col-sm-3">Group ID</label>
                <div class="col-sm-9">
                    <input type="text" name="group_id" value="" required class="form-control" placeholder="example: 123">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Group name</label>
                <div class="col-sm-9">
                    <input type="text" name="group_name" value="" required class="form-control" placeholder="example: Paracetamol">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Brand</label>
                <div class="col-sm-9">
                    <select name="brand_id" class="form-control">
                        <option value="0">--Select a brand--</option>
                        <?php while($brand_info = mysql_fetch_array($brand_result)) : ?>
                        <option value="<?php echo $brand_info['brand_id']; ?>"><?php echo $brand_info['brand_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <input type="submit" name="btn" value="Save" class="btn btn-default btn-success pull-right">
            <p class="label label-success pull-left"><?php if(isset($success)){echo $success;} ?></p>
        </form>
    </div>
</div>

<!--Group info overview-->
<div class="section overview">
    <h3>Group - Recently added</h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Group ID</th>
            <th>Group Name</th>
            <th>Brand ID</th>
        </tr>
        <?php while($group_info = mysql_fetch_array($group_result)) : ?>
        <tr>
            <td><?php echo $group_info['group_id']; ?></td>
            <td><?php echo $group_info['group_name']; ?></td>
            <td><?php echo $group_info['brand_id']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>