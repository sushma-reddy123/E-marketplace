<?php
include_once("db.php");
?>
<?php
if(!empty($_REQUEST['did']))
{
$did = $_REQUEST['did'];
$del = mysqli_query($conn,"delete from products where id='".$did."'") or die(mysqli_error($conn));
header("location:list_products.php");
}
if(!empty($_REQUEST['st']))
{
	$st=$_REQUEST['st'];
	$pid=$_REQUEST['id'];

	$del=mysqli_query($conn,"update products set status='".$st."' where id='".$pid."'")or die(mysqli_error($conn));
	header("location:list_products.php");
}

	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>List Products</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <?php
  include_once("header.php");
  include_once("sidebar.php");
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Products
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">List Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Prodcuts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>S.NO</th>
                  <th>category</th>
                  <th>productname</th>
                  <th>price</th>
				  <th>status</th>
				  <th>image</th>
				  <th>Actions</th>
				 
                </tr>
                </thead>
				<tbody>
				<?php
				$i=1;
				$get=mysqli_query($conn,"SELECT *,products.id as pid FROM products left join categories on categories.id = products.category_id") or die(mysqli_error($conn));
				while($c=mysqli_fetch_array($get))
				{
					?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $c['categoryname'];?></td>
					<td><?php echo $c['product_name'];?></td>
					<td><?php echo $c['product_price'];?></td>
					<td><?php if($c['status']=='1'){ ?> <span class="label label-success">Available</span> <?php } 
					else{ ?> <span class="label label-danger">Out Of Stock</span><?php } ?></td>
					<td><img src="../products/<?php echo $c['image'];?> "style="width:100px;height:100px";></td>
					
					<td> <?php if($c['status']=='1'){ ?> <a href="list_products.php?st=2&&id=<?php echo $c['pid'];?>"> <i class="fa fa-remove"></i></a><?php } else if($c['status']=='2'){ ?><a href="list_products.php?st=1&&id=<?php echo $c['pid'];?>"> <i class="fa fa-check"></i> </a><?php  } ?>
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="list_products.php?did=<?php echo $c['pid'];?>"><i class="fa fa-trash"></i></a></td>
					
					</tr>
					<?php
					$i++;
					
					
				}
				?>
					
				</tbody>
               
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 
  </footer>

  <!-- Control Sidebar -->
 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
