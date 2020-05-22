<?php include_once('admin/db.php');
if(isset($_POST["submit"]))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$phonenumber=$_POST['phone'];
	$sql=mysqli_query($conn,"insert into user (name,username,password,role,email,phone)values ('$name','$username','$password','user','$email','$phonenumber')")or die(mysqli_error($conn));
	if($sql)
	{
		header("location:login.php?ack=1");
	}
}

	
	
	
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Furnyish Store a Ecommerce Category Flat Bootstarp Responsive Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
  
</head>
<body>
<?php include_once('header.php'); ?>
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Register</li>
		 </ol>
		 <h2>Register</h2>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the details to register.</p>
				 <p>If You Have An Account, <a href="login.php"><click here></a></p>
				 <form method="post">
				 <h5>Name</h5>
				 <input type="text" name="name" value="" placeholder="Enter your name">
				 <h5>Email</h5>
				 <input type="email" name="email" value="" placeholder="Enter yout EmailId">
				 <h5>Phone Number</h5>
				 <input type="number" name="phone" value="" placeholder="Enter your phone number">
				 
					 <h5>User Name:</h5>	
					 <input type="text"  name="username" value="" placeholder="Enter your user name">
					 <h5>Password:</h5>
					 <input type="password" name="password" value="" placeholder="Enter your password">					
					 <input type="submit" name="submit" value="Register">
					  <a href="#">Forgot Password ?</a>
				 </form>				 
		 </div>
		  <div class="col-md-6 login-right">
			  	
				<p>Already Have an account</p>
				<a class="acount-btn" href="login.php">Login</a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->

<div class="footer">
	 <div class="container">
		 
		 <div class="copywrite">
			 <p>Copyright © 2015 Furnyish Store All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		 </div>			 
		 </div>
	 </div>
</div>
<!---->
</body>
</html>


</body>
</html>