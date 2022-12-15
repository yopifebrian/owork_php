
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
        $id_bidang_campaign  = $_GET['id_bidang_campaign'];
        $sql    = "SELECT id_bidang_campaign, nama_bidang, fee FROM bidang_campaign LEFT JOIN bidang_keahlian ON bidang_campaign.id_bidang=bidang_keahlian.id_bidang WHERE id_bidang_campaign='$id_bidang_campaign'";
        $result = mysqli_query($conn, $sql);
        $data   = mysqli_fetch_array($result);
    ?>
                    <form action="update.php" 
                    
        method="post">
        <input type="hidden" name="id_bidang_campaign" value="<?php echo $data['id_bidang_campaign']; ?>" /><br>
        <input type="text" name="nama_bidang" value="<?php echo $data['nama_bidang']; ?>"/><br>
        <input type="number" name="fee" value="<?php echo $data['fee']; ?>"/><br>
       
        <br>
        
        <input type="submit" value="Kirim">
    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>