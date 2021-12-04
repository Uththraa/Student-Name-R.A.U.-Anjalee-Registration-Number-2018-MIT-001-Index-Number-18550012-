<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   
   $status = false;
   
   $id_transfer = $_POST['id_hodApproval_increment']; 
   $salarystatus = $_POST['salarystatus_hodApproval_increment'];
   $inquirrystatus = $_POST['inquirrystatus_hodApproval_increment']; 
   $hodcomment_transfer = $_POST['hodcomment_transfer_increment'];
   $hodid_transfer = $_POST['hodid_transfer_hodApproval_increment'];
   $hoddate_transfer = $_POST['hoddate_transfer_transfer_hodApproval_increment'];
   
   $HODApprovalStatus_hodApproval_transfer = "Approved";
   $progress_transfer = "To AS";
   
   try {
       if (!empty($id_transfer)) {
           if (!empty($salarystatus) && (!empty($inquirrystatus)) && (!empty($hodid_transfer)) && (!empty($hoddate_transfer))) {
            
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requestpromotion SET SalaryRecievedStatus = ?,InquiryStatus =?,Comment =?,SOApprovalStatus =?,SODId =?,SODate=?,Progress=?
                    WHERE Id = ?',
                   [$salarystatus,$inquirrystatus,$hodcomment_transfer,$HODApprovalStatus_hodApproval_transfer,$hodid_transfer,$hoddate_transfer,$progress_transfer,$id_transfer]
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
