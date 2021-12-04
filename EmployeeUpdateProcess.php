<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   
   $name_update = $_POST['Secretory_empProfile_name_txt'];
   $status_update = $_POST['Secretory_empProfile_status_drp']; 
   $class_update = $_POST['Secretory_empProfile_class_drp'];
   $designation_update = $_POST['Secretory_empProfile_designation_drp']; 
   $currstatus_update = $_POST['Secretory_empProfile_currstatus_drp']; 
   
   
   try {
       if (!empty($empNo_update)) {
   
           if (!empty($name_update) && (!empty($status_update)) && (!empty($class_update)) && (!empty($designation_update)) &&  !empty($currstatus_update) ) {         
           try{
               $updatetEmployeeBasics = $db->updateRow(
                   'UPDATE sleasofficer SET Name = ?,Status =?,Class =?,Designation =?,CurrentStatus =?
                    WHERE EmpNo = ?',
                   [$name_update,$status_update,$class_update,$designation_update,$currstatus_update,$empNo_update]
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
