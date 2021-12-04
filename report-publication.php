<?php 
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
 session_start();
 include('include/database.php');
 include('include/check_login.php');

 $POW1 = "Publication";

 $CL1 = "Class I";
 $CL2 = "Class II";
 $CL3 = "Class III";
 $CL4 = "Special";

 $db = new database();
 $query11 = $db->getRow('SELECT COUNT(*) AS CountDZClassI  
                      FROM sleasofficer
                      WHERE PlaceOfWork = ? AND Class=?',[
                      $POW1,
                      $CL1
                      ]);
 
$Count_ZO_CI = $query11['CountDZClassI'];

$query22 = $db->getRow('SELECT COUNT(*) AS CountZOClassII  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL2
                        ]);

$Count_ZO_CII = $query22['CountZOClassII'];   

$query33 = $db->getRow('SELECT COUNT(*) AS CountZOClassIII  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL3
                        ]);

$Count_ZO_CIII = $query33['CountZOClassIII']; 

$Cont_ZO_Final = $Count_ZO_CII + $Count_ZO_CIII;

$query44 = $db->getRow('SELECT COUNT(*) AS CountZOSpecial  
                        FROM sleasofficer
                        WHERE PlaceOfWork = ? AND Class=?',[
                        $POW1,
                        $CL4
                        ]);

$Count_ZO_Special = $query44['CountZOSpecial']; 

$Value_ZO_CI = 4 - $Count_ZO_CI;
$Value_ZO_Fianal = 38 - $Cont_ZO_Final;
$Value_ZO_Special = 2 - $Count_ZO_Special;

$Vacancy_ZO_CI = "";
$Excess_ZO_CI = "";
$Vacancy_ZO_Final = "";
$VExcess_ZO_Final = "";
$Vacancy_ZO_Special = "";
$Excess_ZO_Special = "";

if ($Value_ZO_CI < 0 ){
  $Excess_ZO_CI = abs($Value_ZO_CI);
  $Vacancy_ZO_CI = 0;
}else if ($Value_ZO_CI > 0 ){
  $Vacancy_ZO_CI = $Value_ZO_CI;
  $Excess_ZO_CI = 0;
}else{
  $Excess_ZO_CI = 0;
  $Vacancy_ZO_CI = 0;
}

if ($Value_ZO_Fianal < 0 ){
  $VExcess_ZO_Final = abs($Value_ZO_Fianal);
  $Vacancy_ZO_Final = 0;
}else if ($Value_ZO_Fianal > 0 ){
  $Vacancy_ZO_Final = $Value_ZO_Fianal;
  $VExcess_ZO_Final = 0;
}else{
  $VExcess_ZO_Final = 0;
  $Vacancy_ZO_Final = 0;
}

if ($Value_ZO_Special < 0 ){
  $Excess_ZO_Special = abs($Value_ZO_Special);
  $Vacancy_ZO_Special = 0;
}else if ($Value_ZO_Special > 0 ){
  $Vacancy_ZO_Special = $Value_ZO_Special;
  $Excess_ZO_Special = 0;
}else{
  $Excess_ZO_Special = 0;
  $Vacancy_ZO_Special = 0;
}


$query55 = $db->getRows('SELECT EmpNo , Name , Class , Designation  
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
            <h1 class="m-0">Reports - Department Of Publication</h1>
          </div>        
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Summary of Department of Publication</h3>
              </div>

              <div class="card-body">

                <div>
                   <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                  <div class="col-sm-12 col-md-6">
                  <div class="dt-buttons btn-group flex-wrap col-lg-3">    
                    <button class="btn btn-info buttons-pdf buttons-html5" tabindex="0" aria-controls="Secretory_reports_table_1" type="button" onclick="window.location.href='ReportSummaryPublication.php'">
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
                  <tbody >
                                      <tr>
                    <td class="table-active" id="Secretory_reports_table_1_special_lbl">Special</td>
                    <td>2</td>
                    <td><?php echo $Count_ZO_Special;?></td>
                    <td><?php echo $Vacancy_ZO_Special;?></td>
                    <td><?php echo $Excess_ZO_Special;?></td>
                  </tr>
                  <tr>
                    <td class="table-active" id="Secretory_reports_table_1_classI_lbl">Class I</td>
                    <td>4</td>
                    <td><?php echo $Count_ZO_CI;?></td>
                    <td><?php echo $Vacancy_ZO_CI;?></td>
                    <td><?php echo $Excess_ZO_CI;?></td>
                  </tr>
                  <tr>
                    <td class="table-active" id="Secretory_reports_table_1_classII_lbl">Class II/ III</td>
                    <td>38</td>
                    <td><?php echo $Cont_ZO_Final;?></td>
                    <td><?php echo $Vacancy_ZO_Final;?></td>
                    <td><?php echo $VExcess_ZO_Final;?></td>
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
                <h3 class="card-title">Spread of SLEAS Officers in Department of Publication</h3>
              </div>
              <div class="card-body">
                <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                  
            <div class="col-md-6">
                       <div class="dt-buttons btn-group flex-wrap col-lg-3">   
                  <button class="btn btn-info buttons-pdf buttons-html5 btn-block" tabindex="0" aria-controls="Secretory_reports_table_2" type="button" onclick="window.location.href='ReportPublication.php'">
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
              </div>
              <br>
              <div class="row">
              <div class="col-sm-12" id="tab2">
              <table id="Secretory_reports_table_2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead >
                            <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"></th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Emp. No</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Class</th>
                              <th class="sorting" tabindex="0" aria-controls="Secretory_reports_table_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Designation</th>
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
        win.document.write('<title>Details of the Employee Spread of SLEAS Officers in Ministry of Education (Permanent Working Place) Update on 2021-04-31 - Zonal Office</title>');   // <title> FOR PDF HEADER.
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
        win.document.write('<title>Details of the Employee - Zonal Office</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }

  
</script> 