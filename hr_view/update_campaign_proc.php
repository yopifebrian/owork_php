<?php
// Include config file
require_once "config.php";
 
$id_campaign  = $_POST['id_campaign'];
$id_company  = $_POST['id_company'];
$description     = $_POST['description'];
$title           = $_POST['title'];
$duration           = $_POST['duration'];
$sql = "UPDATE campaign 
            SET description='$description', title='$title',duration='$duration',id_company='$id_company'
        WHERE id_campaign ='$id_campaign'";

mysqli_query($conn, $sql);
header('location:index.php');
