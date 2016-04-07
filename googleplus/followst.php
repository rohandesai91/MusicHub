<?php
error_reporting(E_ERROR);
session_start();
require('../database/config.php');
$_SESSION['uid1']=$_GET['id'];
require('../database/fetchuser.php');
?>
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
             <li><a href="../database/follow.php" roll='button' class="btn btn-button">Follow</a></li>
             <li><a href="../database/userLogout.php" roll='button' class="btn btn-button">Logout</a></li>
			 
             
           </ul>
        </div>	
     </div>	
</div>

<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
        
          
   		</form>
		 <div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   $result = $conn->prepare("SELECT post_desc FROM postuser WHERE owner_u='".$uid."'");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$postdesc = $row['post_desc'];
					echo $postdesc.'<br>';

		}
		?>
       
         					
               <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
        </div>
		<div class="panel panel-default">
           <div class="panel-heading"><h4>Music Taste</h4></div>
   			<div class="panel-body">
        <?php
require('../database/config.php');
$result = $conn->prepare("SELECT * FROM user_likes where uid='".$uid."'");
$result->execute();
if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$mid = $row['mid'];
}

$result1 = $conn->prepare("SELECT * FROM music where mid='".$mid."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$mname = $row1['mname'];

?>
<form action="../userlikes.php" method="POST">
        
			<li class="list-group-item"><?php echo $mname;?></li>
              
              <hr>
			  </form>
         <?php 
		 }
		 }
		 else 
		 echo $full."&nbsp likes no music";?>    
 
             
              
            </div>
         </div>
		 <div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   
				   $result = $conn->prepare("SELECT * FROM follows WHERE followerid='".$uid."'");
$result->execute();

if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{

$following = $row['followingid'];
		}
		
		$result1 = $conn->prepare("SELECT u_fullname FROM user WHERE uid='".$following."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$full1 = $row1['u_fullname'];
		}
		$result2 = $conn->prepare("SELECT u_fullname FROM user WHERE uid='".$_SESSION['uid']."'");
$result2->execute();
while ($row2 = $result2->fetch(PDO::FETCH_ASSOC))
{
$full2 = $row2['u_fullname'];
		}
		echo $full2."&nbsp"."follows"."&nbsp".$full1;
		}
		else
		{
		echo $full."&nbsp follows no one";
		}
		?>
       
         					
               <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
        </div>
		
		 </form>
	</div>
  	<div class="col-md-4 col-sm-6">
      	 
         

      	 
      
      	 <div class="panel panel-default">
           <div class="panel-heading"><h4>My Concert List</h4></div>
   			<div class="panel-body">
			
			<?php
$result = $conn->prepare("SELECT cid FROM scheduling where uid='".$uid."'");
$result->execute();
while ($row = $result->fetch())
{
$cid = $row['cid'];
}

$result = $conn->prepare("SELECT cname, c_time, aid FROM concert where cid='".$cid."'");
$result->execute();
while ($row = $result->fetch())
{
$cname = $row['cname'];
$ctime = $row['c_time'];
$aid = $row['aid'];
$result1 = $conn->prepare("SELECT a_fullname FROM artist where aid='".$aid."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$aname = $row1['a_fullname'];
?>
<li class="list-group-item"><?php echo $cname?></li>
<li class="list-group-item"><?php echo $ctime;?></li>
<li class="list-group-item"><?php echo $aname;?></li>
<?php
}
}
?>
              
              </ul>
            </div>
   		 </div>
		 <div class="panel panel-default">
           <div class="panel-heading"><h4>My Recommendation List</h4></div>
   			<div class="panel-body">
			<?php
require('../database/config.php');
$result = $conn->prepare("SELECT * FROM pages WHERE uid='".$uid."'");
$result->execute();
while ($row = $result->fetch())
{
$pgid = $row['pgid'];
}

$result = $conn->prepare("SELECT * FROM recommendation WHERE pgid='".$pgid."'");
$result->execute();

foreach ($result as $row) {
?>
     
			<li class="list-group-item"><?php print $row["rec_list"]."&nbsp"."->"."&nbsp".$row["cid"];?></li>
<?php			
}
?>
			
            </div>
   		 </div>
  	</div>
	
	<?php

require('../database/config.php');


?>
  	<div class="col-md-4 col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading"><h4>Profile Information</h4></div>
   			<div class="panel-body">
              <ul class="list-group">
			  <li class="list-group-item"><?php echo $full;?></li>
              <li class="list-group-item"><?php echo $uname;?></li>
              <li class="list-group-item"><?php echo $dob;?></li>
              <li class="list-group-item"><?php echo $addr;?></li>
			  <li class="list-group-item"><?php echo $email;?></li>
              </ul>
            </div>
   		</div>
		
 
        
      
    </div>
  </div><!--/row-->
