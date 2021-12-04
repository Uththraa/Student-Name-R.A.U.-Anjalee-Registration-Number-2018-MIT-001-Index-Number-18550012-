<?php
   session_start();
   include('../include/database.php');
   
   $db = new database();
   
   $status = false;
   $emp = "EMP/";
   $number = 100000;
   
   $name_insert = $_POST['Secretory_createemployee_name_txt']; 
   $status_insert = $_POST['Secretory_createemployee_status_drp']; 
   $class_insert = $_POST['Secretory_createemployee_class_drp']; 
   $designation_insert = $_POST['Secretory_createemployee_designation_drp'];
   $currstatus_insert = $_POST['Secretory_createemployee_currstatus_drp']; 
   
   $nic_insert = $_POST['Secretory_createemployee_nic_txt'];
   $dob_insert = $_POST['Secretory_createemployee_dob_dtp']; 
   $gender_insert = $_POST['Secretory_createemployee_gender'];
   
   $category_insert = $_POST['Secretory_createemployee_category_drp']; 
   $appdate_insert = $_POST['Secretory_createemployee_appointdate_dtp'];
   $cadretype_insert = $_POST['Secretory_createemployee_cadre_drp']; 
   $specialsub_insert = $_POST['Secretory_createemployee_subject_drp'];
   
   $province_insert = $_POST['Secretory_createemployee_province_drp']; 
   $placeofwork_insert = $_POST['Secretory_createemployee_emptype_drp'];
   $location_insert = $_G_POST['Secretory_createemployee_location']; 
   
   $contacthome_insert = $_POST['Secretory_createemployee_contacathome_txt'];
   $contactmobile_insert = $_POST['Secretory_createemployee_contacatmobile_txt']; 
   $contactoffice_insert = $_POST['Secretory_createemployee_contacatoffice_txt'];
   $email_insert = $_POST['Secretory_createemployee_email_txt']; 
   $address_insert = $_POST['Secretory_createemployee_address_txt']; 
   
   $degree_eduquali_insert = $_POST['Secretory_createemployee_degree_txt'];
   $gce_eduquali_insert = $_POST['Secretory_createemployee_gce_txt']; 
   $other_eduquali_insert = $_POST['Secretory_createemployee_other_txt'];
   $profquali_insert = $_POST['Secretory_createemployee_qualifications_txt'];
   
   $image_insert ="";
   $userId_insert = "";
   
   try{
   
       $getUserCount = $db->getRow('SELECT EmpNo FROM sleasofficer ORDER BY Id DESC LIMIT 1 ',[
                                   ]);
   
         $str_arr = explode ("/", $getUserCount['EmpNo']);
         $numPart = (int)($str_arr[1]);
         $nextNum = $numPart +1;
         $newEmpNo = $emp. $nextNum;
   
       $status1 = true;
   
   }catch(Exception $e){
       $status1 = false;
       $message1 = "Error Occured, ".$e;
   }
   
   if($status1 == true){
      try{
           if(!empty($name_insert) && (!empty($status_insert))  && (!empty($class_insert))  && (!empty($designation_insert))  && (!empty($currstatus_insert))  && (!empty($nic_insert))  && (!empty($dob_insert))  && (!empty($gender_insert))  && (!empty($category_insert))  && (!empty($appdate_insert))  && (!empty($cadretype_insert)) && (!empty($province_insert)) && (!empty($placeofwork_insert)) && (!empty($contacthome_insert)) && (!empty($contactmobile_insert)) && (!empty($contactoffice_insert)) && (!empty($email_insert)) && (!empty($address_insert))){            
               
               $insertEmployee = $db->insertRow('INSERT INTO sleasofficer( EmpNo, Name, NIC, Address, ContactHome, ContactMobile, ContactOffice, Email, DOB, Gender, Status, Image, Class, Designation, CurrentStatus, Province, PlaceOfWork, Location, Category, AppointmentDate, CadreType, SpecialSubject, UserId) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
               [$newEmpNo,$name_insert,$nic_insert,$address_insert,$contacthome_insert,$contactmobile_insert,$contactoffice_insert,$email_insert,$dob_insert,$gender_insert,$status_insert,$image_insert,$class_insert,$designation_insert,$currstatus_insert,$province_insert,$placeofwork_insert,$location_insert,$category_insert,$appdate_insert,$cadretype_insert,$specialsub_insert,$userId_insert
               ]); 
               $message2 = "Employee Data inserted Successfully";
               $status2 = true; 
           
           }else{
               $status2 = false;
               $message2 = "Enter all the details!";
           }
           
       }catch(Exception $e){
           $status2 = false;
           $message2 = "Error Occured, ".$e;
       }
   
       
       /////////////////////////////////////////////////
   
       try{
           if (!empty($degree_eduquali_insert)) {  
                   $str_arr = explode (",", $degree_eduquali_insert); 
                   
       
                   foreach ($str_arr as $value) {
                       $InsertDegree = $db->insertRow('INSERT INTO sleaseducqualidegree(SleasOffId ,DegreeLevel) VALUE(?,?)',[$newEmpNo,$value]);
                   }
       
                   $message3 = "Employee Data inserted Successfully";
                   $status3 = true;
           }
       }catch(Exception $e){
           $status3 = false;
           $message3 = "Error Occured, ".$e;
       }
   
       ////////////////////////////////////////////////////////
   
       try{
           if (!empty($gce_eduquali_insert)) {  
                   $str_arr = explode (",", $gce_eduquali_insert); 
                   
       
                   foreach ($str_arr as $value) {
                       $InsertDegree = $db->insertRow('INSERT INTO sleaseduqualigce(SleasOffId ,GCELevel ) VALUE(?,?)',[$newEmpNo,$value]);
                   }
       
                   $message4 = "Employee Data inserted Successfully";
                   $status4 = true;
           }else{
               $message4 = "Enter all the details!";
               $status4 = false;
           }    
       }catch(Exception $e){
       
           $message4 = "Error Occured, ".$e;
           $status4 = false;
       }
   
   
       /////////////////////////////////////////////////////////////////
   
       try{
           if (!empty($other_eduquali_insert)) {  
              
                   $str_arr = explode (",", $other_eduquali_insert); 
                   
   
                   foreach ($str_arr as $value) {
                        $InsertDegree = $db->insertRow(' INSERT INTO sleaseduqualiother(SleasOffId ,OtherLevel ) VALUE(?,?)',[$newEmpNo,$value]); 
                   }
       
                   $message5 = "Employee Data inserted Successfully";
                   $status5 = true;
           }
       }catch(Exception $e){
       
           $message5 = "Error Occured, ".$e;
           $status5 = false;
       }
   
   
       ///////////////////////////////////////////////
   
       try{
           if (!empty($profquali_insert)) {  
                   $str_arr = explode (",", $profquali_insert); 
                   
       
                   foreach ($str_arr as $value) {
                       $InsertDegree = $db->insertRow('INSERT INTO sleasprofquali(SleasOffId ,ProfessionalLevel) VALUE(?,?)',[$newEmpNo,$value]);
                   }
       
                   $message6 = "Employee Data inserted Successfully";
                   $status6 = true;
           }
       }catch(Exception $e){
       
           $message6 = "Error Occured, ".$e;
           $status6 = false;
       }
   
   }else{
       $message2 = "Error Occured";
   }
   
   if(($status2 == true) && ($status3 == true) && ($status4 == true) && ($status5 == true) && ($status6 == true)){
       $status = true;
       $message = "Employee Data inserted Successfully";
   }else{
       $status = false;
       $message = "Error Occured";
   }
   
   $output = array ('status' => $status,'message' => $message );
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
