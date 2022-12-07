<?php
require_once '../partials/title-meta.php';
require_once "../../process/register_query.php";
?>
<head>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
	<div id="login-box">
	<div class="left-box">
		<h1> Daftar </h1>
    <a>Daftar sebagai</a>:<br>
    <input type="radio" name="role" id="role" value="Seeker"><label for="role">Pencari Kerja</label><br>
    <input type="radio" name="role" id="role" value="Company"><label for="role">Perusahaan</label><hr>
		<input type="email" name="email" placeholder="Email"/>
		<input type="password" name="password" placeholder="Password"/>
		<input type="password" name="password" placeholder="Re Password"/>
		<button name="login" type="submit" >Daftar</button>
	</div>

	<div class="right-box">
		<span class="signinwith"> Daftar Menggunakan<br/>Media Sosial</span>
		<button class="social facebook"> Daftar menggunakan Facebook </button>
		<button class="social twitter"> Daftar menggunakan Twitter </button>
		<button class="social google"> Daftar menggunakan Google+ </button>
	</div>
</div>
<?php
  require_once "../partials/footer.php"
  ?>