<?php
    include 'include/mydbCon.php';
    $id = $_POST['id'];
    $query="SELECT * from announcement WHERE Id = '" . $id . "'";
    $result = mysqli_query($dbCon,$query);
    $cust = mysqli_fetch_array($result);
    if($cust) {
     echo json_encode($cust);
    } else {
     echo "Error: " . $sql . "" . mysqli_error($dbCon);
    }
 
?>