<?php 
include_once('admin/db.php');	
?>

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
<?php include_once('header.php'); ?>
<!---->
<div class="content">
	 <div class="container">
		 <div class="slider">
				<ul class="rslides" id="slider1">
				  <li><img src="images/banner2.jpg" alt=""></li>
				  <li><img src="images/banner1.jpg" alt=""></li>
				  <li><img src="images/banner3.jpg" alt=""></li>
				</ul>
		 </div>
	 </div>
</div>

<div class="top-sellers">
	 <div class="container">
		 <h3>TOP - SELLERS</h3>
		 <div class="seller-grids">
		 <?php 
		 $tps = mysqli_query($conn,"select *,sum(qty) as tpqty from order_items left join products on products.id = order_items.product_id group by product_id order by tpqty  limit 0,4") or die(mysqli_error($conn));
		 while($tprod = mysqli_fetch_array($tps))
		 {
		 ?>
			 <div class="col-md-3 seller-grid">
				 <a href="single.php?pid=<?php echo $tprod['product_id']; ?>"><img src="products/<?php echo $tprod['image']; ?>" style="height:300px;width:200px;" alt=""/></a>
				 <h4><a href="single.php?=<?php echo $tprod['product_id']; ?>"><?php echo ucfirst($tprod['product_name']); ?></a></h4>
				 
				 <p>Rs. <?php echo $tprod['product_price']; ?>/-</p>
			 </div>
		 <?php } ?>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->

<div class="recommendation">
	 <div class="container">
		 <div class="recmnd-head">
			 <h3>Prodcuts</h3>
		 </div>
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
			 <?php 
			 $pr  = mysqli_query($conn,"select * from products order by rand() limit 0,10") or die(mysqli_query($conn));
			 while($resp = mysqli_fetch_array($pr))
			 {
			 ?>
				 <li>
				 
					 <a href="single.php?pid=<?php echo $resp['id'];?>"><img src="products/<?php echo $resp['image']; ?>" alt=""/></a>	
					 <h4><a href="single.php?pid=<?php echo $resp['id'];?>"><?php echo ucfirst($resp['product_name']); ?></a></h4>	
					 <p><i class="fa fa-rupee"></i> <?php echo $resp['product_price']; ?></p>
				 </li>
			 <?php } ?> 
				 
			</ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	 </div>
	 </div>
</div>
		 
		 <div class="copywrite">
			 <p>Copyright © 2015 Furnyish Store All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		 </div>			 
		 </div>
	 </div>
</div>
</body>
</html>