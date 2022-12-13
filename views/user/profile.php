<?php
session_start();
require_once '../partials/title-meta.php';
require_once '../../process/conn.php'
?>
<head>
    <style>
        .main {
    margin-top: 2%;
    margin-left: 29%;
    font-size: 28px;
    padding: 0 10px;
    width: 58%;
}

.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
}

.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    width: 80%;
}

.edit {
    position: absolute;
    color: #e7e7e8;
    right: 14%;
}
    </style>
</head>
<body>

    <?php
    $id=$_SESSION['user'];
    $sql = "SELECT * FROM profile where user_id=$id";
    $row = $conn->prepare($sql);
    $row->execute();
    $hasil = $row->fetchAll();
    $a = 1;
    foreach ($hasil as $isi) {
    ?>
        <div class="main">
            <h2>IDENTITY</h2>
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-pen fa-xs edit"></i>
                    <table>
                        <tbody>
                            <tr>
                                <td>First Name</td>
                                <td>:</td>
                                <td><?php echo $isi['nama_depan'] ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>:</td>
                                <td><?php echo $isi['nama_belakang'] ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $isi['alamat_lengkap'] ?></td>
                                </td>
                            </tr>
                            <tr>
                                <td>SMP</td>
                                <td>:</td>
                                <td><?php echo $isi['sekolah_pertama']?></td>
                            </tr>
                            <tr>
                                <td>SMA</td>
                                <td>:</td>
                                <td><?php echo $isi['sekolah_atas']?></td>
                            </tr>
                            <tr>
                                <td>Sekolah Tinggi</td>
                                <td>:</td>
                                <td><?php echo $isi['sekolah_tinggi']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>
<?php
        $a++;
    }
?>
<a href="dashboard.php">Back</a>

</body>