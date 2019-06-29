<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Blogger a Blogging Category Flat Bootstrap Responsive Website Template | Registration :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href="css/style.css" rel='stylesheet' type='text/css' />	
	<script src="js/jquery.min.js"> </script>
<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

</head>
<body>
	<!-- header-section-starts -->
      <div class="h-top" id="home">
		   <div class="top-header">
				  <ul class="cl-effect-16 top-nag">
						<li><a class="active" href="registration.php" data-hover="Registration">Registration</a></li> 
						<li><a href="about.php" data-hover="About">About</a></li>
						<li><a href="services.php" data-hover="SERVICES">SERVICES</a></li>
						<li><a href="login.php" data-hover="Login">Login</a></li>
						<li><a href="contact.php" data-hover="CONTACT">Contact</a></li>
					</ul>
					<div class="search-box">
					    <div class="b-search">
								<form>
										<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
										<input type="submit" value="">
								</form>
							</div>
						</div>

					<div class="clearfix"></div>
				</div>
       </div>
	<div class="full">
			<div class="col-md-3 top-nav register">
				     <div class="logo">
						<a href="index.html"><h1>Blogger</h1></a>
					</div>
					<div class="top-menu">
					 <span class="menu"> </span>

					<ul class="cl-effect-16">
						<li><a href="index.php" data-hover="HOME">Home</a></li> 
						<li><a href="about.php" data-hover="About">About</a></li>
						<li><a href="grid.php" data-hover="Grids">Grids</a></li>
						<li><a href="services.php" data-hover="Services">Services</a></li>
						<li><a href="gallery.php" data-hover="Gallery">Gallery</a></li>
						<li><a href="contact.php" data-hover="CONTACT">Contact</a></li>
					</ul>
					<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".top-menu ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
					<ul class="side-icons">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitt" href="#"></a></li>
							<li><a class="goog" href="#"></a></li>
							<li><a class="drib" href="#"></a></li>
					   </ul>
			    </div>
			</div>



<?php
	require('db.php');
    // If form submitted, insert values into the database.
if (isset($_POST['username'])) {
  	$username = $_POST['username'];
  	$sql = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($con, $sql);
  	if (mysqli_num_rows($results) > 0) 
  	{
  	  echo "taken";
  	  exit;	}
  	
  }

    if (isset($_REQUEST['username'])){
		$fullname = stripslashes($_REQUEST['fullname']); // removes backslashes
		$fullname = mysqli_real_escape_string($con,$fullname); 

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username);
		 //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		
		$phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($con,$phone);
		
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
		$confirmpassword = stripslashes($_REQUEST['confirmpassword']);
		$confirmpassword = mysqli_real_escape_string($con,$confirmpassword);
		
		$error="";
		
		$pno="";

		if ($password != $confirmpassword) 
		{
			echo("Error... Passwords do not match");
			exit;
		}


		if( strlen($password)<8) 
		{
		$error .= "Password too short! 
		";
		}

		if( strlen($password)>=20) 
		{
		$error .= "Password too long! 
		";
		}

		if( strlen($phone)!=10)
		 {
		$pno .= "Entered phone number should contain 10 digits! 
		";
		}

		if( !preg_match("#[0-9]+#", $password) ) 
		{
		$error .= "Password must include at least one number! 
		";
		}

		if( !preg_match("#[a-z]+#", $password) ) 
		{
		$error .= "Password must include at least one letter! 
		";
		}

		if( !preg_match("#[A-Z]+#", $password) ) 
		{
		$error .= "Password must include at least one CAPS! 
		";
		}

		if( !preg_match("#\W+#", $password) ) 
		{
		$error .= "Password must include at least one symbol! 
		";
		}

		if($error && $pno)
		{
		echo ("Password validation failure(your choise is weak): $error");
		echo ("Phone number error: $pno");
		exit;
	}

		else if($error){
			echo ("Password validation failure(your choise is weak): $error");
			exit;
		}

		else if($pno){
			echo ("Phone number error: $pno");
			exit;
		} 


		$trn_date = date("Y-m-d H:i:s");

        $query = "INSERT into `users` (fullname,username, password, email, phone, trn_date) VALUES ('$fullname',$username', '".md5($password)."', '$email', '$phone', '$trn_date')";

        $result = mysqli_query($con,$query);

        if($result)
        {
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
    else
    {
?>


	<div class="col-md-9 main">
	<!-- register -->
             
    
			<div class="sign-up-form">
				<div class="form">

					<form name="registration" action="" method="post">

				    <h3>Registration<i class="glyphicon glyphicon-file"></i></h3>

					<p>Having hands on experience in creating innovative designs,I do offer design 
						solutions which harness</p>
				<div class="sign-up">
					 <h3 class="tittle reg">Personal Information <i class="glyphicon glyphicon-user"></i></h3>

					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Full Name* :</h4>
						</div>
						<div class="sign-up2">
							<form>
								<input type="text" name="fullname" placeholder="Full name" required />
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="b">Username* :</h4>
						</div>
						<div class="sign-up2">
							<form>
									<input type="text" name="username" placeholder="Username" required />
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">Email Address* :</h4>
						</div>
						<div class="sign-up2">
							<form>
								 <input type="email" name="email" placeholder="Email" required />

							</form>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="b">Phone* :</h4>
						</div>
						<div class="sign-up2">
							<form>
									<input type="text" name="phone" placeholder="Phone number" required />
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>


					 <h3 class="tittle reg">Login Information <i class="glyphicon glyphicon-off"></i></h3>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="d">Password* :</h4>
						</div>
						<div class="sign-up2">
							<form>
								 <input type="password" name="password" placeholder="Password" required />
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm Password* :</h4>
						</div>
						<div class="sign-up2">
							<form>
								<input type="password" name="confirmpassword" placeholder="Retype Password" required />
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<form>
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
            
 <?php 

}

  ?>
 

<!-- //register -->
<!-- //login-page -->
			<div class="clearfix"> </div>
	<!--/footer-->
	     <div class="footer">
				 <div class="footer-top">
				    <div class="col-md-4 footer-grid">
					     <h4>Lorem sadipscing </h4>
				          <ul class="bottom">
							 <li>Consetetur sadipscing elitr</li>
							 <li>Magna aliquyam eratsed diam</li>
						 </ul>
				    </div>
					  <div class="col-md-4 footer-grid">
					     <h4>Message Us Now</h4>
				            <ul class="bottom">
						     <li><i class="glyphicon glyphicon-home"></i>Available 24/7 </li>
							 <li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">mail@example.com</a></li>
						   </ul>
				    </div>
					<div class="col-md-4 footer-grid">
					     <h4>Address Location</h4>
				           <ul class="bottom">
						     <li><i class="glyphicon glyphicon-map-marker"></i>2901 Glassgow Road, WA 98122-1090 </li>
							 <li><i class="glyphicon glyphicon-earphone"></i>phone: (888) 123-456-7899 </li>
						   </ul>
				    </div>
					<div class="clearfix"> </div>
				 </div>
	        </div>
		<div class="copy">
		    <p>&copy; 2016 Blogger. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
		</div>
	 <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
		<!--//footer-->
			<!--start-smooth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>