<?php

require './Classes/Application.php';
$obj_application = new Application();

if(isset($_POST['btn'])) {
    $term = $_POST['s_term'];
    $query_result = $obj_application->find_medicine_by_name($term);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PMS - Find</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/template.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!-- Content -->
                    <div class="section">
                        <div class="page-header">
                            <h1 class="text-center">Find medicine</h1>
                        </div>
                        <div class="jumbotron">
                            <form action="" method="post" class="form-horizontal form-insert">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" name="s_term" value="" class="form-control input-lg" placeholder="Type the name of medicine. i.e.: Napa">
                                    </div>
                                </div>
                                <input type="submit" name="btn" value="Find" class="btn btn-default btn-success pull-right">
                            </form>
                        </div>
                    </div>
                    <!-- /content -->

                    <!-- Result content -->
                    <div class="section">
                        <h3>Result</h3>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Rack No</th>
                                <th>Shelf No</th>
                                <th>ShelfBox No</th>
                                <th>Brand Name</th>
                                <th>Price/unit</th>
                            </tr>
                            <?php if(isset($query_result)) { while($query_info=mysql_fetch_array($query_result)) : ?>
                            <tr>
                                <td><?php echo $query_info['medicine_name'];?></td>
                                <td><?php echo $query_info['group_name'];?></td>
                                <td><b><?php echo $query_info['rack_no'];?></b></td>
                                <td><b><?php echo $query_info['shelf_no'];?></b></td>
                                <td><b><?php echo $query_info['shelfbox_no'];?></b></td>
                                <td><?php echo $query_info['brand_name'];?></td>
                                <td><?php echo $query_info['price'];?> BDT</td>
                            </tr>
                            <?php endwhile; } ?>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        
        
        
        <!--copyright-->
        <p class="copyright text-muted text-center">&copy; <a href="#">MoonStar</a> | <?php echo date('Y');?></p>








        <!-- Scripts -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/template.js"></script>
    </body>
</html>