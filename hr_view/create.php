<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    
    <br/><br/>
 
    <form action="index.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Jadwal</td>
                <td><input type="date" name="jadwal"></td>
            </tr>

            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
            
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $jadwal = $_POST['jadwal'];
        
        
        // include database connection file
        include_once("config.php");
        

                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO bidang_campaign(jadwal) VALUES('$jadwal')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>