<?php
$conn = new mysqli("localhost","prshnx5n","Prakash98!!","prshnx5n_prison");
if($conn->connect_error){
	die("Connection failed. Please reload.");
	echo "hello";
}
$sql = "SELECT * FROM productlist";
$result = $conn->query($sql);
$err="";
$err2="";
if((isset($_POST['submit2'])))
{
    $id3= $_POST['id'];
$sql3 = "DELETE FROM productlist WHERE id='$id3'";
$resul3 = $conn->query($sql3);
if($resul3){
$err2 = "Successfull removed Product with id " . $id3;
header("Refresh:1");
}
else
$err2 = "There was an error. Please try again.";
}
if((isset($_POST['submit'])))
{
$name = $_POST['name'];
$des = $_POST['des'];
$id = $_POST['id'];
$price = $_POST['price'];
if(!empty($id)){
if ($_FILES['file']['size'] == 0 )
{
    
   $sql6 = "UPDATE productlist SET imgname = '$name', imagdes = '$des', price = '$price' WHERE id = '$id'";
                
                $result6 = $conn->query($sql6);
               
                if($result6){
                $err = "Successfully updated.";
                header("Refresh:1");

                }
                else{
                $err = "Error in updating. Please try again";
}
}
else{
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
   $sql6 = "UPDATE productlist SET imgname = '$name', imagdes = '$des', price = '$price', img = '$target_file' WHERE id = '$id'";
                
                $result6 = $conn->query($sql6);
               
                if($result6){
                $err = "Successfully updated.";
                header("Refresh:1");

                }
                else{
                $err = "Error in updating. Please try again";
}

            } else {
                $err =  "Sorry, there was an error uploading your file.";
            }
        }

}
}


else{

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
                $sql6 = "INSERT INTO productlist(id,img,imgname,imagdes,price) VALUES(0,'$target_file','$name','$des','$price')" ;
                
                $result6 = $conn->query($sql6);
               
                if($result6){
                $err = "Successfully updated id " . $id ;
                header("Refresh:1");

                }
                else{
                $err = "Error in uploading. Please try again";
}

            } else {
                $err =  "Sorry, there was an error uploading your file.";
            }
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

    <title>All Products</title>

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
                
                <a class="navbar-brand" href="index.php">Admin</a>
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
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
All Products                        </div>
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
                                    <tr class="">
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
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                            <input class="form-control" name="id" placeholder="Enter id to update. Leave blank to add product">
<br>
                            <input class="form-control" name="price" placeholder="Update Price" required>
<br>
                            <input class="form-control" name="name" placeholder="Update name" required>
                            <br>
                            <textarea class="form-control" rows="3" placeholder="Update Description"  name="des" required></textarea>
<br>
                                            <label>Image input</label>
                                            <input type="file"  id="file" name="file">
                                        </div>
                                        <input type="submit" value="Update/Add" class="btn btn-success" name="submit">
                                        <span class="error"><?php echo $err; ?></span>
</form>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

<div class="add">
                            <div class="form-group">
                            <div class="panel panel-danger">
                        <div class="panel-heading">
                            Remove Product
                        </div>
                        <div class="panel-body">
                    <input class="form-control" name="id" placeholder="ID that you want to delete" required>
                            <br>
                            <input type="submit" value="Remove" class="btn btn-danger" name="submit2">
                            <span class="error"><?php echo $err2; ?></span>
                            </div>
</div>
</div>
                            
</div>
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