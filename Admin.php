<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/connection.php") ?>
<?php
if (isset($_SESSION["Admin_id"])) {
    $id = mysql_prep($_SESSION['Admin_id']);
    $query = "SELECT *
                FROM `admintable`                
                WHERE `id`='{$id}' LIMIT 1";
    confirm_query($query);
    $resultset = mysql_query($query, $server);
    if (mysql_num_rows($resultset) == 1) {
        $result = mysql_fetch_array($resultset);
    } else {
        
    }
    ?>
    <?php require_once ("includes/header.php") ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 text-center">
                <span class="title_blue text-uppercase">Welcome <?php echo $result["username"]; ?></span><br />

                <div class="form-group input-group col-md-8">
                    <label class="input-group-addon">Select a view: </label> 
                    <select id="choice" name="view" class="form-control">
                        <option selected="selected">-Select-</option>
                        <option>All Male students</option>
                        <option>All Female Students</option>
                        <option>All Registered Students</option>
                        <option>All Students with Incomplete O LEVEL</option>
                        <option>All Students with Jamb not up to cut-off</option>
                        <option>All Student with low CGPA for HND students</option>
                        <option>All Students that did not make their aptitude text</option>
                        <option>All Admitted Students</option>
                    </select>
                </div>
                <div id="selected_view" class="selected_view">
                    <?php
                    if (!empty($result)) {
                        
                    } else {
                        redirect_to("login.php");
                    }
                    ?>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-md-4"></div>
                <div class="well-lg  col-md-4 btn-group">
                    <a class="bg-primary btn-lg" href="index.php">Home</a>
                    <a class="bg-warning btn-lg" href="index.php">Sign Out</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <!-- end .content --> </div>
    <script type="text/javascript" src="js/compute.js"></script>
    <?php
    include("includes/footer.php");
} else {
    echo '<script>window.alert( "You Must Login First as An Admin !");
         window.location.href="Admin_login.php";</script>';
}
?>