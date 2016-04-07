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
<?php
session_start();
require('../database/config.php');
?>
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
   <?php
$start=$_POST['stdate'];
$end=$_POST['enddate'];
$result = $conn->prepare("SELECT * FROM concert WHERE c_time between'".$start."'and'".$end."'");
$result->execute();
while ($row = $result->fetch())
{
$cid = $row ['cid'];
$cname = $row['cname'];
$ctime = $row['c_time'];
$_SESSION['cname'] = $cname;
$aid = $row['aid'];
$result1 = $conn->prepare("SELECT * FROM artist where aid='".$aid."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$aname = $row1['a_fullname'];
					?>
					<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Concert Details<h4>
			    <ul class="list-group">
                <li class="list-group-item"><?php echo $ctime;;?></li>
                <li class="list-group-item"><?php echo $aname;?></li>
				
				</ul>
              
			  <form action='../database/schedule.php' method='POST'>
			  <input type='submit' class="btn btn-success pull-right" value='<?php echo "RSVP->".$cname; ?>' name='rsvp'> <ul class="list-inline"><li></li></ul>
              </form>
			  
			  <?php
			  echo "<a href='rate.php?id5=".$cid."'>Rate"."</a>";
			  ?>
			  
              </form>
            </form>
        </div>
   		
<?php
}
}

?>

		</div>
		</div>
		</div>
</body>
</html>