<?php
   session_start();
   include('../include/database.php');
   $db = new database();
   
   
   $status = false;
   
   $annonId = $_POST['Secretory_createannoun_announ_id_txt']; // id sent from form 
   $annonHeader = $_POST['Secretory_createannoun_announ_header_txt']; // header sent from form 
   $annonBody = $_POST['Secretory_createannoun_announ_body_txt']; // body sent from form 
   
   try {
       if (empty($annonId)) {
           if (!empty($annonHeader) && (!empty($annonBody))) {
            
           try{
               $insertAnnouncement = $db->insertRow('INSERT INTO announcement(Header,Body) VALUE(?,?)',[$annonHeader,$annonBody]);
               $message = "Data Inserted Successfully";
               $status = true; 
           }catch(Exception $e){
   
               $message = "Error Occured, ".$e;
           }
               
   
           } else {
               $message = "Enter all the details!";
           }
       } else {
           if (!empty($annonHeader) && (!empty($annonBody))) {
             
               $updatetAnnouncement = $db->updateRow(
                   'UPDATE announcement SET Header = ? ,Body =?
                    WHERE Id = ?',
                   [$annonHeader, $annonBody,$annonId ]
               );
   
   
               $stmt->execute();
               if ($stmt) {
                   $message = "Data Inserted Successfully";
                   $status = true;
               } else {
                   $message = "Error Occured, insertion unsuccessful!";
                   $status = false;
               }
   
           } else {
               $message = "Enter all the details!";
           }
       }
   
   } catch (Exception $e) {
   
       echo $e . getMessage();
   }
   
   
   $output = array('message' => $message, 'status' => $status);
   
   echo json_encode($output, JSON_FORCE_OBJECT);
   
   ?>
