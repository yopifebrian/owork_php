<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
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

                    session_start();
                    $user_id = $_SESSION['user'];
                    $id_campaign = $_GET['id_campaign'];
                    $sql = "SELECT * from bidang_campaign LEFT JOIN bidang_keahlian ON bidang_campaign.id_bidang=bidang_keahlian.id_bidang where id_campaign='$id_campaign'";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Nama Role</th>";
                            echo "<th>Nama Gaji</th>";
                            echo "<th>Aksi</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $a = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $a . "</td>";
                                echo "<td>" . $row['nama_bidang'] . "</td>";
                                echo "<td>" . $row['fee'] . "</td>";
                                echo "<td>";
                                echo "<a href='form_update.php?id_bidang_campaign=" . $row['id_bidang_campaign'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                                $a++;
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }


                    // Attempt select query execution 2
                    $sql = "SELECT file_name ,
                    appliance.id_appliance as id_appliance,
                    bidang_campaign.id_campaign as id_campaign, 
                    company.id_company as id_company,
                    appliance.user_id,
                    concat(nama_depan,' ',nama_belakang) as nama , 
                    sekolah_tinggi,
                     status,
                     nama_bidang,
                     file_location 
                     FROM appliance 
                     LEFT JOIN profile 
                     ON appliance.user_id=profile.user_id 
                     LEFT JOIN resume 
                     ON appliance.id_appliance=resume.id_appliance 
                     LEFT JOIN bidang_campaign 
                     ON appliance.id_bidang_campaign=bidang_campaign.id_bidang_campaign 
                     LEFT JOIN bidang_keahlian 
                     ON bidang_campaign.id_bidang=bidang_keahlian.id_bidang 
                     LEFT JOIN company ON id_company=company.id_company 
                     WHERE id_company = '$user_id' AND id_campaign = '$id_campaign'";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '  <input class="form-control" id="myInput" type="text" placeholder="Search..">';
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
                            echo "<tbody id='myTable'>";
                            $a = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $a . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nama_bidang'] . "</td>";
                                echo "<td>" . $row['sekolah_tinggi'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>";
                                echo "<a href='../upload/" . $row['file_name'] . "' title='View Resume' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='form_update.php?id_appliance=" . $row['id_appliance'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                                $a++;
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }






                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>