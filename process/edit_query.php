<?php
require_once('conn.php');
	
	// berikut script untuk proses edit barang ke database 
	if(!empty($_POST['email'])){
		// menangkap data post 
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		$porto1 = $_POST['porto1'];
		$id = $_POST['mem_id'];
		
		$data[] = $email;
		$data[] = $phone;
		$data[] = $country;
		$data[] = $porto1;
		$data[] = $id;
		
		// simpan data barang
		
		$sql = 'UPDATE profile SET email=?,phone=?,country=?,porto1=? WHERE mem_id=?';
		$row = $conn->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Edit Data");window.location="home.php"</script>';
	}
	// untuk menampilkan data barang berdasarkan id barang
    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $lokasi         = '';

    $date_uploaded=date("Y-m-d");
    $location="upload/".$file_name;
    $data[] = $file_name;
    $data[] = $file_type;
    $data[] = $date_uploaded;
    $data[] = $location;
    $data[] = $id;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
        $lokasi = $location;
}

    $sql = "SELECT *FROM file WHERE mem_id= ?";
	$row = $conn->prepare($sql);
	$row->execute(array($id));
	$hasil = $row->fetch();

    if(strlen($hasil['lokasi']) && $_FILES["file"]["name"] != "")
        unlink($hasil['lokasi']);

    if($file_size < 5242880){
        if(move_uploaded_file($file_temp, $location)){
            try{
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'UPDATE file SET file_name=?,file_type=?,date_uploaded=?,location=? WHERE mem_id=?';
                $row = $conn->prepare($sql);
                $row->execute($data);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }else{
        echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
    }



?>