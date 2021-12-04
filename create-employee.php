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
                        <h1 class="m-0">Create Employee</h1>
                     </div>
                  </div>
                  <br>
                  <!-- User profile details section -->
                  <div class="row">
                     <div class="col-md-12">
                        <form>
                           <div class="card card-secondary">
                              <div class="card-header">
                                 <h3 class="card-title">Basic</h3>
                              </div>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-8">
                                       <div class="info">
                                          <div class="row">
                                             <div class="col-3">
                                                <label id="Secretory_createemployee_name_lbl">Name: </label>
                                             </div>
                                             <div class="col-8">
                                                <input type="text" class="form-control" id="Secretory_createemployee_name_txt" placeholder="Enter name" name="Secretory_createemployee_name_txt">
                                             </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                             <div class="col-3">
                                                <label id="Secretory_createemployee_status_lbl">Status: </label>
                                             </div>
                                             <div class="col-8">
                                                <select class="form-control" id="Secretory_createemployee_status_drp" name="Secretory_createemployee_status_drp">
                                                   <option value="">-Select-</option>
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
                                                <label id="Secretory_createemployee_class_lbl">Class : </label>
                                             </div>
                                             <div class="col-8">
                                                <select class="form-control" id="Secretory_createemployee_class_drp" name="Secretory_createemployee_class_drp">
                                                   <option value="">-Select-</option>
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
                                                <label id="Secretory_createemployee_designation_lbl">Designation: </label>
                                             </div>
                                             <div class="col-8" >
                                                <select class="form-control" id="Secretory_createemployee_designation_drp" name="Secretory_createemployee_designation_drp">
                                                   <option value="">-Select-</option>
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
                                                <label id="Secretory_createemployee_currstatus_lbl">Current Status: </label>
                                             </div>
                                             <div class="col-8">
                                                <select class="form-control" id="Secretory_createemployee_currstatus_drp" name="Secretory_createemployee_currstatus_drp">
                                                   <option value="">-Select-</option>
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
                                                <label id="Secretory_createemployee_image_lbl">Image: </label>
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
                  </div>             
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_nic_lbl">NIC</label>                  
                  <input type="text" class="form-control" name ="Secretory_createemployee_nic_txt" id="Secretory_createemployee_nic_txt" placeholder="Enter NIC " >
                  </div>                 
                  <div class="form-group col-12" > 
                  <label id="Secretory_createemployee_dob_lbl">Date of Birth</label>                           
                  <div class="input-group date"  data-target-input="nearest">
                  <input type="date" class="form-control data-target" id ="Secretory_createemployee_dob_dtp" name="Secretory_createemployee_dob_dtp" placeholder="Select Date"  >                        
                  </div>
                  </div>
                  <div class="form-group col-12" > 
                  <label name ="Secretory_createemployee_gender_lbl" id="Secretory_createemployee_gender_lbl">Gender </label> 
                  <div class="row">   
                  <div class="col-6">
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="Gender"   id="Secretory_createemployee_gender_male_rb" value="Male" checked=""> Male
                  </div>                      
                  </div>
                  <div class="col-6">
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="Gender"   id="Secretory_createemployee_gender_female_rb" value="Female">Female
                  </div>
                  </div>                   
                  </div> 
                  </div>                 
                  </div>
                  </div>                            
                  </div>              
                  </div>  
                  <div class="col-md-4">
                  <div class="card card-secondary" style="height: 425px;">
                  <div class="card-header">
                  <h3 class="card-title"> Cadre Details</h3>                            
                  </div>             
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_category_lbl">Category</label>                 
                  <select class="form-control" id="Secretory_createemployee_category_drp" name="Secretory_createemployee_category_drp">
                  <option value="">-Select-</option>
                  <option val="Limited">Limited</option>
                  <option val="Merit">Merit</option>
                  <option val="Open">Open</option>                        
                  </select> 
                  </div>
                  <div class="form-group col-12" > 
                  <label id="Secretory_createemployee_appointdate_lbl" name= "Secretory_createemployee_appointdate_lbl">Apoinment Date</label> 
                  <div class="input-group date"  data-target-input="nearest">
                  <input type="date" class="form-control data-target" id ="Secretory_createemployee_appointdate_dtp" placeholder="Select Date" name="Secretory_createemployee_appointdate_dtp" >
                  </div>
                  </div>
                  <div class="form-group col-12">                                       
                  <label id="Secretory_createemployee_cadre_lbl">Cadre Type</label>                  
                  <select class="form-control" id="Secretory_createemployee_cadre_drp" name= "Secretory_createemployee_cadre_drp" >
                  <option value="">-Select-</option>
                  <option value = "General" >General</option>
                  <option value = "Special" > Special</option>                                                 
                  </select> 
                  </div>                 
                  <div class="form-group col-12" id= "Secretory_createemployee_subject" >  
                  <label id="Secretory_createemployee_subject_lbl">Special Subject</label>   
                  <select class="form-control" id="Secretory_createemployee_subject_drp" name= "Secretory_createemployee_subject_drp" >
                  <option value="">-Select-</option>
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
                  </div>
                  </div>          
                  <div class="col-md-4">
                  <div class="card card-secondary" style="height: 425px;">
                  <div class="card-header">
                  <h3 class="card-title"> Current Employment</h3>                
                  </div>             
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">                                    
                  <label id="Secretory_createemployee_province_lbl">Province</label>
                  <select class="form-control" id="Secretory_createemployee_province_drp" name="Secretory_createemployee_province_drp" >
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
                  <label id="Secretory_createemployee_emptype_lbl">Place of Work</label> 
                  <select class="form-control" id="Secretory_createemployee_emptype_drp"  name="Secretory_createemployee_emptype_drp">
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
                  <div class="form-group col-12" id="SSecretory_createemployee_moe_branch" > 
                  <label id="Secretory_createemployee_moe_branch_lbl">Branch</label> 
                  <select class="form-control" id="Secretory_createemployee_moe_branch_drp" >
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
                  <div class="form-group col-12" id="Secretory_createemployee_school_school" > 
                  <label id="Secretory_createemployee_school_lbl">School</label> 
                  <select class="form-control" id="Secretory_createemployee_school_school_drp" >
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
                  <div class="form-group col-12" id="Secretory_createemployee_stateministry_stateministry" > 
                  <label id="Secretory_createemployee_stateministry_stateministry_lbl">State Minisrty</label> 
                  <select class="form-control" id="Secretory_createemployee_stateministry_stateministry_drp" >
                  <option value="">-Select-</option>
                  <option Value = "State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services" >State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services</option>
                  <option Value = "State Minister of Education Reforms, Open Universities and Distance Learning Promotion" >State Minister of Education Reforms, Open Universities and Distance Learning Promotion</option>
                  <option Value = "State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification" >State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification</option>
                  <option Value = "State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities" >State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities</option>
                  </select>
                  </div>
                  <div class="form-group col-12" id="Secretory_createemployee_divisionaloffice_divisionaloffice" > 
                  <label id="Secretory_createemployee_divisionaloffice_divisionaloffice_lbl">Divisional Office</label> 
                  <select class="form-control" id="Secretory_createemployee_divisionaloffice_divisionaloffice_drp" >
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
                  <div class="form-group col-12" id="Secretory_createemployee_zonaloffice_zonaloffice"  > 
                  <label id="Secretory_createemployee_zonaloffice_zonaloffice_lbl">Zonal Office</label> 
                  <select class="form-control" id="Secretory_createemployee_zonaloffice_zonaloffice_drp" >
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
                  </div>
                  </div>       
                  </div>
                  <div class = "row">
                  <div class="col-md-4">
                  <div class="card card-secondary" style="height: 600px;">
                  <div class="card-header">
                  <h3 class="card-title"> Contacts</h3>               
                  </div>             
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_contacathome_lbl">Home </label>                  
                  <input type="text" class="form-control" placeholder="Enter Contact" id="Secretory_createemployee_contacathome_txt"  name = "Secretory_createemployee_contacathome_txt" >
                  </div>
                  <div class="form-group col-12" > 
                  <label id="Secretory_createemployee_contacatmobile_lbl">Mobile</label> 
                  <input type="text" class="form-control" placeholder="Enter Contact" id="Secretory_createemployee_contacatmobile_txt" name = "Secretory_createemployee_contacatmobile_txt"   >
                  </div>
                  <div class="form-group col-12">
                  <label id="Secretory_createemployee_contacatoffice_lbl">Office</label> 
                  <input type="text" class="form-control" placeholder="Enter Contact" id="Secretory_createemployee_contacatoffice_txt" name = "Secretory_createemployee_contacatoffice_txt" >
                  </div>
                  <div class="form-group col-12">
                  <label id="Secretory_createemployee_email_lbl">Email</label> 
                  <input type="email" class="form-control" id="Secretory_createemployee_email_txt" placeholder="Enter Email"  name = "Secretory_createemployee_email_txt" >
                  </div>
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_address_lbl">Address</label>                  
                  <textarea class="form-control" rows="2"  placeholder="Enter Address" id="Secretory_createemployee_address_txt" name = "Secretory_createemployee_address_txt" ></textarea>
                  </div>
                  </div>
                  </div>                          
                  </div>        
                  </div>
                  <div class="col-md-4">
                  <div class="card card-secondary" style="height: 600px;">
                  <div class="card-header">
                  <h3 class="card-title"> Educational Qualifications</h3>                
                  </div>             
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_degree_lbl">Degree Level</label>                   
                  <div id="Secretory_createemployee_degree">
                  <textarea class="form-control" rows="5" placeholder="Enter qualification" id="Secretory_createemployee_degree_txt" name="Secretory_createemployee_degree_txt"></textarea>
                  </div>
                  </div>
                  <div class="form-group col-12" > 
                  <label id="Secretory_createemployee_gce_lbl">GCE Level</label>                  
                  <div id="Secretory_createemployee_gce">
                  <textarea class="form-control" rows="5" placeholder="Enter qualification"  name ="Secretory_createemployee_gce_txt" id="Secretory_createemployee_gce_txt"></textarea>
                  </div>                
                  </div>
                  <div class="form-group col-12">
                  <label id="Secretory_createemployee_other_lbl">Other</label>                    
                  <div id="Secretory_createemployee_other">
                  <textarea class="form-control" rows="3" placeholder="Enter qualification" id="Secretory_createemployee_other_txt" name="Secretory_createemployee_other_txt"></textarea>
                  </div>                
                  </div>                  
                  </div>
                  </div>                           
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="card card-secondary" style="height: 600px;">
                  <div class="card-header">
                  <h3 class="card-title"> Professional Qualifications</h3>                
                  </div>              
                  <div class="card-body">
                  <div class="row">
                  <div class="form-group col-12">  
                  <label id="Secretory_createemployee_qualifications_lbl">Qualifications</label>                    
                  <div id="Secretory_createemployee_qualifications">
                  <textarea class="form-control" rows="18" placeholder="Enter qualification" id ="Secretory_createemployee_qualifications_txt" name="Secretory_createemployee_qualifications_txt"></textarea>
                  </div>
                  </div>
                  </div>  
                  </div>
                  </div>        
                  </div> 
                  <div class="row">
                  <div class="col-lg-12">
                  <div class="form-group row">
                  <div class="offset-sm-2 col-lg-3">
                  <button type="submit" class="btn btn-primary" id="Secretory_createemployee_submit_btn">Submit</button>
                  </div>
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
      <!-- jQuery -->
      <script src="./AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="./AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="./AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
   </body>
