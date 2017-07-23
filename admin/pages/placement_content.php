<?php

$m_query = $obj_admin->select_medicine_record_all();

if(isset($_POST['btn'])) {
    $success = $obj_admin->insert_placement_info($_POST);
}

?>

<div class="section placement">
    <div class="page-header">
        <h2>Assign medicine to a rack</h2>
    </div>
    <div class="jumbotron">
        <form action="" method="post" class="form-horizontal form-insert">
            <div class="form-group">
                <label for="" class="col-sm-3">Rack Number:</label>
                <div class="col-sm-9">
                    <input type="text" name="rack_no" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Shelf Number:</label>
                <div class="col-sm-9">
                    <input type="text" name="shelf_no" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">ShelfBox Number:</label>
                <div class="col-sm-9">
                    <input type="text" name="shelfbox_no" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3">Medicine ID:</label>
                <div class="col-sm-9">
                    <input type="text" name="medicine_id" value="" class="form-control">
                </div>
            </div>
            <input type="submit" name="btn" value="Save" class="btn btn-default btn-success pull-right">
            <p class="label label-success pull-left"><?php if(isset($success)){echo $success;} ?></p>
        </form>
    </div>
</div>
<!-- info overview-->
<div class="section overview">
    <h3>Medicine info - Recently added</h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Medicine ID</th>
            <th>Name</th>
        </tr>
        <?php while($m_info = mysql_fetch_array($m_query)) : ?>
        <tr>
            <td><?php echo $m_info['medicine_id']; ?></td>
            <td><?php echo $m_info['medicine_name']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>