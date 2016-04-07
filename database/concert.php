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
<div class="panel panel-default">
           <div class="panel-heading"><h4>My Concert List</h4></div>
   			<div class="panel-body">
			
			<?php
require('../database/config.php');
$result = $conn->prepare("SELECT cid FROM scheduling where uid='".$_SESSION['uid']."'");
$result->execute();
$ar=array();
while($row=$result->fetch())
{
$cid = $row['cid'];
array_push($ar, $cid);
}
//print_r ($ar);
$arr=array();
foreach ($ar as $conid)
{
$resulta = $conn->prepare("SELECT * FROM concert where cid='".$conid."'");
$resulta->execute();

while($row1=$resulta->fetch())
{
$cname = $row1['cname'];
$ctime = $row1['c_time'];
$arr +=[$cname=>$ctime];
}
foreach ($arr as $cname=>$ctime)
{
}?>
<li class="list-group-item"><?php echo $cname;?></li>
<li class="list-group-item"><?php echo $ctime;?></li>

<?php
}
?>

              
              </ul>
            </div>
			</div>
<?php
require('config.php');
$result = $conn->prepare("SELECT cname, c_time, aid FROM concert");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
echo "<br>";
$cname = $row['cname'];
$ctime = $row['c_time'];
$_SESSION['cname'] = $cname;
$aid = $row['aid'];
$result1 = $conn->prepare("SELECT aname FROM artist where aid='".$aid."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$aname = $row1['aname'];
echo "<br>";
echo "<br>";
echo $cname;
echo "<br>";
echo "<br>";
echo $ctime;
echo "<br>";
echo "<br>";
echo $aname;

echo "<br>";
echo "<br>";
echo "<form action='schedule.php' method='POST'>";
echo "RSVP->";
?>
<input type='submit' value='<?php echo $cname; ?>' name='rsvp'> 
<?php
}
}
echo "</form>";
?>