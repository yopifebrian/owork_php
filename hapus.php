<?php
require_once('conn.php');

$mem_id = $_GET['mem_id'];
try {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
	// sql to delete a record
	$sql = "DELETE FROM profile WHERE mem_id=$mem_id";
  
	// use exec() because no results are returned
	$conn->exec($sql);
	echo '<script>alert("Berhasil Hapus Data");window.location="home.php"</script>';
  } catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
  }
	
	?>