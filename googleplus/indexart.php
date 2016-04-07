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
          
          <a href="indexart.php" roll="button" style="margin-left:15px;" class="navbar-btn btn btn-warning" ></i> MusicHub <small></small></a>
          
          
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             
             <li><a href="../logouta.php" roll='button' class="btn btn-button">Logout</a></li>
			 
             
           </ul>
        </div>	
     </div>	
</div>
<?php
require('../database/config.php');
error_reporting(E_ERROR);
session_start();
include('../database/updateartist1.php');
if( !isset($_SESSION['aname'])) 
{
	header("location: ../index.html");
}
?>
<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
        
          <form action="../database/postartist.php" method="POST">
   			<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>What's New</h4>
               <div class="form-group" style="padding:14px;">
                <textarea name="post" class="form-control" placeholder="Update your status"></textarea>
              </div>
              <input class="btn btn-success pull-right" type="submit" value="Post"></input><ul class="list-inline"><li></li></ul>
            </form>
        </div>
   		</form>
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
		
   			<div class="well"> 
             
              <h4>Type of Music</h4>
              <?php
require('../database/config.php');
$result = $conn->prepare("SELECT mname FROM music");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$mname = $row['mname'];
?>
			<form class="form-horizontal" role="form" action="../database/plays.php" method="POST">
			<input type="hidden" name="like" value="<?php echo $mname; ?>">	
            <input type="submit" class="btn btn-primary center-block" style="width:150px" value ="<?php echo $mname; ?>">
              </form>
              <hr>

         <?php 
		 }?>    
             
            </form>
        </div>
   		
		 				 
	</div>
  	<div class="col-md-4 col-sm-6">
      	 
          <div class="well"> 
             <form class="form">
              <h4> Enter New Concert Details </a> </h4>
              
            </form>
          </div>

      	 
      
      	 <div class="panel panel-default">
           
   			<div class="panel-body">
			
			<?php
require('../database/config.php');
try {
    
	print '<form action="../database/concertins.php" method="POST">';
	
    print '<input type="text" style="padding:14px;" class="form-control" name="concertname" value="Enter Concert Name">';
	print '<br>';
	print '<br>';
	print '<input type="date" style="padding:14px;" name="ctime" class="form-control">';
    $sth = $conn->prepare('SELECT vname FROM location');
    $sth->execute();
    $result = $sth->fetchAll();
    print '<br>';
	print '<br>';
  if ( count($result) ) { 
    print '<select name="lname" id="your_list" class="form-control">';
    foreach ($result as $row) {
	print '<br>';
	print '<br>';
    print '<option value="'.$row['vname'].'">'.$row['vname'].'</option>';
    }
	print '</select>';
	print '<br>';
	print '<br>';
	print '<input type="submit" class="btn btn-primary" value="Enter" name="enter">';   
	} 
	else {
    echo "No rows returned.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
    print '</form>';
	?>
              
              </ul>
            </div>
   		 </div>
		 <div class="panel panel-default">
           <div class="panel-heading"><h4>Music Plays</h4></div>
   			<div class="panel-body">
        <?php
require('../database/config.php');
$result = $conn->prepare("SELECT mid FROM plays where aid='".$_SESSION['aid']."'");
$result->execute();
if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$mid = $row['mid'];
}

$result1 = $conn->prepare("SELECT mname FROM music where mid='".$mid."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$mname = $row1['mname'];

?>
<form action="../userlikes.php" method="POST">
        
			<li class="list-group-item"><?php echo $_SESSION['fullname']."&nbsp plays ".$mname;?></li>
              
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
	
	<?php

require('../database/config.php');

if( !isset($_SESSION['aname'])) 
{
	header("location: ../index.html");
}
?>
  	<div class="col-md-4 col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading"><h4>Profile Information<span style="float:right"><a href="editpra.php"><font size="4">Edit</font></a></span></h4></div>
   			<div class="panel-body">
              <ul class="list-group">
			  <li class="list-group-item"><?php echo $_SESSION['fullname'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['aname'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['dof'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['link'];?></li>
			  <li class="list-group-item"><?php echo $_SESSION['email'];?></li>
              </ul>
            </div>
   		</div>
		   			<div class="well"> 
             <form class="form-horizontal" role="form">
			 <h4> My Concert Details </h4>
		     <?php
//class="form-control"
$result = $conn->prepare("SELECT * FROM concert where aid='".$_SESSION['aid']."'");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
//echo "<br>";
$cid = $row ['cid'];
$cname = $row['cname'];
$ctime = $row['c_time'];
$aid = $row['aid'];
?>



              
			    <ul class="list-group">
                <li class="list-group-item"><?php echo $ctime;;?></li>
                <li class="list-group-item"><?php echo $cname;?></li>
				
				</ul>
              
			  <form action='../database/schedule.php' method='POST'>
			  
              </form>
			  
			  <?php
			  }
			  
			  ?>
			  
              </form>
            
        </div>
      </div>
    </div>
  </div><!--/row-->