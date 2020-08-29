<?php require_once("includes/session.php") ?>
<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
if (isset($_POST["login"])) {
    $erors = array();
    $required_fields = array('card_pin', 'serial_number');
    $erors = array_merge($erors, required_fields($required_fields));
    if (empty($erors)) {
        $card_pin = mysql_prep($_POST['card_pin']);
        $serial_number = mysql_prep($_POST['serial_number']);
        $query = "SELECT *
 FROM `pinstable` 
 WHERE `pin`='{$card_pin}'
 AND `serial_number`='{$serial_number}' LIMIT 1";
        $resultset = mysqli_query($server, $query);
        if (mysqli_num_rows($resultset) == 1) {
            $foundstudent = mysqli_fetch_array($resultset);
                $_SESSION['pin'] = $foundstudent['pin'];
                $_SESSION['card_pin'] = $card_pin;
                $_SESSION['serial_number'] =$serial_number; 
                if (($foundstudent['status'] == "used")) {
                $_SESSION['status'] = $foundstudent['status'];
            }
                echo '<script>window.alert( "succesfully validated !");
                   window.location.href="index.php";</script>';
        } else {
            echo '<script>window.alert( "This Scratch Card Does Not Exist !");
                   window.location.href="login.php";</script>';
        }
    } else {
        $message = "There were " . count($erors) . " error(s) in the form";
    }
} elseif (isset($_SESSION['pin'])) {
    if ($_SESSION['status']=="used"){
    }else{
    echo '<script>window.alert( "You Have Already Been Loged in Before, Please EnterYour Details and Click Signup Button !");
         window.location.href="signup.php";</script>';
    }
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
                <h3 class="text-info">PIN LOGIN</h3>
                <div class="col-md-12">
                    <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin"> Pin</span></span>
                            <input type="text"  name="card_pin" class="form-control" placeholder="Scratch Card Pin" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"> Serial No</span></span>
                            <input type="text"  name="serial_number" class="form-control" placeholder="Serial Number" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="form-control btn btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3"></div> 
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
<!-- end of content  -->
<?php include("includes/footer.php") ?>