</html>
<script>
   $(document).ready(function() {
   
   //Initially hided sections
     $("#Secretory_createemployee_subject").hide();
     $("#SSecretory_createemployee_moe_branch").hide();
     $("#Secretory_createemployee_school_school").hide();
     $("#Secretory_createemployee_stateministry_stateministry").hide();
     $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
     $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
   
     function subjectChange(){
       if($('#Secretory_createemployee_cadre_drp option:selected').val() == "Special"){
           $("#Secretory_createemployee_subject").show();
        }else{
         $("#Secretory_createemployee_subject").hide();
        } 
     };
   
     function placeOfWorkChange(){
          
          if($('#Secretory_createemployee_emptype_drp option:selected').val() == "MOE"){
            $("#SSecretory_createemployee_moe_branch").show();
            $("#Secretory_createemployee_school_school").hide();
            $("#Secretory_createemployee_stateministry_stateministry").hide();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
   
          }else if($('#Secretory_createemployee_emptype_drp option:selected').val() == "School"){
            $("#SSecretory_createemployee_moe_branch").hide();
            $("#Secretory_createemployee_school_school").show();
            $("#Secretory_createemployee_stateministry_stateministry").hide();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
   
          }else if($('#Secretory_createemployee_emptype_drp option:selected').val() == "State Ministry"){
            $("#SSecretory_createemployee_moe_branch").hide();
            $("#Secretory_createemployee_school_school").hide();
            $("#Secretory_createemployee_stateministry_stateministry").show();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
            
          }else if($('#Secretory_createemployee_emptype_drp option:selected').val() == "Divisional Office"){
            $("#SSecretory_createemployee_moe_branch").hide();
            $("#Secretory_createemployee_school_school").hide();
            $("#Secretory_createemployee_stateministry_stateministry").hide();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").show();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
            
          }else if($('#Secretory_createemployee_emptype_drp option:selected').val() == "Zonal Office"){
            $("#SSecretory_createemployee_moe_branch").hide();
            $("#Secretory_createemployee_school_school").hide();
            $("#Secretory_createemployee_stateministry_stateministry").hide();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").show();
            
          } else{
            $("#SSecretory_createemployee_moe_branch").hide();
            $("#Secretory_createemployee_school_school").hide();
            $("#Secretory_createemployee_stateministry_stateministry").hide();
            $("#Secretory_createemployee_divisionaloffice_divisionaloffice").hide();
            $("#Secretory_createemployee_zonaloffice_zonaloffice").hide();
          }
      
    };
   
    //Show/hide Special-Subject field according to the Cadre-Type selected value
    $("#Secretory_createemployee_cadre_drp").change(function () {  
       subjectChange();      
       });
   
   //Show/hide Branch/School/State Ministry/Divisional Office/ Zonal Office field according to the Place-of-work selected value
     $("#Secretory_createemployee_emptype_drp").change(function () {    
       placeOfWorkChange();
       });
   
   
    //Save employee data
       $('#Secretory_createemployee_submit_btn').click(function(){    
   
         
         var name_insert = $('#Secretory_createemployee_name_txt').val().trim();    
         var status_insert = $('#Secretory_createemployee_status_drp option:selected').val().trim();
         var class_insert = $('#Secretory_createemployee_class_drp option:selected').val().trim();
         var designation_insert = $('#Secretory_createemployee_designation_drp option:selected').val().trim();    
         var currstatus_insert = $('#Secretory_createemployee_currstatus_drp option:selected').val().trim();  
         
   
         var nic_insert = $('#Secretory_createemployee_nic_txt').val().trim();    
         var dob_insert = $("#Secretory_createemployee_dob_dtp").val().trim();
         var gender_insert = $("input[name='Gender']:checked").val().trim();
         
         var category_insert = $('#Secretory_createemployee_category_drp option:selected').val().trim();    
         var appdate_insert = $('#Secretory_createemployee_appointdate_dtp').val().trim();
         var cadretype_insert = $('#Secretory_createemployee_cadre_drp option:selected').val().trim();    
         var specialsub_insert = $('#Secretory_createemployee_subject_drp option:selected').val().trim();
   
          //Special subject field validation
         if((cadretype_insert =="")){
           var valdiSpeSub = false;
         }else if((cadretype_insert =="Special") && (specialsub_insert == "")){
           var valdiSpeSub = false;
         }else{
           var valdiSpeSub = true;
         }
   
         var province_insert = $('#Secretory_createemployee_province_drp option:selected').val().trim();    
         var placeofwork_insert = $('#Secretory_createemployee_emptype_drp option:selected').val().trim();
         
         if( placeofwork_insert == "MOE")
         {
           var location_insert = $('#Secretory_createemployee_moe_branch_drp option:selected').val().trim();
         }else if( placeofwork_insert == "School"){
           var location_insert = $('#Secretory_createemployee_school_school_drp option:selected').val().trim();
         }else if( placeofwork_insert == "State Ministry"){
           var location_insert = $('#Secretory_createemployee_stateministry_stateministry_drp option:selected').val().trim();
         }else if( placeofwork_insert == "Divisional Office"){
           var location_insert = $('#Secretory_createemployee_divisionaloffice_divisionaloffice_drp option:selected').val().trim();
         }else if( placeofwork_insert == "Zonal Office"){
           var location_insert = $('#Secretory_createemployee_zonaloffice_zonaloffice_drp option:selected').val().trim();
         }else{
           var location_insert ="";
         }
   
            //Place of work feild selection validate
         if(( placeofwork_insert == "")){
           var validlocation_insert = false;
         }else if(( placeofwork_insert == "MOE") && (location_insert == "")){
           var validlocation_insert = false;
         }else  if(( placeofwork_insert == "School") && (location_insert == "")){
           var validlocation_insert = false;
         }else if(( placeofwork_insert == "State Ministry") && (location_insert == "")){
           var validlocation_insert = false;
         }else if(( placeofwork_insert == "Divisional Office") && (location_insert == "")){
           var validlocation_insert = false;
         }else if(( placeofwork_insert == "Zonal Office") && (location_insert == "")){
           var validlocation_insert = false;
         }else{
           var validlocation_insert = true;
         }
   
         var contacthome_insert = $('#Secretory_createemployee_contacathome_txt').val().trim(); 
         var contactmobile_insert = $('#Secretory_createemployee_contacatmobile_txt').val().trim(); 
         var contactoffice_insert = $('#Secretory_createemployee_contacatoffice_txt').val().trim(); 
         var email_insert = $('#Secretory_createemployee_email_txt').val().trim(); 
         var address_insert = $('#Secretory_createemployee_address_txt').val().trim();
   
         //Email Validation
         var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         
         if(email_insert ==""){
           var validatedEmail = false;
         }else if( !emailReg.test( email_insert ) ) {
           var validatedEmail = false;
         } else {
           var validatedEmail = true;;
         } 
         
          var degree_eduquali_insert = $('#Secretory_createemployee_degree_txt').val().trim();
          var gce_eduquali_insert = $('#Secretory_createemployee_gce_txt').val().trim(); 
          var other_eduquali_insert = $('#Secretory_createemployee_other_txt').val().trim();
          var profquali_insert =$('#Secretory_createemployee_qualifications_txt').val().trim() ;
   
   
        //Inputs Validation
     if((name_insert == "") || (status_insert == "") || (class_insert == "") ||  (designation_insert == "") || (currstatus_insert == "") || (nic_insert == "") || (dob_insert == "") || (category_insert == "") || (appdate_insert == "") || (valdiSpeSub == false) || (province_insert == "") || (validlocation_insert == false) || (contacthome_insert == "") || (contactmobile_insert == "") || (contactoffice_insert == "") || (validatedEmail ==false) || (address_insert == "") || (gce_eduquali_insert == "") ){
         var validatedInputs = false;
         alert("Enter all the details!");
       }else{
         var validatedInputs = true;
         alert("ok!");
       }
       
       if(validatedInputs == true){
         if(confirm("Do you want to create a new record ?")){
             $.ajax({
               type: 'POST',
               url: "process/EmployeeInsertProcess.php",    
               data:{Secretory_createemployee_name_txt:name_insert,
                 Secretory_createemployee_status_drp:status_insert,
                 Secretory_createemployee_class_drp:class_insert,
                 Secretory_createemployee_designation_drp:designation_insert,
                 Secretory_createemployee_currstatus_drp:currstatus_insert,
                 Secretory_createemployee_nic_txt:nic_insert,
                 Secretory_createemployee_dob_dtp:dob_insert,
                 Secretory_createemployee_gender:gender_insert,
                 Secretory_createemployee_category_drp:category_insert,
                 Secretory_createemployee_appointdate_dtp:appdate_insert,
                 Secretory_createemployee_cadre_drp:cadretype_insert,
                 Secretory_createemployee_subject_drp:specialsub_insert,
                 Secretory_createemployee_province_drp:province_insert,
                 Secretory_createemployee_emptype_drp:placeofwork_insert,
                 Secretory_createemployee_location:location_insert,
                 Secretory_createemployee_contacathome_txt:contacthome_insert,
                 Secretory_createemployee_contacatmobile_txt:contactmobile_insert,
                 Secretory_createemployee_contacatoffice_txt:contactoffice_insert,
                 Secretory_createemployee_email_txt:email_insert,
                 Secretory_createemployee_address_txt:address_insert,
                 Secretory_createemployee_degree_txt:degree_eduquali_insert,
                 Secretory_createemployee_gce_txt:gce_eduquali_insert,
                 Secretory_createemployee_other_txt:other_eduquali_insert,
                 Secretory_createemployee_qualifications_txt:profquali_insert
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
