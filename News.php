<?php include("includes/header.php") ?>
<form name="login" method="post" action="login.php">
    <p align="center">USERNAME:&nbsp;<input type="text" name="username"  placeholder="username" size="50"/></p>
    <p align="center">PASSWORD:&nbsp;<input type="password" name="password"  size="50" placeholder="paassword"/></p>
    <p align="center">
        <input type="submit" name="login" value="login" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a  href="#"  id="check">Cancel</a></p>
</form>
<script  type="text/javascript" src="js/compute.js"></script>
<script  type="text/javascript" src="js/jquery.min.js"></script>
<?php include("includes/footer.php") ?>