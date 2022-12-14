<!DOCTYPE html>
<html lang="en">
<head>
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
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Informasi Recruter</h2>
                        
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    


 // Attempt select query execution 2
 $sql = "SELECT appliance.user_id,concat(nama_depan,' ',nama_belakang) as nama , sekolah_tinggi, status,nama_bidang,file_location FROM appliance LEFT JOIN profile ON appliance.user_id=profile.user_id LEFT JOIN resume ON appliance.id_appliance=resume.id_appliance LEFT JOIN bidang_campaign ON appliance.id_bidang_campaign=bidang_campaign.id_bidang_campaign LEFT JOIN bidang_keahlian ON bidang_campaign.id_bidang=bidang_keahlian.id_bidang ";
 if($result = mysqli_query($conn, $sql)){
     if(mysqli_num_rows($result) > 0){
         echo "<table class='table table-bordered table-striped'>";
             echo "<thead>";
                 echo "<tr>";
                     echo "<th>#</th>";
                     echo "<th>Nama</th>";
                     echo "<th>Nama Bidang</th>";
                     echo "<th>sekolah_tinggi</th>";
                     echo "<th>Status</th>";
                     echo "<th>Resume</th>";
                     
                     echo "<th>Action</th>";
                 echo "</tr>";
             echo "</thead>";
             echo "<tbody>";
             while($row = mysqli_fetch_array($result)){
                 echo "<tr>";
                     echo "<td>" . $row['user_id'] . "</td>";
                     echo "<td>" . $row['nama'] . "</td>";
                     echo "<td>" . $row['nama_bidang'] . "</td>";
                     echo "<td>" . $row['sekolah_tinggi'] . "</td>";
                     

                     echo "<td>" . $row['status'] . "</td>";
                     echo "<td>" ;
                     echo "<a href='read.php?id=". $row['user_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                     echo"</td>";
                     echo "<td>";
                         
                         echo "<a href='form_update.php?id=". $row['user_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                         
                     echo "</td>";
                 echo "</tr>";
             }
             echo "</tbody>";
         echo "</table>";
         // Free result set
         mysqli_free_result($result);
     } else{
         echo "<p class='lead'><em>No records were found.</em></p>";
     }
 } else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
 }






                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>