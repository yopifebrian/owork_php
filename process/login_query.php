<?php
require 'conn.php'; //require connection script

if(isset($_POST['login'])){  

    $email =trim($_POST['email']);
    $passwordAttempt =trim($_POST['password']);
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
       echo '<script>alert("invalid email")</script>';
    } else{
         
        //Compare and decrypt passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
             
            $_SESSION['user'] = $user['user_id'];
			header('location:views/dashboard.php');;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.]
			echo $user['password'];
            echo '<script>alert("invalid email or password")</script>';
        }
    }
    }
?>