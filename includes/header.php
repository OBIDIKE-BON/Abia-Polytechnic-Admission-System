<?php 
require_once 'includes/session.php'; 
require_once 'includes/connection.php'; 
    if(!isset($_SESSION['User_name'])){
       
    }else{
        $User_Name=$_SESSION['User_name'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->         
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->         
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->   
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <head>
        <meta name="viewport" content="width=device-width" />
        <title>ABIA STATE POLYTECHNIC ADMISSION PORTAL</title>        
        <link rel="stylesheet" href="css/bootstrap.css" 
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous"
              />
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
              crossorigin="anonymous"/>
        <link  rel="stylesheet" href="css/style2.css" type="text/css" />

    </head>
    <body> 
        <div class="container-fluid">
            <div  class="container-fluid" id="header">
                <div class="row"> 
                    <div class="col-md-2" align="center" >
                        <a href="index.html">
                            <img  class="img-responsive" src="images/logo.png"  alt="abia ploy logo" />
                        </a>
                    </div> 
                    <div class="col-md-8" align="center" >
                        <br />
                        <a href="index.php"> <h1 class="sans">ABIA STATE POLYTECHNIC, ABA</h1></a>
                    </div>
                    <div class="col-md-2" align="center">
                        <a href="index.html">
                            <img  class="img-responsive"  src="images/matric1.png"  alt="abia ploy logo" />
                        </a>
                    </div>
                </div>
            </div> 
            <!--navigation bar-->
            <nav class="navbar navbar-inverse" >
                <div class="container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"> toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <div class="navbar-header">

                        <a class="navbar-brand" href="index.php">
                            <span class="glyphicon glyphicon-home"> 
                            </span> ABIAPOLY 
                        </a>
                    </div> 
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a id="nav-item" class="nav-item" href="index.php">Home </a></li>
                            <li><a id="nav-item" class="nav-item" href="signup.php">Registration </a></li>
                            <li><a id="nav-item"  class="nav-item" href="Admin.php">Admin </a></li>
                            <li><a id="nav-item"  class="nav-item" href="Contactus.php">Contact Us </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                    Student Portal
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="my_profile.php">Check Status</a></li>
                                    <li><a href="Notification.php">Print Notification</a></li> 
                                    <li><a href="Contactus.php">Send Comment</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-right">
                            <?php if (isset($_SESSION["User_name"])) { ?>                                                                                   
                                <li class="">
                                    <a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout - <b class="badge"><?php echo $User_Name;  ?></b></a>
                                </li> 
                            <?php } else { ?>                               
                                <li><a class="btn-lg btn-primary" href="Login.php">Login</a></li>
                            <?php } ?>
                        </ul>   
                    </div>               
                </div>
            </nav>   
            <!--end of navigation bar-->
            <div  class="container-fluid">