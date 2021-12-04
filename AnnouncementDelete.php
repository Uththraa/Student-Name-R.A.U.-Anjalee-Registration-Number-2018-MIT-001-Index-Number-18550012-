<?php
include 'include/mydbCon.php';
$id = $_POST['id'];
$query = "DELETE FROM announcement WHERE Id='" . $id . "'"; // Delete data from the table  using id
$res = mysqli_query($dbCon, $query);
if($res) {
 echo json_encode($res);
} else {
 echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
?>