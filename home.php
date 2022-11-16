<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
</head>
<?php
require_once 'conn.php';
session_start();
$id=$_SESSION["user"];
$stmt = $conn->prepare("SELECT * FROM member WHERE mem_id=$id LIMIT 1"); 
$stmt->execute(); 
$row = $stmt->fetch();
echo '<p class="lead">
Selamat datang di O-Work,  '.$row["firstname"].
'</p>';
echo "<table class='table table-hover '>";
echo "<thead><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Username</th></tr><thead>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tbody><tr>";
  }

  function endChildren() {
    echo "</tr></tbody>" . "\n";
  }
}
try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT mem_id, firstname, lastname, username FROM member");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
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