<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
   session_start();
   include('include/database.php');
   include('include/check_login.php');
   
   
   $db = new database();
   $query = $db->getRows('SELECT * 
                           FROM announcement', []);

   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('common/styles.html'); ?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Header -->
         <?php include('common/header.php'); ?>

         <!-- Main Sidebar Container --> 
         <?php include('common/sidebar2.php');; ?>
         
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Welcome to ESEB Information System !</h1>
                     </div>
                  </div>
                  <br>

                  <!-- Announcement section -->
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <h2 class="mt-4 mb-2">
                                    Announcements!</h4>
                                 </div>
                              </div>
                              <?php foreach ($query as $data) { ?> 
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="card  card-primary">
                                       <div class="alert alert-info alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                          <br>
                                          <h4 id="dashboard_announce_header" style="text-align: center;"><u><?php echo $data['Header']; ?></u></h4>
                                          <br>
                                          <p id="dashboard_announce_body"><?php echo $data['Body']; ?> </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php 
                                 } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ContactUs section -->
                  <div class="row">
                     <div class="col-lg-12">
                        <h4 class="mt-4 mb-2">Contact Us</h4>
                     </div>
                     <br>
                     <div class="col-lg-4">
                        <div class="row">
                           <div class="col-md-4">
                              <label>Telephone :</label>                
                           </div>
                           <div class="col-md-8">
                              +94 112 785141
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">               
                              <label>Fax :</label>
                           </div>
                           <div class="col-md-8">
                              +94 112 785150
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">               
                              <label>Email :</label>
                           </div>
                           <div class="col-md-8">
                              info@moe.gov.lk
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="row">
                           <label>Address: </label>                  
                        </div>
                        <div class="row">
                           <div class="col-md-10">
                              Ministry of Education,             
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-10">
                              Isurupaya,             
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-10">
                              Battaramulla               
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-10">
                              10120 Sri Lanka.                
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="row">
                           <label>Location: </label>                  
                        </div>
                        <div class="row">
                           <div class="card">
                              <div class="card-header">
                                 <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </button>
                                 </div>
                                 <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <img class="img-fluid pad" src="dist/img/location.jpg" alt="Photo">
                              </div>
                              <!-- /.card-body -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
      </div>
      <!-- /.content-wrapper -->
      <?php include('common/footer.php'); ?> 
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
   </body>
</html>
