<?php
session_start();

include('include/database.php');
include('include/check_login.php');

$db = new database();

$hod_app_transfer = "";
$hod_prog_transfer = "To HOD";

$query1 = $db->getRow('SELECT COUNT(*) AS CountHODTransfer  
                        FROM requesttransfer
                        WHERE HODApprovalStatus  = ? AND Progress =?',[
                        $hod_app_transfer,
                        $hod_prog_transfer
                        ]);

$_SESSION['CountHODTransfer'] = $query1['CountHODTransfer'];
//$_SESSION['counthodtransfer'] = $query1['CountHODTransfer'];   

echo $_SESSION['counthodtransfer'];
?>