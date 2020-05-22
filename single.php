<?php  include_once('admin/db.php');?>

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
<!--etalage-->
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>


<!-- //etalage-->
  
</head>
<body>
<?php include_once('header.php');?>
<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active">Products</li>
		 </ol>
		 <?php
		 $sql = mysqli_query($conn,"select * from products where id='".$_REQUEST['pid']."'") or die(mysqli_error($conn));
		 $pid = mysqli_fetch_array($sql)
		 
		 ?>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="products/<?php echo $pid['image']; ?>" class="img-responsive" />
									<img class="etalage_source_image" src="products/<?php echo $pid['image']; ?>" class="img-responsive" title="" />
								</a>
							</li>
							
						 </ul>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3><?php echo ucfirst($pid['product_name']); ?></h3>
					 
					  
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul>
								 
								 <li>Sellling Price:</li>
								 <li class="active"><i class="fa fa-rupee"></i> <?php echo $pid['product_price'];?></li>
								 <?php if($pid['status']=='1'){ 
								$chk = mysqli_query($conn,"select * from cart where product_id='".$pid['id']."' and session_id='".$_SESSION['id']."'") or die(mysqli_error($conn));
								$cchk  = mysqli_num_rows($chk);
								if($cchk>=1)
								{
									
								 ?>
								 <h5 class="label label-warning">Item Added In Cart</h5>
								<?php } 
								
								else { ?>
								 <form action="addtocart.php" method="post">
								 <input type="number" name="item_quantity" class="item_quantity" value="1" />
								<input type="submit" name="add" class="item_add items" value="ADD">
								 <input type="hidden" name="pid" value="<?php echo $pid['id']; ?>">
								 </form>
								 <?php } } else{ ?>
									 <p class="label label-danger">Out Of Stock</p>
								 <?php } ?>
							 </ul>
						 </div>
						 
						 <div class="clearfix"></div>
					  </div>
					  
					  <div class="single-bottom1">
						<h6>Details</h6>
						<p class="prod-desc"><?php echo ucfirst($pid['description']);?></p>
					 </div>					 
				  </div>
				  <div class="clearfix"></div>
				  
		   </div>
			
	  </div>	 
</div>
<!---->

<div class="footer">
	 <div class="container">
		 
		<div class="copywrite">
			 <p>Copyright © 2015 Furnyish All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		 </div>			 
		 </div>
	 </div>
</div>
<!---->
</body>
</html>