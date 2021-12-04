<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   
   $status = false;
   
   $id_transfer = $_POST['HOD_showreqdetails_id_txt']; 
   $agreementbount = $_POST['agreementbound_hodApproval_increment'];
   $salarystatus = $_POST['salarystatus_hodApproval_increment']; 
   $amountdue = $_POST['amountdue_hodApproval_increment'];
   $inquirrystatus = $_POST['inquirrystatus_hodApproval_increment'];
   $hodcomment_transfer = $_POST['hodcomment_transfer_increment'];
   
   $hodid_transfer = $_POST['hodid_hodRejected_transfer'];
   $hoddate_transfer = $_POST['hoddate_hodRejected_transfer'];
   
   $HODApprovalStatus_hodApproval_transfer = "Rejected";
   $progress_transfer = "Completed";
   
   try {
       if (!empty($id_transfer)) {
           if (!empty($agreementbount) && (!empty($salarystatus)) && (!empty($amountdue)) && (!empty($inquirrystatus)) && (!empty($hodid_transfer)) && (!empty($hoddate_transfer))) {
            
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requestretirement SET AgreementBoundStatus = ?,SalaryRecievedStatus =?,AmountDue =?,InquiryStatus  =?,Comment =?,HOOApprovalStatus=?,HODDId=?,HODDate=?,Progress=?
                    WHERE Id = ?',
                   [$agreementbount,$salarystatus,$amountdue,$inquirrystatus,$hodcomment_transfer,$HODApprovalStatus_hodApproval_transfer,$hodid_transfer,$hoddate_transfer,$progress_transfer,$id_transfer]
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
