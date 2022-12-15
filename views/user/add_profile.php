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
<div class="main">
    <h2>ADD PROFILE</h2>
    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <form action="" method="post">
                <tbody>
                    <tr>
                        <td><label for="nama_depan">Nama Depan</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama_depan" id="nama_depan"></td>
                    </tr>
                    <tr>
                        <td><label for="nama_belakang">Nama Belakang</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama_belakang" id="nama_belakang"></td>
                    </tr>
                    <tr>
                    <td><label for="alamat_lengkap">Alamat Lengkap</label></td>
                        <td>:</td>
                        <td><input type="text" name="alamat_lengkap" id="alamat_lengkap"></td>
                    </tr>
                    <tr>
                    <td><label for="sekolah_pertama">Sekolah Pertama</label></td>
                        <td>:</td>
                        <td><input type="text" name="sekolah_pertama" id="sekolah_pertama"></td>
                    </tr>
                    <tr>
                    <td><label for="sekolah_menengah">Sekolah Menengah</label></td>
                        <td>:</td>
                        <td><input type="text" name="sekolah_menengah" id="sekolah_menengah"></td>
                    </tr>
                    <tr>
                    <td><label for="sekolah_tinggi">Sekolah Tinggi</label></td>
                        <td>:</td>
                        <td><input type="text" name="sekolah_tinggi" id="sekolah_tinggi"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Submit">
                        </td>
                    </tr>
                </tbody>
                </form>
            </table>
        </div>
    </div>
</div>