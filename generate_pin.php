<?php include("includes/header.php") ?>
<?php
if (isset($_SESSION["Admin_id"])) {
    $pin[1] = mt_rand(1000000000, 9999999999);
    $pin[2] = mt_rand(1000000000, 9999999999);
    $pin[3] = mt_rand(1000000000, 9999999999);
    $pin[4] = mt_rand(1000000000, 9999999999);
    $pin[5] = mt_rand(1000000000, 9999999999);
    $pin[6] = mt_rand(1000000000, 9999999999);
    $pin[7] = mt_rand(1000000000, 9999999999);
    $pin[8] = mt_rand(1000000000, 9999999999);
    $pin[9] = mt_rand(1000000000, 9999999999);
    $pin[10] = mt_rand(1000000000, 9999999999);

    $snumber[1] = mt_rand(1000000000, 9999999999);
    $snumber[2] = mt_rand(1000000000, 9999999999);
    $snumber[3] = mt_rand(1000000000, 9999999999);
    $snumber[4] = mt_rand(1000000000, 9999999999);
    $snumber[5] = mt_rand(1000000000, 9999999999);
    $snumber[6] = mt_rand(1000000000, 9999999999);
    $snumber[7] = mt_rand(1000000000, 9999999999);
    $snumber[8] = mt_rand(1000000000, 9999999999);
    $snumber[9] = mt_rand(1000000000, 9999999999);
    $snumber[10] = mt_rand(1000000000, 9999999999);

    if (isset($_POST['submitpins'])) {
        $query = mysqli_query($server, "SELECT * FROM pinstable" );
        if (mysqli_num_rows($query) == 0) {
            $insert = mysqli_query($server, "
                INSERT INTO pinstable(id,serial_number,pin,status)
                VALUES
                ('1','$snumber[1]','$pin[1]','not used'),
                ('2','$snumber[2]','$pin[2]','not used'),
                ('3','$snumber[3]','$pin[3]','not used'),
                ('4','$snumber[4]','$pin[4]','not used'),
                ('5','$snumber[5]','$pin[5]','not used'),
                ('6','$snumber[6]','$pin[6]','not used'),
                ('7','$snumber[7]','$pin[7]','not used'),
                ('8','$snumber[8]','$pin[8]','not used'),
                ('9','$snumber[9]','$pin[9]','not used'),
                ('10','$snumber[10]','$pin[10]','not used')
                ");
            if ($insert) {
                echo '<script>
                    window.alert("Pins Submitted Successfully");
                    window.location.href="index.php";</script>';
            } else
                echo '<script>window.alert("Pins not Submitted Successfully' . mysqli_error($server) . '");</script>';
        } else
            echo '<script>window.alert("Already Generated  before now\n '
            . 'please exhuzt the pins before generating another one' . mysqli_error($server) . '");
           window.location.href="index.php"; </script>';
    }
    ?>

    <form class="form" method="post" action="<?php $_PHP_SELF; ?>">
        <table class="table table-bordered">
            <thead>
                <tr class="label-info">
                    <th>ID</th><th>Serial Number</th><th>PIN</th>
                </tr>
            </thead>
            <div class="row">
                <div class="col-md-1">
                    &nbsp;
                </div>
                <div class="col-md-10">
                    <h2 class="well well-sm text-center text-info">Admission Registration Pins</h2>
                </div>
                <div class="col-md-1">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    &nbsp;
                </div>
            </div>

            <?php
            echo '<tbody>';
            echo '<tr>';
            echo '<td>1</td><td>' . $snumber[1] . '</td><td>' . $pin[1] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>2</td><td>' . $snumber[2] . '</td><td>' . $pin[2] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>3</td><td>' . $snumber[3] . '</td><td>' . $pin[3] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>4</td><td>' . $snumber[4] . '</td><td>' . $pin[4] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>5</td><td>' . $snumber[5] . '</td><td>' . $pin[5] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>6</td><td>' . $snumber[6] . '</td><td>' . $pin[6] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>7</td><td>' . $snumber[7] . '</td><td>' . $pin[7] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>8</td><td>' . $snumber[8] . '</td><td>' . $pin[8] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>9</td><td>' . $snumber[9] . '</td><td>' . $pin[9] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>10</td><td>' . $snumber[10] . '</td><td>' . $pin[10] . '</td>';
            echo '</tr>';
            ?>
        </table>

        <div class="form-group col-md-6">
            <button type="submit" name="submitpins" class="form-control btn btn-primary">Save to Database</button>
        </div>
        <div class="form-group col-md-6">
            <button type="button" class="form-control btn btn-warning" onclick="location.reload()">Re-Generate Pins</button>
        </div>
    </form>       
    <?php
    include("includes/footer.php");
} else {
    echo '<script>window.alert( "You Must Login First as An Admin !");
         window.location.href="Admin_login.php";</script>';
}
?>

