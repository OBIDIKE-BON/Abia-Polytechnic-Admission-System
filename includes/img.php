<?php require_once("session.php");?>
<?php header("Content-type: image/jpeg") ?>
<?php require_once("connection.php");?>
<?php
 if(isset($_GET["id"]) && isset($_SESSION['pin'])) {
   $id = $_GET["id"];
    $query = "SELECT `PICTURE` FROM `RegisteredStudents` WHERE `Entry_RegNo`={$id} LIMIT 1";  
	  if ($resultset = mysql_query($query, $server)) {
        if (isset($resultset)) {
            echo mysql_result($resultset, 0);
        }
    }
 }else{
  header("location: ../login.php");
}
  mysql_close($server);
?>

