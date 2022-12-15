
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
        $id_campaign     = $_GET['id_campaign'];
        $sql    = "SELECT * FROM campaign WHERE id_campaign='$id_campaign'";
        $result = mysqli_query($conn, $sql);
        $data   = mysqli_fetch_array($result);
    ?>

    <form action="update_campaign_proc.php" method="post">
    <input type="hidden" name="id_campaign" value="<?php echo $data['id_campaign']; ?>" /><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="title">Judul:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"name="title" id="title"  value="<?php echo $data['title']; ?>" placeholder="title">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="description">Deskripsi:</label>
    <div class="col-sm-10">
    <textarea name="description" id="description" class="form-control"rows="10" ><?php echo $data['description'] ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>








