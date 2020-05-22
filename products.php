<?php include_once('admin/db.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Furnyish Store a Ecommerce Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
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

<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

  
</head>
<body>
<!-- header -->
<?php include_once('header.php'); ?>
<!--header//-->
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Products</li>
		 </ol>
			<h2>OUR PRODUCTS</h2>			
		 <div class="col-md-12 product-model-sec">
		 <?php
		 $sql = mysqli_query($conn,"select * from products where category_id='".$_REQUEST['catid']."'") or die(mysqli_error($conn));
		 while($prr = mysqli_fetch_array($sql))
		 {
		 ?>
					 <a href="single.php?pid=<?php echo $prr['id'];?>">
					 <div class="product-grid love-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="products/<?php echo $prr['image']; ?>" style="widht:250px;height:300px" class="img-responsive" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</button>
							</h4>
							</div>
						</div>
						</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4><?php echo ucfirst($prr['product_name']); ?></h4>
								
								<span class="item_price"><i class="fa fa-rupee"></i>  <?php echo $prr['product_price'];?></span>
								<form action="addtocart.php" method="post">
								<input type="hidden" name="pid" value="<?php echo $prr['id']; ?>">
								<?php if($prr['status']=='1'){  ?>
								<input type="number" name="item_quantity" class="item_quantity" value="1" />
								<input type="submit" class="item_add items" name="add" value="ADD">
								<?php } else{ ?>
								<p class="label label-danger">Out Of Stock</p>
								<?php } ?>
								</form>
							</div>													
							<div class="clearfix"> </div>
						</div>
					</div>	
					<?php 
		 } ?>
					
			</div>
			
		</div>
</div>	
<!---->

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