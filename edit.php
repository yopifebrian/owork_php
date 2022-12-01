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
	$id = $_GET['id'];
	$sql = "SELECT *FROM profile WHERE mem_id= ?";
	$row = $conn->prepare($sql);
	$row->execute(array($id));
	$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Data - <?php echo $hasil['email'];?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Edit Data - <?php echo $hasil['email'];?></h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>email</label>
							 <input type="text" value="<?php echo $hasil['email'];?>" class="form-control" name="email">
						 </div>
						 <div class="form-group">
							 <label>phone</label>
							 <input type="number" value="<?php echo $hasil['phone'];?>" class="form-control" name="phone">
						 </div>
						 <div class="form-group">
							 <label>country</label>
							 <input type="text" value="<?php echo $hasil['country'];?>" class="form-control" name="country">
						 </div>
						 <div class="form-group">
							 <label>porto1</label>
							 <input type="text" value="<?php echo $hasil['porto1'];?>" class="form-control" name="porto1">
						 </div>
						 <input type="hidden" value="<?php echo $hasil['mem_id'];?>" name="mem_id">
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>
	