
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>

                    <?php
        require_once 'config.php';
        $id_appliance     = $_GET['id_appliance'];
        $sql    = "SELECT tanggal_interview, id_appliance, status FROM appliance WHERE id_appliance='$id_appliance'";
        $result = mysqli_query($conn, $sql);
        $data   = mysqli_fetch_array($result);
    ?>
                    <form action="update.php" 
                    
        method="post">
        <input type="hidden" name="id_appliance" value="<?php echo $data['id_appliance']; ?>" /><br>
        <input type="text" name="status" value="<?php echo $data['status']; ?>" placeholder="status"/><br>
        <input type="datetime-local" name="tanggal_interview" value="<?php echo $data['tanggal_interview'] ?>"/><br>
       
        <br>
        
        <input type="submit" value="Kirim">
    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>








