<?php

$brand_result = $obj_admin->select_brand_info();

if(isset($_POST['btn'])) {
    $success = $obj_admin->insert_brand_info($_POST);
}

?>
<div class="section add-brand">
    <div class="page-header">
        <h2>Add a new brand</h2>
    </div>
    <div class="jumbotron">
        <form action="" method="post" class="form-horizontal form-insert">
            <div class="form-group">
                <label for="" class="col-sm-3">Brand ID</label>
                <div class="col-sm-9">
                    <input type="text" name="brand_id" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Brand name</label>
                <div class="col-sm-9">
                    <input type="text" name="brand_name" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Contact info</label>
                <div class="col-sm-9">
                    <input type="text" name="brand_contact" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Country</label>
                <div class="col-sm-9">
                    <input type="text" name="brand_country" value="" class="form-control">
                </div>
            </div>
            <input type="submit" name="btn" value="Save" class="btn btn-default btn-success pull-right">
            <p class="label label-success pull-left"><?php if(isset($success)){echo $success;} ?></p>
        </form>
    </div>
</div>

<!-- info overview-->
<div class="section overview">
    <h3>Brand - Recently added</h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Brand ID</th>
            <th>Name</th>
            <th>Contact info</th>
            <th>Country</th>
        </tr>
        <?php while($brand_info = mysql_fetch_array($brand_result)) : ?>
        <tr>
            <td><?php echo $brand_info['brand_id']; ?></td>
            <td><?php echo $brand_info['brand_name']; ?></td>
            <td><?php echo $brand_info['contact']; ?></td>
            <td><?php echo $brand_info['country']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>