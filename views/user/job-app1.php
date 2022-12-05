<?php
require_once 'conn.php';
session_start();
$id = $_SESSION['user'];
$stmt = $conn->prepare("SELECT * FROM member WHERE mem_id=$id LIMIT 1"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<?php require_once '';
?>
<body>
    <div class="form-body on-top-mobile">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder simple-info">
                    <div><img src="images/graphic6.svg" alt=""></div>
                    <div><h3>We’re Accepting applications!</h3></div>
                    <div><p>Fill the form, attach your  latest CV <br>and portfolio to get listed.</p></div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form method="POST" action="job_query.php" enctype="multipart/form-data">
                            <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" value="<?php echo $row['firstname'];?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" value="<?php echo $row['lastname']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="E-mail Address" name="email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Country" name="country">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Linkedin link" name="linkedin">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Website, other links" name="porto1">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Website, other links" name="porto2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control" placeholder="Tell us about yourself.." name="about"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                                        <label class="custom-file-label" for="validatedCustomFile">CV (Resume)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-padding">
                                <div class="col-12 col-sm-6">
                                    <input type="checkbox" id="chk1" required><label for="chk1">I agree on <a href="#">terms & conditions</a> of o-work</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-button text-right">
                                        <button id="submit" name="job" class="ibtn less-padding">Submit Application</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>