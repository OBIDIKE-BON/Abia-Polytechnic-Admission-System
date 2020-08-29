<?php require_once 'includes/header.php';
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysql_query("INSERT INTO admintable(username,password)VALUES('$username','$password')",$server)or die(mysql_error());
    if ($query) {
        echo '<script type="text/javascript">window.alert("User Added !");</script>';
    } else
        echo '<script type="text/javascript">window.alert("Temporary Error !");</script>';
    $close = mysql_close($server);
}
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="well-lg col-md-6 text-center">
        <div class="row">
            <h3 class="text-primary"><span class="text-primary glyphicon glyphicon-plus"></span> Add New User</h3>
            <div class="col-md-12">
                <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" required maxlength="15"  autofocus="true">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password"  name="password" class="form-control" placeholder="Password" required maxlength="8">
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" name="add" class="form-control btn btn-success">Add</button>
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
<?php require_once 'includes/footer.php';?>