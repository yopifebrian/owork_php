
<?php
include "./conn.php";
   
if(isset($_POST['job'])) {
    $mem_id = $_POST['mem_id'];
    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $date_uploaded=date("Y-m-d");
    $location="upload/".$file_name;
    if($file_size < 5242880){
        if(move_uploaded_file($file_temp, $location)){
            try{
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `file`(mem_id,file_name, file_type, date_uploaded, location)  VALUES ('$mem_id','$file_name', '$file_type', '$date_uploaded', '$location')";
                $conn->exec($sql);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }else{
        echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
    }
}
?>