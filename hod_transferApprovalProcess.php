<?php
   session_start();
   include('../include/database.php');
   $db = new database();
  
   
   $status = false;
   
   $id_transfer = $_POST['id_hodApproval_transfer']; 
   $hodrecoommedation_transfer = $_POST['hodrecoommedation_hodApproval_transfer'];
   $hodcomment_transfer = $_POST['hodcomment_hodApproval_transfer']; 
   $hodid_transfer = $_POST['hodid_hodApproval_transfer'];
   $hoddate_hodApproval_transfer = $_POST['hoddate_hodApproval_transfer'];
   
   $HODApprovalStatus_hodApproval_transfer = "Approved";
   $progress_transfer = "To AS";
   
   try {
       if (!empty($id_transfer)) {
           if (!empty($hodrecoommedation_transfer) && (!empty($hodid_transfer)) && (!empty($hoddate_hodApproval_transfer)) ) {
            
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requesttransfer SET HODRecommendation = ?,HODComment =?,HODApprovalStatus =?,HODId =?,HODDate =?,Progress=?
                    WHERE  	Id = ?',
                   [$hodrecoommedation_transfer,$hodcomment_transfer,$HODApprovalStatus_hodApproval_transfer,$hodid_transfer,$hoddate_hodApproval_transfer,$progress_transfer,$id_transfer]
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
