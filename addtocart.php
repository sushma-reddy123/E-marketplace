<?php
include_once('admin/db.php');
if(isset($_POST['add']))
{
$product_id  = $_POST['pid'];

$qty =  $_POST['item_quantity'];

$sessionid   = $_SESSION['id'];

$userid = $_SESSION['user_id'];

$sql   = mysqli_query($conn,"insert into cart(session_id,user_id,product_id,qty)values('$sessionid','$userid','$product_id','$qty')") or die(mysqli_error($conn));

if($sql)
{
	echo "Item Added Successfully";
	header("location:cart.php");
}
}
if(isset($_POST['update']))
{
	$product_id  = $_POST['pid'];

$qty =  $_POST['item_quantity'];

$sessionid   = $_SESSION['id'];

$userid = $_SESSION['user_id'];

$sql   = mysqli_query($conn,"update cart set qty='".$qty."' where product_id='".$product_id."' and session_id='".$sessionid."' and user_id='".$userid."'") or die(mysqli_error($conn));

if($sql)
{
	header("location:cart.php");
}
}
if(isset($_POST['remove']))
{
	$product_id  = $_POST['pid'];

$qty =  $_POST['item_quantity'];

$sessionid   = $_SESSION['id'];

$userid = $_SESSION['user_id'];

$sql   = mysqli_query($conn,"delete from cart where product_id='".$product_id."' and session_id='".$sessionid."' and user_id='".$userid."'") or die(mysqli_error($conn));

if($sql)
{
	header("location:cart.php");
}
}
?>