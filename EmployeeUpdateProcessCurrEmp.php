<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   
   $province_update = $_POST['Secretory_empProfile_provice_drp'];
   $placeofwork_update = $_POST['Secretory_empProfile_emptype_drp']; 
   $location_update = $_POST['Secretory_empProfile_location'];
   
   try {
       if (!empty($empNo_update)) {
   
           if (!empty($province_update) && (!empty($placeofwork_update)) ) {         
           try{
               $updatetEmployeeCurrEmp = $db->updateRow(
                   'UPDATE sleasofficer SET Province = ?,PlaceOfWork =?,Location =?
                    WHERE EmpNo = ?',
                   [$province_update,$placeofwork_update,$location_update,$empNo_update]
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
