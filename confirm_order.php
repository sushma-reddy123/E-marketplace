<?php 
include_once('admin/db.php');
if($_SESSION['user_id']=='')
{
header("location:login.php");
}
else
{
	if(isset($_POST['submit']))
	{
	$tamount=100;
	$add = $_POST['address'];
	
	$orderid = time().rand(1000,9999);
	
	$userid = $_SESSION['user_id'];
	$date = date("d-m-Y h:i");
	
	$image=$_FILES['id'];
	
	if(!empty($image))
	{
		$path  = 'products/';
		$file  = $path.basename($_FILES['id']['name']);
		
		
		 
		if(move_uploaded_file($_FILES['id']['tmp_name'],$file))
		{
			$image = $image['name'];
		}
		
		
	}
	
	$ins = mysqli_query($conn,"insert into orders(order_id,date,user_id,address,proof)values('$orderid','$date','$userid','$add','$image')") or die(mysqli_error($conn));
	$oid = mysqli_insert_id($conn);
	
	 $getp = mysqli_query($conn,"select * from cart left join products on products.id = cart.product_id where  session_id='".$_SESSION['id']."' and user_id='".$_SESSION['user_id']."'") or die(mysqli_error($conn));
		while($pp = mysqli_fetch_array($getp))
		{
			$pid = $pp['product_id'];
			$qty =  $pp['qty'];
			
			$amount = $qty*$pp['product_price'];
			
			$tamount+=$amount;
			
			$sql = mysqli_query($conn,"insert into order_items(order_id,product_id,qty)values('$oid','$pid','$qty')") or die(mysqli_error($conn));
			
		}
		
		$upd = mysqli_query($conn,"update orders set amount='".$tamount."' where id='".$oid."'") or die(mysqli_error($conn));
		$getp = mysqli_query($conn,"delete from cart where  session_id='".$_SESSION['id']."' and user_id='".$_SESSION['user_id']."'") or die(mysqli_error($conn));
		header("location:success.php");
	}
	
}
?>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Address</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
		  
		  <textarea name="address" class="form-control" required placeholder="Enter Address"></textarea>
		  
		  
		  <input type="file" name="id" class="form-control" required>
		  
		  <span>Please Upload Your Id Proof</span>
		  

		  
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary">
        </div>
		</form>
      </div>
      
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
  
  $("#myModal").modal('show');
  </script>

</body>
</html>