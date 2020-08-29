<?php require_once("includes/session.php") ?>
<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
if (isset($_POST["login"])) {
    $erors = array();
    $required_fields = array('username', 'password');
    $erors = array_merge($erors, required_fields($required_fields));
    if (empty($erors)) {
        $username = mysql_prep($_POST['username']);
        $password = mysql_prep($_POST['password']);
        $query = "SELECT `id`,`username`
            FROM `admintable` 
            WHERE `password`='{$password}'
            AND `username`='{$username}' LIMIT 1";
        $resultset = mysql_query($query, $server);
        if (mysql_num_rows($resultset) == 1) {
            $foundstudent = mysql_fetch_array($resultset);
            $_SESSION['Admin_id'] = $foundstudent['id'];
            $_SESSION['User_name'] = $foundstudent['username'];
            redirect_to("Admin.php");
        } else {
             echo '<script>window.alert( "Wrong Username Or Password !");
                   window.location.href="ADmin_login.php";</script>';
        }
    } else {
        $message = "There were " . count($erors) . " error(s) in the form";
    }
} elseif (isset($_SESSION['Admin_id'])) {
    
    echo '<script>window.alert( "You Have Already Loged in Before, Please Select An Operation from Amin Tasks Menu !");
         window.location.href="Admin.php";</script>';
}//end: if (isset($_POST['login'])) {
?>
<?php require_once("includes/header.php") ?>
<div class="container">
    <?php
    if (!empty($message)) {
        echo "<div class=\"row\">"
        . "<div class=\"col-md-2\"></div>"
        . " <div class=\"well col-md-8 text-center\">"
        . "<span class=\"text-danger\">"
        . $message;
    }
    if (!empty($erors)) {
        display_errors($erors);
        echo"<span></div>"
        . "<div class=\"col-md-2\"></div>"
        . "</div>";
    }
    ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="jumbotron col-md-6 text-center">
            <div class="row">
                <h3 class="text-primary">Administrators Login Page</h3>
                <div class="col-md-12">
                    <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password"  name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="form-control btn btn-success">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4"></div> 
    </div>

    <div class="row">  
        <div class="col-md-12">
            <p>&nbsp;</p>
        </div>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <p>&nbsp;</p>
        </div>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <p></p>
        </div>
    </div>



    <div class="row">  
        <div class="col-md-4"></div> 
    </div>
</div>
<?php require_once "includes/footer.php"; ?>  