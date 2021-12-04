<?php 
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
 session_start();
 include('include/database.php');
 include('include/check_login.php');

 $POW1 = "State Ministry"; 

 $CL1 = "Class I";
 $CL2 = "Class II";
 $CL3 = "Class III";
 $CL4 = "Special";

 $db = new database();
 $query11 = $db->getRow('SELECT COUNT(*) AS CountSMClassI  
                      FROM sleasofficer
                      WHERE PlaceOfWork = ? AND Class=?',[
                      $POW1,
                      $CL1
                      ]);
 
$Count_SM_CI = $query11['CountSMClassI'];

$query22 = $db->getRow('SELECT COUNT(*) AS CountSMClassII  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL2
                        ]);

$Count_SM_CII = $query22['CountSMClassII'];   

$query33 = $db->getRow('SELECT COUNT(*) AS CountSMClassIII  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL3
                        ]);

$Count_SM_CIII = $query33['CountSMClassIII']; 

$Cont_SM_Final = $Count_SM_CII + $Count_SM_CIII;

$query44 = $db->getRow('SELECT COUNT(*) AS CountSMSpecial  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL4
                        ]);

$Count_SM_Special = $query44['CountSMSpecial']; 

$Value_SM_CI = 11- $Count_SM_CI;
$Value_SM_Fianal = 10 - $Cont_SM_Final;
$Value_SM_Special = 4 - $Count_SM_Special;

$Vacancy_SM_CI = "";
$Excess_SM_CI = "";
$Vacancy_SM_Final = "";
$VExcess_SM_Final = "";
$Vacancy_SM_Special = "";
$Excess_SM_Special = "";

if ($Value_SM_CI < 0 ){
  $Excess_SM_CI = abs($Value_SM_CI);
  $Vacancy_SM_CI = 0;
}else if ($Value_SM_CI > 0 ){
  $Vacancy_SM_CI = $Value_SM_CI;
  $Excess_SM_CI = 0;
}else{
  $Excess_SM_CI = 0;
  $Vacancy_SM_CI = 0;
}

if ($Value_SM_Fianal < 0 ){
  $VExcess_SM_Final = abs($Value_SM_Fianal);
  $Vacancy_SM_Final = 0;
}else if ($Value_SM_Fianal > 0 ){
  $Vacancy_SM_Final = $Value_SM_Fianal;
  $VExcess_SM_Final = 0;
}else{
  $VExcess_SM_Final = 0;
  $Vacancy_SM_Final = 0;
}

if ($Value_SM_Special < 0 ){
  $Excess_SM_Special = abs($Value_SM_Special);
  $Vacancy_SM_Special = 0;
}else if ($Value_SM_Special > 0 ){
  $Vacancy_SM_Special = $Value_SM_Special;
  $Excess_SM_Special = 0;
}else{
  $Excess_SM_Special = 0;
  $Vacancy_SM_Special = 0;
}


