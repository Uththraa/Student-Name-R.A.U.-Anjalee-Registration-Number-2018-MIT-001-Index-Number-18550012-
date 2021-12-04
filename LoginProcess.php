<?php
   session_start();
   include('../include/database.php');
   
   $status = false;
   $user_type="";
   
   $username = $_POST['Signin_Username_txt']; // username sent from form 
   $password = $_POST['Signin_Password_txt']; // password sent from form 
   
   if(!empty($username) && (!empty($password))){
       $db = new database();
   
       $getUserRow = $db->getRow('SELECT u.*, so.EmpNo
                                   FROM user u
                                   LEFT JOIN sleasofficer so 
                                   ON u.Id = so.UserId 
                                   WHERE u.Username =? AND u.Password=? ',[
                                   $username,
                                   $password
                                   ]);
   
       if($getUserRow > 0){
   
          $_SESSION['username'] = $getUserRow['Username'];      
          $_SESSION['LoginStatus']= "login_success";
          $_SESSION['Name'] = $getUserRow['Name'];
          $_SESSION['Id'] = $getUserRow['Id'];    
          $_SESSION['UserTypeId'] = $getUserRow['UserTypeId'];
          $_SESSION['UserEmpNo'] = $getUserRow['EmpNo'];
          $_SESSION['Image'] = $getUserRow['Image'];
           $message = "ok!";
           $status = true;
   
       }else{
           $_SESSION['UserTypeId']="";
           $message = "Invalid username or password!";
       } 
       
   }else{
       $_SESSION['UserTypeId']="";
       $message = "Enter all the details!";

   }
   
   $output = array ('message' => $message , 'status' => $status, 'user_type' => $_SESSION['UserTypeId']);
   
   echo json_encode($output,JSON_FORCE_OBJECT);
   
   
   ?>
