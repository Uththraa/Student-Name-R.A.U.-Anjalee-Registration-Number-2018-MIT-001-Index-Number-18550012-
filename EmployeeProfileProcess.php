<?php
   session_start();
   include('../include/database.php');
   
   $status = false;
   
   $empNoSearch = $_POST['Secretory_empProfile_search_txt']; // employee_no sent from form 
   
   
   if(!empty($empNoSearch) ){
       $db = new database();   
   
        $getUserRow = $db->getRow('SELECT *
                                   FROM sleasofficer 
                                   WHERE EmpNo =? ',[ $empNoSearch ]);
    
        $getDegreeQuliRows = $db->getRows('SELECT DegreeLevel
                                   FROM sleaseducqualidegree 
                                   WHERE SleasOffId = ? ',[
                                   $empNoSearch
                                   ]); 
   
       $degreearr  = array ();
       if($getDegreeQuliRows < 0){
           $degreearr[] = ["-"];
       }else{
          
           foreach($getDegreeQuliRows as $data1){
               $degreearr[] = $data1['DegreeLevel'];
       
           }
       }
     
   
       $getGCEQuliRow = $db->getRows('SELECT *
                                       FROM sleaseduqualigce 
                                       WHERE SleasOffId = ? ',[
                                       $empNoSearch
                                       ]); 
                                       
       $gcearr  = array ();
       if($getGCEQuliRow < 0){
           $gcearr[] = ["-"];
       }else{
           
           foreach($getGCEQuliRow as $data2){
               $gcearr[] = $data2['GCELevel'];
           } 
       }                                
   
       $getOtherQuliRow = $db->getRows('SELECT *
                                       FROM sleaseduqualiother 
                                       WHERE SleasOffId = ? ',[
                                       $empNoSearch
                                       ]);  
   
       $otherarr  = array ();
       if($getOtherQuliRow < 0){
           $otherarr[] = ["-"];
       }else{
           
           foreach($getOtherQuliRow as $data3){
               $otherarr[] = $data3['OtherLevel'];
           } 
       }                                
         
       $getProfQuliRow = $db->getRows('SELECT *
                                       FROM sleasprofquali 
                                       WHERE SleasOffId = ? ',[
                                       $empNoSearch
                                       ]);
   
       $profarr  = array ();
       if($getProfQuliRow < 0){
           $profarr[] = ["-"];
       }else{
           
           foreach($getProfQuliRow as $data4){
               $profarr[] = $data4['ProfessionalLevel'];
           } 
       }  
                              
   
       if($getUserRow > 0){        
   
           $empNO_empPro = $getUserRow['EmpNo']; 
           $status_empPro = $getUserRow['Status'];
           $name_empPro = $getUserRow['Name']; 
           $class_empPro = $getUserRow['Class']; 
           $designation_empPro = $getUserRow['Designation']; 
           $currStatus_empPro = $getUserRow['CurrentStatus'];
           //$image_empPro = $getUserRow['Image'];
           
           $nic_empPro = $getUserRow['NIC'];
           $dob_empPro = $getUserRow['DOB'];
           $gender_empPro = $getUserRow['Gender'];
   
           $category_empPro = $getUserRow['Category']; 
           $appDate_empPro = $getUserRow['AppointmentDate']; 
           $cadreType_empPro = $getUserRow['CadreType']; 
           $speSub_empPro = $getUserRow['SpecialSubject'];
   
           $province_empPro = $getUserRow['Province']; 
           $placeofwork_empPro = $getUserRow['PlaceOfWork']; 
           $location_empPro = $getUserRow['Location']; 
   
           $homeContact_empPro = $getUserRow['ContactHome']; 
           $mobileContact_empPro = $getUserRow['ContactMobile']; 
           $officeContact_empPro = $getUserRow['ContactOffice']; 
           $email_empPro = $getUserRow['Email']; 
           $address_empPro = $getUserRow['Address']; 
          
           $message = "ok!";
           $status = true;
   
           
   
       }else{
           $message = "Invalid Employee Number!";
       } 
       
   }else{
       $message = "Enter Employee Number to search...";
   }
   $output = array ('message' => $message , 
   'status' => $status,
   'empNO_empPro' => $empNO_empPro,
   'status_empPro' => $status_empPro,
   'name_empPro' => $name_empPro,
   'class_empPro' => $class_empPro,
   'designation_empPro' => $designation_empPro, 
   'currStatus_empPro' => $currStatus_empPro, 
   //'image_empPro' => $image_empPro,
   'nic_empPro' => $nic_empPro,
   'dob_empPro' => $dob_empPro, 
   'gender_empPro' => $gender_empPro, 
   'category_empPro' => $category_empPro,
   'appDate_empPro' => $appDate_empPro,
   'cadreType_empPro' => $cadreType_empPro,
   'speSub_empPro' => $speSub_empPro, 
   'province_empPro' => $province_empPro,
   'placeofwork_empPro' => $placeofwork_empPro,
   'location_empPro' => $location_empPro, 
   'homeContact_empPro' => $homeContact_empPro,
   'mobileContact_empPro' => $mobileContact_empPro,
   'officeContact_empPro' => $officeContact_empPro,
   'email_empPro' => $email_empPro, 
   'address_empPro' => $address_empPro,
   'degreearr' => $degreearr,
   'gcearr' => $gcearr,
   'otherarr' => $otherarr,
   'profarr' => $profarr
   );
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   ?>
