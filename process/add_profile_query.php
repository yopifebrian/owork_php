<?php
session_start();
require_once 'conn.php';

if (isset($_POST['register'])) {
    try {
        $stmt = $conn->prepare("INSERT INTO user (email, password, role) VALUES (:email, :password, :role)");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);



        if ($stmt->execute()) {
            echo '<script>alert("New account created.")</script>';
            //redirect to another page
            $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
            $conn = null;
            echo '<script>window.location.replace("../../views/user/add_profile.php")</script>';
        } else {
            echo '<script>alert("An error occurred")</script>';
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        echo '<script type="text/javascript">alert("' . $error . '");</script>';
    }
}




$_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
