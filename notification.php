<?php  require_once 'includes/session.php';
if (isset($_SESSION['pin'])) {
    require_once 'includes/header.php';
    ?>
    <center><img src="images/logo.png" width="80px" height="80px" alt="Oko Logo"></center>
    <div class="bg-info text-center"
        <h2 class="text-center">Abia State Polytechnic</h2>
        <h3 class="text-center text-capitalize">Admission notification  Slip</h3>
    </div>
    <hr/>
    <div class="well">
        <?php
        $pin = $_SESSION['pin'];
        $query = mysql_query("
				SELECT Entry_RegNo,Surname,Othernames,ProgramType,M_Of_Study,Course,State 
				FROM registeredstudents
				WHERE Entry_RegNo='$pin'
				",$server) or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $regnumber = $row['Entry_RegNo'];
            $names = $row['Surname'] . ' ' .  $row['Othernames'];
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
        <h4 class="text-center"><u>Instructions on Printing Registration Slip</u></h4>
        <p class="">
        <ol>
            <li>Locate the print button and print this slip.</li>
            <li>Keep it safe because you will need it during clearance.</li>
            <li>Await message from the institution for admission.</li>
            <li>If admitted, login to the portal to print Admission Slip.</li>
            <li>Goto any designated bank and pay your acceptance slip.</li>
            <li>Log into the portal, accept admission and print the admission letter.</li>
        </ol>
        </p>
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
    <div class="row">
        <div class="col-xs-6 col-md-6 text-center">
            <p>
                <strong>&copy; Abia State Polytechnic 2017</strong>
            </p>
        </div>

        <div class="col-xs-6 col-md-6 text-center">
            <p>
                <strong>Powered By 08038633503</strong>
            </p>
        </div>
    </div>
    <?php
    require_once 'includes/footer.php';
} else {
        echo '<script>window.alert( "You must login with your scratch card to view this page !");
         window.location.href="login.php";</script>';
} 