<?php
session_start();
if(isset($_SESSION['user'])){
    $conn = new mysqli("localhost","prshnx5n","Prakash98!!","prshnx5n_prison");
if($conn->connect_error){
	die("Connection failed. Please reload.");
}
$sql = "SELECT * FROM stats LIMIT 1";
$result = $conn->query($sql);
$error="";
if(isset($_POST['submit']))
{
    $orders=    $_POST['orders'] ;
    $clients = $_POST['clients'];
    $sold = $_POST['sold'];
    if (empty($sold) || empty($_POST['clients']) || empty($_POST['orders']))
    {
        $error = "Cant be empty";
    }
    else{
        $sql1 = "UPDATE stats SET orders = '$orders',clients = '$clients', sold='$sold'";
        if ($result1 = $conn->query($sql1))
        {
            $error = "Successfully updated";
        }
        else
        $error = "There was some error.Please try again.";
    }
}
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stats</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        .add{
            border-style:solid;
            border-color:green;
            border-radius:10px;
            padding:15px;
        }
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] { 
  width:30%;
}
        </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- /.navbar-header -->

          

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="slider.php"><i class="fa fa-sliders fa-fw"></i> Slider</a>
                        </li>
                        <li>
                            <a href="nslider.php"><i class="fa fa-newspaper-o fa-fw"></i> Notice Slider</a>
                        </li>
                       
                        <li>
                            <a href="products.php"><i class="fa fa-shopping-cart fa-fw"></i> All Products</a>
                        </li>
                         <li>
                            <a href="featured.php"><i class="fa fa-star fa-fw"></i> Featured Product</a>
                        </li>
                        <li>
                            <a href="stats.php"><i class="fa fa-pie-chart fa-fw"></i> Stats</a>
                        </li>
                        <li>
                            <a href="queries.php"><i class="fa fa-question fa-fw"></i> Queries</a>
                        </li>
                        <li>
                            <a href="edit.php"><i class="fa fa-user-plus fa-fw"></i> Add / Remove Admin</a>
                        <li>
                            <a href="logout.php"><i class="fa fa-reply fa-fw"></i> Logout</a>
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stats</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Company Stats                       </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ORDERS</th>
                                        <th>CLIENTS</th>
                                        <th>SOLD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
?>
                                    <tr class="">
                                        <td><?php echo $row['orders']; ?></td>
                                        <td><?php echo $row['clients']; ?></td>
                                        <td><?php echo $row['sold']; ?></td>
                                    </tr>
                                     <?php
    }
}
?>
                                </tbody>
                            </table>
<br><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                            <input class="form-control" name="orders" placeholder="Update Orders" type="number" required>
                            <br>
                            <input class="form-control" name="clients" placeholder="Update Clients" type="number" required>

<br>
<input class="form-control" name="sold" placeholder="Update Sold" type="number" required>

                                            
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-success" name="submit">
                                        
                                        <?php echo $error; ?>
</form>                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
<?php
}
else
header("Location: login.php");
die();
?>