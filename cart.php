<?php include_once("admin/db.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Furnyish Store a Ecommerce Category Flat Bootstarp Responsive Website Template | Cart :: w3layouts</title>
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

  <script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
		 nav: true,
		 speed: 500,
		 namespace: "callbacks",
      });
    });
  </script>
  
</head>
<body>
<!-- header -->
<?php
include_once('header.php')
?>
<!---->
<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Cart</li>
		 </ol>			
		 <?php 
		 $getp = mysqli_query($conn,"select * from cart left join products on products.id = cart.product_id where  session_id='".$_SESSION['id']."'") or die(mysqli_error($conn));
			$prds  = mysqli_num_rows($getp);
		 ?>
		 <div class="cart-items">
			 <h2>My Shopping Bag (<?php  echo $prds;?>)</h2>
				
<?php
if($prds>0)
{
	$grandtotal = 0;
while($products = mysqli_fetch_array($getp))
{
$total = $products['product_price']*$products['qty'];

$grandtotal+=$total;
?>
<div class="cart-header">

<div class="cart-sec">
<div class="cart-item cyc">
<img src="products/<?php echo $products['image']; ?>" style="height:200px;width:200px;"/>
</div>
<div class="cart-item-info">
<h3><?php echo $products['product_name'];?></h3>
<h4><span><i class="fa fa-rupee"></i></span><?php echo $products['product_price'];?></h4>
<p class="qty">Qty ::</p>
<form action="addtocart.php" method="post">
<input type="hidden" name="pid" value="<?php echo $products['product_id']; ?>">
<input min="1" type="number" id="quantity" name="item_quantity" value="<?php echo $products['qty']?>" class="form-control input-small">
<input type="submit" class="item_add items" name="update" value="update">
<input type="submit" class="btn btn-danger" name="remove" value="Remove">
</form>
</div>
<div class="clearfix"></div>
	<div class="delivery">
							 <p>Total Rs.<?php echo $total; ?></p>							 
				        </div>
</div>
</div>
<?php }}
else
{	?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Aiyoh!</strong> Your Bag Is Empty.
</div>
<?php } ?>
		 </div>
		 
		 <div class="cart-total">
			 <a class="continue" href="index.php">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total"><?php echo number_format($grandtotal,2); ?></span>
				 
				 <span>Delivery Charges</span>
				 <span class="total">100.00</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTAL</h4>
			 <span class="total final"><?php 
			 $gt = $grandtotal+100;
			 echo  number_format($gt,2);
			 ?></span>
			 <div class="clearfix"></div>
			 <a class="order" href="confirm_order.php">Place Order</a>
			 
			</div>
	 </div>
</div>
<!---->
<div class="footer-content">
	 <div class="container">
		 <div class="ftr-grids">
			 <div class="col-md-3 ftr-grid">
				 <h4>About Us</h4>
				 <ul>
					 <li><a href="#">Who We Are</a></li>
					 <li><a href="contact.html">Contact Us</a></li>
					 <li><a href="#">Our Sites</a></li>
					 <li><a href="#">In The News</a></li>
					 <li><a href="#">Team</a></li>
					 <li><a href="#">Carrers</a></li>					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Customer service</h4>
				 <ul>
					 <li><a href="#">FAQ</a></li>
					 <li><a href="#">Shipping</a></li>
					 <li><a href="#">Cancellation</a></li>
					 <li><a href="#">Returns</a></li>
					 <li><a href="#">Bulk Orders</a></li>
					 <li><a href="#">Buying Guides</a></li>					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Your account</h4>
				 <ul>
					 <li><a href="account.html">Your Account</a></li>
					 <li><a href="#">Personal Information</a></li>
					 <li><a href="#">Addresses</a></li>
					 <li><a href="#">Discount</a></li>
					 <li><a href="#">Track your order</a></li>					 					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Categories</h4>
				 <ul>
					 <li><a href="#">> Baby Care</a></li>
					 <li><a href="#">> Health care</a></li>
					 <li><a href="#">> Cloths</a></li>
					 <li><a href="#">>Footwear</a></li>
			
					 <li><a href="#">...More</a></li>					 
				 </ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
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
