<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   $prof_update = $_POST['Secretory_empProfile_prof_txt'];
   
   try {
       if (!empty($empNo_update)) {        
           try{
               if(!empty($prof_update)){
                   $updatetEmployeePorf = $db->insertRow('INSERT INTO sleasprofquali(SleasOffId ,ProfessionalLevel) VALUE(?,?)',[$empNo_update,$prof_update]);   
                   
               $message = "Data Updated Successfully";
               $status = true; 
               };
   
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
