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
         <?php include('common/sidebar2.php');; ?>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Employee Profile</h1>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-lg-6">
                        <div >
                           <div class="input-group input-group-md" style="width: 450px;">
                              <input type="text" name="Secretory_empProfile_search_txt" class="form-control float-right" placeholder="Search" id="Secretory_empProfile_search_txt">
                              <div class="input-group-append">
                                 <button type="submit" class="btn btn-default" id="Secretory_empProfile_search_btn">Seacrh
                                 <i class="fas fa-search"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <!-- User profile details section -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-secondary">
                        <div class="card-header">
                           <h3 class="card-title">Basic</h3>
                           <p style="display:none" id="Secretory_empProfile_basic_id">1</p>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_basic_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_basic_save_btn" title="Save">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_save_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <div class="card-body" id= "Secretory_empProfile_basic">
                           <div class="row">
                              <div class="col-3">
                                 <div class="image">
                                    <!-- <?php { ?> 
                                       <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($session_UserImage); ?>" class="brand-image img-circle elevation-3" style="opacity: 1"/> 
                                       <?php 
                                          } ?>  -->
                                 </div>
                              </div>
                              <div class="col-9">
                                 <div class="info">
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_empno_lbl">Employee No: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_empno" id="Secretory_empProfile_empno"></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_status_lbl">Status: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_status" id="Secretory_empProfile_status" >
                                          </p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_name_lbl">Name: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_name" id="Secretory_empProfile_name" >
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_class_lbl">Class : </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_class" id="Secretory_empProfile_class"> </p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_designation_lbl">Designation: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_designation" id="Secretory_empProfile_designation"> </p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_currstatus_lbl">Current Status: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_currstatus" id="Secretory_empProfile_currstatus"></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-body" id= "Secretory_empProfile_basic_editable">
                           <div class="row">
                              <div class="col-8">
                                 <div class="info">
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_empno_lbl">Employee No: </label>
                                       </div>
                                       <div class="col-8">
                                          <p name ="Secretory_empProfile_empno_edit" id="Secretory_empProfile_empno_edit"></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_createemployee_name_lbl">Name: </label>
                                       </div>
                                       <div class="col-8">
                                          <input type="text" class="form-control" id="Secretory_empProfile_name_txt" placeholder="Enter name">
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_status_lbl">Status: </label>
                                       </div>
                                       <div class="col-8">
                                          <select class="form-control" id="Secretory_empProfile_status_drp" name="Secretory_empProfile_status_drp">
                                             <option value = "">-Select- </option>
                                             <option value = "Rev">Rev </option>
                                             <option value = "Mr">Mr </option>
                                             <option value = "Mrs">Mrs </option>
                                             <option value = "Miss">Miss </option>
                                             <option value = "Ms">Ms </option>
                                          </select>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfilee_class_lbl">Class : </label>
                                       </div>
                                       <div class="col-8">
                                          <select class="form-control" id="Secretory_empProfile_class_drp" name="Secretory_empProfile_class_drp">
                                             <option value = "">-Select- </option>
                                             <option value = "Class I">Class I</option>
                                             <option value = "Class II">Class II</option>
                                             <option value = "Class III">Class III </option>
                                             <option value = "Special">Special </option>
                                          </select>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_designation_lbl">Designation: </label>
                                       </div>
                                       <div class="col-8">
                                          <select class="form-control" id="Secretory_empProfile_designation_drp" name="Secretory_empProfile_designation_drp">
                                             <option value = "">-Select- </option>
                                             <option value = "Acting Principal">Acting Principal</option>
                                             <option value = "Additional Director">Additional Director</option>
                                             <option value = "Additional Provincial Director">Additional Provincial Director</option>
                                             <option value = "Additional Secretary">Additional Secretary</option>
                                             <option value = "Assistant Commissioner">Assistant Commissioner </option>
                                             <option value = "Assistant Director">Assistant Director</option>
                                             <option value = "Chief Commissioner">Chief Commissioner</option>
                                             <option value = "Commissionerr">Commissionerr</option>
                                             <option value = "Commissioner General">Commissioner General</option>
                                             <option value = "Deputy Commissioner">Deputy Commissioner</option>
                                             <option value = "Deputy Director">Deputy Director</option>
                                             <option value = "Deputy Director General">Deputy Director General</option>
                                             <option value = "Deputy Principal">Deputy Principal</option>
                                             <option value = "Director">Director</option>
                                             <option value = "Divisional Director">Divisional Director </option>
                                             <option value = "Head Of the Center">Head Of the Center</option>
                                             <option value = "Lecturer">Lecturer</option>
                                             <option value = "Officer">Officer</option>
                                             <option value = "Principal">Principal</option>
                                             <option value = "Provincial Director">Provincial Director</option>
                                             <option value = "Secretary">Secretary</option>
                                             <option value = "Senior Assistant Secretary">Senior Assistant Secretary</option>
                                             <option value = "Senior Secretary">Senior Secretary</option>
                                             <option value = "Teacher">Teacher</option>
                                             <option value = "Zonal Director">Zonal Director </option>
                                             <option value = "SLEAS I">SLEAS I</option>
                                             <option value = "SLEAS II">SLEAS II</option>
                                             <option value = "SLEAS III">SLEAS III</option>
                                             <option value = "Additional Publication Commissioner General">Additional Publication Commissioner General</option>
                                             <option value = "Additional Examination Commissioner General">Additional Examination Commissioner General</option>
                                          </select>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_currstatus_lbl">Current Status: </label>
                                       </div>
                                       <div class="col-8">
                                          <select class="form-control" id="Secretory_empProfile_currstatus_drp" name="Secretory_empProfile_currstatus_drp">
                                             <option value = "">-Select- </option>
                                             <option value = "Employee">Employee</option>
                                             <option value = "Retired">Retired</option>
                                             <option value = "VOP">VOP</option>
                                             <option value = "Leaving">Leaving</option>
                                          </select>
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-3">
                                          <label id="Secretory_empProfile_image_lbl">Image: </label>
                                       </div>
                                       <div class="col-8">
                                          <input type="file" class="form-control" id="customFile" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-4">
                                 <div class="image" id="img_upload">
                                    <!-- <?php { ?> 
                                       <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($session_UserImage); ?>" class="brand-image img-circle elevation-3" style="opacity: 1"/> 
                                       <?php 
                                          } ?>  -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row ">
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 425px;">
                        <div class="card-header">
                           <h3 class="card-title"> General</h3>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_general_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_general_save_btn">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_general_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">  
                                    <label id="Secretory_empProfile_nic_lbl">NIC</label>                  
                                    <input type="text" class="form-control inputs" name ="Secretory_empProfile_nic_txt" id="Secretory_empProfile_nic_txt" placeholder="Enter NIC " >
                                 </div>
                                 <div class="form-group col-12" >
                                    <label id="Secretory_empProfile_dob_lbl">Date of Birth</label> 
                                    <div class="input-group date" name ="Secretory_empProfile_dob_dtp" id="Secretory_empProfile_dob_dtp" data-target-input="nearest">
                                       <input type="text" class="form-control inputs datetimepicker-input" data-target="#Secretory_empProfile_dob_dtp" placeholder="Select Date" id="Secretory_empProfile_dob_dtp_txt" >
                                       <div class="input-group-append" data-target="#Secretory_empProfile_dob_dtp" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group col-12" >
                                    <label name ="Secretory_empProfile_gender_lbl" id="Secretory_empProfile_gender_lbl">Gender </label> 
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-check inputs">
                                             <input class="form-check-input inputs" type="radio" name="Gender"   id="Secretory_empProfile_gender_male_rb" value="Male"> Male
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-check inputs">
                                             <input class="form-check-input inputs" type="radio" name="Gender"  id="Secretory_empProfile_gender_female_rb" value="Female">Female
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 425px;">
                        <div class="card-header">
                           <h3 class="card-title"> Cadre Details</h3>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_category_lbl">Category</label> 
                                    <select class="form-control inputs" id="Secretory_empProfile_category_drp" name="Secretory_empProfile_category_drp">
                                       <option val="">-Select-</option>
                                       <option val="Limited">Limited</option>
                                       <option val="Merit">Merit</option>
                                       <option val="Open">Open</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-12" >
                                    <label id="Secretory_empProfile_appointdate_lbl" name= "Secretory_empProfile_appointdate_lbl">Appoinment Date</label> 
                                    <div class="input-group date" id="Secretory_empProfile_appointdate_dtp" data-target-input="nearest">
                                       <input type="text" class="form-control inputs datetimepicker-input" data-target="#Secretory_empProfile_appointdate_dtp" placeholder="Select Date"  id="Secretory_empProfile_appointdate_txt">
                                       <div class="input-group-append" data-target="#Secretory_empProfile_appointdate_dtp" data-toggle="datetimepicker" >
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_cadre_lbl">Cadre Type</label>                  
                                    <select class="form-control inputs" id="Secretory_empProfile_cadre_drp" name= "Secretory_empProfile_cadre_lbl" >
                                       <option>-Select-</option>
                                       <option value = "General" >General</option>
                                       <option value = "Special" > Special</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-12" id= "Secretory_empProfile_subject" >
                                    <label id="Secretory_empProfile_subject_lbl">Special Subject</label>   
                                    <select class="form-control inputs" id="Secretory_empProfile_subject_drp" name= "Secretory_empProfile_subject_drp" >
                                       <option>-Select-</option>
                                       <option value = "Agriculture" >Agriculture</option>
                                       <option value = "Arabic" >Arabic</option>
                                       <option value = "Art" >Art</option>
                                       <option value = "Buddhist" >Buddhist</option>
                                       <option value = "Christianity" >Christianity</option>
                                       <option value = "Commerce">Commerce</option>
                                       <option value = "Dancing">Dancing</option>
                                       <option value = "Eastern Music" >Eastern Music</option>
                                       <option value = "Engineering Technology" >Engineering Technology</option>
                                       <option value = "English" >English</option>
                                       <option value = "Handicraft">Handicraft</option>
                                       <option value = "Health and Phy" >Health and Phy</option>
                                       <option value = "Hindu" >Hindu</option>
                                       <option value = "History">History</option>
                                       <option value = "Home science" >Home science</option>
                                       <option value = "Islam" >Islam</option>
                                       <option value = "IT" >IT</option>
                                       <option value = "Math">Math</option>
                                       <option value = "Music" >Music</option>
                                       <option value = "Music Oriental" >Music Oriental </option>
                                       <option value = "Piriven" >Piriven</option>
                                       <option value = "Planning">Planning</option>
                                       <option value = "Primary Edu" >Primary Edu</option>
                                       <option value = "Science" >Science</option>
                                       <option value = "Sinhala">Sinhala</option>
                                       <option value = "Special Edu" >Special Edu</option>
                                       <option value = "Student Counselling" >Student Counselling</option>
                                       <option value = "Student Guide" >Student Guide</option>
                                       <option value = "Tamil" >Tamil</option>
                                       <option value = "Western Music" >Western Music</option>
                                       <option value = "Engineering Technology" >Engineering Technology</option>
                                       <option value = "Bio Technology" >Bio Technology</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 425px;">
                        <div class="card-header">
                           <h3 class="card-title"> Current Employment</h3>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_curremp_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_curremp_save_btn">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_curremp_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_provice_lbl">Province</label>
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_provice_drp"  name="Secretory_empProfile_provice_drp" >
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
                                 <div class="form-group col-12" >
                                    <label id="Secretory_empProfile_emptype_lbl">Place of Work</label> 
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_emptype_drp" name="Secretory_empProfile_emptype_drp">
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
                                 <div class="form-group col-12" id="Secretory_empProfile_moe_branch" >
                                    <label id="Secretory_empProfile_moe_branch_lbl">Branch</label> 
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_moe_branch_drp" >
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
                                 <div class="form-group col-12" id="Secretory_empProfile_school_school" >
                                    <label id="Secretory_empProfile_school_lbl">School</label> 
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_school_school_drp" >
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
                                 <div class="form-group col-12" id="Secretory_empProfile_stateministry_stateministry" >
                                    <label id="Secretory_empProfile_stateministry_stateministry_lbl">State Minisrty</label> 
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_stateministry_stateministry_drp" >
                                       <option value="">-Select-</option>
                                       <option Value = "State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services" >State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services</option>
                                       <option Value = "State Minister of Education Reforms, Open Universities and Distance Learning Promotion" >State Minister of Education Reforms, Open Universities and Distance Learning Promotion</option>
                                       <option Value = "State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification" >State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification</option>
                                       <option Value = "State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities" >State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-12" id="Secretory_empProfile_divisionaloffice_divisionaloffice" >
                                    <label id="Secretory_empProfile_divisionaloffice_divisionaloffice_lbl">Divisional Office</label> 
                                    <select class="form-control inputs currEmp " id="Secretory_empProfile_divisionaloffice_divisionaloffice_drp" >
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
                                 <div class="form-group col-12" id="Secretory_empProfile_zonaloffice_zonaloffice"  >
                                    <label id="Secretory_empProfile_zonaloffice_zonaloffice_lbl">Zonal Office</label> 
                                    <select class="form-control inputs currEmp" id="Secretory_empProfile_zonaloffice_zonaloffice_drp">
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
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class = "row">
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 600px;">
                        <div class="card-header">
                           <h3 class="card-title"> Contacts</h3>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_contacts_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_contacts_save_btn">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_contacts_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">  
                                    <label id="Secretory_empProfile_contacthome_lbl">Home </label>                  
                                    <input type="text" class="form-control inputs contacts" placeholder="Enter Contact" id="Secretory_empProfile_contacthome_txt"  name = "Secretory_empProfile_contacthome_txt"  >
                                 </div>
                                 <div class="form-group col-12" > 
                                    <label id="Secretory_empProfile_contactmobile_lbl">Mobile</label> 
                                    <input type="text" class="form-control inputs contacts" placeholder="Enter Contact" id="Secretory_empProfile_contactmobile_txt" name = "Secretory_empProfile_contactmobile_txt"  >
                                 </div>
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_contactoffice_lbl">Office</label> 
                                    <input type="text" class="form-control inputs contacts" placeholder="Enter Contact" id="Secretory_empProfile_contactoffice_txt" name = "Secretory_empProfile_contactoffice_txt"  >
                                 </div>
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_email_lbl">Email</label> 
                                    <input type="text" class="form-control inputs contacts" id="Secretory_empProfile_email_txt" placeholder="Enter Email"  name = "Secretory_empProfile_email_txt" >
                                 </div>
                                 <div class="form-group col-12">  
                                    <label id="Secretory_empProfile_address_lbl">Address</label>                  
                                    <textarea class="form-control inputs contacts" rows="2"   placeholder="Enter Address" id="Secretory_empProfile_address_txt" name = "Secretory_empProfile_address_txt" ></textarea>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 600px;">
                        <div class="card-header">
                           <h3 class="card-title"> Educational Qualifications</h3>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_eduquali_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_eduquali_save_btn">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_eduquali_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_degree_lbl">Degree Level</label> 
                                    <div id="Secretory_empProfile_degree_list">
                                       <ul id = "Secretory_empProfile_degree_list_ul" name="Secretory_empProfile_degree_list_ul"> 
                                       </ul>
                                    </div>
                                    <div id="Secretory_empProfile_gce">
                                       <textarea class="form-control" rows="2" placeholder="Enter Qualification"  id="Secretory_empProfile_degree_txt" name="Secretory_empProfile_degree_txt"></textarea>                    
                                       </textarea>
                                    </div>
                                 </div>
                                 <div class="form-group col-12" >
                                    <label id="Secretory_empProfile_gce_lbl">GCE Level</label>
                                    <div id="Secretory_empProfile_gce_list">
                                       <ul id="Secretory_empProfile_gce_list_ul"> 
                                       </ul>
                                    </div>
                                    <div id="Secretory_empProfile_gce_txt">
                                       <textarea class="form-control" rows="2" placeholder="Enter Qualification"  id="Secretory_empProfile_gce_gce_txt" name="Secretory_empProfile_gce_gce_txt"></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_other_lbl">Other</label> 
                                    <div id="Secretory_empProfile_other_list">
                                       <ul id="Secretory_empProfile_other_list_ul"> 
                                       </ul>
                                    </div>
                                    <div id="Secretory_empProfile_other_txt">
                                       <textarea class="form-control" rows="2" placeholder="Enter Qualification"  id="Secretory_empProfile_gce_other_txt" name="Secretory_empProfile_gce_other_txt"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-secondary" style="height: 600px;">
                        <div class="card-header">
                           <h3 class="card-title"> Professional Qualifications</h3>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_profquali_edit_btn">
                              <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-tool" id="Secretory_empProfile_profquali_save_btn">
                              <i class="fas fa-save" id="Secretory_empProfile_basic_profquali_btn_i"></i>
                              </button>
                           </div>
                        </div>
                        <form>
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-12">
                                    <label id="Secretory_empProfile_profqualification_lbl">Qualifications</label>   
                                    <div id="Secretory_empProfile_profqualification_list">
                                       <ul id="Secretory_empProfile_profqualification_list_ul"> 
                                       </ul>
                                    </div>
                                    <div id="Secretory_empProfile_profqualification_txt">
                                       <textarea class="form-control" rows="2" placeholder="Enter Qualification"  id ="Secretory_empProfile_prof_txt" name="Secretory_empProfile_prof_txt"></textarea>
                                    </div>
                                 </div>
                              </div>
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
      <?php include('common/footer.php'); ?>
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
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>








   </body>
