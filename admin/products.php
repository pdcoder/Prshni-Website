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
$id = $_POST['idrow'];
$name = $_POST['name'];
$des = $_POST['des'];
$price = $_POST['price'];
if(!empty($id)){
if (!file_exists($_FILES['file']['tmp_name']))
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
        <?php include("header.php");?>
    <title>All Products</title>

    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        </style>

</head>

<body>

    <div id="wrapper">

        <?php include("nav.php");?>

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
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                         <td><input type="text" value="<?php echo $row['id'];?>" name="idrow" /></td>

                                        <td><input type="text" value="<?php echo $row['imgname']; ?>" name="name" /></td>
                                        <td><input type="text" value="<?php echo $row['imagdes']; ?>" name="des"/></td>
                                        <td><a id="a" href="<?php echo $row['img']; ?>" target="_blank"><?php echo $row['img']; ?></a>&nbsp;<input type="file" id="fl" name="file"  /></td>
                            <td><input type="text" value="<?php echo $row['price']; ?>" name="price"/></td>
                            <td><i class="fa fa-trash" style='color:red; cursor:pointer' onClick='deleteProduct(<?php echo $row['id'];?>);'></i> &nbsp; | &nbsp; <?php if($row['featured']==0) echo "<i class='fa fa-star' style='cursor:pointer' onClick='markFeatured(".$row['id'].");'></i>"; else echo "<i class='fa fa-star' style='color:red'></i>"; ?>
                                    <input type="submit" value="Update" class="btn btn-success" name="submit"></td>
</tr>

                                    </form>
                                     <?php
    }
}
?>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <br><br>
                            
 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add</button>

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
  
    
     
  
  <!-- Modal2-->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
<br>
                            <input class="form-control" name="price" placeholder="Price" required>
<br>
                            <input class="form-control" name="name" placeholder="Name" required>
                            <br>
                            <textarea class="form-control" rows="3" placeholder="Description"  name="des" required></textarea>
<br>
                                            <label>Image input</label>
                                            <input type="file"  id="file" name="file">
                                        </div>
                                        <input type="submit" value="Add" class="btn btn-success" name="submit">
                                        <span class="error"><?php echo $err; ?></span>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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
<script>
    function markFeatured(id){
        $.ajax({
           url:'markFeatured.php',
           type:'POST',
           data:'id='+id,
           success:function mark(n){
               if(n==1)
               location.href='products.php';
               else
               alert('Oops! Cannot mark featured product.');
           }
        });
    }
    
    function deleteProduct(x){
        $.ajax({
            url:'deleteProduct.php',
            type:'POST',
             data:'id='+x,
           success:function del(n){
               if(n==1)
               location.href='products.php';
               else
               alert('Oops! Cannot delete product.');
           }
        });
    }
  
    jQuery(function(){
    jQuery("#pencil").on('click', function(e){
        e.preventDefault();
        jQuery("#fl:hidden").trigger('click');
        if(document.getElementById("fl").files.length > 0) {
   jQuery("#a").hide();
                jQuery("i.fa fa-pencil").hide();

        jQuery("#fl").show();
}
        
    });
});
</script>
</body>

</html>
