<?php
if(count($_POST)>0)
{    
      include 'include/mydbCon.php';
     
     $Header = $_POST['Header'];
     $Body = $_POST['Body'];
     if(empty($_POST['Id'])){
 
      $query = "INSERT INTO announcement (Header,Body)
      VALUES ('$Header','$Body')"; // insert data into database
     }else{
       $query = "UPDATE announcement set Id='" . $_POST['Id'] . "', Header='" . $_POST['Header'] . "', Body='" . $_POST['Body'] . "' WHERE Id='" . $_POST['Id'] . "'"; // update form data from the database
     }
    $res = mysqli_query($dbCon, $query);
    if($res) {
     echo json_encode($res);
    } else {
     echo "Error: " . $sql . "" . mysqli_error($dbCon);
    }
}
?>