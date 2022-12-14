
<?php
session_start();
$id_bidang_campaign=$_GET['id_bidang_campaign'];
require_once '../partials/title-meta.php';
require_once '../../process/conn.php'
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input, textarea,[type=file] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<div class="container">
  <form action="../../process/apply_query.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_bidang_campaign" value="<?php echo $id_bidang_campaign?>">
    <div class="row">
      <div class="col-25">
        <label for="subject">Form Pengajuan</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="pesan" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Upload Resume</label>
      </div>
      <div class="col-75">
        <input type="file" id="subject" name="file" style="height:50px">
      </div>
    </div>
    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
