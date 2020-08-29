<?php  require_once 'includes/session.php';
if (isset($_SESSION['pin'])) {
    require_once 'includes/header.php';
    ?>
    <center>
        <?php
        $imgid = urlencode($_SESSION['pin']);
        $img = "<img id=\"review\"";
        $img.= "src=\"includes/img.php?id={$imgid}\"";
        $img.="alt=\"NO PIX\" height=\"70\" width=\"63\" />";
        echo $img;
        ?>
    </center>
    <div class="bg-info text-center"
         <h2 class="text-center">Abia State Polytechnic</h2>
        <h3 class="text-center">Admission Registration Slip</h3>
    </div>
    <hr/>
    <div class="well">
        <?php
        $pin = $_SESSION['pin'];
        $query = mysql_query("
				SELECT Entry_RegNo,Surname,Othernames,ProgramType,M_Of_Study,Course,State, status
				FROM registeredstudents
				WHERE Entry_RegNo='$pin'
				", $server) or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $regnumber = $row['Entry_RegNo'];
            $names = $row['Surname'] . ' ' . $row['Othernames'];
            $program = $row['M_Of_Study'];
            $course = $row['Course'];
            $programtype = $row['ProgramType'];
            $state = $row['State'];
            $status = $row['status'];
        }
        ?>
        <strong>UTME Registration Number: </strong><?php echo $regnumber; ?><br/>
        <strong>Candidate Names: </strong><?php echo $names; ?><br/>
        <strong>Program: </strong><?php echo $program; ?><br/>
        <strong>Program Type: </strong><?php echo $programtype; ?><br/>
        <strong>Course of Study: </strong><?php echo $course; ?><br/>
        <strong>State of Origin: </strong><?php echo $state; ?><br/>
        <strong>Admission Session: </strong>2017/2018<br/>
        <strong>Date of Application: </strong><?php echo date("d-M-Y"); ?><br/>        
        <strong>Admission Status: </strong><?php echo $status; ?><br/>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            &nbsp;<br/>
            &nbsp;
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            &nbsp;<br/>
            &nbsp;
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            <button type="button" class="btn btn-info" onclick="window.print();">Print</button>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            &nbsp;<br/>
            &nbsp;
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <?php
    require_once 'includes/footer.php';
} else {
        echo '<script>window.alert( "You must login with your scratch card to view this page !");
         window.location.href="login.php";</script>';
}
?>    