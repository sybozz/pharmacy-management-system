<?php

$group_result = $obj_admin->select_group_info();
$brand_result = $obj_admin->select_brand_info();

if(isset($_POST['btn'])) {
    $success = $obj_admin->insert_medicine_info($_POST);
}

?>
<div class="section add-medicine">
    <div class="page-header">
        <h2>Add new medicine</h2>
    </div>
    <div class="jumbotron">
        <form action="" method="post" class="form-horizontal form-insert">
            <div class="form-group">
                <label for="" class="col-sm-3">ID</label>
                <div class="col-sm-9">
                    <input type="text" name="m_id" value="" class="form-control" placeholder="example: 123">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="m_name" value="" class="form-control" placeholder="example: Napa">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Group</label>
                <div class="col-sm-9">
                    <select name="group_id" class="form-control">
                        <option value="0">--Select a group--</option>
                        <?php while($group_info = mysql_fetch_array($group_result)) : ?>
                        <option value="<?php echo $group_info['group_id']; ?>"><?php echo $group_info['group_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
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
            <div class="form-group">
                <label for="" class="col-sm-3">Quantity</label>
                <div class="col-sm-9">
                    <input type="text" name="m_quantity" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Price / unit</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" name="m_price" value="" class="form-control">
                        <span class="input-group-addon">BDT</span>
                    </div>
                </div>
            </div>
            <input type="submit" name="btn" value="Save" class="btn btn-default btn-success pull-right">
            <p class="label label-success pull-left"><?php if(isset($success)){echo $success;} ?></p>
        </form>
    </div>
</div>