</html>
<script>
   $(document).ready(function() {
   
     $EMPNO="";
   
   //Initially hided sections
     $("#Secretory_empProfile_subject").hide();
     $("#Secretory_empProfile_moe_branch").hide();
     $("#Secretory_empProfile_school_school").hide();
     $("#Secretory_empProfile_stateministry_stateministry").hide();
     $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
     $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
     $("#Secretory_empProfile_basic_editable").hide();
     $("#Secretory_empProfile_degree_txt").hide();
     $("#Secretory_empProfile_gce_txt").hide();
     $("#Secretory_empProfile_other_txt").hide();
     $("#Secretory_empProfile_profqualification_txt").hide();
     $(".card-tools").hide();
   
     function subjectChange(){
       if($('#Secretory_empProfile_cadre_drp option:selected').val() == "Special"){
           $("#Secretory_empProfile_subject").show();
        }else{
         $("#Secretory_empProfile_subject").hide();
        } 
     };
   
     function placeOfWorkChange(){
          
           if($('#Secretory_empProfile_emptype_drp option:selected').val() == "MOE"){
             $("#Secretory_empProfile_moe_branch").show();
             $("#Secretory_empProfile_school_school").hide();
             $("#Secretory_empProfile_stateministry_stateministry").hide();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
   
           }else if($('#Secretory_empProfile_emptype_drp option:selected').val() == "School"){
             $("#Secretory_empProfile_moe_branch").hide();
             $("#Secretory_empProfile_school_school").show();
             $("#Secretory_empProfile_stateministry_stateministry").hide();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
   
           }else if($('#Secretory_empProfile_emptype_drp option:selected').val() == "State Ministry"){
             $("#Secretory_empProfile_moe_branch").hide();
             $("#Secretory_empProfile_school_school").hide();
             $("#Secretory_empProfile_stateministry_stateministry").show();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
             
           }else if($('#Secretory_empProfile_emptype_drp option:selected').val() == "Divisional Office"){
             $("#Secretory_empProfile_moe_branch").hide();
             $("#Secretory_empProfile_school_school").hide();
             $("#Secretory_empProfile_stateministry_stateministry").hide();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").show();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
             
           }else if($('#Secretory_empProfile_emptype_drp option:selected').val() == "Zonal Office"){
             $("#Secretory_empProfile_moe_branch").hide();
             $("#Secretory_empProfile_school_school").hide();
             $("#Secretory_empProfile_stateministry_stateministry").hide();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").show();
             
           } else{
             $("#Secretory_empProfile_moe_branch").hide();
             $("#Secretory_empProfile_school_school").hide();
             $("#Secretory_empProfile_stateministry_stateministry").hide();
             $("#Secretory_empProfile_divisionaloffice_divisionaloffice").hide();
             $("#Secretory_empProfile_zonaloffice_zonaloffice").hide();
           }
       
     };
     
     
   //Show/hide Special-Subject field according to the Cadre-Type selected value
     $("#Secretory_empProfile_cadre_drp").change(function () {  
       subjectChange();      
       });
   
   //Show/hide Branch/School/State Ministry/Divisional Office/ Zonal Office field according to the Place-of-work selected value
     $("#Secretory_empProfile_emptype_drp").change(function () {    
       placeOfWorkChange();
       });
   
   
   
   //Show editable Basic section
   $("#Secretory_empProfile_basic_edit_btn").click(function () { 
         $("#Secretory_empProfile_basic").hide();   
         $("#Secretory_empProfile_basic_editable").show();  
         $("#Secretory_empProfile_basic_save_btn_i").show()
       });
   
       
   
   //Enable edit General section
   $("#Secretory_empProfile_general_edit_btn").click(function () { 
         $("#Secretory_empProfile_nic_txt").removeAttr('disabled');   
         $("#Secretory_empProfile_basic_general_btn_i").show()
       });
   
   //Enable edit Current-Employement section
   $("#Secretory_empProfile_curremp_edit_btn").click(function () { 
         $(".currEmp").removeAttr('disabled'); 
         $("#Secretory_empProfile_basic_curremp_btn_i").show()  
          
       });
   
   //Enable edit Contacts section
   $("#Secretory_empProfile_contacts_edit_btn").click(function () { 
         $(".contacts").removeAttr('disabled');   
         $("#Secretory_empProfile_basic_contacts_btn_i").show()
          
       });
   
   //Show editable Educational-Qualifcation section
   $("#Secretory_empProfile_eduquali_edit_btn").click(function () { 
         //$("#Secretory_empProfile_degree_list").hide();   
         $("#Secretory_empProfile_degree_txt").show(); 
         $("#Secretory_empProfile_gce_txt").show(); 
         $("#Secretory_empProfile_other_txt").show(); 
         $("#Secretory_empProfile_basic_eduquali_btn_i").show()
       });
   
   //Show editable Professional-Qualifcation section
   $("#Secretory_empProfile_profquali_edit_btn").click(function () { 
         //$("#Secretory_empProfile_degree_list").hide();   
         $("#Secretory_empProfile_profqualification_txt").show();   
         $("#Secretory_empProfile_basic_profquali_btn_i").show()  
       });
   
       
    //Employee data search 
       $("#Secretory_empProfile_search_btn").click(function(){
         
       var empNo_search = $('#Secretory_empProfile_search_txt').val().trim();      
       
       $.ajax({
       type: 'POST',
       url: "process/EmployeeProfileProcess.php",    
       data:{Secretory_empProfile_search_txt:empNo_search},
       beforeSend: function(){
       
       },
       success: function(data){      
         var jsonobj = JSON.parse(data);
         if(jsonobj.status == true){  
   
           $(".card-tools").show();
           $(".fa-save").hide();
           $('#Secretory_empProfile_degree_list_ul li').remove();
           $('#Secretory_empProfile_gce_list_ul li').remove();
           $('#Secretory_empProfile_other_list_ul li').remove();
           $('#Secretory_empProfile_profqualification_list_ul li').remove();
         
   
           $('#Secretory_empProfile_empno').text(jsonobj.empNO_empPro);
           $('#Secretory_empProfile_empno_edit').text(jsonobj.empNO_empPro);
   
           $('#Secretory_empProfile_status').text(jsonobj.status_empPro);
           $('#Secretory_empProfile_status_drp').val(jsonobj.status_empPro);
           
           $('#Secretory_empProfile_name').text(jsonobj.name_empPro);
           $('#Secretory_empProfile_name_txt').val(jsonobj.name_empPro);
   
           $('#Secretory_empProfile_class').text(jsonobj.class_empPro);
           $('#Secretory_empProfile_class_drp').val(jsonobj.class_empPro);
   
           $('#Secretory_empProfile_designation').text(jsonobj.designation_empPro);
           $('#Secretory_empProfile_designation_drp').val(jsonobj.designation_empPro);
   
           $('#Secretory_empProfile_currstatus').text(jsonobj.currStatus_empPro);  
           $('#Secretory_empProfile_currstatus_drp').val(jsonobj.currStatus_empPro);   
   
           $('#Secretory_empProfile_nic_txt').val(jsonobj.nic_empPro);
           $('#Secretory_empProfile_dob_dtp_txt').val(jsonobj.dob_empPro);        
           $('input[name="Gender"][value="' + jsonobj.gender_empPro + '"]').prop('checked', true);
                 
           $('#Secretory_empProfile_category_drp').val(jsonobj.category_empPro);
           $('#Secretory_empProfile_appointdate_txt').val(jsonobj.appDate_empPro); 
           $('#Secretory_empProfile_cadre_drp').val(jsonobj.cadreType_empPro);
           $('#Secretory_empProfile_subject_drp').val(jsonobj.speSub_empPro);
           subjectChange();
   
           $('#Secretory_empProfile_provice_drp').val(jsonobj.province_empPro);
           $('#Secretory_empProfile_emptype_drp').val(jsonobj.placeofwork_empPro); 
           
            if(jsonobj.placeofwork_empPro == "MOE") {
             $('#Secretory_empProfile_moe_branch_drp').val(jsonobj.location_empPro);
           }else if(jsonobj.placeofwork_empPro == "School"){
             $('#Secretory_empProfile_school_school_drp').val(jsonobj.location_empPro);
           }else if(jsonobj.placeofwork_empPro == "State Ministry"){
             $('#Secretory_empProfile_stateministry_stateministry_drp').val(jsonobj.location_empPro);
           }else if(jsonobj.placeofwork_empPro == "Divisional Office"){
             $('#Secretory_empProfile_divisionaloffice_divisionaloffice_drp').val(jsonobj.location_empPro);
           }else if(jsonobj.placeofwork_empPro == "Zonal Office"){
             $('#Secretory_empProfile_zonaloffice_zonaloffice_drp').val(jsonobj.location_empPro);
           }
           placeOfWorkChange();
    
           $('#Secretory_empProfile_contacthome_txt').val(jsonobj.homeContact_empPro);
           $('#Secretory_empProfile_contactmobile_txt').val(jsonobj.mobileContact_empPro);
           $('#Secretory_empProfile_contactoffice_txt').val(jsonobj.officeContact_empPro);
           $('#Secretory_empProfile_email_txt').val(jsonobj.email_empPro);
           $('#Secretory_empProfile_address_txt').val(jsonobj.address_empPro);
   
                   
           if (jQuery.isEmptyObject(jsonobj.degreearr) ){
                 $('#Secretory_empProfile_degree_list_ul li').remove();
           }else{
                 for (let i in jsonobj.degreearr) {
                 $('#Secretory_empProfile_degree_list_ul').append('<li>' +jsonobj.degreearr[i] + '</li>');
               }
           }
          
   
          if (jQuery.isEmptyObject(jsonobj.gcearr) ){
                 $('#Secretory_empProfile_gce_list_ul li').remove();
           }else{
                 for (let i in jsonobj.gcearr) {
                 $('#Secretory_empProfile_gce_list_ul').append('<li>' +jsonobj.gcearr[i] + '</li>');
               }
           }
   
   
            if (jQuery.isEmptyObject(jsonobj.otherarr) ){
                 $('#Secretory_empProfile_other_list_ul li').remove();
           }else{
                 for (let i in jsonobj.otherarr) {
                 $('#Secretory_empProfile_other_list_ul').append('<li>' +jsonobj.otherarr[i] + '</li>');
               }
           }
   
   
           if (jQuery.isEmptyObject(jsonobj.profarr) ){
                 $('#Secretory_empProfile_profqualification_list_ul li').remove();
           }else{
                 for (let i in jsonobj.profarr) {
                 $('#Secretory_empProfile_profqualification_list_ul').append('<li>' +jsonobj.profarr[i] + '</li>');
               }
           }     
   
           $('.inputs').attr('disabled','disabled');
   
         }else{
           alert(jsonobj.message);
         }
       }
       });
     }); 
   
   //Employee Basic data update
   $("#Secretory_empProfile_basic_save_btn").click(function(){  
     
       var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
       var name_update = $('#Secretory_empProfile_name_txt').val().trim();
       var status_update = $('#Secretory_empProfile_status_drp option:selected').val().trim(); 
       var class_update = $('#Secretory_empProfile_class_drp option:selected').val().trim();
       var designation_update = $('#Secretory_empProfile_designation_drp option:selected').val().trim();
       var currstatus_update = $('#Secretory_empProfile_currstatus_drp option:selected').val().trim();
        
     //Inputs Validation
     if((empNo_update == "") || (name_update == "") || (status_update == "") || (class_update == "") || (designation_update == "") || (currstatus_update == "")){
         var validatedInputs = false;
         alert("Enter all the details!");
       }else{
         var validatedInputs = true;
       }
   
        if(validatedInputs == true){  
         if(confirm("Are you sure you want to Update this section data?")){
               $.ajax({
                 type: 'POST',
                 url: "process/EmployeeUpdateProcess.php",        
                 data:{Secretory_empProfile_empno_edit:empNo_update, Secretory_empProfile_name_txt:name_update, Secretory_empProfile_status_drp:status_update, Secretory_empProfile_class_drp:class_update, Secretory_empProfile_designation_drp:designation_update,  Secretory_empProfile_currstatus_drp:currstatus_update
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
   
   
   ///////////////////////////////////////////////////
    //Employee General data update
   $("#Secretory_empProfile_general_save_btn").click(function(){  
       
     var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
     var nic_update = $('#Secretory_empProfile_nic_txt').val().trim();  
    
      //Inputs Validation
      if((empNo_update == "") || (nic_update == "")){
         var validatedInputs = false;
         alert("Enter all the details!");
       }else{
         var validatedInputs = true;
       }
   
        if(validatedInputs == true){  
         if(confirm("Are you sure you want to Update this section data?")){
               $.ajax({
                 type: 'POST',
                 url: "process/EmployeeUpdateProcessGeneral.php",        
                 data:{Secretory_empProfile_empno_edit:empNo_update, Secretory_empProfile_nic_txt:nic_update
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
    
   
     ///////////////////////////////////////////////////
   //Employee Current-Employment data update
    $("#Secretory_empProfile_curremp_save_btn").click(function(){  
       
       var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
       var province_update = $('#Secretory_empProfile_provice_drp option:selected').val().trim();    
       var placeofwork_update = $('#Secretory_empProfile_emptype_drp option:selected').val().trim();
   
         if( placeofwork_update == "MOE")
         {
           var location_update = $('#Secretory_empProfile_moe_branch_drp option:selected').val().trim();
         }else if( placeofwork_update == "School"){
           var location_update = $('#Secretory_empProfile_school_school_drp option:selected').val().trim();
         }else if( placeofwork_update == "State Ministry"){
           var location_update = $('#Secretory_empProfile_stateministry_stateministry_drp option:selected').val().trim();
         }else if( placeofwork_update == "Divisional Office"){
           var location_update = $('#Secretory_empProfile_divisionaloffice_divisionaloffice_drp option:selected').val().trim();
         }else if( placeofwork_update == "Zonal Office"){
           var location_update = $('#Secretory_empProfile_zonaloffice_zonaloffice_drp option:selected').val().trim();
         }else{
           var location_update ="";
         }
         
         if(( placeofwork_update == "MOE") && (location_update == "")){
           var validlocation = false;
         }else  if(( placeofwork_update == "School") && (location_update == "")){
           var validlocation = false;
         }else if(( placeofwork_update == "State Ministry") && (location_update == "")){
           var validlocation = false;
         }else if(( placeofwork_update == "Divisional Office") && (location_update == "")){
           var validlocation = false;
         }else if(( placeofwork_update == "Zonal Office") && (location_update == "")){
           var validlocation = false;
         }else{
           var validlocation = true;
         }
   
        //Inputs Validation
        if((empNo_update == "") || (province_update == "") || (placeofwork_update == "") || (validlocation == false)){
           var validatedInputs = false;
           alert("Enter all the details!");
         }else{
           var validatedInputs = true;
         }
     
          if(validatedInputs == true){  
           if(confirm("Are you sure you want to Update this section data?")){
                 $.ajax({                
                   type: 'POST',
                   url: "process/EmployeeUpdateProcessCurrEmp.php",        
                   data:{Secretory_empProfile_empno_edit:empNo_update,
                     Secretory_empProfile_provice_drp:province_update,
                     Secretory_empProfile_emptype_drp:placeofwork_update,
                     Secretory_empProfile_location:location_update
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
   
   
       ///////////////////////////////////////////////////
    //Employee Contacts data update
   $("#Secretory_empProfile_contacts_save_btn").click(function(){  
       
       var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
       var home_update = $('#Secretory_empProfile_contacthome_txt').val().trim(); 
       var mobile_update = $('#Secretory_empProfile_contactmobile_txt').val().trim();
       var office_update = $('#Secretory_empProfile_contactoffice_txt').val().trim();
       var email_update = $('#Secretory_empProfile_email_txt').val().trim();
       var address_update = $('#Secretory_empProfile_address_txt').val().trim();
      
        //Inputs Validation
        if((empNo_update == "") || (home_update == "") || (mobile_update == "") || (office_update == "") || (email_update == "") || (address_update == "")){
           var validatedInputs = false;
           alert("Enter all the details!");
         }else{
           var validatedInputs = true;
         }
     
          if(validatedInputs == true){  
           if(confirm("Are you sure you want to Update this section data?")){
                 $.ajax({
                   type: 'POST',
                   url: "process/EmployeeUpdateProcessContact.php",        
                   data:{Secretory_empProfile_empno_edit:empNo_update,
                     Secretory_empProfile_contacthome_txt:home_update,
                     Secretory_empProfile_contactmobile_txt:mobile_update,
                     Secretory_empProfile_contactoffice_txt:office_update,
                     Secretory_empProfile_email_txt:email_update,
                     Secretory_empProfile_address_txt:address_update
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
   
   
    ///////////////////////////////////////////////////
    //Employee Educational-Qualification data update
   $("#Secretory_empProfile_eduquali_save_btn").click(function(){  
       
       var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
       var degree_update = $('#Secretory_empProfile_degree_txt').val().trim(); 
       var gce_update = $('#Secretory_empProfile_gce_gce_txt').val().trim();
       var other_update = $('#Secretory_empProfile_gce_other_txt').val().trim(); 
        
       if(confirm("Are you sure you want to Update this section data?")){
             $.ajax({
               
               type: 'POST',
               url: "process/EmployeeUpdateProcessEdu.php",        
               data:{Secretory_empProfile_empno_edit:empNo_update, 
                 Secretory_empProfile_degree_txt:degree_update,
                 Secretory_empProfile_gce_gce_txt:gce_update,
                 Secretory_empProfile_gce_other_txt:other_update
                   },    
               beforeSend: function(){
               
               },
               success: function(data){
                 var jsonobj = JSON.parse(data);
                 if(jsonobj.status == true){                   
                 alert(jsonobj.message);
                 //OnLoadDataAfterUpdate();
                 }else{
                   alert(jsonobj.message);
                 }
               }
         });
       }else{
           return false;
       }
         
       }); 
         
      ///////////////////////////////////////////////////
    //Employee Educational-Qualification data update
   $("#Secretory_empProfile_profquali_save_btn").click(function(){  
       
       var empNo_update = $('#Secretory_empProfile_empno_edit').text().trim(); 
       var prof_update = $('#Secretory_empProfile_prof_txt').val().trim(); 
     
       if(confirm("Are you sure you want to Update this section data?")){
             $.ajax({
               
               type: 'POST',
               url: "process/EmployeeUpdateProcessProf.php",        
               data:{Secretory_empProfile_empno_edit:empNo_update, 
                 Secretory_empProfile_prof_txt:prof_update              
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
