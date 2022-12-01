<!DOCTYPE html>
<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				 <div class="col-lg-12">
				 <br/>
				 <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
				 <table class="table table-hover table-bordered" style="margin-top: 10px">
					<tr class="success">
						<th width="50px">No</th>
						<th>email</th>
						<th>phone</th>
						<th>country</th>
						<th>linkedin</th>
						<th>porto1</th>
						<th>porto2</th>
						<th style="text-align: center;">Actions</th>
					</tr>
					 <?php
					 	require_once "./process/conn.php";
						$sql = "SELECT * FROM profile";
						$row = $conn->prepare($sql);
						$row->execute();
						$hasil = $row->fetchAll();
						$a =1;
						foreach($hasil as $isi){
					 ?>
					<tr>
						<td><?php echo $a ?></td>
						<td><?php echo $isi['email']?></td>
						<td><?php echo $isi['phone'];?></td>
						<td><?php echo $isi['country'];?></td>
						<td><?php echo $isi['linkedin'];?></td>
						<td><?php echo $isi['porto1'];?></td>
						<td><?php echo $isi['porto2'];?></td>
						<td style="text-align: center;">
							<a href="edit.php?id=<?php echo $isi['mem_id'];?>" class="btn btn-success btn-md">
							<span class="fa fa-edit"></span></a>
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="hapus.php?mem_id=<?php echo $isi['mem_id'];?>" 
							class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
						</td>
					</tr>
					<?php
						$a++;
						}
					?>
				 </table>
			  </div>
			</div>
		</div>
	</body>
</html>
<div class="col-md-9">
			<div class="table-responsive">	
				<table class="table table-bordered">
					<thead class="alert-info">
						<tr>
							<th>File Name</th>
							<th>File Type</th>
							<th>Date Uploaded</th>
							<th>File Path</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM `file`";
							$query = $conn->prepare($sql);
							$query->execute();
 
							while($fetch = $query->fetch()){
						?>
 
						<tr>
							<td><?php echo $fetch['file_name']?></td>
							<td><?php echo $fetch['file_type']?></td>
							<td><?php echo $fetch['date_uploaded']?></td>
							<td><?php echo $fetch['location']?></td>
						</tr>
 
						<?php
							}
						?>
					</tbody>
				</table>
			</div>	
		</div>
