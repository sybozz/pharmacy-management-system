<?php

session_start();

//Login state and redirecting
$admin_id = $_SESSION['admin_id'];
if($admin_id == NULL) {
    header('Location: index.php');
}

//Required resources
require '../Classes/Admin.php';
$obj_admin = new Admin();

//Logout
if(isset($_GET['action'])) {
    if($_GET['action'] == 'logout') {
        $obj_admin->admin_logout();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/favicon.ico">

        <title>PMMS - Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <?php include './includes/navigation.php'; ?>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-sm-2 sidebar">
                    <?php include './includes/sidebar.php'; ?>
                </div>

                <div class="col-sm-10 col-sm-offset-2 main">
                   <?php
                        if(isset($page)) {
                            //conditional statements
                            if($page == 'add_medicine') {
                                include './pages/add_medicine_content.php';
                            }
                            elseif($page == 'add_group') {
                                include './pages/add_group_content.php';
                            }
                            elseif($page == 'add_brand') {
                                include './pages/add_brand_content.php';
                            }
                            elseif($page == 'manage') {
                                include './pages/manage_content.php';
                            }
                            elseif($page == 'placement') {
                                include './pages/placement_content.php';
                            }
                            elseif($page == 'edit_item') {
                                include './pages/edit_item_content.php';
                            }
                        } else {
                            include './pages/overview_content.php';
                        }
                   ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
