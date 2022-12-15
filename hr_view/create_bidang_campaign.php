
<html>
<head>
    <title>Add Campaign</title>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
 
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">






    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="" method="post">
        <input type="hidden" name="id_company" value="<?php
        session_start();
        echo $_SESSION['user'] ;?>">
        <table width="25%" border="0">
            <tr> 
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr> 
            <tr> 
                <td>Duration</td>
                <td><input type="text" name="duration"></td>
            </tr>
            <tr> 
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
            
           
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $judul = $_POST['judul'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $id_company = $_POST['id_company'];
       
        
        // include database connection file
        require_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO campaign(title,description,duration,id_company) VALUES('$judul','$description','$duration','$id_company')");
        
        // Show message when user added
        echo "User added successfully.";
        header('location:index.php');
    }
    ?>


</div>
            </div>
        </div>
    </div>
</body>
</html>