<?php
// Include config file
require_once "config.php";
 



$id_appliance     = $_POST['id_appliance'];
$status           = $_POST['status'];

$query  = "SELECT status FROM appliance WHERE id_appliance='$id_appliance'";
$result = mysqli_query($conn, $query);



$sql = "UPDATE appliance 
            SET status='$status'
        WHERE id_appliance='$id_appliance'";

mysqli_query($conn, $sql);
header('location:index.php');
?>
 