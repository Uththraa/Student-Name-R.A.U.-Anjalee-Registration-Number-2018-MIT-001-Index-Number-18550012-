<?php
   session_start();
   include('../include/database.php');
   echo "gdsg";
   
   $db = new database();
   
   $status = false;
   
   $empName_increment = $_POST['SLEAS_createrequest_increments_empname_txt']; 
   $designation_increment = $_POST['SLEAS_createrequest_increments_designation_txt']; 
   $dob_increment = $_POST['SLEAS_createrequest_increments_dob_txt'];
   $nic_increment = $_POST['SLEAS_createrequest_increments_nic_txt']; 
   
   $gender_increment = $_POST['SLEAS_createrequest_increments_gender_txt'];
   $address_increment = $_POST['SLEAS_createrequest_incrementsn_address_txt']; 
   $contactMobile_increment = $_POST['SLEAS_createrequest_increments_mobile_txt'];
   
   $sleasofficeid_increment = $_POST['Secretory_createrequest_increments_sleasofficerid_txt'];
   $createDate_increment = $_POST['Secretory_createrequest_increments_currdate_txt']; 
   
   
   $HODsalrayrcievedstatus_increment = "";
   $hodinquirystatus_increment ="";
   $hodcomment_increment ="";
   $HODappstatus_increment = "";
   $hodid_increment ="";
   $hoddate_increment ="";
   $progress_increment = "To HOD";
   $asappstatus_increment ="";
   $asdate_increment ="";
   
   
      try{
           if(!empty($empName_increment) && (!empty($designation_increment))  && (!empty($dob_increment))  && (!empty($nic_increment))  && (!empty($gender_increment))  && (!empty($address_increment))  && (!empty($contactMobile_increment))  && (!empty($sleasofficeid_increment)) && (!empty($createDate_increment)) ){            
               
                $insertEmployee = $db->insertRow('INSERT INTO requestincrement( EmployeeName, Designation, DOB, NIC, Gender, Address, ContactMobile, SLEASOfficerId, CreateDate,SalaryRecievedStatus, InquiryStatus,Comment, HODApprovalStatus, HODDId, HODDate, Progress, ASApprovalStatus, ASDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
               [$empName_increment,$designation_increment,$dob_increment,$nic_increment,$gender_increment,$address_increment,$contactMobile_increment,$sleasofficeid_increment,$createDate_increment,$HODsalrayrcievedstatus_increment,$hodinquirystatus_increment,$hodcomment_increment,$HODappstatus_increment,$hodid_increment,$hoddate_increment,$progress_increment,$asappstatus_increment,$asdate_increment
               ]);  
               $message = "Request Data inserted Successfully";
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