$query55 = $db->getRows('SELECT EmpNo , Name , Class , Designation ,Location 
                        FROM sleasofficer
                        WHERE PlaceOfWork  = ?',[
                        $POW1,
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

  <!-- Header -->
<?php include('common/header.php');?>
  <!-- Main Sidebar Container -->  

<?php include('common/sidebar2.php');;?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reports - State Ministry</h1>
          </div>        
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Summary of State Ministry</h3>
              </div>
              <div class="card-body">
                <div>
                   <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                  <div class="col-sm-12 col-md-6">
                  <div class="dt-buttons btn-group flex-wrap col-lg-3">  
                    <button class="btn btn-info buttons-pdf buttons-html5" tabindex="0" aria-controls="Secretory_reports_table_1" type="button" onclick="window.location.href='ReportSummaryStateMinistry.php'">
                    <span>Summary</span>
                    </button> 
                    </div>
                    </div>
                </div>
                <br>
                <div id="tab1">
                <table class="table table-bordered text-center" id="Secretory_reports_table_1">
                  <thead >
                  <tr class="table-active">
                    <td></td>
                    <td> <label id="Secretory_reports_table_1_approvedcadre_lbl">Approved Cadre </label></td>
                    <td> <label id="Secretory_reports_table_1_currentcadre_lbl">Current Cadre </label></td>
                    <td> <label id="Secretory_reports_table_1_vacancy_lbl">Vacancy  </label></td>
                    <td> <label id="Secretory_reports_table_1_excess_lbl">Excess  </label></td>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td class="table-active" id="Secretory_reports_table_1_special_lbl">Special</td>
                    <td>4</td>
                    <td><?php echo $Count_SM_Special;?></td>
                    <td><?php echo $Vacancy_SM_Special;?></td>
                    <td><?php echo $Excess_SM_Special;?></td>
                  </tr>
                  <tr>
                    <td class="table-active" id="Secretory_reports_table_1_classI_lbl">Class I</td>
                    <td>11</td>
                    <td><?php echo $Count_SM_CI;?></td>
                    <td><?php echo $Vacancy_SM_CI;?></td>
                    <td><?php echo $Excess_SM_CI;?></td>
                  </tr>
                  <tr>
                    <td class="table-active" id="Secretory_reports_table_1_classII_lbl">Class II/ III</td>
                    <td>10</td>
                    <td><?php echo $Cont_SM_Final;?></td>
                    <td><?php echo $Vacancy_SM_Final;?></td>
                    <td><?php echo $VExcess_SM_Final;?></td>
                  </tr>

                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        
        <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Spread of SLEAS Officers in State Ministry</h3>
                  </div>
                  <div class="card-body">
                    <div class="card">
                 
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     
                  <div class="row">
                      <div class="col-sm-12 col-md-6">

                        <div class="dt-buttons btn-group flex-wrap col-lg-3">
                          <button class="btn btn-info buttons-pdf buttons-html5" tabindex="0" aria-controls="Secretory_reports_table_2" type="button" onclick="window.location.href='ReportStateMinstry.php'">
                          <span>Full Details</span>
                          </button> 
                           </div>
                      </div>


                      <div class="col-md-5">
                          <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="Secretory_reports_table_2_search_txt">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                     </div>

                    <div class="col-md-1">
                          <div class="dt-buttons btn-group flex-wrap col-lg-3">   
                          <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="Secretory_reports_table_2" type="button" onclick="createPDF2()">
                          <span>Print</span>
                          </button>

                          </div>
                    </div>


              </div>
              <br>
              <div class="row">
              <div class="col-sm-12" id = "tab2">
              <table id="Secretory_reports_table_2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                            <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"></th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Emp. No</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Class</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Designation</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">State Ministry</th>
                            </tr>
                      </thead>  

                     <?php foreach ($query55 as $data) { ?> 
                     
                      <tbody id="Secretory_reports_table_2_data">
                         <tr class="odd">
                         <td > 
                              <?php
                                    echo $i;
                                    $i++;
                                    ?>
                                </td>
                              <td ><?php echo $data['EmpNo']; ?></td>
                              <td><?php echo $data['Name']; ?></td>
                              <td><?php echo $data['Class']; ?></td>
                              <td><?php echo $data['Designation']; ?></td>
                              <td><?php echo $data['Location']; ?></td>
                         </tr>
                      </tbody>                      
                          <?php } ?>  
                </table>
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
  <?php include('common/footer.php');?> 
</div>


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
  $("#Secretory_reports_table_2_search_txt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Secretory_reports_table_2_data tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


    
    function createPDF1() {
        var sTable = document.getElementById('tab1').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Details of the Employee Spread of SLEAS Officers in Ministry of Education (Permanent Working Place) Update on 2021-04-31 - Divisional Office</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
 


    function createPDF2() {
        var sTable = document.getElementById('tab2').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Details of the Employee - Divisional Office</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script> 