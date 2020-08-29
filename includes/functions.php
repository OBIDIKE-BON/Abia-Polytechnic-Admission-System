<?php
//this file is where to store all basic functions
function view_type($selected_query) {
    $query_table = "<table border=\"0\" class=\"table table-striped details\" cellspacing=\"10\">";
    $query_table.="<tr class=\"news_date\">"
            . "<th>Surname"
            . "<th>Othernames"
            . "<th>RegNo"
            . "<th>AtitudeTest Score"
            . "<th>Cgpa"
            . "<th>Jamb Score"
            . "<th>Total "
            . "<th>No Of o'level Sittings"
            . " </tr>";
    confirm_query($selected_query);
    if ($resultsett = mysql_query($selected_query)) {
        while($res = mysql_fetch_array($resultsett)) {
            $query_table.="<tr><td>" . $res["Surname"] . "<td>" . $res["Othernames"] . "<td>" . $res["Entry_RegNo"] . "<td>" . $res["AtitudeTestScore"] . "<td>" . $res["OND_Cgpa"] . "<td>" . $res["JambScore"] . "<td>" . $res["Total"] . "<td>" . $res["No_of_Olevel_Sittings"] . "</tr>";
        }
    }
    $query_table.="</table>";
    return $query_table;
}

function mysql_prep($values) {
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists("mysql_real_escape_string"); //ie mysql>=v4.3.0
    if ($new_enough_php) {//phpv 4.3.0 or higher
        //udo the effects of magic quotes and let real_escape_sting to do the job
        if ($magic_quotes_active) {
            $values = stripslashes($values);
        }
        $values = strip_tags(trim(mysql_real_escape_string($values)));
    } else {//Before php 4.3.0
        //if magic quotes are'nt turned on yet, add slashes manully
        if (!$magic_quotes_active) {
            $values = strip_tags(trim(addslashes($values)));
        }// magic quotes allready on, then the slashes already exists
    }
    return $values;
}

function redirect_to($location = NULL) {
    if (($location != NULL)) {
        header("location: {$location}");
        exit;
    }
}

function confirm_query($result_set) {
    if (!$result_set) {
        die('database query failed' . mysql_error());
    }
}

function required_fields($wanted_fields_array) {
    $errors = array();
    foreach ($wanted_fields_array as $field_name) {
        if (!isset($_POST[$field_name]) || (($_POST[$field_name] == NULL) || $_POST[$field_name] == "")) {
            $errors[] = $field_name;
        }
    }return $errors;
}

function required_files($wanted_files_array) {
    $errors = array();
    foreach ($wanted_files_array as $file_name) {
        if (!isset($_FILES[$file_name]["name"]) || (($_FILES[$file_name]["name"] == NULL) || $_FILES[$file_name]["name"] == "")) {
            $errors[] = $file_name;
        }
    }return $errors;
}

function check_lenght($lenght) {
    $errors = array();
    foreach ($lenght as $field_name => $maxlenght) {
        if (Strlen(trim(mysql_prep($_POST[$field_name]))) > $maxlenght) {
            $errors[] = $field_name;
        }
        return $errors;
    }
}

function display_errors($error_array) {
    echo "<span class=\"text-danger\">";
    echo "Please Review the followimg fields" . "<br />";
    foreach ($error_array as $errors) {
        echo ". =>" . $errors . "<br />";
    }
    echo "</span>";
}

/* { $output = "<table align=\"center\" border=\"0\"width=\"800\" class=\"details\">";
  $output.="<tr><td> Surname:  " . " {$result['Surname']}.<td> Othernames: " . $result['Othernames'] . "</tr>";
  $output.="<tr><td> DateOfBirth:  " . " {$result['DateOfBirth']}.<td> Sex: " . $result['Sex'] . "</tr>";
  $output.="<tr><td> MaritalStatus:  "." {$result['MaritalStatus']}.<td> Nationality: " . $result['Nationality']."</tr>";
  $output.="<tr><td> Address:  " . " {$result['Address']}.<td> RegNo: " . $result['RegNo'] . "</tr>";
  $output.="<tr><td> Faculty:  " . " {$result['Faculty']}.<td> Course: " . $result['Course'] . "</tr>";
  $output.="<tr><td> Mode Of Study:  "." {$result['M_Of_Study']}.<td> ProgramType: ".$result['ProgramType']."</tr>";
  $output.="<tr><td> AtitudeTest:  " . " {$result['AtitudeTest']}.<td> Jamb: " . $result['Jamb'] . "</tr>";
  $output.="<tr><td> Cgpa:  " . " {$result['Cgpa']}.<td> Total: " . $result['Total'] . "</tr>";
  $output.="</table>";} */
?> 