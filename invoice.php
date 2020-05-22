<?php include_once("admin/db.php"); 
$inv = $_REQUEST['inv'];

$itms = mysqli_query($conn,"select * from orders left join user on user.id = orders.user_id where orders.id='".$_REQUEST['inv']."'") or die(mysqli_error($conn));
$dtims = mysqli_fetch_array($itms);
?>
<html>
<head>
<title>E-Marketplace</title>
<style>
table{
border:1px solid black;
border-collapse:collapse;
margin:0 auto;
}
td,th{
border:1px solid black;
padding:3px;

}
</style>
</head>
<body>
<table>
  <tr>
<td style="text-align:center"colspan="5">Invoice </td> </tr>
  <tr>
  <td colspan="3">Name : <?php echo $dtims['name']; ?></td>
  <td colspan="2">Date : <?php echo $dtims['date']; ?></td>
  </tr>
  <tr>
  <td colspan="3">Address : <?php echo $dtims['address']; ?></td>
  <td colspan="2">Invoice Number : <?php echo $dtims['order_id']; ?></td>
  </tr>
  <tr>
  <td>S.no</td>
  <td>product name</td>
  <td>quantity</td>
  <td>price</td>
  <td>total</td>
  </tr>
  <?php
  $i=1;
  $oitm = mysqli_query($conn,"select * from order_items left join products on products.id = order_items.product_id where order_id='".$_REQUEST['inv']."'") or die(mysqli_error($conn));
  while($oitems = mysqli_fetch_array($oitm))
  {
	  $tot = number_format($oitems['product_price']*$oitems['qty'],2);
	  
  ?>
  <tr>
  <td><?php echo $i;?></td>
  <td><?php echo $oitems['product_name'];?></td>
  <td><?php echo $oitems['qty'];?></td>
  <td><?php echo $oitems['product_price'];?></td>
  <td><?php echo $tot; ?></td>
  
  </tr>
  <?php $i++; } ?>
  <tr>
  <td colspan="4">Delivery Charges</td>
  <td>100.00</td>
  </tr>
  <tr>
  <td colspan="4">Grand Total</td>
  <td><?php echo $dtims['amount']; ?></td>
  </tr>
</table>

</body>
</html>
