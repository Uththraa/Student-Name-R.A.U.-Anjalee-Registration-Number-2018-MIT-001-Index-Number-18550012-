<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    include('include/database.php');
    include('include/check_login.php');
   
    $userId = $_SESSION['Id'];
    $userEmpId = $_SESSION['UserEmpNo'];
   
    $LikeClause = "Master%";
   
     $db = new database();
   
     $query = $db->getRow('SELECT * 
                           FROM sleasofficer 
                           WHERE EmpNo = ?',[$userEmpId]);
                         
   
     $EmpNo = $query['EmpNo'];
     $Status = $query['Status'];
     $Name = $query['Name'];
     $Class = $query['Class'];
     $Designation = $query['Designation'];
     $CurrentStatus = $query['CurrentStatus'];
     $image = $query['Image'];
     $NIC = $query['NIC'];
     $DOB = $query['DOB'];
     $Gender = $query['Gender'];
     $ContactHome = $query['ContactHome'];
     $ContactMobile = $query['ContactMobile'];
     $ContactOffice = $query['ContactOffice'];
     $Email = $query['Email'];
     $Address = $query['Address'];
     $Category = $query['Category'];
     $AppointmentDate = $query['AppointmentDate'];
     $CadreType = $query['CadreType'];
     $SpecialSubject = $query['SpecialSubject'];
     $Province = $query['Province'];
     $PlaceOfWork = $query['PlaceOfWork'];
     $Location = $query['Location'];
   
    
     $query1 = $db->getRows('SELECT *
                             FROM sleaseducqualidegree
                             WHERE SleasOffId  = ?AND DegreeLevel LIKE ? ',[$userEmpId,$LikeClause]);
   
   if($query1 >0){
     foreach ($query1 as $data){
       $array[] = $data['DegreeLevel'];
             
       }
     
   }else{
     $array[] =  ["-"];
   }
    
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
         <?php include('common/sidebar.php');;?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Create Request</h1>
                     </div>
                     <!-- /.col -->         
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card card-primary card-tabs">
                           <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="SLEAS_createrequest_tab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="SLEAS_createrequest_transform_tab" data-toggle="pill" href="#SLEAS_createrequest_transform" role="tab" aria-controls="SLEAS_createrequest_transform" aria-selected="true">Transfer</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="SLEAS_createrequest_promotion_tab" data-toggle="pill" href="#SLEAS_createrequest_promotion" role="tab" aria-controls="SLEAS_createrequest_promotion" aria-selected="false">Promotions</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="SLEAS_createrequest_increments_tab" data-toggle="pill" href="#SLEAS_createrequest_increments" role="tab" aria-controls="SLEAS_createrequest_increments" aria-selected="false">Increments</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="SLEAS_createrequest_retirements_tab" data-toggle="pill" href="#SLEAS_createrequest_retirements" role="tab" aria-controls="SLEAS_createrequest_retirements" aria-selected="false">Retirements</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- Tab Transform -->
                           <div class="card-body">
                              <div class="tab-content" id="SLEAS_createrequest_tabContent">
                                 <div class="tab-pane fade active show" id="SLEAS_createrequest_transform" role="tabpanel" aria-labelledby="SLEAS_createrequest_transform_tab">
                                    <form class="form-horizontal">
                                       <div class="row">
                                          <h6>SECTION I: Employee Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputEmail" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_empname_lbl">Employee Name</label>
                                          <div class="col-sm-10">
                                             <input type="email" class="form-control" id="SLEAS_createrequest_transform_empname_txt" disabled="" value= "<?php echo $Name;?>" >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_class_lbl">Class</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_class_txt" disabled="" value= "<?php echo $Class;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_designation_lbl">Designation </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_designation_txt" disabled="" value= "<?php echo $Designation;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_dob_lbl">Date of Birth </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_dob_txt" disabled="" value= "<?php echo $DOB;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_nic_lbl">NIC </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_nic_txt" disabled="" value= "<?php echo $NIC;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_gender_lbl">Gender </label>
                                          <div class="col-sm-10">
                                             <div class = "row">
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_transform_gender_male" id="SLEAS_createrequest_transform_gender_male" <?=$Gender=="Male" ? "checked" : ""?> value="Male"> Male
                                                   </div>
                                                </div>
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_transform_gender_female" id="SLEAS_createrequest_transform_gender_female"<?=$Gender=="Female" ? "checked" : ""?>  value="Female">Female
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_address_lbl">Address </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_address_txt" disabled="" value= "<?php echo $Address;?>" >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_mobile_lbl">Contact-Mobile </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_mobile_txt" disabled="" value= "<?php echo $ContactMobile;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_appdate_lbl">Appointment Date </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_appdate_txt" disabled="" value= "<?php echo $AppointmentDate;?>" >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_workingplace_lbl">Current Working Place </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_transform_workingplace_txt" disabled="" value= "<?php echo $Province;?> - <?php echo $PlaceOfWork;?>  -  <?php echo $Location;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_appdate_lbl">Service Period </label>
                                          <div class="col-sm-10">
                                             <div class= "row">
                                                <div class= "col-sm-6">
                                                   <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_servicefrom_lbl">From </label>
                                                   <input type="date" class="form-control" id="SLEAS_createrequest_transform_servicefrom_txt">
                                                </div>
                                                <div class= "col-sm-6">
                                                   <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_servicefrom_lbl">To </label>
                                                   <input type="date" class="form-control" id="SLEAS_createrequest_transform_serviceto_txt" >
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6
                                             >SECTION II: Transfer Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_reqplace_lbl">Province </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_province_drp" name="SLEAS_createrequest_transform_province_drp" >
                                                <option value="">-Select-</option>
                                                <option value="Western" >Western</option>
                                                <option value="Central" >Central</option>
                                                <option value="Northern" >Northern</option>
                                                <option value="North Central" >North Central</option>
                                                <option value="North Western" >North Western</option>
                                                <option value="Uva" >Uva</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Eastern" >Eastern</option>
                                                <option value="Sabaragamu">Sabaragamu</option>
                                                <option value="Southern" >Southern</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_placeofworkd_lbl">Place of Work </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_emptype_drp"  name="SLEAS_createrequest_transform_emptype_drp">
                                                <option value="">-Select-</option>
                                                <option value="MOE" >MOE</option>
                                                <option value="Examination" >Examination</option>
                                                <option value="Publication"  >Publication</option>
                                                <option value="School">School</option>
                                                <option value="Province" >Province</option>
                                                <option value="State Ministry" >State Ministry </option>
                                                <option value="Department" >Department</option>
                                                <option value="Divisional Office" >Divisional Office</option>
                                                <option value="Provisional Office" >Provisional Office</option>
                                                <option value="Zonal Office"  >Zonal Office</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row" id="SLEAS_createrequest_transform_moe_branch">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_moe_branch_lbl">Branch </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_moe_branch_drp" >
                                                <option value="">-Select-</option>
                                                <option Value="Aesthetic Education Branch" >Aesthetic Education Branch</option>
                                                <option Value="Agriculture and Environmental Education Branch" >Agriculture and Environmental Education Branch</option>
                                                <option Value="Bi Lingual & Tri Language Unit" >Bi Lingual & Tri Language Unit</option>
                                                <option Value="Co-curricular Activities, Guidance and Counseling Branch" >Co-curricular Activities, Guidance and Counseling Branch</option>
                                                <option Value="College of Education Branch" >College of Education Branch</option>
                                                <option Value="Commerce & Business Education Branch" >Commerce & Business Education Branch</option>
                                                <option Value="Construction, Service Providing and Infrastructures Development Unit" >Construction, Service Providing and Infrastructures Development Unit</option>
                                                <option Value="Data Management Branch" >Data Management Branch</option>
                                                <option Value="Education Development & Administration Branch" >Education Development & Administration Branch</option>
                                                <option Value="Education for all Branch">Education for all Branch</option>
                                                <option Value="Education Publication Advisory Board" >Education Publication Advisory Board</option>
                                                <option Value="Education Reforms Unit" >Education Reforms Unit</option>
                                                <option Value="Education Research & Development Branch" >Education Research & Development Branch</option>
                                                <option Value="Educational Services Establishment Division" >Educational Services Establishment Division</option>
                                                <option Value="Educational Quality Development Division" >Educational Quality Development Division</option>
                                                <option Value="English & Foreign Language Branch" >English & Foreign Language Branch</option>
                                                <option Value="ESE (Pool)" >ESE (Pool)</option>
                                                <option Value="Foreign Agencies & External Affairs Branch" >Foreign Agencies & External Affairs Branch</option>
                                                <option Value="Health & Nutrition Branch" >Health & Nutrition Branch</option>
                                                <option Value="Human Resource Development Branch" >Human Resource Development Branch</option>
                                                <option Value="Information & Communication Technology Branch" >Information & Communication Technology Branch</option>
                                                <option Value="Management & Quality Assurance Branch" >Management & Quality Assurance Branch</option>
                                                <option Value="Mathematics  Branch" >Mathematics  Branch</option>
                                                <option Value="Monitoring Performance Review Branch" >Monitoring Performance Review Branch</option>
                                                <option Value="Muslim School Development Branch" >Muslim School Development Branch</option>
                                                <option Value="National Book Development Board" >National Book Development Board</option>
                                                <option Value="National College of Education Branch" >National College of Education Branch</option>
                                                <option Value="National Language & Humanities Education Unit" >National Language & Humanities Education Unit</option>
                                                <option Value="National Operation Room" >National Operation Room</option>
                                                <option Value="National School Branch">National School Branch </option>
                                                <option Value="Non Formal & Special Education Branch" >Non Formal & Special Education Branch</option>
                                                <option Value="Peace & Reconciliation Education Unit" >Peace & Reconciliation Education Unit</option>
                                                <option Value="Piriven Branch" >Piriven Branch</option>
                                                <option Value="Plantation School Development Branch" >Plantation School Development Branch</option>
                                                <option Value="Policy & Planning Branch" >Policy & Planning Branch</option>
                                                <option Value="Policy Planning & Performance Review Division" >Policy Planning & Performance Review Division</option>
                                                <option Value="Primary Education and Early Childhood Development Unit" >Primary Education and Early Childhood Development Unit </option>
                                                <option Value="Private School Branch" >Private School Branch</option>
                                                <option Value="Religious & Value Education Branch " >Religious & Value Education Branch </option>
                                                <option Value="School Activities Branch" >School Activities Branch</option>
                                                <option Value="School Affairs Division" >School Affairs Division</option>
                                                <option Value="School Library Development Branch" >School Library Development Branch</option>
                                                <option Value="School Supplies & Procurement Branch" >School Supplies & Procurement Branch</option>
                                                <option Value="Science Branch" >Science Branch</option>
                                                <option Value="Sports & Physical Education Branch" >Sports & Physical Education Branch</option>
                                                <option Value="Tamil School Development Branch" >Tamil School Development Branch</option>
                                                <option Value="Teacher Education Administration Branch" >Teacher Education Administration Branch</option>
                                                <option Value="Teacher Establishment Branch" >Teacher Establishment Branch</option>
                                                <option Value="Teacher Transfer Branch" >Teacher Transfer Branch</option>
                                                <option Value="Technical Education Branch" >Technical Education Branch</option>
                                                <option Value="Thousands School Development Branch" >Thousands School Development Branch</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row" id="SLEAS_createrequest_transform_school_school">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_school_lbl">School </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_school_school_drp" >
                                                <option value="">-Select-</option>
                                                <option Value = "School 1"  >School 1</option>
                                                <option Value = "School 2"  >School 2</option>
                                                <option Value = "School 3" >School 3</option>
                                                <option Value = "School 4"  >School 4</option>
                                                <option Value = "School 5" >School 5</option>
                                                <option Value = "School 6" >School 6</option>
                                                <option Value = "School 7" >School 7</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row" id="SLEAS_createrequest_transform_stateministry_stateministry">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_stateministry_lbl">State Minisrty </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_stateministry_stateministry_drp" >
                                                <option value="">-Select-</option>
                                                <option Value = "State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services" >State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services</option>
                                                <option Value = "State Minister of Education Reforms, Open Universities and Distance Learning Promotion" >State Minister of Education Reforms, Open Universities and Distance Learning Promotion</option>
                                                <option Value = "State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification" >State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification</option>
                                                <option Value = "State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities" >State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row" id="SLEAS_createrequest_transform_divisionaloffice_divisionaloffice">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_divisionaloffice_lbl">Divisional Office </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_divisionaloffice_divisionaloffice_drp" >
                                                <option value="">-Select-</option>
                                                <option  value = "Divisional Office 1" >Divisional Office 1 </option>
                                                <option  value = "Divisional Office 2" >Divisional Office 2</option>
                                                <option  value = "Divisional Office 3" >Divisional Office 3</option>
                                                <option  value = "Divisional Office 4" >Divisional Office 4</option>
                                                <option  value = "Divisional Office 5" >Divisional Office 5</option>
                                                <option  value = "Divisional Office 6" >Divisional Office 6</option>
                                                <option  value = "Divisional Office 7" >Divisional Office 7</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row" id="SLEAS_createrequest_transform_zonaloffice_zonaloffice">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_transform_zonaloffice_zonaloffice_lbl">Zonal Office </label>
                                          <div class="col-sm-10">
                                             <select class="form-control" id="SLEAS_createrequest_transform_zonaloffice_zonaloffice_drp" >
                                                <option value="">-Select-</option>
                                                <option value = "Zonal Office 1">Zonal Office 1</option>
                                                <option value = "Zonal Office 2"  >Zonal Office 2</option>
                                                <option value = "Zonal Office 3" >Zonal Office 2</option>
                                                <option value = "Zonal Office 4" >Zonal Office 3</option>
                                                <option value = "Zonal Office 5"  >Zonal Office 4</option>
                                                <option value = "Zonal Office 6"  >Zonal Office 5</option>
                                                <option value = "Zonal Office 7"  >Zonal Office 6</option>
                                             </select>
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION III: Declaration</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <p>I declare the abouve information to be true and correct.</p>
                                       </div>
                                       <div class="form-group row">
                                          <button type="submit" class="btn btn-danger col-sm-1" id="SLEAS_createrequest_transform_submit_btn">Submit</button>                       
                                       </div>
                                    </form>
                                 </div>
                                 <!-- Tab Promotion -->
                                 <div class="tab-pane fade" id="SLEAS_createrequest_promotion" role="tabpanel" aria-labelledby="SLEAS_createrequest_promotion_tab">
                                    <form class="form-horizontal">
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION I: Employee Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputEmail" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_name_lbl">Employee Name</label>
                                          <div class="col-sm-10">
                                             <input type="email" class="form-control" id="SLEAS_createrequest_promotion_name_txt" disabled="" value= "<?php echo $Name;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_class_lbl">Class</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_class_txt" disabled="" value= "<?php echo $Class;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_designation_lbl">Designation</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_designation_txt" disabled="" value= "<?php echo $Designation;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_dob_lbl">Date of Birth</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_dob_txt" disabled="" value= "<?php echo $DOB;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_nic_lbl">NIC</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_nic_txt" disabled="" value= "<?php echo $NIC;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_gender_lbl">Gender <?=$Gender?></label>
                                          <div class="col-sm-10">
                                             <div class = "row">
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_promotion_gender_male" id="SLEAS_createrequest_promotion_gender_male"  <?=$Gender=="Male" ? "checked" : ""?> value="A"> Male
                                                   </div>
                                                </div>
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_promotion_gender_female" id="SLEAS_createrequest_promotion_gender_female" <?=$Gender=="Female" ? "checked" : ""?> >Female
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_address_lbl">Address </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_address_txt" disabled="" value= "<?php echo $Address;?>" >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_mobile_lbl">Contact-Mobile </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_promotion_mobile_txt" disabled="" value= "<?php echo $ContactMobile;?>" >
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION II: Educational Qualifications</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_promotion_masterdegree_lbl">Master Degree complete  </label>
                                          <div class="col-sm-10">
                                             <textarea class="form-control contacts" rows="3"  disabled="" placeholder="Enter Address" id="SLEAS_createrequest_promotion_masterdegree_txt" name = "SLEAS_createrequest_promotion_masterdegree_txt" >  <?php 
                                                if(!empty($array)){
                                                  echo implode(" , ",$array);
                                                }else{
                                                  echo "";
                                                }
                                                 ?> 
                                             </textarea>
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION III: Declaration</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <p>I declare the abouve information to be true and correct.</p>
                                       </div>
                                       <div class="form-group row">
                                          <button type="submit" class="btn btn-danger col-sm-1" id="SLEAS_createrequest_promotion_submit_btn">Submit</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- Tab Increments -->
                                 <div class="tab-pane fade" id="SLEAS_createrequest_increments" role="tabpanel" aria-labelledby="SLEAS_createrequest_increments_tab">
                                    <form class="form-horizontal">
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION I: Employee Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputEmail" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_empname_lbl">Employee Name</label>
                                          <div class="col-sm-10">
                                             <input type="email" class="form-control" id="SLEAS_createrequest_increments_empname_txt" disabled="" value= "<?php echo $Name;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_designation_lbl">Designation </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_increments_designation_txt" disabled="" value= "<?php echo $Designation;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_dob_lbl">Date of Birth</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_increments_dob_txt" disabled="" value= "<?php echo $DOB;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_nic_lbl">NIC</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_increments_nic_txt" disabled="" value= "<?php echo $NIC;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_gender_lbl">Gender <?=$Gender?></label>
                                          <div class="col-sm-10">
                                             <div class = "row">
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_increments_gender_male" id="SLEAS_createrequest_increments_gender_male" <?=$Gender=="Male" ? "checked" : ""?> value="A"> Male
                                                   </div>
                                                </div>
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_increments_gender_female" id="SLEAS_createrequest_increments_gender_female" <?=$Gender=="Female" ? "checked" : ""?> >Female
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_address_lbl">Address </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_incrementsn_address_txt" disabled="" value= "<?php echo $Address;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_increments_mobile_lbl">Contact-Mobile </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_increments_mobile_txt" disabled="" value= "<?php echo $ContactMobile;?>">
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION III: Declaration</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <p>I declare the abouve information to be true and correct.</p>
                                       </div>
                                       <div class="form-group row">
                                          <button type="submit" class="btn btn-danger col-sm-1" id="SLEAS_createrequest_increment_submit_btn">Submit</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- Tab Retirement -->
                                 <div class="tab-pane fade" id="SLEAS_createrequest_retirements" role="tabpanel" aria-labelledby="SLEAS_createrequest_retirements_tab">
                                    <form class="form-horizontal">
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION I: Employee Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputEmail" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_empname_lbl">Employee Name</label>
                                          <div class="col-sm-10">
                                             <input type="email" class="form-control" id="SLEAS_createrequest_retirements_empname_txt" disabled="" value= "<?php echo $Name;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_class_lbl">Class</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_retirements_class_txt" disabled="" value= "<?php echo $Class;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_dob_lbl">Date of Birth</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_retirements_dob_txt" disabled="" value= "<?php echo $DOB;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputName2" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_nic_lbl">NIC</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_retirements_nic_txt" disabled="" value= "<?php echo $NIC;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_gender_lbl">Gender <?=$Gender?></label>
                                          <div class="col-sm-10">
                                             <div class = "row">
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_retirements_gender_male" id="SLEAS_createrequest_retirements_gender_male" <?=$Gender=="Male" ? "checked" : ""?> value="A"> Male
                                                   </div>
                                                </div>
                                                <div class="col-2">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="Gender" disabled="" name = "SLEAS_createrequest_retirements_gender_female" id="SLEAS_createrequest_retirements_gender_female" <?=$Gender=="Female" ? "checked" : ""?> >Female
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_address_lbl">Address </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_retirements_address_txt" disabled="" value= "<?php echo $Address;?>">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_mobile_lbl">Contact-Mobile </label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="SLEAS_createrequest_retirements_mobile_txt" disabled="" value= "<?php echo $ContactMobile;?>" >
                                          </div>
                                       </div>
                                       <br>
                                       <hr>
                                       <div class="row">
                                          <h6>SECTION II: Retirement Information</h6>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputSkills" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_luggage_lbl">Reason For Retirement </label>
                                          <div class="col-sm-10">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ReqReason" id="SLEAS_createrequest_retirements_op1_rb" value="Coming of age (After completing 55 years of age)" checked="">Coming of age (After completing 55 years of age)
                                             </div>
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ReqReason" id="SLEAS_createrequest_retirements_op2_rb" value="Optional Retirement (Age between 55-60)">Optional Retirement (Age between 55-60)
                                             </div>
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ReqReason" id="SLEAS_createrequest_retirements_op3_rb" value="Compulsary Retirement (Upon completion of 60 years of age)" >Compulsary Retirement (Upon completion of 60 years of age)
                                             </div>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="form-group row">
                                          <label for="inputExperience" class="col-sm-2 col-form-label" id="SLEAS_createrequest_retirements_retirementdate_lbl">Date Request for retirement </label>
                                          <div class="col-sm-10">
                                             <input type="date" class="form-control" id="SLEAS_createrequest_retirements_retirementdate_txt" placeholder="Enter Designation">
                                          </div>
                                       </div>
                                       <br>                      
                                       <div class="form-group row">
                                          <button type="submit" class="btn btn-danger col-sm-1" id="SLEAS_createrequest_retirements_submit_btn">Submit</button>
                                       </div>
                                    </form>
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
   $(document).ready(function() {
   
   //Initially hided sections
     $("#SLEAS_createrequest_transform_moe_branch").hide();
     $("#SLEAS_createrequest_transform_school_school").hide();
     $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
     $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
     $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
   
   
     ///////////////////////////////////
     function placeOfWorkChange(){
          
          if($('#SLEAS_createrequest_transform_emptype_drp option:selected').val() == "MOE"){
           $("#SLEAS_createrequest_transform_moe_branch").show();
           $("#SLEAS_createrequest_transform_school_school").hide();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
   
          }else if($('#SLEAS_createrequest_transform_emptype_drp option:selected').val() == "School"){
           $("#SLEAS_createrequest_transform_moe_branch").hide();
           $("#SLEAS_createrequest_transform_school_school").show();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
   
          }else if($('#SLEAS_createrequest_transform_emptype_drp option:selected').val() == "State Ministry"){
           $("#SLEAS_createrequest_transform_moe_branch").hide();
           $("#SLEAS_createrequest_transform_school_school").hide();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").show();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
            
          }else if($('#SLEAS_createrequest_transform_emptype_drp option:selected').val() == "Divisional Office"){
           $("#SLEAS_createrequest_transform_moe_branch").hide();
           $("#SLEAS_createrequest_transform_school_school").hide();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").show();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
            
          }else if($('#SLEAS_createrequest_transform_emptype_drp option:selected').val() == "Zonal Office"){
           $("#SLEAS_createrequest_transform_moe_branch").hide();
           $("#SLEAS_createrequest_transform_school_school").hide();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").show();
            
          } else{
           $("#SLEAS_createrequest_transform_moe_branch").hide();
           $("#SLEAS_createrequest_transform_school_school").hide();
           $("#SLEAS_createrequest_transform_stateministry_stateministry").hide();
           $("#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice").hide();
           $("#SLEAS_createrequest_transform_zonaloffice_zonaloffice").hide();
          }
      
    };
   
   ////////////////////////////////////////
   
   //Show/hide Branch/School/State Ministry/Divisional Office/ Zonal Office field according to the Place-of-work selected value
   $("#SLEAS_createrequest_transform_emptype_drp").change(function () {    
       placeOfWorkChange();
       });
   
   
     //////////////////////////////////////
   
     //Submit button for transfer-request
       $("#SLEAS_createrequest_transform_submit_btn").click(function(){
   
       var empName_transfer = $('#SLEAS_createrequest_transform_empname_txt').val().trim();
       var class_transfer = $('#SLEAS_createrequest_transform_class_txt').val().trim();
       var designation_transfer = $('#SLEAS_createrequest_transform_designation_txt').val().trim();
       var dob_transfer = $('#SLEAS_createrequest_transform_dob_txt').val().trim();
       var nic_transfer = $('#SLEAS_createrequest_transform_nic_txt').val().trim();
       var gender_transfer = $("input[name='Gender']:checked").val().trim();
       var address_transfer = $('#SLEAS_createrequest_transform_address_txt').val().trim();
       var contactMobile_transfer = $('#SLEAS_createrequest_transform_mobile_txt').val().trim();
       var appDate_transfer = $('#SLEAS_createrequest_transform_appdate_txt').val().trim();
       var currWokPlace_transfer = $('#SLEAS_createrequest_transform_workingplace_txt').val().trim();
   
       var servicePeriodFrom_transfer = $('#SLEAS_createrequest_transform_servicefrom_txt').val().trim();
       var servicePeriodTo_transfer = $('#SLEAS_createrequest_transform_serviceto_txt').val().trim();
   
       var province_transfer = $('#SLEAS_createrequest_transform_province_drp option:selected').val().trim(); 
       var placeofwork_transfer = $('#SLEAS_createrequest_transform_emptype_drp option:selected').val().trim();  
   
          if( placeofwork_transfer == "MOE")
         {
           var location_transfer = $('#SLEAS_createrequest_transform_moe_branch_drp option:selected').val().trim();
         }else if( placeofwork_transfer == "School"){
           var location_transfer = $('#SLEAS_createrequest_transform_school_school_drp option:selected').val().trim();
         }else if( placeofwork_transfer == "State Ministry"){
           var location_transfer = $('#SLEAS_createrequest_transform_stateministry_stateministry_drp option:selected').val().trim();
         }else if( placeofwork_transfer == "Divisional Office"){
           var location_transfer = $('#SLEAS_createrequest_transform_divisionaloffice_divisionaloffice_drp option:selected').val().trim();
         }else if( placeofwork_transfer == "Zonal Office"){
           var location_transfer = $('#SLEAS_createrequest_transform_zonaloffice_zonaloffice_drp option:selected').val().trim();
         }else{
           var location_transfer ="";
         }  
   
             //Place of work feild selection validate
          if(( placeofwork_transfer == "")){
           var validlocation_transfer = false;
         }else if(( placeofwork_transfer == "MOE") && (location_transfer == "")){
           var validlocation_transfer = false;
         }else  if(( placeofwork_transfer == "School") && (location_transfer == "")){
           var validlocation_transfer = false;
         }else if(( placeofwork_transfer == "State Ministry") && (location_transfer == "")){
           var validlocation_transfer = false;
         }else if(( placeofwork_transfer == "Divisional Office") && (location_transfer == "")){
           var validlocation_transfer = false;
         }else if(( placeofwork_transfer == "Zonal Office") && (location_transfer == "")){
           var validlocation_transfer = false;
         }else{
           var validlocation_transfer = true;
         }
   
         var sleasofficeid_transfer = <?php echo json_encode($_SESSION['UserEmpNo']) ?>;
   
         var d = new Date();
         var createDate_transfer = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
      
           //Inputs Validation
           if((empName_transfer == "") || (class_transfer == "") || (designation_transfer == "") ||  (dob_transfer == "") || (nic_transfer == "") || (gender_transfer == "") || (address_transfer == "") || (contactMobile_transfer == "") || (appDate_transfer == "") || (currWokPlace_transfer == "") || (servicePeriodFrom_transfer == "") || (servicePeriodTo_transfer == "") || (province_transfer == "") || (placeofwork_transfer == "") || (validlocation_transfer == false) || (sleasofficeid_transfer =="") || (createDate_transfer == "")){
               var validatedInputs = false;
               alert("Enter all the details!");
             }else{
               var validatedInputs = true;
               
             }
   
             if(validatedInputs == true){
                 if(confirm("Do you want to create a new record ?")){
                   
                   $.ajax({
                     type: 'POST',
                     url: "process/CreateTransferRequestProcess.php",    
                     data:{SLEAS_createrequest_transform_empname_txt:empName_transfer,
                       SLEAS_createrequest_transform_class_txt:class_transfer,
                       SLEAS_createrequest_transform_designation_txt:designation_transfer,
                       SLEAS_createrequest_transform_dob_txt:dob_transfer,
                       SLEAS_createrequest_transform_nic_txt:nic_transfer,
                       SLEAS_createrequest_transform_gender_txt:gender_transfer,
                       SLEAS_createrequest_transform_address_txt:address_transfer,
                       SLEAS_createrequest_transform_mobile_txt:contactMobile_transfer,
                       SLEAS_createrequest_transform_appdate_txt:appDate_transfer,
                       SLEAS_createrequest_transform_workingplace_txt:currWokPlace_transfer,
                       SLEAS_createrequest_transform_servicefrom_txt:servicePeriodFrom_transfer,
                       SLEAS_createrequest_transform_serviceto_txt:servicePeriodTo_transfer,
                       SLEAS_createrequest_transform_province_drp:province_transfer,
                       SLEAS_createrequest_transform_emptype_drp:placeofwork_transfer,
                       SLEAS_createrequest_transform_location:location_transfer,
                       Secretory_createrequest_transform_sleasofficerid_txt:sleasofficeid_transfer,
                       Secretory_createrequest_transform_currdate_txt:createDate_transfer
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
   
       }else{     
           alert("Error Occured!");
       } 
   
     }); 
   
    //////////////////////////////////////
   
     //Submit button for promotion-request
     $("#SLEAS_createrequest_promotion_submit_btn").click(function(){
   
   var empName_promotion = $('#SLEAS_createrequest_promotion_name_txt').val().trim();
   var class_promotion = $('#SLEAS_createrequest_promotion_class_txt').val().trim();
   var designation_promotion = $('#SLEAS_createrequest_promotion_designation_txt').val().trim();
   var dob_promotion = $('#SLEAS_createrequest_promotion_dob_txt').val().trim();
   var nic_promotion = $('#SLEAS_createrequest_promotion_nic_txt').val().trim();
   var gender_promotion = $("input[name='Gender']:checked").val().trim();
   var address_promotion = $('#SLEAS_createrequest_promotion_address_txt').val().trim();
   var contactMobile_promotion = $('#SLEAS_createrequest_promotion_mobile_txt').val().trim();
   var masterdegree_promotion = $('#SLEAS_createrequest_promotion_masterdegree_txt').val().trim();
   
     var sleasofficeid_promotion = <?php echo json_encode($_SESSION['UserEmpNo']) ?>;
   
     var d = new Date();
     var createDate_promotion = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
   
       //Inputs Validation
       if((empName_promotion == "") || (class_promotion == "") || (designation_promotion == "") ||  (dob_promotion == "") || (nic_promotion == "") || (gender_promotion == "") || (address_promotion == "") || (contactMobile_promotion == "")){
           var validatedInputs = false;
           alert("Enter all the details!");
         }else{
           var validatedInputs = true;
           
         }
   
         if(validatedInputs == true){
             if(confirm("Do you want to create a new record ?")){
               
               $.ajax({
                 type: 'POST',
                 url: "process/CreatePromotionRequestProcess.php",    
                 data:{SLEAS_createrequest_promotion_name_txt:empName_promotion,
                   SLEAS_createrequest_promotion_class_txt:class_promotion,
                   SLEAS_createrequest_promotion_designation_txt:designation_promotion,
                   SLEAS_createrequest_promotion_dob_txt:dob_promotion,
                   SLEAS_createrequest_promotion_nic_txt:nic_promotion,
                   SLEAS_createrequest_transform_gender_txt:gender_promotion,
                   SLEAS_createrequest_promotion_address_txt:address_promotion,
                   SLEAS_createrequest_promotion_mobile_txt:contactMobile_promotion,
                   SLEAS_createrequest_promotion_masterdegree_txt:masterdegree_promotion,
                   Secretory_createrequest_promotion_sleasofficerid_txt:sleasofficeid_promotion,
                   Secretory_createrequest_promotion_currdate_txt:createDate_promotion
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
   
   }else{     
       alert("Error Occured!");
   } 
   
   }); 
   
   
   //////////////////////////////////////
   
     //Submit button for increment-request
     $("#SLEAS_createrequest_increment_submit_btn").click(function(){
   
   var empName_increment = $('#SLEAS_createrequest_increments_empname_txt').val().trim();
   var designation_increment = $('#SLEAS_createrequest_increments_designation_txt').val().trim();
   var dob_increment = $('#SLEAS_createrequest_increments_dob_txt').val().trim();
   var nic_increment = $('#SLEAS_createrequest_increments_nic_txt').val().trim();
   var gender_increment = $("input[name='Gender']:checked").val().trim();
   var address_increment = $('#SLEAS_createrequest_incrementsn_address_txt').val().trim();
   var contactMobile_increment = $('#SLEAS_createrequest_increments_mobile_txt').val().trim();
   
     var sleasofficeid_increment = <?php echo json_encode($_SESSION['UserEmpNo']) ?>;
   
     var d = new Date();
     var createDate_increment = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
       //Inputs Validation
       if((empName_increment == "") || (designation_increment == "") ||  (dob_increment == "") || (nic_increment == "") || (gender_increment == "") || (address_increment == "") || (contactMobile_increment == "")){
           var validatedInputs = false;
           alert("Enter all the details!");
         }else{
           var validatedInputs = true;
           
         }
   
         if(validatedInputs == true){
             if(confirm("Do you want to create a new record ?")){
               
               $.ajax({
                 type: 'POST',
                 url: "process/CreateIncrementRequestProcess.php",    
                 data:{SLEAS_createrequest_increments_empname_txt:empName_increment,
                   SLEAS_createrequest_increments_designation_txt:designation_increment,
                   SLEAS_createrequest_increments_dob_txt:dob_increment,
                   SLEAS_createrequest_increments_nic_txt:nic_increment,
                   SLEAS_createrequest_increments_gender_txt:gender_increment,
                   SLEAS_createrequest_incrementsn_address_txt:address_increment,
                   SLEAS_createrequest_increments_mobile_txt:contactMobile_increment,
                   Secretory_createrequest_increments_sleasofficerid_txt:sleasofficeid_increment,
                   Secretory_createrequest_increments_currdate_txt:createDate_increment
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
   
   }else{     
       alert("Error Occured!");
   } 
   
   }); 
   
   
   //////////////////////////////////////
   
     //Submit button for retirement-request
     $("#SLEAS_createrequest_retirements_submit_btn").click(function(){
     
   
   var empName_retirement = $('#SLEAS_createrequest_retirements_empname_txt').val().trim();
   var class_retirement = $('#SLEAS_createrequest_retirements_class_txt').val().trim();
   var dob_retirement = $('#SLEAS_createrequest_retirements_dob_txt').val().trim();
   var nic_retirement = $('#SLEAS_createrequest_retirements_nic_txt').val().trim();
   var gender_retirement = $("input[name='Gender']:checked").val().trim();
   var address_retirement = $('#SLEAS_createrequest_retirements_address_txt').val().trim();
   var contactMobile_retirement = $('#SLEAS_createrequest_retirements_mobile_txt').val().trim();
   
   
   var retirementreason_retirement = $("input[name='ReqReason']:checked").val().trim();
   
   var retirementreqdate_retirement = $('#SLEAS_createrequest_retirements_retirementdate_txt').val().trim();
   
     var sleasofficeid_retirement = <?php echo json_encode($_SESSION['UserEmpNo']) ?>;
   
     var d = new Date();
     var createDate_retirement = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
   
     
   
       //Inputs Validation
       if((empName_retirement == "") || (class_retirement == "") ||  (dob_retirement == "") || (nic_retirement == "") || (gender_retirement == "") || (address_retirement == "") || (contactMobile_retirement == "") || (retirementreason_retirement == "") || (retirementreqdate_retirement == "")){
           var validatedInputs = false;
           alert("Enter all the details!");
         }else{
           var validatedInputs = true;
           
         }
   
         if(validatedInputs == true){
             if(confirm("Do you want to create a new record ?")){
               
               $.ajax({
                 type: 'POST',
                 url: "process/CreateRetirementRequestProcess.php",    
                 data:{SLEAS_createrequest_retirements_empname_txt:empName_retirement,
                   SLEAS_createrequest_retirements_class_txt:class_retirement,
                   SLEAS_createrequest_retirements_dob_txt:dob_retirement,
                   SLEAS_createrequest_retirements_nic_txt:nic_retirement,
                   SLEAS_createrequest_retirements_gender_txt:gender_retirement,
                   SLEAS_createrequest_retirements_address_txt:address_retirement,
                   SLEAS_createrequest_retirements_mobile_txt:contactMobile_retirement,
                   SLEAS_createrequest_retirements_retreason_txt:retirementreason_retirement,
                   SLEAS_createrequest_retirements_retirementdate_txt:retirementreqdate_retirement,
                   Secretory_createrequest_retirement_sleasofficerid_txt:sleasofficeid_retirement,
                   Secretory_createrequest_increments_retirement_txt:createDate_retirement
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
   
   }else{     
       alert("Error Occured!");
   } 
   
   }); 
   
   
   });
</script>
