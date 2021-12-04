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
                        FROM requestincrement
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
                  <div id="viewRequest_increment">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                           <h1 class="m-0">Increment Requests </h1>
                        </div>
                        <!-- /.col -->         
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-header">
                                 <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                       <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="SLEAS_requestincrement_search_txt">
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0" style="height: 500px;">
                                 <table class="table table-head-fixed table-hover text-nowrap " id="SLEAS_requestincrement_table">
                                    <thead>
                                       <tr>
                                          <th id="SLEAS_requestincrement_table_no_clmn">No</th>
                                          <th id="SLEAS_requestincrement_table_id_clmn" style="display:none;">Id</th>
                                          <th id="SLEAS_requestincrement_table_name_clmn">Name</th>
                                          <th id="SLEAS_requestincrement_table_designation_clmn" style="display:none;">Designation</th>
                                          <th id="SLEAS_requestincrement_table_dob_clmn" style="display:none;">DOB</th>
                                          <th id="SLEAS_requestincrement_table_nic_clmn" style="display:none;">NIC</th>
                                          <th id="SLEAS_requestincrement_table_gender_clmn" style="display:none;">Gender</th>
                                          <th id="SLEAS_requestincrement_table_address_clmn" style="display:none;">Address</th>
                                          <th id="SLEAS_requestincrement_table_mobile_clmn" style="display:none;">Mobile</th>
                                          <th id="SLEAS_requestincrement_table_SLEASOfficerId_clmn" style="display:none;">SLEASOfficerId</th>
                                          <th id="SLEAS_requestincrement_table_CreateDate_clmn">CreateDate</th>
                                          <th id="SLEAS_requestincrement_table_nic_clmn" style="display:none;">Salary Status</th>
                                          <th id="SLEAS_requestincrement_table_nic_clmn" style="display:none;">Inquiry Status</th>
                                          <th id="SLEAS_requestincrement_table_nic_clmn" style="display:none;">Comment</th>
                                          <th id="SLEAS_requestincrement_table_hodapprovalstatus_clmn">HOD Approval </th>
                                          <th id="SLEAS_requestincrement_table_HODId_clmn" style="display:none;">HODId </th>
                                          <th id="SLEAS_requestincrement_table_HODDate_clmn">HOD CommentDate</th>
                                          <th id="SLEAS_requestincrement_table_Progress_clmn">Progress</th>
                                          <th id="SLEAS_requestincrement_table_ASapproval_clmn">AS Approval</th>
                                          <th id="SLEAS_requestincrement_table_ASDate_clmn">AS Comment Date</th>
                                          <th id="SLEAS_requestincrement_table_action_clmn">Action</th>
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
                                    <tbody id= "SLEAS_requestincrement_table_data">
                                       <tr >
                                          <td > 
                                             <?php
                                                echo $i;
                                                $i++;
                                                ?>
                                          </td>
                                          <td  style="display:none;"><?php echo $data['Id']; ?></td>
                                          <td ><?php echo $data['EmployeeName']; ?></td>
                                          <td style="display:none;"><?php echo $data['Designation']; ?></td>
                                          <td style="display:none;"><?php echo $data['DOB']; ?></td>
                                          <td style="display:none;"><?php echo $data['NIC']; ?></td>
                                          <td style="display:none;"><?php echo $data['Gender']; ?></td>
                                          <td style="display:none;"><?php echo $data['Address']; ?></td>
                                          <td style="display:none;"><?php echo $data['ContactMobile']; ?></td>
                                          <td style="display:none;"><?php echo $data['SLEASOfficerId']; ?></td>
                                          <td ><?php echo $data['CreateDate']; ?></td>
                                          <td style="display:none;"><?php echo $data['SalaryRecievedStatus']; ?></td>
                                          <td style="display:none;"><?php echo $data['InquiryStatus']; ?></td>
                                          <td style="display:none;"><?php echo $data['Comment']; ?></td>
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
                  <!-- ////////////////////////////////////////////////////////////////// -->
                  <div id="viewrequest_increment_approval">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                           <h2 class="m-0">Increment Request Details</h2>
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
                                    <div class="form-group row" style="display:none;">
                                       <label for="inputOfficername" class="col-sm-2 col-form-label" id="HOD_showreqdetails_officername_lbl">Id</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_id_txt" placeholder="i" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputOfficername" class="col-sm-2 col-form-label" id="HOD_showreqdetails_officername_lbl">SLEAS Officer Name</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_officername_txt" placeholder="i" disabled="">
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
                                 </form>
                                 <br>
                                 <hr>
                                 <form class="form-horizontal" padding="10">
                                    <label class="font-weight-normal" >
                                       <h1 class="text-success">Head of the Department</h1>
                                    </label>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                       <label for="inputtwo" class="col-sm-10 col-form-label" id="HOD_showreqdetails_two_lbl">Has the officer received unpaid / partial salary?  </label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_two_txt" placeholder="" disabled="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputfour" class="col-sm-10 col-form-label" id="HOD_showreqdetails_four_lbl">Are there any disciplinary inquiries or audit inquiries against the officer? </label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_four_txt" placeholder="" disabled="">
                                       </div>
                                    </div>
                                    <!-- ....................................................... -->
                                    <div class="form-group row">
                                       <label for="inputSkills" class="col-sm-2 col-form-label" id="HOD_showreqdetails_comment_lbl">Comment</label>
                                       <div class="col-sm-10">
                                          <input type="text" class="form-control" id="HOD_showreqdetails_comment_txt" placeholder="I" disabled="">
                                       </div>
                                    </div>
                                 </form>
                                 <br>
                                 <hr>
                                 <label class="font-weight-normal" >
                                    <h1 class="text-success">Assistant Secretary</h1>
                                 </label>
                                 <br>
                                 <form class="form-horizontal" padding="10">
                                    <div class="form-group row">
                                       <label for="inputapprovS" class="col-sm-10 col-form-label" id="HOD_showreqdetails_approvS_lbl">Approve the increment of the officer.</label><br><br>
                                       <div class="col-lg-2">                          
                                       </div>
                                       <div class="col-8 ">
                                          <table>
                                             <tr>
                                                <td class="col-sm-6"> <button type="submit" class="btn btn-success btn-block" id="HOD_showreqdetails_approvetosecretory_btn">Approval</button>
                                                <td class="col-sm-6"> <button type="submit" class="btn btn-danger btn-block" id="HOD_showreqdetails_reject_btn">Reject</button>
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
   
   
     $('#viewrequest_increment_approval').hide();
   
     $("#SLEAS_requestincrement_search_txt").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#SLEAS_requestincrement_table_data tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   
   
   //////////////////////////////////////////////////////////////
   
   $(".btnView").click(function() {
     
     // change the number in bracket to get specific column value | td:eq(1)
     var id = $(this).parents("tr").find("td:eq(1)").text();
     var name = $(this).parents("tr").find("td:eq(2)").text();
     var Designation = $(this).parents("tr").find("td:eq(3)").text();
     var DOB = $(this).parents("tr").find("td:eq(4)").text();
     var NIC = $(this).parents("tr").find("td:eq(5)").text();
     var Gender = $(this).parents("tr").find("td:eq(6)").text();
     var Address = $(this).parents("tr").find("td:eq(7)").text();
   
     var ContactMobile = $(this).parents("tr").find("td:eq(8)").text();
    
     var SLEASOfficerId = $(this).parents("tr").find("td:eq(9)").text();
     var CreateDate = $(this).parents("tr").find("td:eq(10)").text();
   
     var salarystatus = $(this).parents("tr").find("td:eq(11)").text();
     var inquirystatus = $(this).parents("tr").find("td:eq(12)").text();
     
     var HODComment = $(this).parents("tr").find("td:eq(13)").text();
     var HODApprovalStatus = $(this).parents("tr").find("td:eq(14)").text();
     var HODId = $(this).parents("tr").find("td:eq(15)").text();
     var hodcreate_date = $(this).parents("tr").find("td:eq(16)").text();
     var Progress = $(this).parents("tr").find("td:eq(17)").text();
     var ASApprovalStatus = $(this).parents("tr").find("td:eq(18)").text();
     var ascreate_date = $(this).parents("tr").find("td:eq(19)").text();
   
   
     $('#viewRequest_increment').hide();
     $('#viewrequest_increment_approval').show();
   
     $('#HOD_showreqdetails_id_txt').val(id);
     $('#HOD_showreqdetails_officername_txt').val(name);
     $('#HOD_showreqdetails_designation_txt').val(Designation);
     $('#HOD_showreqdetails_Dateofbirth_txt').val(DOB);
   
     $('#HOD_showreqdetails_nic_txt').val(NIC);
     $('#HOD_showreqdetails_gender_txt').val(Gender);
     $('#HOD_showreqdetails_address_txt').val(Address);
     $('#HOD_showreqdetails_MoblieNumber_txt').val(ContactMobile);
    
     $('#HOD_showreqdetails_two_txt').val(salarystatus);
     $('#HOD_showreqdetails_four_txt').val(inquirystatus);
   
     $('#HOD_showreqdetails_comment_txt').val(HODComment);
   
   if(ASApprovalStatus ==""){
     $('.hodbuttons').attr('disabled',false);
   }else{
     $('.hodbuttons').attr('disabled',true);
   }
   });
   
   
   
   ////////////////////////////////////////////////////////////////////////
   
   $("#HOD_showreqdetails_approvetosecretory_btn").click(function(){
   
   var id_transfer = $('#HOD_showreqdetails_id_txt').val().trim();
   
   var asdid_transfer = <?php echo json_encode($_SESSION['Id']) ?>;
   
   var d = new Date();
   var asdate_transfer = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
   if(confirm("Do you want to approve a record ?")){
       
       $.ajax({
       type: 'POST',
       url: "process/as_incrementApprovalProcess.php",
       data:{id_asApproval_transfer:id_transfer,          
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
       url: "process/as_incrememntRejectlProcess.php",
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
