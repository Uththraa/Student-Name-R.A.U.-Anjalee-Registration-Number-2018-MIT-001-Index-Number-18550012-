<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
   session_start();
   include('include/database.php');
   include('include/check_login.php');
   
      
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
         <?php include('common/sidebarAdmin.php');; ?>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Welcome to ESEB Information System !</h1>
                     </div>
                  </div>

            
                  <div class="card">
                    <div class="card-header">
                        <div class="row">
                           <div class="col-md-6">
                           <h1>Change Request</h1></div>
                           <div class="col-md-6">
                           <input id="myInput" type="text" placeholder="Search.." style="float: right;"> </div>
                        </div>
                    </div>
                    <div class="card-body">





                    </div>

                    
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>  
      </div>
      <?php include('common/footer.php'); ?>
      </div>
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
