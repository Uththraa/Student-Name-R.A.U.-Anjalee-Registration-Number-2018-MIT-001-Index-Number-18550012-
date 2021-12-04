<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $id_transfer = $_POST['id_asApproval_transfer'];
   
   $asdid_transfer = $_POST['asid_hodApproval_transfer']; 
   $asdate_transfer = $_POST['asdate_hodApproval_transfer'];
   
   $ASpprovalStatus_hodApproval_transfer = "Approved";
   $progress_transfer = "Completed";
   
   try {
       if (!empty($id_transfer)) {
           
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requestincrement SET Progress=?,ASApprovalStatus=?,ASDate=?
                    WHERE  	Id = ?',
                   [$progress_transfer,$ASpprovalStatus_hodApproval_transfer,$asdate_transfer,$id_transfer]
               );
               $message = "Data Updated Successfully";
               $status = true; 
           }catch(Exception $e){
   
               $message = "Error Occured, ".$e;
               $status = false; 
           }
           
       } else {
           $message = "Enter all the details!";
           $status = false; 
       }
   
   } catch (Exception $e) {
   
       echo $e . getMessage();
   }
   
       
   $output = array ('message' => $message , 'status' => $status);
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
