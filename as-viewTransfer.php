<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    include('include/database.php');
    include('include/check_login.php');
   
    $db = new database();
   
    $hodappstatus= "Rejected";
    $hodprogress1= "To AS";
    $hodprogress2= "Completed";
   
   
   $query = $db->getRows('SELECT *
                        FROM requesttransfer
                        WHERE Progress  = ? OR Progress=? AND HODApprovalStatus !=?
                        ORDER by CreateDate desc',[
                        $hodprogress1,
                        $hodprogress2,
                        $hodappstatus  
                         ]);
   
    $i=1;  
   
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('common/styles.html');?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <?php include('common/header.php');?>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <?php include('common/sidebar2.php');;?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div id="trnasfer_as">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                           <h1 class="m-0">Transfer Requests </h1>
                        </div>
                        <!-- /.col -->         
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                       <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="SLEAS_requesttransfer_search_txt">                  
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0" style="height: 500px;">
                                 <table class="table table-head-fixed table-hover text-nowrap" id="SLEAS_requesttransfer_table">
                                    <thead>
                                       <tr>
                                          <th id="SLEAS_requesttransfer_table_no_clmn">No</th>
                                          <th id="SLEAS_requesttransfer_table_id_clmn" style="display:none;">Id</th>
                                          <th id="SLEAS_requesttransfer_table_name_clmn">Name</th>
                                          <th id="SLEAS_requesttransfer_table_class_clmn" style="display:none;">Class</th>
                                          <th id="SLEAS_requesttransfer_table_designation_clmn" style="display:none;">Designation</th>
                                          <th id="SLEAS_requesttransfer_table_dob_clmn" style="display:none;">DOB</th>
                                          <th id="SLEAS_requesttransfer_table_nic_clmn" style="display:none;">NIC</th>
                                          <th id="SLEAS_requesttransfer_table_gender_clmn" style="display:none;">Gender</th>
                                          <th id="SLEAS_requesttransfer_table_address_clmn" style="display:none;">Address</th>
                                          <th id="SLEAS_requesttransfer_table_mobile_clmn" style="display:none;">Mobile</th>
                                          <th id="SLEAS_requesttransfer_table_appdate_clmn" style="display:none;">Appointment Date</th>
                                          <th id="SLEAS_requesttransfer_table_cuerworkplace_clmn" style="width:10px !important; display:none;">Current Working Place</th>
                                          <th id="SLEAS_requesttransfer_table_fromdate_clmn" style="display:none;">Service From</th>
                                          <th id="SLEAS_requesttransfer_table_todate_clmn" style="display:none;">Service To</th>
                                          <th id="SLEAS_requesttransfer_table_province_clmn" style="display:none;">Province</th>
                                          <th id="SLEAS_requesttransfer_table_placeofwork_clmn" style="display:none;">Place of Work</th>
                                          <th id="SLEAS_requesttransfer_table_location_clmn" style="display:none;">Location</th>
                                          <th id="SLEAS_requesttransfer_table_SLEASOfficerId_clmn" style="display:none;">SLEASOfficerId</th>
                                          <th id="SLEAS_requesttransfer_table_CreateDate_clmn">CreateDate</th>
                                          <th id="SLEAS_requesttransfer_table_HODRecomme_clmn" style="display:none;">HODRecommendation</th>
                                          <th id="SLEAS_requesttransfer_table_HODComment_clmn" style="display:none;">HOD Comment</th>
                                          <th id="SLEAS_requesttransfer_table_hodapprovalstatus_clmn">HOD Approval </th>
                                          <th id="SLEAS_requesttransfer_table_HODId_clmn" style="display:none;">HODId </th>
                                          <th id="SLEAS_requesttransfer_table_HODDate_clmn">HOD CommentDate</th>
                                          <th id="SLEAS_requesttransfer_table_Progress_clmn">Progress</th>
                                          <th id="SLEAS_requesttransfer_table_ASapproval_clmn">AS Approval</th>
                                          <th id="SLEAS_requesttransfer_table_ASDate_clmn">AS Comment Date</th>
                                          <th id="SLEAS_requesttransfer_table_action_clmn">Action</th>
                                       </tr>
                                    </thead>
                                    <?php foreach ($query as $data) { ?>    
                                    <?php
                                       if($data['HODDate'] =="0000-00-00"){
                                           $hodcreate_date = "";
                                       }else{
                                           $hodcreate_date= $data['HODDate'];
                                       }
                                       
                                       if($data['ASDate'] =="0000-00-00"){
                                           $ascreate_date = "";
                                       }else{
                                           $ascreate_date= $data['ASDate'];
                                       }
                                       
                                       ?> 
                                    <tbody id= "SLEAS_requesttransfer_table_data">
                                       <tr >
                                          <td > 
                                             <?php
                                                echo $i;
                                                $i++;
                                                ?>
                                          </td>
                                          <td  style="display:none;"><?php echo $data['Id']; ?></td>
                                          <td ><?php echo $data['EmployeeName']; ?></td>
                                          <td style="display:none;"><?php echo $data['Class']; ?></td>
                                          <td style="display:none;"><?php echo $data['Designation']; ?></td>
                                          <td style="display:none;"><?php echo $data['DOB']; ?></td>
                                          <td style="display:none;"><?php echo $data['NIC']; ?></td>
                                          <td style="display:none;"><?php echo $data['Gender']; ?></td>
                                          <td style="display:none;"><?php echo $data['Address']; ?></td>
                                          <td style="display:none;"><?php echo $data['ContactMobile']; ?></td>
                                          <td style="display:none;"><?php echo $data['AppointmentDate']; ?></td>
                                          <td style="width:10px !important; display:none;"><?php echo $data['CurrentWorkingPlace']; ?></td>
                                          <td style="display:none;"><?php echo $data['ServicePeriodFrom']; ?></td>
                                          <td style="display:none;"><?php echo $data['ServicePeriodTo']; ?></td>
                                          <td style="display:none;"><?php echo $data['Province']; ?></td>
                                          <td style="display:none;"><?php echo $data['PlaceofWork']; ?></td>
                                          <td style="display:none;"><?php echo $data['Location']; ?></td>
                                          <td style="display:none;"><?php echo $data['SLEASOfficerId']; ?></td>
                                          <td ><?php echo $data['CreateDate']; ?></td>
                                          <td style="display:none;"><?php echo $data['HODRecommendation']; ?></td>
                                          <td style="display:none;"><?php echo $data['HODComment']; ?></td>
                                          <td><?php echo $data['HODApprovalStatus']; ?></td>
                                          <td style="display:none;"><?php echo $data['HODId']; ?></td>
                                          <td><?php echo $hodcreate_date; ?></td>
                                          <td><?php echo $data['Progress']; ?></td>
                                          <td><?php echo $data['ASApprovalStatus']; ?></td>
                                          <td><?php echo $ascreate_date; ?></td>
                                          <td><button type="button" class="btn btn-info btn-sm btnView" style="float: right; !important" id="btnOrderView"><span class="tooltiptext">View</span><i class="fas fa-eye"></i></button></td>
                                       </tr>
                                    </tbody>
                                    <?php } ?>  
                                 </table>
                              </div>
                              <!-- /.card-body -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /////////////////////////////////////////////////////////////////////--->
                  <div id="trnasfer_as_approval">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                           <h2 class="m-0">Transfer Request Details</h2>
                        </div>
                        <!-- /.col -->         
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                              <div class="card-body">
                                 <form class="form-horizontal" padding="10">
                                    <label class="font-weight-normal" >
                                       <h1 class="text-success">Personal Information </h1>
                                    </label>
                                    <hr>
                                    <br>
                                    <div class="form-group row" style="display:none">
                                       <label for="inputOfficername" class="col-sm-2 col-form-label" id="HOD_showreqdetails_id_lbl">Id</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_id_txt" placeholder="T.A.S. Perera" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row" style="display:none">
                                       <label for="inputOfficername" class="col-sm-2 col-form-label" id="HOD_showreqdetails_officername_lbl">SLEAS Officer Id</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_officerid_txt" placeholder="T.A.S. Perera" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputOfficername" class="col-sm-2 col-form-label" id="HOD_showreqdetails_officername_lbl">SLEAS Officer Name</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_officername_txt" placeholder="T.A.S. Perera" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputClass" class="col-sm-2 col-form-label" id="HOD_showreqdetails_class_lbl">Class</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_class_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputDesignation" class="col-sm-2 col-form-label" id="HOD_showreqdetails_designation_lbl">Designation</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_designation_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputDateofbirth" class="col-sm-2 col-form-label" id="HOD_showreqdetails_Dateofbirth_lbl">Date of birth</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_Dateofbirth_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputNIC" class="col-sm-2 col-form-label" id="HOD_showreqdetails_nic_lbl">NIC</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_nic_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputGender" class="col-sm-2 col-form-label" id="HOD_showreqdetails_gender_lbl">Gender</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_gender_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputAddress" class="col-sm-2 col-form-label" id="HOD_showreqdetails_address_lbl">Address</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_address_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputMoblieNumber" class="col-sm-2 col-form-label" id="HOD_showreqdetails_MoblieNumber_lbl">Moblie Number</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_MoblieNumber_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <label class="font-weight-normal" >
                                       <h1 class="text-success">Service Information </h1>
                                    </label>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                       <label for="inputCurrentServiceStation" class="col-sm-2 col-form-label" id="HOD_showreqdetails_AppointmentDate_lbl">Appointment Date</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_AppointmentDate_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputCurrentServiceStation" class="col-sm-2 col-form-label" id="HOD_showreqdetails_CurrentServiceStation_lbl">Current Service Station</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_CurrentServiceStation_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                 </form>
                                 <form class="form-horizontal" padding="10">
                                    <div class="form-group row">
                                       <label for="inputCurrentServiceStation" class="col-sm-2 col-form-label" id="HOD_showreqdetails_CurrentServiceStation_lbl">Service Period</label>
                                       <div class="form-row">
                                          <div class="form-group col-md-6">
                                             <label for="inputFrom">From</label>
                                             <input type="text" class="form-control" id="inputFrom" placeholder="From" disabled="">
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label for="inputTo">To</label>
                                             <input type="text" class="form-control" id="inputTo" placeholder="To" disabled="">
                                          </div>
                                       </div>
                                    </div>
                                    <hr>
                                    <label class="font-weight-normal" >
                                       <h1 class="text-success">Transfer Information </h1>
                                    </label>
                                    <br>
                                    <div class="form-group row">
                                       <label for="inputFirstChoice" class="col-sm-2 col-form-label" id="HOD_showreqdetails_FirstChoice_lbl">Province</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_FirstChoice_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputSecondChoice" class="col-sm-2 col-form-label" id="HOD_showreqdetails_SecondChoice_lbl">Place of workd</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_SecondChoice_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputThirdChoice" class="col-sm-2 col-form-label" id="HOD_showreqdetails_ThirdChoice_lbl">Location</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_ThirdChoice_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <label class="font-weight-normal" >
                                       <h1 class="text-success">Head of the Department</h1>
                                    </label>
                                    <br> <br>
                                    <div class="form-group row">
                                       <label for="inputRecommendation" class="col-sm-2 col-form-label" id="HOD_showreqdetails_Recommendation_lbl">Recommendation</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_Recommendation_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputComment" class="col-sm-2 col-form-label" id="HOD_showreqdetails_Comment_lbl">Comment</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_Comment_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                 </form>
                                 <br>
                                 <hr>
                                 <label class="font-weight-normal" >
                                    <h1 class="text-success">Assistant Secretary</h1>
                                    <form class="form-horizontal" padding="10">
                                       <div class="form-group row">
                                 <label for="inputapprovS" class="col-sm-10 col-form-label" id="HOD_showreqdetails_approvS_lbl">Approve the Trasfer of the officer.</label><br><br>
                                 <div class="col-lg-2">                          
                                 </div>
                                 <div class="col-8 ">
                                 <table>
                                 <tr>
                                 <td class="col-sm-6"> <button type="submit" class="btn btn-success btn-block hodbuttons" id="HOD_showreqdetails_approvetosecretory_btn">Approval</button>
                                 <td class="col-sm-6"> <button type="submit" class="btn btn-danger btn-block hodbuttons" id="HOD_showreqdetails_reject_btn">Reject</button>                            
                                 </tr>
                                 </table>
                                 </div>                        
                                 </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include('common/footer.php');?>
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
<script>
   $(document).ready(function(){
   
   $('#trnasfer_as_approval').hide();
   
     $("#SLEAS_requesttransfer_search_txt").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#SLEAS_requesttransfer_table_data tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   
   ////////////////////////////////////////////////////////////////////////////
   
   $(".btnView").click(function() {
     
     // change the number in bracket to get specific column value | td:eq(1)
     var id = $(this).parents("tr").find("td:eq(1)").text();
     var name = $(this).parents("tr").find("td:eq(2)").text();
     var Class = $(this).parents("tr").find("td:eq(3)").text();
     var Designation = $(this).parents("tr").find("td:eq(4)").text();
     var DOB = $(this).parents("tr").find("td:eq(5)").text();
     var NIC = $(this).parents("tr").find("td:eq(6)").text();
     var Gender = $(this).parents("tr").find("td:eq(7)").text();
     var Address = $(this).parents("tr").find("td:eq(8)").text();
   
     var ContactMobile = $(this).parents("tr").find("td:eq(9)").text();
     var AppointmentDate = $(this).parents("tr").find("td:eq(10)").text();
     var CurrentWorkingPlace = $(this).parents("tr").find("td:eq(11)").text();
     var ServicePeriodFrom = $(this).parents("tr").find("td:eq(12)").text();
     var ServicePeriodTo = $(this).parents("tr").find("td:eq(13)").text();
   
     var Province = $(this).parents("tr").find("td:eq(14)").text();
     var PlaceofWork = $(this).parents("tr").find("td:eq(15)").text();
     var Location = $(this).parents("tr").find("td:eq(16)").text();
     var SLEASOfficerId = $(this).parents("tr").find("td:eq(17)").text();
     var CreateDate = $(this).parents("tr").find("td:eq(18)").text();
   
     var HODRecommendation = $(this).parents("tr").find("td:eq(19)").text();
     var HODComment = $(this).parents("tr").find("td:eq(20)").text();
     var HODApprovalStatus = $(this).parents("tr").find("td:eq(21)").text();
     var HODId = $(this).parents("tr").find("td:eq(22)").text();
     var hodcreate_date = $(this).parents("tr").find("td:eq(23)").text();
     var Progress = $(this).parents("tr").find("td:eq(24)").text();
     var ASApprovalStatus = $(this).parents("tr").find("td:eq(25)").text();
     var ascreate_date = $(this).parents("tr").find("td:eq(26)").text();
   
    
     $('#trnasfer_as').hide();
     $('#trnasfer_as_approval').show();
   
   
     $('#HOD_showreqdetails_id_txt').val(id);
     $('#HOD_showreqdetails_officerid_txt').val(SLEASOfficerId);
     $('#HOD_showreqdetails_officername_txt').val(name);
     $('#HOD_showreqdetails_class_txt').val(Class);
     $('#HOD_showreqdetails_designation_txt').val(Designation);
     $('#HOD_showreqdetails_Dateofbirth_txt').val(DOB);
   
     $('#HOD_showreqdetails_nic_txt').val(NIC);
     $('#HOD_showreqdetails_gender_txt').val(Gender);
     $('#HOD_showreqdetails_address_txt').val(Address);
     $('#HOD_showreqdetails_MoblieNumber_txt').val(ContactMobile);
     $('#HOD_showreqdetails_AppointmentDate_txt').val(AppointmentDate);
     $('#HOD_showreqdetails_CurrentServiceStation_txt').val(CurrentWorkingPlace);
   
     $('#inputFrom').val(ServicePeriodFrom);
     $('#inputTo').val(ServicePeriodTo);
     $('#HOD_showreqdetails_FirstChoice_txt').val(Province);
     $('#HOD_showreqdetails_SecondChoice_txt').val(PlaceofWork);
     $('#HOD_showreqdetails_ThirdChoice_txt').val(Location);
     
     $('#HOD_showreqdetails_Recommendation_txt').val(HODRecommendation);
   
     //$('#HOD_showreqdetails_placeofwork_txt').val(HODRecommendation);
     $('#HOD_showreqdetails_Comment_txt').val(HODComment);
   
   if(ASApprovalStatus ==""){
     $('.hodbuttons').attr('disabled',false);
   }else{
     $('.hodbuttons').attr('disabled',true);
   }
   });
   
   
   ////////////////////////////////////////////////////////////////////////
   
   $("#HOD_showreqdetails_approvetosecretory_btn").click(function(){
   
   var id_transfer = $('#HOD_showreqdetails_id_txt').val().trim();
   var sleasofficerid_transfer = $('#HOD_showreqdetails_officerid_txt').val().trim();
   
   var province_transfer = $('#HOD_showreqdetails_FirstChoice_txt').val().trim();
   var placeofwork_transfer = $('#HOD_showreqdetails_SecondChoice_txt').val().trim();
   var location_transfer = $('#HOD_showreqdetails_ThirdChoice_txt').val().trim();
   
   var asdid_transfer = <?php echo json_encode($_SESSION['Id']) ?>;
   
   var d = new Date();
   var asdate_transfer = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
   if(confirm("Do you want to approve a record ?")){
       
       $.ajax({
       type: 'POST',
       url: "process/as_transferApprovalProcess.php",
       data:{id_asApproval_transfer:id_transfer,
             sleasofficerid_asApproval_transfer:sleasofficerid_transfer,
             as_province_transfer:province_transfer,
             as_placeofwork_transferr:placeofwork_transfer,
             as_plocation_transfer:location_transfer,
             asid_hodApproval_transfer:asdid_transfer,
             asdate_hodApproval_transfer:asdate_transfer,
             },
       beforeSend: function(){
       
       },
       success: function(data){
         var jsonobj = JSON.parse(data);
         if(jsonobj.status == true){  
           alert(jsonobj.message);   
         }else{
           alert(jsonobj.message);
         }
       }
     });
   
   }else{
   return false;
   }  
   }); 
   
   
   ////////////////////////////////////////////////////////////////////////
   
   $("#HOD_showreqdetails_reject_btn").click(function(){
   
   var id_transfer = $('#HOD_showreqdetails_id_txt').val().trim();
   
   var hodid_transfer = <?php echo json_encode($_SESSION['Id']) ?>;
   
   var d = new Date();
   var hoddate_transfer = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
   if(confirm("Do you want to reject the request ?")){
       
       $.ajax({
       type: 'POST',
       url: "process/as_transferRejectlProcess.php",
       data:{HOD_showreqdetails_id_txt:id_transfer,
             hodid_hodRejected_transfer:hodid_transfer,
             hoddate_hodRejected_transfer:hoddate_transfer,
             },
       beforeSend: function(){
        
       },
       success: function(data){
         var jsonobj = JSON.parse(data);
         if(jsonobj.status == true){  
           alert(jsonobj.message);   
         }else{
           alert(jsonobj.message);
         }
       }
     });
   
   }else{
   return false;
   }     
   
   }); 
   
   });
   
</script>
