<?php
// Include config file
require_once "config.php";
 



$id_appliance     = $_POST['id_appliance'];
$tanggal_interview     = $_POST['tanggal_interview'];
$status           = $_POST['status'];



$sql = "UPDATE appliance 
            SET status='$status', tanggal_interview='$tanggal_interview'
        WHERE id_appliance='$id_appliance'";

mysqli_query($conn, $sql);
header('location:index.php');
?>
 