<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   $status = false;
   
   $empNo_update = $_POST['Secretory_empProfile_empno_edit'];
   
   $degree_update = $_POST['Secretory_empProfile_degree_txt'];
   $gce_update = $_POST['Secretory_empProfile_gce_gce_txt']; 
   $other_update = $_POST['Secretory_empProfile_gce_other_txt'];
   
   try {
       if (!empty($empNo_update)) {        
           try{
               if(!empty($degree_update)){
                   $updatetEmployeeEduDegree = $db->insertRow('INSERT INTO sleaseducqualidegree(SleasOffId ,DegreeLevel) VALUE(?,?)',[$empNo_update,$degree_update]);           
               };
   
               if(!empty($gce_update)){                
                   $updatetEmployeeEduGCE = $db->insertRow('INSERT INTO sleaseduqualigce(SleasOffId ,GCELevel ) VALUE(?,?)',[$empNo_update,$gce_update]);
               };
   
               if(!empty($other_update)){
                   echo("tik");
                   
                   $updatetEmployeeEduOther = $db->insertRow('INSERT INTO sleaseduqualiother(SleasOffId ,OtherLevel ) VALUE(?,?)',[$empNo_update,$other_update]); 
               };
   
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
