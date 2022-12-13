<?php
session_start();
require_once '../partials/title-meta.php';
require_once '../../process/conn.php'
?>

<head>
    <style>
.card {
    display: inline-block;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a {
  text-decoration: none;
  font-size: 22px;
  color: white;
  display: inline-block;
  background-color: #000;
  text-align: center;
  width: 92%;
  padding: 8px;
}

button:hover, a:hover {
  opacity: 0.7;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
    </style>
</head>
<body>
<div class="navbar">
  <a href="#home">Home</a>
  <a href="profile.php?<?php echo $_SESSION['user']?>">Profile</a>
  <a href="#contact">Contact</a>
</div>


    <?php
    $sql = "SELECT bidang_campaign.id_bidang_campaign as id_bidang_campaign,nama_bidang, campaign.id_campaign as id_campaign, campaign.title as title, campaign.description as description, campaign.duration as duration,fee, company.company_name as company_name FROM campaign left JOIN company ON campaign.id_company= company.id_company LEFT JOIN bidang_campaign ON campaign.id_campaign = bidang_campaign.id_campaign LEFT JOIN bidang_keahlian on bidang_campaign.id_bidang=bidang_keahlian.id_bidang";
    $row = $conn->prepare($sql);
    $row->execute();
    $hasil = $row->fetchAll();
    $a = 1;
    foreach ($hasil as $isi) {
    ?>
<div class="card">
  <img src="https://www.westsideplaza.co.uk/wp-content/uploads/2017/07/300x300.png" alt="<?php echo $isi['title']?>">
  <h1><?php echo $isi['title']?></h1>
  <p class="title"><?php echo $isi['nama_bidang']?></p>
  <p><?php echo $isi['description']?></p>
  <p><?php 

  echo 'IDR'.' '.number_format(($isi['fee']), 2);?></p>
  <div style="margin: 24px 0;">
  </div>
  <p><a href="./apply.php?<?php echo $isi['id_bidang_campaign']?>">Apply</a></p>
</div>

</body>
    <?php
        $a++;
    }
    ?>
</div>