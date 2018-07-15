<?php
$conn = new mysqli("localhost","prshnx5n","Prakash98!!","prshnx5n_prison");
if($conn->connect_error){
	die("Connection failed. Please reload.");
}
$sql2 = "SELECT * FROM productlist";
$result2 = $conn->query($sql2);

$msg = "";
$name = "";
$phone = "";
$mail = "";
$message = "";
$id = 1;
if(empty($_GET['id1'])){
if(empty($_GET['id']))
$id = 1;
else
$id = $_GET['id'];
$sql4 = "SELECT * FROM productlist WHERE id = '$id'";
$result4 = $conn->query($sql4);
}
else{
    $sql4 = "SELECT * FROM featured WHERE id = '$id'";
$result4 = $conn->query($sql4);
}
if (isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mail = $_POST['email'];
	$message = $_POST['message'];
	$sql4 = "INSERT INTO queries (fname,phone,email,msg,id) VALUES('$name','$phone','$mail','$message',0)";
	if( $conn->query($sql4) === TRUE)
	{
		$msg = "We will get back to you shortly";
	}
else{
	$msg = "Sorry, please try again";
}
}
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<meta property="og:url"                content="http://prshni.in/test/" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Prshni E. Care Pvt. Ltd." />
<meta property="og:description"        content="Great products at awesome prices" />
<meta property="og:image"              content="prshni.in/test/img/Automatic Water Level Controller-101.jpg" />


<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@flickr" />
<meta name="twitter:title" content="Prshni E. Care Pvt. Ltd." />
<meta name="twitter:description" content="Great products at awesome prices" />
<meta name="twitter:image" content="prshni.in/test/img/Automatic Water Level Controller-101.jpg" />


		<!-- Site Title -->
		<title>Prshni E.-Care Products</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
				<header id="header" id="home">
						
					  <div class="container main-menu">
						  <div class="row align-items-center justify-content-between d-flex">
							<div id="logo">
							<a href="index.php"><img src="img/logo.png" alt="Prshni" title="Prshni" style="width:220px;height:40px;"/></a>
							</div>
							<nav id="nav-menu-container">
							  <ul class="nav-menu">
							  <li><a href="index.php">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="products.php">Products</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							</nav><!-- #nav-menu-container -->		    		
						  </div>
					  </div>
					</header><!-- #header -->
	  

			<!-- start banner Area -->
			<div class="row" id="fprow" style="background:#EEEEEE; text-align:center;">
			<?php

       while($row4 = $result4->fetch_assoc()) {
      
?>
<div class="row" id="row2" style="width:100%;">
	<div class="col-md-6 col-lg-8 col-sm-10 col-xs-10">
		<div style:"height:4002px;width:400px;">
		<img src="<?php echo $row4['img'];?>" alt="img"  style="width:100%;height:auto;" id="fpd2"> 
	   </div>
	</div>
	<div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">

	<h3 id="h3" style="color:#818080;text-align:left;"><?php echo $row4['imgname']; ?></h3>
	<br>
	<p style="color:#818080;text-align:left;">Rs.<?php echo $row4['price'];?></p>
											
	<p style="text-align:left;"><?php echo $row4['imagdes'];?></p>
	<br>
	<button id="btn" style="background-color:#498CE5;color:white;border-radius:0px;padding:10px 20px;align:left;border:none;">Purchase Now</button>
	 </div>
</div>
  						
 <?php
	}
	?>
	</div>
			<!-- End banner Area -->	
			<div class="fp" style="padding-botton:1vh;"><h2>MORE PRODUCTS</h2></div></div>
			<!-- Start feedback-area Area -->
			<section class="testomial-area section-gap" id="testimonail" style="background:#F6F6F6;">
	<div class="container">
							
		<div class="row">
			<div class="active-testimonial-carusel">

<?php
if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
      
?>
	<a style="color:grey" href="product.php?id=<?php echo $row2['id'];?>" >

<div class="single-testimonial item">
						<img class="mx-auto" src="<?php echo $row2['img']; ?>" alt="">

					<p class="desc">
<?php echo $row2['imagdes']; ?>			
		</p>
					<h5>					<?php echo $row2['imgname']; ?>			
</h5>
					
				</div>
				</a>
	
	
				<?php
				}
			}
				?>




			</div>
		</div>
	</div>	
</section>
			<section class="discount-section-area relative section-gap">
				
				<div id="overlay" class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row align-items-center justify-content-between no-gutters">
						<div class="col-lg-6 discount-left">
							<h1 class="text-white">Get quality products at affordable prices!!</h1>
							<p class="text-white">
								Durability and affordability has been our top most priority while designing 
							</p>
						</div>
						<div class="col-lg-5 discount-right">
							<h4 class="text-white">Get a free Estimate</h4>
		                    <form class="booking-form" id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		                        <div class="row">
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="name" placeholder="Your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" class="form-control mt-20" required="" type="text">
		                            </div>
		                            <div class="col-lg-6 d-flex flex-column">
		                                <input name="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text">
		                            </div>
		                            <div class="col-lg-6 d-flex flex-column">
		                                <input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="form-control mt-20" required="" type="email">
		                            </div>
		                            <div class="col-lg-12 flex-column">
		                                <textarea rows="5" class="form-control mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
		                            </div>
<div class="errormsg"><?php echo $msg ; ?></div>
		                            <div class="col-lg-12 d-flex justify-content-end send-btn">
									<br />
		                                <input type="submit" name="submit" class="genric" value="SEND" />
		                            </div>
		                        </div>
		                    </form>
						</div>
					</div>
				</div>	
			</section>
			
			<!-- End feedback-area Area -->
			<br><br><br><br><br>
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
					<div class="container">
	
						<div class="row">
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6>About Agency</h6>
									<p>
										The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
									</p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6>Navigation Links</h6>
									<div class="row">
										<div class="col">
											<ul>
												<li><a href="#">Home</a></li>
												<li><a href="#">Feature</a></li>
												<li><a href="#">Services</a></li>
												<li><a href="#">Portfolio</a></li>
											</ul>
										</div>
										<div class="col">
											<ul>
												<li><a href="#">Team</a></li>
												<li><a href="#">Pricing</a></li>
												<li><a href="#">Blog</a></li>
												<li><a href="#">Contact</a></li>
											</ul>
										</div>										
									</div>							
								</div>
							</div>							
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6>Newsletter</h6>
									<p>
										For business professionals caught between high OEM price and mediocre print and graphic output.									
									</p>								
									<div id="mc_embed_signup">
										<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
											<div class="input-group d-flex flex-row">
												<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
												<button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
											</div>									
											<div class="mt-10 info"></div>
										</form>
									</div>
								</div>
							</div>
							
						</div>
	
						<div class="row footer-bottom d-flex justify-content-between align-items-center">
							<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	</p>
							<div class="col-lg-4 col-sm-12 footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
						</div>
					</div>
				</footer>
			<!-- End footer Area -->	
			<div class="modal fade" id="modelWindow" role="dialog">
            <div class="modal-dialog modal-sm vertical-align-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Heading</h4>
                </div>
                <div class="modal-body">
                    Body text here
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                </div>
              </div>
            </div>
        </div>

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/mn-accordion.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>	
    		<script src="js/jquery.circlechart.js"></script>								
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
			<script>
				$("#btn").click(function() {
    $('html, body').animate({
        scrollTop: $("#overlay").offset().top
    }, 500);
});
</script>
<script>

	var form = document.getElementById("form-id");

document.getElementById("your-id").addEventListener("click", function () {
  form.submit();

});
</script>
		</body>
	</html>