<?php
session_start();
if(isset($_SESSION['user'])){

    $conn = new mysqli("localhost","prshnx5n","Prakash98!!","prshnx5n_prison");
if($conn->connect_error){
	die("Connection failed. Please reload.");
}
$sql = "SELECT * FROM slider";
$result = $conn->query($sql);
$err="";
$err2 ="";
if(isset($_POST['submit2']))
{
   
    $id= $_POST['id'];
$sql3 = "DELETE FROM slider WHERE id='$id'";
$resul3 = $conn->query($sql3);
if($resul3){
$err2 = "Successfull removed imaged with id " . $id;
header("Refresh:1");
}
else
$err2 = "There was an error. Please try again.";
}


if((isset($_POST['submit'])))
{
    $err = "";
    $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $err="";
        
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        
       
       
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $err =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $err =  "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $sql1 = "INSERT INTO slider(id,pic) VALUES (0, '$target_file')";
                $result1 = $conn->query($sql1);
                if($result1){
                $err = "Successfully Inserted.";
                header("Refresh:0");
                }
                else
                $err = "Error in upload. Please try again";

            } else {
                $err =  "Sorry, there was an error uploading your file.";
            }
        }
    
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

    <title>Slider images</title>

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
    input[type="file"] {
  
  cursor: pointer !Important;
  
  &::-webkit-file-upload-button {
    background: $button-color;
    border: 0;
    padding: 1em 2em;
    cursor: pointer;
    color: #fff;
    border-radius: .2em;
  }
  
  &::-ms-browse {
    background: $button-color;
    border: 0;
    padding: 1em 2em;
    cursor: pointer;
    color: #fff;
    border-radius: .2em;
  }
  
}
        .error{
            color:red;
            font-weight:bold;
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
                    <h1 class="page-header">Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Slider images                       </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PICTURE</th>
                
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
?>
                                    <tr class="">
                                        <td><?php echo $row['id']; ?></td>
                                        <td><a href="<?php echo $row['pic']; ?>" target="_blank"><?php echo $row['pic']; ?></a></td>
                            
                                    </tr>
                                    
                                     <?php
    }
}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <br><br>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                            <br>
                                            <label>Upload image</label>
                                            <input type="file"  id="file" name="file" required>
                                        </div>
                                        <input type="submit" value="Add" class="btn btn-success" name="submit" >
                                        <span class="error"><?php echo $err; ?></span>
</form>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<div class="form-group">
<br>
<input class="form-control" name="id" placeholder="Enter id to delete" type="number" required>
<br>
<input type="submit" value="Remove" class="btn btn-danger" name="submit2" >
<span class="error"><?php echo $err2; ?></span>


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
else{
    header("Location: login.php");

}
?>