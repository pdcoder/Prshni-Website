<?php
session_start();
if(isset($_SESSION['user'])){
    $conn = new mysqli("localhost","prshnx5n","Prakash98!!","prshnx5n_prison");
    if($conn->connect_error){
	die("Connection failed. Please reload.");
}
$sql = "SELECT * FROM productlist";
$result = $conn->query($sql);
$err="";

$success="";
if((isset($_POST['submit'])))
{
    $id = $_POST['id'];
    $sql2 = "SELECT * FROM productlist WHERE id = '$id'";
    $result2 = $conn->query($sql2);

    $row2 = $result2->fetch_assoc();
    $img = $row2['img'];
    $des = $row2['imagdes'];
    $imgname= $row2['imgname'];
    $price = $row2['price'];
    $sql1 = "UPDATE featured SET img = '$img', imagdes = '$des', imgname = '$imgname', price = '$price'";
    if($result1 = $conn->query($sql1))
    $success = "Successfully updated.";
    else
    $err = "There was a problem in updating. Try again.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Featured Product</title>

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
                    <h1 class="page-header">Queries</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
All Cuustomer Queries                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>DESCRIPTION</th>
                                        <th>PICTURE</th>
                                        <th>PRICE</th>
                
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['imgname']; ?></td>
                                        <td><?php echo $row['imagdes']; ?></td>
                                        <td><a href="<?php echo $row['img']; ?>" target="_blank"><?php echo $row['img']; ?></a></td>
                            <td><?php echo $row['price']; ?></td>
                                    </tr>
                                    
                                     <?php
    }
}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <br><br>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                            <div class="form-group">
                                
                            <input class="form-control" name="id" placeholder="ID of product which is to be featured">
                            <br>
<br>
            
                                        </div>
                                        <input type="submit" value="Submit" class="btn btn-success" name="submit">
                                        <span class="error"><?php echo $err; ?></span>
                                        <span style="font-weight:bold;color:red;"><?php echo $success; ?></span>
</form>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                    <div>

        
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
header("Location:login.php");
?>