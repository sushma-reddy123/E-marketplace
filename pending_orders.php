<?php
include_once("db.php");

if(!empty($_REQUEST['id']))
{
	
	$pid=$_REQUEST['id'];

	$del=mysqli_query($conn,"update orders set status='Completed' where id='".$pid."'")or die(mysqli_error($conn));
	header("location:pending_orders.php");
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
                  <th>Date</th>
                  <th>Order Id</th>
                  <th>User Name</th>
				  <th>status</th>
				  <th>Amount</th>
				  <th>Actions</th>
				 
                </tr>
                </thead>
				<tbody>
				<?php
				$i=1;
				$get=mysqli_query($conn,"SELECT *,orders.id as oid FROM orders left join user on user.id = orders.user_id  where status='Pending'") or die(mysqli_error($conn));
				while($c=mysqli_fetch_array($get))
				{
					?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $c['date'];?></td>
					<td><?php echo $c['order_id'];?></td>
					<td><?php echo $c['name'];?></td>
					<td><?php echo $c['amount'];?></td>
					<td> <span class="label label-danger">Pending</span></td>
					
					
					<td> <a href="pending_orders.php?id=<?php echo $c['oid'];?>"> <i class="fa fa-check"></i> </a> &nbsp;&nbsp;&nbsp;
					<a href="invoice.php?inv=<?php echo $c['oid'];?>"> <i class="fa fa-print"></i> </a>
					</td>
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
