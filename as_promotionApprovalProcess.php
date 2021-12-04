<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   
   $status = false;
   
   $id_promtion = $_POST['id_hodApproval_increment'];
   $sleasofficerid_promtion = $_POST['promo_sleasofficerid_promtion'];
   
   $class_new = $_POST['promo_class_promotin']; 
   
   $asdid_promtion = $_POST['promo_asid_promtion']; 
   $asdate_promtion = $_POST['promo_asdate_promtion'];
   
   $ASpprovalStatus_promtion = "Approved";
   $progress_promtion = "Completed";
   
   try {
       if (!empty($id_promtion)) {
           
           try{
               $updatethodapprovalTransfeer = $db->updateRow(
                   'UPDATE requestpromotion SET Progress=?,ASApprovalStatus=?,ASDate=?
                    WHERE  	Id = ?',
                   [$progress_promtion,$ASpprovalStatus_promtion,$asdate_promtion,$id_promtion]
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
   
           if (!empty($class_new) ) {  
               
                   try{
                       
                       $updatetSleasClass = $db->updateRow(
                           'UPDATE sleasofficer SET Class  = ?
                           WHERE EmpNo = ?',
                           [$class_new,$sleasofficerid_promtion]
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
