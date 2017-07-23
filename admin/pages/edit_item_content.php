<?php

//getting the id from url
$medicine_id = $_GET['id'];

//update info by the id
if(isset($_POST['btn'])) {
    $success = $obj_admin->update_info_by_id($_POST);
}

//extracting medicine records by the id
$result = $obj_admin->select_medicine_record_by_id($medicine_id);
$medicine_info = mysql_fetch_array($result);

//rack info extract
$rack_result = $obj_admin->select_rack_info_by_id($medicine_id);
$rack_info = mysql_fetch_array($rack_result);




?>
<div class="section update-medicine">
    <div class="page-header">
        <p class="label label-success pull-right"><?php if(isset($success)){echo $success;} ?></p>
        <h3>Update medicine info</h3>
    </div>
    <div class="jumbotron">
        <form action="" method="post" class="form-horizontal form-insert">
            <div class="form-group">
                <label for="" class="col-sm-3">Medicine ID</label>
                <div class="col-sm-9">
                    <input type="text" disabled value="<?php echo $medicine_info['medicine_id']; ?>" class="form-control">
                    <input type="hidden" name="medicine_id" value="<?php echo $medicine_info['medicine_id']; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="m_name" value="<?php echo $medicine_info['medicine_name']; ?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="" class="col-sm-3">Rack no</label>
                <div class="col-sm-9">
                    <input type="text" name="rack_no" value="<?php echo $rack_info['rack_no'];?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Shelf no</label>
                <div class="col-sm-9">
                    <input type="text" name="shelf_no" value="<?php echo $rack_info['shelf_no'];?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Shelf Box no</label>
                <div class="col-sm-9">
                    <input type="text" name="shelfbox_no" value="<?php echo $rack_info['shelfbox_no'];?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="" class="col-sm-3">Price / unit</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" name="m_price" value="<?php echo $medicine_info['price']; ?>" class="form-control">
                        <span class="input-group-addon">BDT</span>
                    </div>
                </div>
            </div>
            <input type="submit" name="btn" value="Update" class="btn btn-default btn-success pull-right">
        </form>
    </div>
</div>