<?php
require_once ("includes/session.php");
 $_SESSION['Admin_id'] =1;
 $_SESSION['User_name']="admin";
if (isset($_SESSION['Admin_id'])) {
    $output="";
    $server = mysqli_connect("localhost", "root", "chideraa");
    try {
        if (!$server) {
            die('could not connect' . mysqli_error($server));
        } else {
            if (!mysqli_select_db($server,"AdmissionDataBase")) {
                $sql = ("CREATE TABLE IF NOT EXISTS `AdmissionDataBase`.`RegisteredStudents`( 
                        StudentSn INT UNSIGNED NOT NULL AUTO_INCREMENT ,
                        Surname varchar(35) NOT NULL,
                        Othernames varchar(50) NOT NULL, 
                        Sex varchar(10) NOT NULL, 
                        MaritalStatus varchar(9) NOT NULL,
                        DateOfBirth varchar(30) NOT NULL,
                        Nationality varchar(26) NOT NULL,
                        State varchar(75) NOT NULL,
                        L_G_A varchar(75) NOT NULL,
                        ParmAddress varchar(75) NOT NULL,
                        Entry_RegNo varchar(19)NOT NULL,
                        Faculty varchar(36) NOT NULL, 
                        Course varchar(30) NOT NULL, 
                        M_Of_Study varchar(15) NOT NULL,
                        No_of_Olevel_Sittings varchar(1) NOT NULL,                       
                        OND_Cgpa float(5) NOT NULL,
                        ProgramType varchar(5) NOT NULL,
                        JambScore int(3) NOT NULL,
                        AtitudeTestScore int(3) NOT NULL,
                        status varchar(15) NOT NULL,
                        Total int(3) NOT NULL,
                        Picture LONGBLOB, PRIMARY KEY(`StudentSn`,`Entry_RegNo`));");
                mysqli_query($server,"CREATE DATABASE IF NOT EXISTS `AdmissionDataBase`");
                if (mysqli_query($server, $sql)) {
                    $output.= ' database !AdmissionDataBase! creadted succesfully <br />'
                    . ' RegisteredStudents table creadted succesfully <br />';
                } else {
                    $output.= 'RegisteredStudents Table not Created Successfully <br />';
                }
                //CREATES ADMIN TABLE
                $createAdmin_table = mysqli_query($server, "CREATE TABLE IF NOT EXISTS `AdmissionDataBase`. adminTable(
                    id INT(6) NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY(id),
                    username VARCHAR(32) NOT NULL,
                    password VARCHAR(25) NOT NULL)" );

                if ($createAdmin_table) {
                    $output.='Admin Table Created Successfully <br />';
                } else {
                   $output.='Admin Table not Created Successfully <br />';
                }
                //CREATE PINS TABLE
                $createPins = mysqli_query($server, "CREATE TABLE IF NOT EXISTS `AdmissionDataBase`.pinsTable(
                    id INT(6) NOT NULL,
                    PRIMARY KEY(id),
                    serial_number VARCHAR(5) NOT NULL,
                    pin VARCHAR(8) NOT NULL,
                    status VARCHAR(8) NOT NULL
                    )");

                if ($createPins) {
                    $output.= 'Pins Table Created Successfully <br />';
                } else {
                   $output.= 'Pins Table not Created Successfully <br />';
                }
                //END CREATE COMMENTS TABLE
                //CREATE COMMENTS TABLE
                $createComments = mysqli_query($server, "CREATE TABLE IF NOT EXISTS `AdmissionDataBase`.notificationTable(
                    id INT(6) NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY(id),
                    date VARCHAR(30) NOT NULL,
                    header VARCHAR(30) NOT NULL,
                    notes VARCHAR(250) NOT NULL)");

                if ($createComments) {
                   $output.= 'Comments Table Created Successfully <br />';
                } else {
                    $output.= 'Comments Table not Created Successfully <br />';
                }
                //END CREATE COMMENTS TABLE
                // INSERT DATA INTO ADMIN TABLE
                $insertData = mysqli_query($server, "INSERT INTO `AdmissionDataBase`.`admintable`(`id`, `username`, `password`) VALUES (NULL,'admin','admin')");
                if ($insertData) {
                    $output.= 'Admin dummy data Registered Successfully <br />';
                } else {
                   $output.= 'Admin Details not Registered Successfully <br />';
                }
                //END INSERT DATA INTO ADMIN TABLE
            } else if (mysqli_select_db($server, "AdmissionDataBase")) {
               $output.= 'this database already exists <br />';
            } else {
                $output.= 'OOOPS!!!!!, there is an an unespected error <br />';
            }
        }
    } catch (Exception $e) {
        die(mysqli_error($server) . $e->getMessage());
    }
require_once ("includes/header.php");?>
<center>
<span class="bg-success text-center">
    <?php    echo $output;?>    
</span>
</center>
<?php
require_once ("includes/footer.php");
} else {
    echo '<script>window.alert( "You Must Login First as An Admin !");
         window.location.href="Admin_login.php";</script>';
}
?>
