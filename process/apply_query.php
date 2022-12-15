
<?php
session_start();
require_once 'conn.php';
if (isset($_POST['pesan'])) {
    $id_appliance = uniqid();
    $name=$_FILES['file']['name'];
    $file_type = strtolower(pathinfo($name,PATHINFO_EXTENSION));
    $file_name = $id_appliance.'.'.$file_type;
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];

    $file_location = "/xampp/htdocs/owork_php/upload/" . $file_name;
   
    $pesan     = $_POST['pesan'];
    $id_bidang_campaign = $_POST['id_bidang_campaign'];
    $user_id = $_SESSION['user'];
    
    if ($file_size < 5242880) {
        if (move_uploaded_file($file_temp, $file_location)) {
            try {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `appliance`(id_appliance, status, pesan, user_id, id_bidang_campaign)  VALUES ('$id_appliance','DIPROSES', '$pesan', '$user_id','$id_bidang_campaign')";
                $conn->exec($sql);
                echo $sql;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            try {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `resume`(file_name, file_type, file_location, id_appliance)  VALUES ('$file_name', '$file_type', '$file_location', '$id_appliance')";
                $conn->exec($sql);
                header('location:../views/user/dashboard.php');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } else {
        echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
    }
}
?>