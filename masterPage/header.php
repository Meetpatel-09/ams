<?php
session_start();
?>

<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>Home</title>
          <!-- Sets initial viewport load and disables zooming  -->
          <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
          <!-- SmartAddon.com Verification -->
          <meta name="smartaddon-verification" content="936e8d43184bc47ef34e25e426c508fe" />
          <link rel="shortcut icon" href="favicon_16.ico"/>
          <link rel="bookmark" href="favicon_16.ico"/>
          <!-- site css -->
          <link rel="stylesheet" href="css/site.min.css">
          <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
          <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
          <!--[if lt IE 9]>
               <script src="js/html5shiv.js"></script>
               <script src="js/respond.min.js"></script>
          <![endif]-->
          <script type="text/javascript" src="js/site.min.js"></script>
     </head>

     <body style="background-color: #4A89DC;">
          <nav class="navbar navbar-default" role="navigation" style="background-color: #4FC1E9;">
          <div class="container-fluid">
               <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <?php 
                    if(isset($_SESSION['adminEmail'])) { // means Admin is logged in
               ?>
                    <a class="navbar-brand" href="adminHome.php">AMS</a>
               <?php   
                    } else if(isset($_SESSION['staffEmail'])) { 
               ?>
                    <a class="navbar-brand" href="staffHome.php">AMS</a>
               <?php
                    }  else if(isset($_SESSION['studentEmail'])) { 
               ?>
                    <a class="navbar-brand" href="studentHome.php">AMS</a>
               <?php
                    } else { 
               ?>
                    <a class="navbar-brand" href="index.php">AMS</a>
               <?php
                    }
               ?>
               </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
                    <ul class="nav navbar-nav">
                         <li <?php if($title == "Home") { ?>class="active"<?php } ?>>
                              <?php 
                                   if(isset($_SESSION['adminEmail'])) { // means Admin is logged in
                              ?>
                                   <a href="adminHome.php">Home</a>
                              <?php   
                                   } else if(isset($_SESSION['staffEmail'])) { 
                              ?>
                                   <a href="staffHome.php">Home </a>
                              <?php
                                   }  else if(isset($_SESSION['studentEmail'])) { 
                              ?>
                                   <a href="studentHome.php">Home </a>
                              <?php
                                   } else { 
                              ?>
                                   <a href="index.php">Home </a>
                              <?php
                                   }
                              ?>
                         </li>

                         <?php
                              if(!isset($_SESSION['loggedin'])) {
                         ?>

                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log In <b class="caret"></b></a>
                              <ul class="dropdown-menu" role="menu">
                                   <li><a href="loginAdmin.php">Admin</a></li>
                                   <li><a href="loginStaff.php">Staff</a></li>
                                   <li><a href="loginStudent.php">Student</a></li>
                              </ul>
                         </li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <b class="caret"></b></a>
                              <ul class="dropdown-menu" role="menu">
                                   <li><a href="staffReg.php">Staff</a></li>
                                   <li><a href="studentReg.php">Student</a></li>
                              </ul>
                         </li>

                         <?php
                              } else {
                         ?>
                         <li>
                              <a href="logout.php">Log Out</a>
                         </li>
                         <?php
                              }
                         ?>
                       </ul>
               </div>
          </div>
          </nav>