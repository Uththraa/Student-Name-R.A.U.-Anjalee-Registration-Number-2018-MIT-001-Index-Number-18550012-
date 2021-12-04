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
         <?php include('common/sidebar.php');; ?>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Welcome to ESEB Information System !</h1>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <!--  Slider section-->
                           <div class="card-body">
                              <div id="SLEAS_dashboard_slider" class="carousel slide" data-ride="carousel">
                                 <ol class="carousel-indicators">
                                    <li data-target="#SLEAS_dashboard_slider" data-slide-to="0" class=""></li>
                                    <li data-target="#SLEAS_dashboard_slider" data-slide-to="1" class="active"></li>
                                    <li data-target="#SLEAS_dashboard_slider" data-slide-to="2" class=""></li>
                                 </ol>
                                 <div class="carousel-inner">
                                    <div class="carousel-item">
                                       <img class="d-block w-100" src="assets/card1.jpg" alt="First slide" height="300">
                                    </div>
                                    <div class="carousel-item active">
                                       <img class="d-block w-100" src="assets/card2.jpg" alt="Second slide" height="300">
                                    </div>
                                    <div class="carousel-item">
                                       <img class="d-block w-100" src="assets/card3.jpg" alt="Third slide" height="300">
                                    </div>
                                 </div>
                                 <a class="carousel-control-prev" href="#SLEAS_dashboard_slider" role="button" data-slide="prev">
                                 <span class="carousel-control-custom-icon" aria-hidden="true">
                                 <i class="fas fa-chevron-left"></i>
                                 </span>
                                 <span class="sr-only">Previous</span>
                                 </a>
                                 <a class="carousel-control-next" href="#SLEAS_dashboard_slider" role="button" data-slide="next">
                                 <span class="carousel-control-custom-icon" aria-hidden="true">
                                 <i class="fas fa-chevron-right"></i>
                                 </span>
                                 <span class="sr-only">Next</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
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
                           <!-- <div class="col-md-10">
                              <button type="button" class="btn btn-tool">
                                    <i class="fa fa-map-marker"></i>
                                  </button>               
                              </div> -->
                           <div class="card">
                              <!-- <div class="card-header">               
                                 <div class="card-tools">
                                   <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                   </button>
                                 </div>               
                                 </div>  -->            
                              <div class="card-body">
                                 <img class="img-fluid pad" src="dist/img/location.jpg" alt="Photo" >
                              </div>
                           </div>
                        </div>
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
