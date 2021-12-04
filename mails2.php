<?php 
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include('include/database.php');
include('include/check_login.php');

?>
<?php include 'mailsSendPHP.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> </title>
	 <?php include('common/styles.html'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<div class="wrapper">
		  <!-- Header -->
		<?php include('common/header.php'); ?>
		 <!-- Main Sidebar Container -->  
		<?php include('common/sidebarAdmin.php');; ?>


		  <!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
			    <!-- Content Header (Page header) -->
			    <div class="content-header">
			      <div class="container-fluid">


					<div class="row mb-2">
			          <div class="col-sm-6">
			            <h1 class="m-0">ESEAS Mail</h1>
			          </div><!-- /.col -->         
			        </div>


			<div class="row">
	          	<div class="col-lg-12">
	            	<div class="card">
	              		<div class="card-body">
	                		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

	                           <?php echo $alert; ?>


            <form action="" method="POST">

              <div class="form-group">
                  <label for="formGroupExampleInput">Full Name *</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="name" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Email address *</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required >
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Subject *</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="subject" required>
                </div>
              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Message *</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
              </div>
              <div class="form-group row">
                  <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary" name="submit">Send</button>

                  </div>
                </div>
            </form>


	                		</div>
	              		</div>
	          		</div>
	      		</div>
	  		</div>





			      </div><!-- /.container-fluid -->
			    </div> <!-- /.content-header -->
			</div> <!-- /.content-wrapper -->


		<?php include('common/footer.php');?>

	</div><!-- ./wrapper -->



    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>



</body>
</html>