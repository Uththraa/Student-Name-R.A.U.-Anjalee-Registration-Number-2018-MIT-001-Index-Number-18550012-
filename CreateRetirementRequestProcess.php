<?php
   session_start();
   include('../include/database.php');
   echo "gdsg";
   
   $db = new database();
   
   $status = false;
   
   $empName_retirement = $_POST['SLEAS_createrequest_retirements_empname_txt']; 
   $class_retirement = $_POST['SLEAS_createrequest_retirements_class_txt']; 
   $dob_retirement = $_POST['SLEAS_createrequest_retirements_dob_txt'];
   $nic_retirement = $_POST['SLEAS_createrequest_retirements_nic_txt']; 
   
   $gender_retirement = $_POST['SLEAS_createrequest_retirements_gender_txt'];
   $address_retirement = $_POST['SLEAS_createrequest_retirements_address_txt']; 
   $contactMobile_retirement = $_POST['SLEAS_createrequest_retirements_mobile_txt'];
   
   $retirementreason_retirement = $_POST['SLEAS_createrequest_retirements_retreason_txt']; 
   $retirementreqdate_retirement = $_POST['SLEAS_createrequest_retirements_retirementdate_txt'];
   
   $sleasofficeid_retirement = $_POST['Secretory_createrequest_retirement_sleasofficerid_txt'];
   $createDate_retirement = $_POST['Secretory_createrequest_increments_retirement_txt']; 
   
   $AgreementBoundStatus_retirement = "";
   $HODSalaryRecievedStatus_retirement = "";
   $AmountDue_retirement ="";
   $InquiryStatus_retirement ="";
   $HODComment_retirement = "";
   
   $HODappstatus_retirement = "";
   $hodid_retirement ="";
   $hoddate_retirement ="";
   $progress_retirement = "To HOD";
   $asappstatus_retirement ="";
   $asdate_retirement ="";
   
   
      try{
           if(!empty($empName_retirement) && (!empty($class_retirement))  && (!empty($dob_retirement))  && (!empty($nic_retirement))  && (!empty($gender_retirement))  && (!empty($address_retirement))  && (!empty($contactMobile_retirement)) && (!empty($retirementreason_retirement)) && (!empty($retirementreqdate_retirement)) && (!empty($sleasofficeid_retirement)) && (!empty($createDate_retirement)) ){            
               
                $insertEmployee = $db->insertRow('INSERT INTO requestretirement( EmployeeName, Class, DOB, NIC, Gender, Address, ContactMobile, RetirementReason, RequestRetirementDate, SLEASOfficerId, CreateDate,AgreementBoundStatus,SalaryRecievedStatus,AmountDue, InquiryStatus,Comment,HOOApprovalStatus, HODDId, HODDate, Progress, ASApprovalStatus, ASDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
               [$empName_retirement,$class_retirement,$dob_retirement,$nic_retirement,$gender_retirement,$address_retirement,$contactMobile_retirement,$retirementreason_retirement,$retirementreqdate_retirement,$sleasofficeid_retirement,$createDate_retirement,$AgreementBoundStatus_retirement,$HODSalaryRecievedStatus_retirement,$AmountDue_retirement,$InquiryStatus_retirement,$HODComment_retirement,$HODappstatus_retirement,$hodid_retirement,$hoddate_retirement,$progress_retirement,$asappstatus_retirement,$asdate_retirement
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
