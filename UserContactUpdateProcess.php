<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_userprofile = $_POST['UserProfile_empno']; 
   $contactHome_userprofile = $_POST['UserProfile_contacthome_txt'];
   $contactMobile_userprofile = $_POST['UserProfile_contaactmobile_txt']; 
   $contactOffice_userprofile = $_POST['UserProfile_contactoffice_txt'];
   $contactEmail_userprofile = $_POST['UserProfile_Email_txt']; 
   $contactAddressHome_userprofile = $_POST['UserProfile_address_txt']; 
   
   try {
       if (!empty($empNo_userprofile)) {
           if (!empty($contactHome_userprofile) && (!empty($contactMobile_userprofile)) && (!empty($contactOffice_userprofile)) && (!empty($contactEmail_userprofile)) &&  !empty($contactAddressHome_userprofile) ) {
            
           try{
               $updatetUserConctact = $db->updateRow(
                   'UPDATE sleasofficer SET ContactHome = ?,ContactMobile =?,ContactOffice =?,Email =?,Address =?
                    WHERE EmpNo = ?',
                   [$contactHome_userprofile,$contactMobile_userprofile,$contactOffice_userprofile,$contactEmail_userprofile,$contactAddressHome_userprofile,$empNo_userprofile]
               );
               $message = "Data Updated Successfully";
               $status = true; 
           }catch(Exception $e){
   
               $message = "Error Occured, ".$e;
           }
               
   
           } else {
               $message = "Enter all the details!";
           }
       } else {
           $message = "Enter all the details!";
       }
   
   } catch (Exception $e) {
   
       echo $e . getMessage();
   }
   
   
   $output = array ('message' => $message , 'status' => $status);
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
