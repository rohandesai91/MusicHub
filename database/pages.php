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
             <li><a href="../database/userLogout.php" roll='button' class="btn btn-button">Logout</a></li>
			 
             
           </ul>
        </div>	
     </div>	
</div>
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
<?php
require('config.php');
session_start();
$result = $conn->prepare("SELECT * FROM concert");
$result->execute();
$registerquery ="insert into pages (uid) VALUES(:uid);";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':uid' => $_SESSION['uid']));
 ?>
		<div class="well"> 
		<form action='../database/reclist.php' method='POST'>
		<?php
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$cname = $row['cname'];
$cid = $row['cid'];
?>
             <form class="form-horizontal" role="form">
              <h4>Concert Details<h4>
			    <ul class="list-group">
                <li class="list-group-item"><?php echo $cname;?></li>
                <li class="list-group-item"><input name='checkbox[]' id='checkbox[]' type='checkbox' value='<?php echo $row['cid'];?>'></li>
				<input type='text' name='lname'>
				<input type='submit' value='submit'>
				</ul>
              
			  <input type='submit' class="btn btn-success pull-right" value='<?php echo "RSVP->".$cname; ?>' name='rsvp'> <ul class="list-inline"><li></li></ul>
              </form>
			   
			   <?
}
?>
</form>
</div>
</div>
		</div>
		</div>
</body>
</html>
		
