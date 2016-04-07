<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Google Plus Theme</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
          
          <a href="index.php" roll="button" style="margin-left:15px;" class="navbar-btn btn btn-warning" ></i> MusicHub <small></small></a>
          
          
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="../database/pages.php" roll='button' class="btn btn-button">Recommendation</a></li>
             <li><a href="../database/userLogout.php" roll='button' class="btn btn-button">Logout</a></li>
			 
             
           </ul>
        </div>	
     </div>	
</div>
<?php
session_start();
require('../database/config.php');
//class="form-control"
?>
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
<form action="../updateuser.php" method="POST">
   			<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Profile Edit</h4>
               <div class="form-group" style="padding:14px;">
			    Full name
                <input type="text" name="Fullname" class="form-control" value="<?php echo $_SESSION['fullname'];?>">
				User name
                <input type="text" name="Username" class="form-control" value="<?php echo $_SESSION['uname'];?>">
				Email
                <input type="text" name="Email" class="form-control" value="<?php echo $_SESSION['email'];?>">
				Address
                <input type="text" name="Address" class="form-control" value="<?php echo $_SESSION['addr'];?>">
				Date of Birth
                <input type="text" name="Date" class="form-control" value="<?php echo $_SESSION['dob'];?>">
              </div>
              <input class="btn btn-success pull-right" type="submit" value="Submit"></input><ul class="list-inline"><li></li></ul>
            </form>
        </div>
   		</form>
		</div>
		</div>
		</div>
</body>
</html>
		