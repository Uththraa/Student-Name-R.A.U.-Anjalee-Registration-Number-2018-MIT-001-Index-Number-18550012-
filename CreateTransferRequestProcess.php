<?php
   session_start();
   include('../include/database.php');
   
   $db = new database();
   
   $status = false;
   
   $empName_transfer = $_POST['SLEAS_createrequest_transform_empname_txt']; 
   $class_transfer = $_POST['SLEAS_createrequest_transform_class_txt']; 
   $designation_transfer = $_POST['SLEAS_createrequest_transform_designation_txt']; 
   $dob_transfer = $_POST['SLEAS_createrequest_transform_dob_txt'];
   $nic_transfer = $_POST['SLEAS_createrequest_transform_nic_txt']; 
   
   $gender_transfer = $_POST['SLEAS_createrequest_transform_gender_txt'];
   $address_transfer = $_POST['SLEAS_createrequest_transform_address_txt']; 
   $contactMobile_transfer = $_POST['SLEAS_createrequest_transform_mobile_txt'];
   
   $appDate_transfer = $_POST['SLEAS_createrequest_transform_appdate_txt']; 
   $currWokPlace_transfer = $_POST['SLEAS_createrequest_transform_workingplace_txt'];
   $servicePeriodFrom_transfer = $_POST['SLEAS_createrequest_transform_servicefrom_txt']; 
   $servicePeriodTo_transfer = $_POST['SLEAS_createrequest_transform_serviceto_txt'];
   
   $province_transfer = $_POST['SLEAS_createrequest_transform_province_drp']; 
   $placeofwork_transfer = $_POST['SLEAS_createrequest_transform_emptype_drp'];
   $location_transfer = $_POST['SLEAS_createrequest_transform_location']; 
   
   $sleasofficeid_transfer = $_POST['Secretory_createrequest_transform_sleasofficerid_txt'];
   $createDate_transfer = $_POST['Secretory_createrequest_transform_currdate_txt']; 
   
   
   $hodreccom_transfer ="";
   $hodcomment_transfer = "";
   $hodappstatus_transfer = "";
   $hodid_transfer ="";
   $hoddate_transfer ="";
   $progress_transfer = "To HOD";
   $asappstatus_transfer ="";
   $asdate_transfer ="";
   
   
      try{
           if(!empty($empName_transfer) && (!empty($class_transfer))  && (!empty($designation_transfer))  && (!empty($dob_transfer))  && (!empty($nic_transfer))  && (!empty($gender_transfer))  && (!empty($address_transfer))  && (!empty($contactMobile_transfer))  && (!empty($appDate_transfer))  && (!empty($currWokPlace_transfer))  && (!empty($servicePeriodFrom_transfer)) && (!empty($servicePeriodTo_transfer)) && (!empty($province_transfer)) && (!empty($placeofwork_transfer)) && (!empty($sleasofficeid_transfer)) && (!empty($createDate_transfer)) ){            
               
                $insertEmployee = $db->insertRow('INSERT INTO requesttransfer( EmployeeName, Class, Designation, DOB, NIC, Gender, Address, ContactMobile, AppointmentDate, CurrentWorkingPlace, ServicePeriodFrom, ServicePeriodTo, Province, PlaceofWork, Location, SLEASOfficerId, CreateDate, HODRecommendation, HODComment, HODApprovalStatus, HODId, HODDate, Progress, ASApprovalStatus, ASDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
               [$empName_transfer,$class_transfer,$designation_transfer,$dob_transfer,$nic_transfer,$gender_transfer,$address_transfer,$contactMobile_transfer,$appDate_transfer,$currWokPlace_transfer,$servicePeriodFrom_transfer,$servicePeriodTo_transfer,$province_transfer,$placeofwork_transfer,$location_transfer,$sleasofficeid_transfer,$createDate_transfer,$hodreccom_transfer,$hodcomment_transfer,$hodappstatus_transfer,$hodid_transfer,$hoddate_transfer,$progress_transfer,$asappstatus_transfer,$asdate_transfer
               ]);  
               $message = " Data inserted Successfully";
               $status = true; 
           
           }else{
               $status = false;
               $message = "Enter all the details!";
           }
           
       }catch(Exception $e){
           $status = false;
           $message = "Error Occured, ".$e;
       }
       
   
   $output = array ('status' => $status,'message' => $message );
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
