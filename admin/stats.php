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
            header("Refresh:0");
        }
        else
        $error = "There was some error.Please try again.";
    }
}
?>      
<?php include("header.php");?>
    <title>Stats</title>

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
        <?php include("nav.php");?>

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
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
?>
                                    <tr class="">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <td><input type="text" value="<?php echo $row['orders'];?>" name="orders" /></td>
                                        <td><input type="text" value="<?php echo $row['clients'];?>" name="clients" /></td>
                                        <td><input type="text" value="<?php echo $row['sold'];?>" name="sold" /></td>
                                        <td><input type="submit" value="Update" class="btn btn-success" name="submit"></td>
                                        </form>
                                    </tr>
                                     <?php
    }
}
?>
                                </tbody>
                            </table>
<br><br>

                    
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
