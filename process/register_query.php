<?php
session_start();
require_once 'conn.php';

if (isset($_POST['register'])) {
	try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$email = trim($_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$role = $_POST['role'];
		//Check if email exists
		$sql = "SELECT COUNT(email) AS em FROM user WHERE email =:email";
		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row['em'] > 0) {
			echo '<script>alert("Email already exists")</script>';
		} else {

			$stmt = $conn->prepare("INSERT INTO user (email, password, role) VALUES (:email, :password, :role)");
			$stmt->bindParam(':role', $role);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);



			if ($stmt->execute()) {
				echo '<script>alert("New account created.")</script>';
				//redirect to another page
				$_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
				$conn = null;
				echo '<script>window.location.replace("../../index.php")</script>';

			} else {
				echo '<script>alert("An error occurred")</script>';
			}
		}
	} catch (PDOException $e) {
		$error = "Error: " . $e->getMessage();
		echo '<script type="text/javascript">alert("' . $error . '");</script>';
	}
}




$_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
?>