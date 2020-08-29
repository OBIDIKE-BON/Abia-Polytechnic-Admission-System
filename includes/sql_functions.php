<?php

$txt = "$" . "txt";
$txt2 = "=mysql_prep($" . "_POST['";
for ($n = 0; $n <= 8; $n++) {
    for ($i = 0; $i <= 3; $i++) {
        echo $txt . $n . $i . $txt2 . 'txt' . $n . $i . "']);" . '<br />';
    }
}

function register() {
    $server = mysql_connect("localhost:3306", "root", "chideraa");
    mysql_select_db("RESULTDB", $server);
    $sqlreg = "INSERT INTO `resultTable` (`LEVEL`,`REGNO`,`SEMESTER`,
	 `COUSRSE1CODE`, `COUSRSE1SCORE`,`COUSRSE1LOAD`,`COUSRSE1GRADE`,
	 `COUSRSE2CODE`, `COUSRSE2SCORE`,`COUSRSE2LOAD`,`COUSRSE2GRADE`,
	 `COUSRSE3CODE`, `COUSRSE3SCORE`,`COUSRSE3LOAD`,`COUSRSE3GRADE`,
	 `COUSRSE4CODE`, `COUSRSE4SCORE`,`COUSRSE4LOAD`,`COUSRSE4GRADE`,
	 `COUSRSE5CODE`, `COUSRSE5SCORE`,`COUSRSE5LOAD`,`COUSRSE5GRADE`,
	 `COUSRSE6CODE`, `COUSRSE6SCORE`,`COUSRSE6LOAD`,`COUSRSE6GRADE`,
	 `COUSRSE7CODE`, `COUSRSE7SCORE`,`COUSRSE7LOAD`,`COUSRSE7GRADE`,
	 `COUSRSE8CODE`, `COUSRSE8SCORE`,`COUSRSE8LOAD`,`COUSRSE8GRADE`,
	 `COUSRSE9CODE`, `COUSRSE9SCORE`,`COUSRSE9LOAD`,`COUSRSE9GRADE`,`GP`) values
('$_POST[LEVEL]','$_POST[regno]','$_POST[SEMESTER]',
'$_POST[txt00]','$_POST[txt01]','$_POST[txt02]','$_POST[txt03]',
'$_POST[txt10]','$_POST[txt11]','$_POST[txt12]','$_POST[txt13]',
'$_POST[txt20]','$_POST[txt21]','$_POST[txt22]','$_POST[txt23]',
'$_POST[txt30]','$_POST[txt31]','$_POST[txt32]','$_POST[txt33]',
'$_POST[txt40]','$_POST[txt41]','$_POST[txt42]','$_POST[txt43]',
'$_POST[txt50]','$_POST[txt51]','$_POST[txt52]','$_POST[txt53]',
'$_POST[txt60]','$_POST[txt61]','$_POST[txt62]','$_POST[txt63]',
'$_POST[txt70]','$_POST[txt71]','$_POST[txt72]','$_POST[txt73]',
'$_POST[txt80]','$_POST[txt81]','$_POST[txt82]','$_POST[txt83]','$_POST[gpc]');";
    if (mysql_query($sqlreg, $server)) {

        echo("registered succesfully" . "<br />");
        mysql_close();
    } else {
        die('failed to register');
        ;
    }
}

register();
?>
<?php

function n() {
    $txt = "'{" . "$" . "txt";
    for ($n = 0; $n <= 8; $n++) {
        for ($i = 0; $i <= 3; $i++) {
            echo $txt . $n . $i . "}',";
        }
        echo '<br />';
    }
}

function nothing() {
    $query = "SELECT `STUDENTSN` , `FACULTY` , `CATEGORY` , `COURSE` , `SURNAME` , `OTHERNAMES` , `SEX` , `MARITALSTATUS` , `DateOfBirth` , `EMAIL` , `PHONENO` , `REGNO` , `NATIONALITY` , `STATE` , `LGA` , `TOWN` , `PARMADDRESS` , `RESIDENCE` , `DEPARTMENT` , `LEVEL` , `PICTURE`
FROM `student`
WHERE `SURNAME` = 'adigwe'
AND `REGNO` = 'fpo/nd_hnd/cs/011/0'
LIMIT 1 ; ";
}

function form_code_generator() {
    $txt = "$" . "txt";
    $txt2 = "=mysql_prep($" . "_POST['";
    for ($n = 0; $n <= 8; $n++) {
        for ($i = 0; $i <= 3; $i++) {
            echo $txt . $n . $i . $txt2 . 'txt' . $n . $i . "']);" . '<br />';
        }
    }
}

?>