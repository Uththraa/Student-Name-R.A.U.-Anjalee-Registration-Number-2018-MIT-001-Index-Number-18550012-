<?php
   session_start();
   include('../include/database.php');
   $db = new database();
      
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   
   $home_update = $_POST['Secretory_empProfile_contacthome_txt'];
   $mobile_update = $_POST['Secretory_empProfile_contactmobile_txt']; 
   $office_update = $_POST['Secretory_empProfile_contactoffice_txt'];
   $email_update = $_POST['Secretory_empProfile_email_txt']; 
   $address_update = $_POST['Secretory_empProfile_address_txt']; 
   
   
   try {
       if (!empty($empNo_update)) {
   
           if (!empty($home_update) && (!empty($mobile_update)) && (!empty($office_update)) && (!empty($email_update)) &&  !empty($address_update) ) {  
               
           try{
               
               $updatetEmployeeContact = $db->updateRow(
                   'UPDATE sleasofficer SET ContactHome = ?,ContactMobile  =?,ContactOffice =?,Email =?,Address =?
                    WHERE EmpNo = ?',
                   [$home_update,$mobile_update,$office_update,$email_update,$address_update,$empNo_update]
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
