<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $id_transfer = $_POST['HOD_showreqdetails_id_txt'];  
   $hodid_transfer = $_POST['hodid_hodRejected_transfer'];
   $hoddate_transfer = $_POST['hoddate_hodRejected_transfer'];
   
   $HODApprovalStatus_hodApproval_transfer = "Rejected";
   $progress_transfer = "Completed";
   
   try {
       if (!empty($id_transfer)) {
           if ((!empty($hodid_transfer)) && (!empty($hoddate_transfer)) ) {
            
               try{
                   $updatethodapprovalTransfeer = $db->updateRow(
                       'UPDATE requesttransfer SET ASApprovalStatus =?,ASDate  =?,Progress=?
                       WHERE  	Id = ?',
                       [$HODApprovalStatus_hodApproval_transfer,$hoddate_transfer,$progress_transfer,$id_transfer]
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
