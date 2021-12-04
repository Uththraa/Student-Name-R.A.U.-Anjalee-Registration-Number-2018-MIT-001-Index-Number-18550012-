<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $id_transfer = $_POST['id_asApproval_transfer'];
   $sleasofficerid_transfer = $_POST['sleasofficerid_asApproval_transfer'];
   
   $province_transfer = $_POST['as_province_transfer']; 
   $placeofwork_transfer = $_POST['as_placeofwork_transferr']; 
   $location_transfer = $_POST['as_plocation_transfer']; 
   
   $asdid_transfer = $_POST['asid_hodApproval_transfer']; 
   $asdate_transfer = $_POST['asdate_hodApproval_transfer'];
   
   $ASpprovalStatus_hodApproval_transfer = "Approved";
   $progress_transfer = "Completed";
   
   try {
       if (!empty($id_transfer)) {
           
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requesttransfer SET Progress=?,ASApprovalStatus=?,ASDate=?
                    WHERE  	Id = ?',
                   [$progress_transfer,$ASpprovalStatus_hodApproval_transfer,$asdate_transfer,$id_transfer]
               );
               $message1 = "Data Updated Successfully";
               $status1 = true; 
           }catch(Exception $e){
   
               $message1 = "Error Occured, ".$e;
               $status1 = false; 
           }
           
       } else {
           $message1 = "Enter all the details!";
           $status1 = false; 
       }
   
   } catch (Exception $e) {
   
       echo $e . getMessage();
   }
   
       if($status1 == true){
   
           if (!empty($province_transfer) && (!empty($placeofwork_transfer)) ) {  
               
                   try{
                       
                       $updatetSleasWorkPlace = $db->updateRow(
                           'UPDATE sleasofficer SET Province  = ?,PlaceofWork   =?,Location =?
                           WHERE EmpNo = ?',
                           [$province_transfer,$placeofwork_transfer,$location_transfer,$sleasofficerid_transfer]
                       );
                       $message2 = "Data Updated Successfully";
                       $status2 = true; 
                   }catch(Exception $e){
           
                       $message2 = "Error Occured, ".$e;
                       $status2 = false; 
                   }
                 
               } else {
                   $message2 = "Enter all the details!";
                   $status2 = false; 
               }
   
       }else{
           $message2 = "Error Occured";
       }
   
       
       if(($status1 == true) && ($status2 == true) ){
           $status = true;
           $message = "updated successfully";
       }else{
           $status = false;
           $message = "Error Occured";
       }
       
   $output = array ('message' => $message , 'status' => $status);
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
