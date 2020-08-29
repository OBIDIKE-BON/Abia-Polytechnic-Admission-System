<?php include("includes/header.php") ?>
<?php
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sessuser = $_SESSION['selecteduser'];
    $queryy = mysql_query("UPDATE admintable SET username='$username',password='$password' WHERE username='$sessuser'", $server);
    if ($queryy) {
        echo '<script>window.alert("User Details Updated !");
         window.location.href="admission.php";</script>';
    } else
        echo '<script>window.alert("Temporary Error !");</script>';
}
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="well-lg col-md-6 text-center">
        <div class="row">
            <h3 class="text-primary"><span class="glyphicon glyphicon-edit"></span> Edit User</h3>
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
                        $query = mysql_query("SELECT * FROM admintable WHERE username='$selecteduser'", $server);
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
                        ?>">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="text"  name="password" class="form-control" maxlength="8" value="<?php
                        if (isset($pass)) {
                            echo $pass;
                        }
                        ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="save" class="form-control btn btn-success">Save</button>
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