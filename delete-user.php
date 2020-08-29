<?php include("includes/header.php") ?>
<?php
if (isset($_POST['delete'])) {
    $sessuser = $_SESSION['selecteduser'];
    $queryy = mysql_query("DELETE FROM admintable WHERE username='$sessuser'", $server);
    if ($queryy) {
        echo '<script>window.alert("User Deleted !");
            window.location.href="Admission.php";</script>';
    } else
        echo '<script>window.alert("Temporary Error !");</script>';
}
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="jumbotron col-md-6 text-center">
        <div class="row">
            <h4 class="text-primary"> <span class="glyphicon glyphicon-remove text-primary"> Remove User</span></h4>
            <div class="col-md-12">
                <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <select name="selectuser" class="form-control" autofocus="true">
                                <?php
                                $query = mysql_query("SELECT * FROM admintable", $server);
                                while ($row = mysql_fetch_array($query)) {
                                    echo '<option>' . $row['username'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="selectbtn" class="form-control btn btn-info">Select</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['selectbtn'])) {
                        $selecteduser = $_POST['selectuser'];
                        $_SESSION['selecteduser'] = $selecteduser;
                        $query = mysql_query("SELECT * FROM admintable WHERE username= '$selecteduser'", $server);
                        while ($row = mysql_fetch_array($query)) {
                            $user = $row['username'];
                            $pass = $row['password'];
                        }
                    }
                    ?>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="username" class="form-control" maxlength="15" value="<?php
                        if (isset($user)) {
                            echo $user;
                        }
                        ?>" readonly>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="text"  name="password" class="form-control" maxlength="8" value="<?php
                        if (isset($pass)) {
                            echo $pass;
                        }
                        ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="delete" class="form-control btn btn-danger">Remove</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="reset" class="form-control btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-3"></div> 
</div>
<?php include("includes/footer.php") ?>