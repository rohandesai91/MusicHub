<!DOCTYPE html>
<?php
error_reporting(E_ERROR);
session_start();
require('../database/config.php');
$_SESSION['aid']=$_GET['id'];
require('../database/fetchartist.php');
?>
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
             <li><a href="../fan.php" roll='button' class="btn btn-button">Fan</a></li>
             <li><a href="..logouta.php" roll='button' class="btn btn-button">Logout</a></li>
			 
             
           </ul>
        </div>	
     </div>	
</div>
<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
        
          
		 <div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   $result = $conn->prepare("SELECT post_desc FROM postartist WHERE owner_a='".$_SESSION['aid']."'");
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
		
		
		 </form>
	</div>
  	<div class="col-md-4 col-sm-6">
      	 
          <div class="well"> 
             <form class="form">
              <h4> Enter New Concert Details </a> </h4>
              
            </form>
          </div>

      	 
      
      	<div class="panel panel-default">
           <div class="panel-heading"><h4>Music Plays</h4></div>
   			<div class="panel-body">
        <?php
require('../database/config.php');
$result = $conn->prepare("SELECT * FROM plays where aid='".$aid."'");
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
        
			<li class="list-group-item"><?php echo $full."&nbsp plays ".$mname;?></li>
              
              <hr>
			  </form>
         <?php 
		 }
		 }
		 else 
		 echo $_SESSION['fullname']."&nbsp Has not chosen any particular kind of music";?>    
 
             
              
            </div>
         </div>
		 
  	</div>
	

  	<div class="col-md-4 col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading"><h4>Profile Information</h4></div>
   			<div class="panel-body">
              <ul class="list-group">
			  <li class="list-group-item"><?php echo $full;?></li>
              <li class="list-group-item"><?php echo $aname?></li>
              <li class="list-group-item"><?php echo $dof;?></li>
              <li class="list-group-item"><?php echo $link;?></li>
			  <li class="list-group-item"><?php echo $email;?></li>
              </ul>
            </div>
   		</div>
		     		
      
    </div>
  </div><!--/row-->