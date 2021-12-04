<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   $nic_update = $_POST['Secretory_empProfile_nic_txt'];
   
   try {
       if (!empty($empNo_update) && (!empty($nic_update))) {            
           try{
               $updatetEmployeeGeneral = $db->updateRow(
                   'UPDATE sleasofficer SET NIC = ?
                    WHERE EmpNo = ?',
                   [$nic_update,$empNo_update]
               );
               $message = "Data Updated Successfully";
               $status = true; 
           }catch(Exception $e){
   
               $message = "Error Occured, ".$e;
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
