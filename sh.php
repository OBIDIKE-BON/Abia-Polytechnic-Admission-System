<?php require_once ("includes/functions.php");?>
<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/connection.php") ?>
<?php  
    $query1 = "SELECT * FROM `RegisteredStudents` 
 WHERE `No_of_Olevel_Sittings`<=2 AND `JambScore`>=180 AND `AtitudeTestScore`>=200";
    $query0 = "SELECT * FROM `registeredstudents`";
    $query2 = "SELECT * FROM `RegisteredStudents` WHERE `No_of_Olevel_Sittings`>2 OR `No_of_Olevel_Sittings`<1";
    $query3 = "SELECT * FROM `RegisteredStudents` WHERE `JambScore`<180";
    $query4 = "SELECT * FROM `RegisteredStudents` WHERE `AtitudeTestScore`<200";
    $query5 = "SELECT * FROM `RegisteredStudents` WHERE `Sex`='Male'";
    $query6 = "SELECT * FROM `RegisteredStudents` WHERE `Sex`='Female'";
    $query7 = "SELECT * FROM `RegisteredStudents` WHERE `ProgramType`='HND' AND `OND_Cgpa`<2.00";
if(isset($_POST['method'])){
$var=htmlentities($_POST['method']);
if ($var == 'All Registered Students') {
    $output = view_type($query0);
    echo $output;
} elseif ($var == 'All Students that did not make their aptitude text') {
    $output = view_type($query4);
     echo $output;
} elseif ($var == 'All Students with Jamb not up to cut-off') {
    $output = view_type($query3);
     echo $output;
} elseif ($var == 'All Male students') {
    $output = view_type($query5);
     echo $output;
} elseif ($var == 'All Female Students') {
    $output = view_type($query6);
     echo $output;
} elseif ($var == 'All Student with low CGPA for HND students') {
    $output = view_type($query7);
     echo $output;
} elseif ($var == 'All Students with Incomplete O LEVEL') {
    $output = view_type($query2);
     echo $output;
} elseif ($var == 'All Admitted Students') {
    $output = view_type($query1);
     echo $output;
}
}
?>
