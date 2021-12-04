<?php

if(count($_POST)>0)
{    
     include 'mydbCon.php';
     
     $Name = $_POST['Name'];
     $Username = $_POST['Username'];
     $Password = $_POST['Password'];
     $Image = $_POST['Image'];
     $UserTypeId = $_POST['UserTypeId'];


     if(empty($_POST['custId'])){
 
      $query = "INSERT INTO user (Name,Username,Password,Image,UserTypeId)
      VALUES ('$Name','$Username','$Password','$Image','$UserTypeId')"; // insert data into database

     }else{
       $query = "UPDATE user set custId='" . $_POST['custId'] . "', Name='" . $_POST['Name'] . "', Username='" . $_POST['Username'] . "', Password='" . $_POST['Password']. "', Image='" . $_POST['Image']."', UserTypeId='" . $_POST['UserTypeId'] . "' WHERE custId='" . $_POST['custId'] . "'"; // update form data from the database
     }

    $res = mysqli_query($dbCon, $query);

    if($res) {

     echo json_encode($res);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($dbCon);

    }

}

?>