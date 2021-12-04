<?php
   session_start();
   include('../include/database.php');
   echo "jdia";
   
   $db = new database();
   
   $status = false;
   
   $empName_promotion = $_POST['SLEAS_createrequest_promotion_name_txt']; 
   $class_promotion = $_POST['SLEAS_createrequest_promotion_class_txt']; 
   $designation_promotion = $_POST['SLEAS_createrequest_promotion_designation_txt']; 
   $dob_promotion = $_POST['SLEAS_createrequest_promotion_dob_txt'];
   $nic_promotion = $_POST['SLEAS_createrequest_promotion_nic_txt']; 
   
   $gender_promotion = $_POST['SLEAS_createrequest_transform_gender_txt'];
   $address_promotion = $_POST['SLEAS_createrequest_promotion_address_txt']; 
   $contactMobile_promotion = $_POST['SLEAS_createrequest_promotion_mobile_txt'];
   
   $masterdegree_promotion = $_POST['SLEAS_createrequest_promotion_masterdegree_txt']; 
   
   $sleasofficeid_promotion = $_POST['Secretory_createrequest_promotion_sleasofficerid_txt'];
   $createDate_promotion = $_POST['Secretory_createrequest_promotion_currdate_txt']; 
   
   
   $HODsalrayrcievedstatus_promotion = "";
   $hodinquirystatus_promotion ="";
   $hodcomment_promotion ="";
   $SOappstatus_promotion = "";
   $hodid_promotion ="";
   $hoddate_promotion ="";
   $progress_promotion = "To SO";
   $asappstatus_promotion ="";
   $asdate_promotion ="";
   
   
      try{
           if(!empty($empName_promotion) && (!empty($class_promotion))  && (!empty($designation_promotion))  && (!empty($dob_promotion))  && (!empty($nic_promotion))  && (!empty($gender_promotion))  && (!empty($address_promotion))  && (!empty($contactMobile_promotion))  && (!empty($sleasofficeid_promotion)) && (!empty($createDate_promotion)) ){            
               
                $insertEmployee = $db->insertRow('INSERT INTO requestpromotion(EmployeeName, Class, Designation, DOB, NIC, Gender, Address, ContactMobile, MasterDegrees, SLEASOfficerId, CreateDate, SalaryRecievedStatus,InquiryStatus,Comment, SOApprovalStatus, SODId, SODate, Progress, ASApprovalStatus, ASDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
               [$empName_promotion,$class_promotion,$designation_promotion,$dob_promotion,$nic_promotion,$gender_promotion,$address_promotion,$contactMobile_promotion,$masterdegree_promotion,$sleasofficeid_promotion,$createDate_promotion,$HODsalrayrcievedstatus_promotion,$hodinquirystatus_promotion,$hodcomment_promotion,$SOappstatus_promotion,$hodid_promotion,$hoddate_promotion,$progress_promotion,$asappstatus_promotion,$asdate_promotion
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
