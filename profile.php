<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    include('include/database.php');
    include('include/check_login.php');
   
    $userId = $_SESSION['Id'];
    $userEmpId = $_SESSION['UserEmpNo'];
   
     $db = new database();
   
     $query = $db->getRow('SELECT * 
                           FROM sleasofficer 
                           WHERE EmpNo = ?',[$userEmpId]);
                         
   
     $_SESSION['Id']= $query['Id']; 
   
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
                             WHERE SleasOffId  = ?',[$userEmpId]);
   
    $query2 = $db->getRows('SELECT *
                           FROM sleaseduqualigce
                           WHERE SleasOffId  = ?',[$userEmpId]);     
                           
     $query3 = $db->getRows('SELECT *
                           FROM sleaseduqualiother
                           WHERE SleasOffId  = ?',[$userEmpId]);                      
     
     $query4 = $db->getRows('SELECT *
                           FROM sleasprofquali
                           WHERE SleasOffId  = ?',[$userEmpId]); 
   
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
         <?php include('common/sidebar.php');;?>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                     </div>
                  </div>
                  <!-- User profile details section -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card card-secondary">
                           <div class="card-header">
                              <h3 class="card-title">Basic</h3>
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-3">
                                    <div class="image">
                                    <!--   <?php { ?> 
                                       <img src="dist/img/UserImages,<?php echo base64_encode($image); ?>.jpg" class="brand-image img-circle elevation-3" style="opacity: 1"/> 
                                       <?php } ?>
                                        <?php { ?> 
                                          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($session_UserImage); ?>" class="brand-image img-circle elevation-3" style="opacity: 1"/> 
                                          <?php } ?>  -->
                                    </div>
                                 </div>
                                 <div class="col-9">
                                    <div class="info">
                                       <div class="row">
                                          <div class="col-3">
                                             <label id="UserProfile_empno_lbl">Employee No: </label>
                                          </div>
                                          <div class="col-8">
                                             <p name ="UserProfile_empno" id="UserProfile_empno" disabled=""><?php echo $EmpNo;?></p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-3">
                                             <label id="UserProfile_name_lbl">Name: </label>
                                          </div>
                                          <div class="col-8">
                                             <p name ="UserProfile_status" id="UserProfile_status" disabled=""> <?php echo $Status; ?> <span name ="UserProfile_name" id="UserProfile_name" disabled=""><?php echo $Name;?></span></p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-3">
                                             <label id="UserProfile_class_lbl">Class : </label>
                                          </div>
                                          <div class="col-8">
                                             <p name ="UserProfile_class" id="UserProfile_class"><?php echo $Class;?></p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-3">
                                             <label id="UserProfile_designation_lbl">Designation: </label>
                                          </div>
                                          <div class="col-8">
                                             <p name ="UserProfile_designation" id="UserProfile_designation"><?php echo $Designation;?></p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-3">
                                             <label id="UserProfile_status_lbl">Current Status: </label>
                                          </div>
                                          <div class="col-8">
                                             <p name ="UserProfile_status" id="UserProfile_status"><?php echo $CurrentStatus;?></p>
                                          </div>
                                       </div>
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
                           <form>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-12">  
                                       <label id="UserProfile_nic_lbl">NIC</label>                  
                                       <input type="text" class="form-control" name ="UserProfile_nic_txt" id="UserProfile_nic_txt" placeholder="Enter NIC " value="<?php echo $NIC;?>" disabled="">
                                    </div>
                                    <div class="form-group col-12" >
                                       <label id="UserProfile_dob_lbl">Date of Birth</label> 
                                       <div class="input-group date" name ="UserProfile_dob_dtp" id="UserProfile_dob_dtp" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#UserProfile_dob_dtp" placeholder="Select Date" disabled="" value="<?php echo $DOB;?>">
                                          <div class="input-group-append" data-target="#UserProfile_dob_dtp" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group col-12" >
                                       <label name ="UserProfile_gender_lbl" id="UserProfile_gender_lbl">Gender </label> 
                                       <div class="row">
                                          <div class="col-6">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Gender" disabled="" name = "UserProfile_gender_male_rb" id="UserProfile_gender_male_rb" <?=$Gender=="Male" ? "checked" : ""?> value="A"> Male
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Gender" disabled="" name = "UserProfile_gender_female_rb" id="UserProfile_gender_female_rb" <?=$Gender=="Female" ? "checked" : ""?> >Female
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
                                       <label id="UserProfile_batch_lbl">Category</label>                  
                                       <input type="text" class="form-control" name= "UserProfile_batch_txt" id="UserProfile_batch_txt" disabled="" placeholder="Open" value="<?php echo $Category;?>">
                                    </div>
                                    <div class="form-group col-12" >
                                       <label id="UserProfile_appointmentdate_lbl" name= "UserProfile_appointmentdate_lbl">Apoinment Date</label> 
                                       <div class="input-group date" id="UserProfile_appointmentdate_dtp" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#UserProfile_appointmentdate_dtp" placeholder="Select Date" value="<?php echo $AppointmentDate;?>" disabled = "">
                                          <div class="input-group-append" data-target="#UserProfile_appointmentdate_dtp" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group col-12">
                                       <label id="UserProfile_cadre_lbl">Cadre Type</label>                  
                                       <select class="form-control" id="UserProfile_cadre_drp" name= "UserProfile_cadre_drp" disabled="">
                                          <option value = "General" <?php if($CadreType=="General") echo 'selected="selected"'; ?>>General</option>
                                          <option value = "Special" <?php if($CadreType=="Special") echo 'selected="selected"'; ?>> Special</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id= "UserProfile_subject" <?php if ($CadreType=="General"){?>style="display:none"<?php } ?>>
                                       <label id="UserProfile_subject_lbl">Special Subject</label>   
                                       <select class="form-control" id="UserProfile_subject_drp" name= "UserProfile_subject_drp" disabled="">
                                          <option value = "Agriculture" <?php if($SpecialSubject=="Agriculture") echo 'selected="selected"'; ?>>Agriculture</option>
                                          <option value = "Arabic" <?php if($SpecialSubject=="Arabic") echo 'selected="selected"'; ?>>Arabic</option>
                                          <option value = "Art" <?php if($SpecialSubject=="Art") echo 'selected="selected"'; ?>>Art</option>
                                          <option value = "Buddhist" <?php if($SpecialSubject=="Buddhist") echo 'selected="selected"'; ?>>Buddhist</option>
                                          <option value = "Christianity" <?php if($SpecialSubject=="Christianity") echo 'selected="selected"'; ?>>Christianity</option>
                                          <option value = "Commerce" <?php if($SpecialSubject=="Commerce") echo 'selected="selected"'; ?>>Commerce</option>
                                          <option value = "Dancing" <?php if($SpecialSubject=="Dancing") echo 'selected="selected"'; ?>>Dancing</option>
                                          <option value = "Eastern Music" <?php if($SpecialSubject=="EasternMusic") echo 'selected="selected"'; ?>>Eastern Music</option>
                                          <option value = "Engineering Technology" <?php if($SpecialSubject=="EngineeringTechnology") echo 'selected="selected"'; ?>>Engineering Technology</option>
                                          <option value = "English" <?php if($SpecialSubject=="English") echo 'selected="selected"'; ?>>English</option>
                                          <option value = "Handicraft" <?php if($SpecialSubject=="Handicraft") echo 'selected="selected"'; ?>>Handicraft</option>
                                          <option value = "Health & Phy" <?php if($SpecialSubject=="Health & Phy") echo 'selected="selected"'; ?>>Health & Phy</option>
                                          <option value = "Hindu" <?php if($SpecialSubject=="Hindu") echo 'selected="selected"'; ?>>Hindu</option>
                                          <option value = "History" <?php if($SpecialSubject=="History") echo 'selected="selected"'; ?>>History</option>
                                          <option value = "Home science" <?php if($SpecialSubject=="Homes cience") echo 'selected="selected"'; ?>>Home science</option>
                                          <option value = "Islam" <?php if($SpecialSubject=="Islam") echo 'selected="selected"'; ?>>Islam</option>
                                          <option value = "IT" <?php if($SpecialSubject=="IT") echo 'selected="selected"'; ?>>IT</option>
                                          <option value = "Math" <?php if($SpecialSubject=="Math") echo 'selected="selected"'; ?>>Math</option>
                                          <option value = "Music" <?php if($SpecialSubject=="Music") echo 'selected="selected"'; ?>>Music</option>
                                          <option value = "Music Oriental" <?php if($SpecialSubject=="Music Oriental") echo 'selected="selected"'; ?>>Music-Oriental </option>
                                          <option value = "Piriven" <?php if($SpecialSubject=="Piriven") echo 'selected="selected"'; ?>>Piriven</option>
                                          <option value = "Planning" <?php if($SpecialSubject=="Planning") echo 'selected="selected"'; ?>>Planning</option>
                                          <option value = "PrimaryEdu" <?php if($SpecialSubject=="Primary Edu") echo 'selected="selected"'; ?>>Primary Edu</option>
                                          <option value = "Science" <?php if($SpecialSubject=="Science") echo 'selected="selected"'; ?>>Science</option>
                                          <option value = "Sinhala" <?php if($SpecialSubject=="Sinhala") echo 'selected="selected"'; ?>>Sinhala</option>
                                          <option value = "Special Edu" <?php if($SpecialSubject=="SpecialEdu") echo 'selected="selected"'; ?>>Special Edu</option>
                                          <option value = "Student Counselling" <?php if($SpecialSubject=="Student Counselling") echo 'selected="selected"'; ?>>Student Counselling</option>
                                          <option value = "Student Guide" <?php if($SpecialSubject=="Student Guide") echo 'selected="selected"'; ?>>Student Guide</option>
                                          <option value = "Tamil" <?php if($SpecialSubject=="Tamil") echo 'selected="selected"'; ?>>Tamil</option>
                                          <option value = "Western Music" <?php if($SpecialSubject=="Western Music") echo 'selected="selected"'; ?>>Western Music</option>
                                          <option value = "Engineering Technology" <?php if($SpecialSubject=="Engineering Technology") echo 'selected="selected"'; ?>>Engineering Technology</option>
                                          <option value = "Bio Technology" <?php if($SpecialSubject=="Bio Technology") echo 'selected="selected"'; ?>>Bio Technology</option>
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
                           </div>
                           <form>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-12">
                                       <label id="UserProfile_provice_lbl">Province</label>
                                       <select class="form-control" id="UserProfile_province_drp" disabled="" name="UserProfile_province_drp" >
                                          <option value="Western" <?php if($Province=="Western") echo 'selected="selected"'; ?>>Western</option>
                                          <option value="Central" <?php if($Province=="Central") echo 'selected="selected"'; ?>>Central</option>
                                          <option value="Northern" <?php if($Province=="Northern") echo 'selected="selected"'; ?>>Northern</option>
                                          <option value="North Central" <?php if($Province=="North Central") echo 'selected="selected"'; ?>>North Central</option>
                                          <option value="North Western" <?php if($Province=="Nort hWestern") echo 'selected="selected"'; ?>>North Western</option>
                                          <option value="Uva" <?php if($Province=="Uva") echo 'selected="selected"'; ?>>Uva</option>
                                          <option value="Eastern" <?php if($Province=="Eastern") echo 'selected="selected"'; ?>>Eastern</option>
                                          <option value="Eastern" <?php if($Province=="Eastern") echo 'selected="selected"'; ?>>Eastern</option>
                                          <option value="Sabaragamu" <?php if($Province=="Sabaragamu") echo 'selected="selected"'; ?>>Sabaragamu</option>
                                          <option value="Southern" <?php if($Province=="Southern") echo 'selected="selected"'; ?>>Southern</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" >
                                       <label id="UserProfile_placeofwork_lbl">Place of Work</label> 
                                       <select class="form-control" id="UserProfile_placeofwork_drp" disabled="" name="UserProfile_placeofwork_drp">
                                          <option value="MOE" <?php if($Province=="MOE") echo 'selected="selected"'; ?> >MOE</option>
                                          <option value="Examination" <?php if($PlaceOfWork=="Examination") echo 'selected="selected"'; ?> >Examination</option>
                                          <option value="Publication" <?php if($PlaceOfWork=="Publication") echo 'selected="selected"'; ?> >Publication</option>
                                          <option value="School" <?php if($PlaceOfWork=="School") echo 'selected="selected"'; ?> >School</option>
                                          <option value="Province" <?php if($PlaceOfWork=="Province") echo 'selected="selected"'; ?> >Province</option>
                                          <option value="State Ministry" <?php if($PlaceOfWork=="State Ministry") echo 'selected="selected"'; ?> >State Ministry </option>
                                          <option value="Department" <?php if($PlaceOfWork=="Department") echo 'selected="selected"'; ?> >Department</option>
                                          <option value="Divisional Office" <?php if($PlaceOfWork=="Divisional Office") echo 'selected="selected"'; ?> >Divisional Office</option>
                                          <option value="Provisional Office"<?php if($PlaceOfWork=="Provisional Office") echo 'selected="selected"'; ?> >Provisional Office</option>
                                          <option value="Zonal Office" <?php if($PlaceOfWork=="Zonal Office") echo 'selected="selected"'; ?> >Zonal Office</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id="UserProfile_moe_branch" <?php if (($PlaceOfWork=="Examination") || ($PlaceOfWork=="Publication") || ($PlaceOfWork=="School") || ($PlaceOfWork=="Province") || ($PlaceOfWork=="StateMinistry") || ($PlaceOfWork=="Department") || ($PlaceOfWork=="DivisionalOffice") || ($PlaceOfWork=="ProvisionalOffice") || ($PlaceOfWork=="ZonalOffice")){?>style="display:none"<?php } ?>>
                                       <label id="UserProfile_moe_branch_lbl">Branch</label> 
                                       <select class="form-control" id="UserProfile_moe_branch_drp" disabled="">
                                          <option Value="Aesthetic Education Branch" <?php if($Location=="Aesthetic Education Branch") echo 'selected="selected"'; ?> >Aesthetic Education Branch</option>
                                          <option Value="Agriculture and Environmental Education Branch" <?php if($Location=="Agriculture and Environmental Education Branch") echo 'selected="selected"'; ?> >Agriculture and Environmental Education Branch</option>
                                          <option Value="Bi Lingual & Tri Language Unit" <?php if($Location=="Bi Lingual & Tri Language Unit") echo 'selected="selected"'; ?> >Bi Lingual & Tri Language Unit</option>
                                          <option Value="Co-curricular Activities, Guidance and Counseling Branch" <?php if($Location=="Co-curricular Activities, Guidance and Counseling Branch") echo 'selected="selected"'; ?> >Co-curricular Activities, Guidance and Counseling Branch</option>
                                          <option Value="College of Education Branch" <?php if($Location=="College of Education Branch") echo 'selected="selected"'; ?> >College of Education Branch</option>
                                          <option Value="Commerce & Business Education Branch" <?php if($Location=="Commerce & Business Education Branch") echo 'selected="selected"'; ?> >Commerce & Business Education Branch</option>
                                          <option Value="Construction, Service Providing and Infrastructures Development Unit" <?php if($Location=="Construction, Service Providing and Infrastructures Development Unit") echo 'selected="selected"'; ?>>Construction, Service Providing and Infrastructures Development Unit</option>
                                          <option Value="Data Management Branch" <?php if($Location=="Data Management Branch") echo 'selected="selected"'; ?> >Data Management Branch</option>
                                          <option Value="Education Development & Administration Branch" <?php if($Location=="Education Development & Administration Branch") echo 'selected="selected"'; ?> >Education Development & Administration Branch</option>
                                          <option Value="Education for all Branch" <?php if($Location=="Education for all Branch") echo 'selected="selected"'; ?> >Education for all Branch</option>
                                          <option Value="Education Publication Advisory Board" <?php if($Location=="Education Publication Advisory Board") echo 'selected="selected"'; ?> >Education Publication Advisory Board</option>
                                          <option Value="Education Reforms Unit" <?php if($Location=="Education Reforms Unit") echo 'selected="selected"'; ?> >Education Reforms Unit</option>
                                          <option Value="Education Research & Development Branch" <?php if($Location=="Education Research & Development Branch") echo 'selected="selected"'; ?> >Education Research & Development Branch</option>
                                          <option Value="Educational Services Establishment Division" <?php if($Location=="Educational Services Establishment Division") echo 'selected="selected"'; ?>>Educational Services Establishment Division</option>
                                          <option Value="Educational Quality Development Division" <?php if($Location=="Educational Quality Development Division") echo 'selected="selected"'; ?> >Educational Quality Development Division</option>
                                          <option Value="English & Foreign Language Branch" <?php if($Location=="English & Foreign Language Branch") echo 'selected="selected"'; ?> >English & Foreign Language Branch</option>
                                          <option Value="ESE (Pool)" <?php if($Location=="ESE (Pool)") echo 'selected="selected"'; ?> >ESE (Pool)</option>
                                          <option Value="Foreign Agencies & External Affairs Branch" <?php if($Location=="Foreign Agencies & External Affairs Branch") echo 'selected="selected"'; ?> >Foreign Agencies & External Affairs Branch</option>
                                          <option Value="Health & Nutrition Branch" <?php if($Location=="Health & Nutrition Branch") echo 'selected="selected"'; ?> >Health & Nutrition Branch</option>
                                          <option Value="Human Resource Development Branch" <?php if($Location=="Human Resource Development Branch") echo 'selected="selected"'; ?> >Human Resource Development Branch</option>
                                          <option Value="Information & Communication Technology Branch" <?php if($Location=="Information & Communication Technology Branch") echo 'selected="selected"'; ?>>Information & Communication Technology Branch</option>
                                          <option Value="Management & Quality Assurance Branch" <?php if($Location=="Management & Quality Assurance Branch") echo 'selected="selected"'; ?>>Management & Quality Assurance Branch</option>
                                          <option Value="Mathematics  Branch" <?php if($Location=="Mathematics  Branch") echo 'selected="selected"'; ?>>Mathematics  Branch</option>
                                          <option Value="Monitoring Performance Review Branch" <?php if($Location=="Monitoring Performance Review Branch") echo 'selected="selected"'; ?>>Monitoring Performance Review Branch</option>
                                          <option Value="Muslim School Development Branch" <?php if($Location=="Muslim School Development Branch") echo 'selected="selected"'; ?>>Muslim School Development Branch</option>
                                          <option Value="National Book Development Board" <?php if($Location=="National Book Development Board") echo 'selected="selected"'; ?>>National Book Development Board</option>
                                          <option Value="27" <?php if($Location=="27") echo 'selected="selected"'; ?>>National College of Education Branch</option>
                                          <option Value="National College of Education Branch" <?php if($Location=="National College of Education Branch") echo 'selected="selected"'; ?>>National Language & Humanities Education Unit</option>
                                          <option Value="National Operation Room" <?php if($Location=="National Operation Room") echo 'selected="selected"'; ?>>National Operation Room</option>
                                          <option Value="National School Branch" <?php if($Location=="National School Branch") echo 'selected="selected"'; ?>>National School Branch </option>
                                          <option Value="Non Formal & Special Education Branch" <?php if($Location=="Non Formal & Special Education Branch") echo 'selected="selected"'; ?>>Non Formal & Special Education Branch</option>
                                          <option Value="32" <?php if($Location=="32") echo 'selected="selected"'; ?>>Peace & Reconciliation Education Unit</option>
                                          <option Value="Piriven Branch" <?php if($Location=="Piriven Branch") echo 'selected="selected"'; ?>>Piriven Branch</option>
                                          <option Value="Plantation School Development Branch" <?php if($Location=="Plantation School Development Branch") echo 'selected="selected"'; ?>>Plantation School Development Branch</option>
                                          <option Value="Policy & Planning Branch" <?php if($Location=="Policy & Planning Branch") echo 'selected="selected"'; ?>>Policy & Planning Branch</option>
                                          <option Value="Policy Planning & Performance Review Division" <?php if($Location=="Policy Planning & Performance Review Division") echo 'selected="selected"'; ?>>Policy Planning & Performance Review Division</option>
                                          <option Value="Primary Education and Early Childhood Development Unit" <?php if($Location=="Primary Education and Early Childhood Development Unit") echo 'selected="selected"'; ?>>Primary Education and Early Childhood Development Unit </option>
                                          <option Value="Private School Branch" <?php if($Location=="Private School Branch") echo 'selected="selected"'; ?>>Private School Branch</option>
                                          <option Value="Religious & Value Education Branch" <?php if($Location=="Religious & Value Education Branch") echo 'selected="selected"'; ?>>Religious & Value Education Branch </option>
                                          <option Value="School Activities Branch" <?php if($Location=="School Activities Branch") echo 'selected="selected"'; ?>>School Activities Branch</option>
                                          <option Value="School Affairs Division" <?php if($Location=="School Affairs Division") echo 'selected="selected"'; ?>>School Affairs Division</option>
                                          <option Value="School Library Development Branch" <?php if($Location=="School Library Development Branch") echo 'selected="selected"'; ?>>School Library Development Branch</option>
                                          <option Value="School Supplies & Procurement Branch" <?php if($Location=="School Supplies & Procurement Branch") echo 'selected="selected"'; ?>>School Supplies & Procurement Branch</option>
                                          <option Value="Science Branch" <?php if($Location=="Science Branch") echo 'selected="selected"'; ?>>Science Branch</option>
                                          <option Value="Sports & Physical Education Branch" <?php if($Location=="Sports & Physical Education Branch") echo 'selected="selected"'; ?>>Sports & Physical Education Branch</option>
                                          <option Value="Tamil School Development Branch" <?php if($Location=="Tamil School Development Branch") echo 'selected="selected"'; ?>>Tamil School Development Branch</option>
                                          <option Value="Teacher Education Administration Branch" <?php if($Location=="Teacher Education Administration Branch") echo 'selected="selected"'; ?>>Teacher Education Administration Branch</option>
                                          <option Value="Teacher Establishment Branch" <?php if($Location=="Teacher Establishment Branch") echo 'selected="selected"'; ?>>Teacher Establishment Branch</option>
                                          <option Value="Teacher Transfer Branch" <?php if($Location=="Teacher Transfer Branch") echo 'selected="selected"'; ?>>Teacher Transfer Branch</option>
                                          <option Value="Technical Education Branch" <?php if($Location=="Technical Education Branch") echo 'selected="selected"'; ?>>Technical Education Branch</option>
                                          <option Value="Thousands School Development Branch" <?php if($Location=="Thousands School Development Branch") echo 'selected="selected"'; ?>>Thousands School Development Branch</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id="UserProfile_school_school" <?php if (($PlaceOfWork=="Examination") || ($PlaceOfWork=="Publication") || ($PlaceOfWork=="MOE") || ($PlaceOfWork=="Province") || ($PlaceOfWork=="StateMinistry") || ($PlaceOfWork=="Department") || ($PlaceOfWork=="DivisionalOffice") || ($PlaceOfWork=="ProvisionalOffice") || ($PlaceOfWork=="ZonalOffice")){?>style="display:none"<?php } ?>>
                                       <label id="UserProfile_school_lbl">School</label> 
                                       <select class="form-control" id="UserProfile_school_school_drp" disabled="">
                                          <option Value = "School 1" <?php if($Location=="School 1") echo 'selected="selected"'; ?> >School 1</option>
                                          <option Value = "School 2" <?php if($Location=="School 2") echo 'selected="selected"'; ?> >School 2</option>
                                          <option Value = "School 3" <?php if($Location=="School 3") echo 'selected="selected"'; ?> >School 3</option>
                                          <option Value = "School 4" <?php if($Location=="School 4") echo 'selected="selected"'; ?> >School 4</option>
                                          <option Value = "School 5" <?php if($Location=="School 5") echo 'selected="selected"'; ?>>School 5</option>
                                          <option Value = "School 6" <?php if($Location=="School 6") echo 'selected="selected"'; ?>>School 6</option>
                                          <option Value = "School 7" <?php if($Location=="School 7") echo 'selected="selected"'; ?>>School 7</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id="UserProfile_stateministry_stateministry" <?php if (($PlaceOfWork=="Examination") || ($PlaceOfWork=="Publication") || ($PlaceOfWork=="School") || ($PlaceOfWork=="Province") || ($PlaceOfWork=="MOE") || ($PlaceOfWork=="Department") ||($PlaceOfWork=="DivisionalOffice") || ($PlaceOfWork=="ProvisionalOffice") || ($PlaceOfWork=="ZonalOffice")){?>style="display:none"<?php } ?> >
                                       <label id="UserProfile_stateministry_stateministry_lbl">State Minisrty</label> 
                                       <select class="form-control" id="UserProfile_stateministry_stateministry_drp" disabled="">
                                          <option Value = "State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services" <?php if($Location=="State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services") echo 'selected="selected"'; ?>>State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services</option>
                                          <option Value = "State Minister of Education Reforms, Open Universities and Distance Learning Promotion" <?php if($Location=="State Minister of Education Reforms, Open Universities and Distance Learning Promotion") echo 'selected="selected"'; ?>>State Minister of Education Reforms, Open Universities and Distance Learning Promotion</option>
                                          <option Value = "State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification" <?php if($Location=="State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification") echo 'selected="selected"'; ?>>State Ministry of Coconut, Kithul and Palmyrah Cultivation Promotion and Related Industrial Product Manufacturing & Export Diversification</option>
                                          <option Value = "State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities" <?php if($Location=="State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities") echo 'selected="selected"'; ?>>State Minister of Dhamma Schools, Bhikkhu Education, Piriven and Buddhist Universities</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id="UserProfile_divisionaloffice_divisionaloffice" <?php if ( ($PlaceOfWork=="MOE") || ($PlaceOfWork=="Examination") || ($PlaceOfWork=="Publication") || ($PlaceOfWork=="School") || ($PlaceOfWork=="Province") || ($PlaceOfWork=="StateMinistry") || ($PlaceOfWork=="Department") || ($PlaceOfWork=="ProvisionalOffice") || ($PlaceOfWork=="ZonalOffice")){?>style="display:none"<?php } ?> >
                                       <label id="UserProfile_divisionaloffice_divisionaloffice_lbl">Divisional Office</label> 
                                       <select class="form-control" id="UserProfile_divisionaloffice_divisionaloffice_drp" disabled="">
                                          <option value = "Divisional Office 1" <?php if($Location=="Divisional Office 1") echo 'selected="selected"'; ?> >Divisional Office 1 </option>
                                          <option  value = "Divisional Office 2" <?php if($Location=="Divisional Office 2") echo 'selected="selected"'; ?>>Divisional Office 2</option>
                                          <option  value = "Divisional Office 3" <?php if($Location=="Divisional Office 3") echo 'selected="selected"'; ?>>Divisional Office 3</option>
                                          <option  value = "Divisional Office 4" <?php if($Location=="Divisional Office 4") echo 'selected="selected"'; ?>>Divisional Office 4</option>
                                          <option  value = "Divisional Office 5" <?php if($Location=="Divisional Office 5") echo 'selected="selected"'; ?>>Divisional Office 5</option>
                                          <option  value = "Divisional Office 6" <?php if($Location=="Divisional Office 6") echo 'selected="selected"'; ?>>Divisional Office 6</option>
                                          <option  value = "Divisional Office 7" <?php if($Location=="Divisional Office 7") echo 'selected="selected"'; ?>>Divisional Office 7</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-12" id="UserProfile_zonaloffice_zonaloffice" <?php if ( ($PlaceOfWork=="MOE") || ($PlaceOfWork=="Examination") || ($PlaceOfWork=="Publication") || ($PlaceOfWork=="School") || ($PlaceOfWork=="Province") || ($PlaceOfWork=="StateMinistry") || ($PlaceOfWork=="Department") || ($PlaceOfWork=="DivisionalOffice") || ($PlaceOfWork=="ProvisionalOffice") ){?>style="display:none"<?php } ?> >
                                       <label id="UserProfile_emptype_lbl">Zonal Office</label> 
                                       <select class="form-control" id="UserProfile_emptype_drp" disabled="">
                                          <option value = "Zonal Office 1" <?php if($Location=="Zonal Office 1") echo 'selected="selected"'; ?> >Zonal Office 1</option>
                                          <option value = "Zonal Office 2" <?php if($Location=="Zonal Office 2") echo 'selected="selected"'; ?> >Zonal Office 2</option>
                                          <option value = "Zonal Office 3" <?php if($Location=="Zonal Office 3") echo 'selected="selected"'; ?> >Zonal Office 2</option>
                                          <option value = "Zonal Office 4" <?php if($Location=="Zonal Office 4") echo 'selected="selected"'; ?> >Zonal Office 3</option>
                                          <option value = "Zonal Office 5" <?php if($Location=="Zonal Office 5") echo 'selected="selected"'; ?> >Zonal Office 4</option>
                                          <option value = "Zonal Office 6" <?php if($Location=="Zonal Office 6") echo 'selected="selected"'; ?> >Zonal Office 5</option>
                                          <option value = "Zonal Office 7" <?php if($Location=="Zonal Office 7") echo 'selected="selected"'; ?> >Zonal Office 6</option>
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
                                 <button type="button" class="btn btn-tool" id="UserProfile_contacts_edit_btn">
                                 <i class="fas fa-edit"></i>
                                 </button>
                                 <button type="button" class="btn btn-tool" id="UserProfile_contacts_save_btn">
                                 <i class="fas fa-save" id="UserProfile_basic_contacts_btn_i"></i>
                                 </button>
                              </div>
                           </div>
                           <form>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-12">  
                                       <label id="UserProfile_contacthome_lbl">Home </label>                  
                                       <input type="text" class="form-control contacts" placeholder="Enter Contact" id="UserProfile_contacthome_txt"  name = "UserProfile_contacthome_txt" disabled="" value="<?php echo $ContactHome;?>">
                                    </div>
                                    <div class="form-group col-12" > 
                                       <label id="UserProfile_contactmobile_lbl">Mobile</label> 
                                       <input type="text" class="form-control contacts" placeholder="Enter Contact" id="UserProfile_contaactmobile_txt" name = "UserProfile_contaactmobile_txt"  disabled="" value="<?php echo $ContactMobile;?>">
                                    </div>
                                    <div class="form-group col-12">
                                       <label id="UserProfile_contactoffice_lbl">Office</label> 
                                       <input type="text" class="form-control contacts" placeholder="Enter Contact" id="UserProfile_contactoffice_txt" name = "UserProfile_contactoffice_txt" disabled="" value="<?php echo $ContactOffice;?>">
                                    </div>
                                    <div class="form-group col-12">
                                       <label id="UserProfile_email_lbl">Email</label> 
                                       <input type="text" class="form-control contacts" id="UserProfile_Email_txt" placeholder="Enter Email"  name = "UserProfile_Email_txt" disabled="" value="<?php echo $Email;?>">
                                    </div>
                                    <div class="form-group col-12">  
                                       <label id="UserProfile_address_lbl">Address</label>                  
                                       <textarea class="form-control contacts" rows="2"  disabled="" placeholder="Enter Address" id="UserProfile_address_txt" name = "UserProfile_address_txt" ><?php echo $Address;?></textarea>
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
                           </div>
                           <form>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-12">
                                       <label id="UserProfile_degree_lbl">Degree Level</label> 
                                       <div id="UserProfile_degree_li">
                                          <ul>
                                             <?php foreach ($query1 as $data) { ?> 
                                             <li><?php echo $data['DegreeLevel']; ?></li>
                                             <?php } ?> 
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="form-group col-12" >
                                       <label id="UserProfile_gce_lbl">GCE Level</label>
                                       <div id="UserProfile_gce_li">
                                          <ul>
                                             <?php foreach ($query2 as $data) { ?> 
                                             <li><?php echo $data['GCELevel']; ?></li>
                                             <?php } ?> 
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="form-group col-12">
                                       <label id="UserProfile_other_lbl">Other</label> 
                                       <div id="UserProfile_other_li">
                                          <ul>
                                             <?php foreach ($query3 as $data) { ?> 
                                             <li><?php echo $data['OtherLevel']; ?></li>
                                             <?php } ?> 
                                          </ul>
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
                           </div>
                           <form>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-12">
                                       <label id="UserProfile_qualifications_lbl">Qualifications</label>   
                                       <div id="UserProfile_prof_li">
                                          <ul>
                                             <?php foreach ($query4 as $data) { ?> 
                                             <li><?php echo $data['ProfessionalLevel']; ?></li>
                                             <?php } ?> 
                                          </ul>
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
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
   </body>
</html>
<script>
   $(document).ready(function() {
   
   //Initially hided sections
      $("#UserProfile_basic_contacts_btn_i").hide();
   
      
   //Enable edit Contacts section
   $("#UserProfile_contacts_edit_btn").click(function () { 
         $(".contacts").removeAttr('disabled');   
         $("#UserProfile_basic_contacts_btn_i").show()
          
       });
   
   //Update Contact details
       $("#UserProfile_contacts_save_btn").click(function(){
       
       var empNo_userprofile = $('#UserProfile_empno').text().trim(); 
       var contactHome_userprofile = $('#UserProfile_contacthome_txt').val().trim(); 
       var contactMobile_userprofile = $('#UserProfile_contaactmobile_txt').val().trim();
       var contactOffice_userprofile = $('#UserProfile_contactoffice_txt').val().trim(); 
       var contactEmail_userprofile = $('#UserProfile_Email_txt').val().trim();
       var contactAddressHome_userprofile = $('#UserProfile_address_txt').val().trim();  
   
   //Email Validation
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       if( !emailReg.test( contactEmail_userprofile ) ) {
          var validatedEmail = false;
          alert("Enter vaid email!");
       } else {
         var validatedEmail = true;;
       }  

   //Home Phone Number Validation
   var phoneno = /^\d{10}$/;
   if( !phoneno.test( contactHome_userprofile )) {
          var validatedphonenoH = false;
          alert("Enter vaid Home Phone Number!");
   } else {
         var validatedphonenoH = true;;
   }  

   //Mobile Phone Number Validation
   var phoneno = /^\d{10}$/;
   if( !phoneno.test( contactMobile_userprofile )) {
          var validatedphonenoM = false;
          alert("Enter vaid Mobile Phone Number!");
   } else {
         var validatedphonenoM = true;;
   }  

   //Office Phone Number Validation
   var phoneno = /^\d{10}$/;
   if( !phoneno.test( contactOffice_userprofile )) {
          var validatedphonenoO = false;
          alert("Enter vaid Office Phone Number!");
   } else {
         var validatedphonenoO = true;;
   }  

   
   //Inputs Validation
       if((empNo_userprofile == "") || (contactHome_userprofile == "") || (contactMobile_userprofile == "") || (contactOffice_userprofile == "") || (contactEmail_userprofile == "") || (contactAddressHome_userprofile == "")){
         var validatedInputs = false;
         alert("Enter all the details!");
       }else{
         var validatedInputs = true;
       }
   
        if((validatedEmail == true) && (validatedInputs == true)&&(validatedphonenoH == true)&&(validatedphonenoM == true)&&(validatedphonenoO == true)){       
         $.ajax({
               type: 'POST',
               url: "process/UserContactUpdateProcess.php",
               data:{UserProfile_empno:empNo_userprofile,
               UserProfile_contacthome_txt:contactHome_userprofile,UserProfile_contaactmobile_txt:contactMobile_userprofile,UserProfile_contactoffice_txt:contactOffice_userprofile,
               UserProfile_Email_txt:contactEmail_userprofile,
               UserProfile_address_txt:contactAddressHome_userprofile},
               beforeSend: function(){
               
               },
               success: function(data){
                 
                 var jsonobj = JSON.parse(data);
                 if(jsonobj.status == true){  
                   alert(jsonobj.message)
                 }else{
                   alert(jsonobj.message);
                 }
               }
             });
       }else{     
         alert("Data Updation Failed!");
       }  
     }); 
   });
</script>
