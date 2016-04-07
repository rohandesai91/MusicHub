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
             <li><a href="pages.php" roll='button' class="btn btn-button">Recommendation</a></li>
             <li><a href="../database/userLogout.php" roll='button' class="btn btn-button">Logout</a></li>
			 		  					  
			</ul>
        </div>	
     </div>	
</div>
<?php
require('../database/config.php');

error_reporting(E_ERROR);
session_start();
include('../database/updateuser1.php');
if( !isset($_SESSION['uname'])) 
{
	header("location: ../index.html");
}
?>
<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
        
          <form action="../database/postuser.php" method="POST">
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
              <h4>My Posts</h4>
               </form>
		 <div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   $result = $conn->prepare("SELECT post_desc FROM postuser WHERE owner_u='".$_SESSION['uid']."'");
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
        </div>
		<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Follows</h4>
               </form>
		<div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   
				   $result = $conn->prepare("SELECT * FROM follows WHERE followerid='".$_SESSION['uid']."'");
$result->execute();
$afo=array();
if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{

$following = $row['followingid'];
array_push($afo, $following);
		}
		$arrfo=array();
		foreach($afo as $following1)
		{
		$result1 = $conn->prepare("SELECT u_fullname FROM user WHERE uid='".$following1."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$full1 = $row1['u_fullname'];
array_push($arrfo, $full1);
		}
		}
		$arful=array();
		foreach($arrfo as $rtw)
		{
		echo $_SESSION['fullname']."&nbsp"."follows"."&nbsp".$rtw."<br>";
		}
		}
		else
		{
		echo $_SESSION['fullname']."&nbsp follows no one";
		}
		?>
       
         					
               <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
			</div>
        </div>
		<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Fans</h4>
               </form>
				<div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   
				   $result = $conn->prepare("SELECT * FROM fan_of WHERE uid='".$_SESSION['uid']."'");
$result->execute();
$arf=array();
$arff=array();
if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$aid = $row['aid'];
array_push($arf, $aid);
		}
		foreach($arf as $aid1)
		{
		$result1 = $conn->prepare("SELECT * FROM artist WHERE aid='".$aid1."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$full1 = $row1['a_fullname'];
array_push($arff, $full1);
		}
		}
		foreach($arff as $full2)
		{
		echo $_SESSION['fullname']."&nbsp"."is a fan of"."&nbsp".$full2."<br>";
		}
		}
		else
		echo $_SESSION['fullname']."&nbsp is a fan of none";
		?>
       
         					
               <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
			</div>
        </div>
<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Newsfeed</h4>
               </form>
        
		 <div class="well"> 
             <form class="form-horizontal" role="form">
		           <?php 
				   require('../database/config.php');
				   

				   $result = $conn->prepare("SELECT * FROM follows WHERE followerid='".$_SESSION['uid']."'");
$result->execute();

if ($result->rowCount() > 0)
{

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$uid1 = $row['followingid'];
		}
		$resultm = $conn->prepare("SELECT * FROM user WHERE uid='".$uid1."'");
$resultm->execute();
while ($rowm = $resultm->fetch(PDO::FETCH_ASSOC))
{
$uname1 = $rowm['u_fullname'];
		}

				   $result1 = $conn->prepare("SELECT post_desc FROM postuser WHERE owner_u='".$uid1."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$postdesc1 = $row1['post_desc'];
					echo $postdesc1.'<br>';

		}
		
$result2 = $conn->prepare("SELECT * FROM user_likes where uid='".$uid1."'");
$result2->execute();
while ($row2 = $result2->fetch(PDO::FETCH_ASSOC))
{
$midf = $row2['mid'];
}

$result3 = $conn->prepare("SELECT * FROM music where mid='".$midf."'");
$result3->execute();
$count=$result3->rowCount();
while ($row3 = $result3->fetch(PDO::FETCH_ASSOC))
{
$mname1 = $row3['mname'];

	echo $uname1."&nbsp"."likes"."&nbsp".$mname1;
		?>
		
		<?php
		
		}
		$result5 = $conn->prepare("SELECT * FROM fan_of WHERE uid='".$uid1."'");
$result5->execute();


while ($row5 = $result5->fetch(PDO::FETCH_ASSOC))
{
$aid5 = $row5['aid'];
		}
		$result6 = $conn->prepare("SELECT * FROM artist WHERE aid='".$aid5."'");
$result6->execute();
while ($row6 = $result6->fetch(PDO::FETCH_ASSOC))
{
$full1 = $row6['a_fullname'];
		}
		echo "<br>";
		echo $uname1."&nbsp"."is a fan of"."&nbsp".$full1;
		}
		
		else
		{
		echo "<br>";
		echo $_SESSION['fullname']."&nbsp has nothing to show!!";
		}
		?>
       
         					
               <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
        </div>
		</div>
		<div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>Suggestions</h4>
               </form>
        
		 <div class="well"> 
             <form class="form-horizontal" role="form">
			 <?php
			 require('../database/config.php');
$registerquery ="select c.cname from concert c, user u, user_likes ul, recommendation r, plays p, music m where u.uid='".$_SESSION['uid']."' and u.uid=ul.uid and ul.mid=p.mid and p.aid=c.aid and c.cid=r.cid group by(c.cid) having count(r.cid)>1";
$q=$conn->prepare($registerquery);
$q->execute();
$c=$q->rowCount();
if($c>0)
{
while($row=$q->fetch(PDO::FETCH_ASSOC))
{
echo $row['cname']."<br>";
}
}
else
echo "No Suggestions to show!!";
?>
		 <div class="form-group" style="padding:14px;">
                
              </div>
              
            </form>
        </div>
		</div>
	</div>
  	<div class="col-md-4 col-sm-6">
      	 <div class="well"> 
             <form method="post" action="../search.php">
 <input type="text" name="uname" class = "form-control" id="uname"  autocomplete="off" value="User Search">
 <input type="submit" class="btn btn-primary" value="Search"></li>
</form>
          </div>
		 
<div class="well">
<form method="post" action="../atsearch.php">
<input type="text" name="aname" class = "form-control" id="uname" autocomplete="off" value="Artist Search" >
 <input type="submit" class="btn btn-primary" value="Search"></li>

</form>
</div>

          <div class="well"> 
             <form class="form">
              <h4><a href="concert.php"> View Concerts </a> </h4>
              <h4><a href="concertser.php"> Search Concerts </a> </h4>
            </form>
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
		 <div class="panel panel-default">
           <div class="panel-heading"><h4>My Recommendation List</h4></div>
   			<div class="panel-body">
			<?php
require('../database/config.php');
$result = $conn->prepare("SELECT * FROM pages WHERE uid='".$_SESSION['uid']."'");
$result->execute();
$arec = array();
while ($row = $result->fetch())
{
$pgid = $row['pgid'];
array_push($arec, $pgid);
}
foreach($arec as $pgid1)
{
$resultrec = $conn->prepare("SELECT r.rec_list, c.cname FROM recommendation r, concert c WHERE r.pgid='".$pgid1."'and r.cid=c.cid");
$resultrec->execute();

while($rowrec=$resultrec->fetch()) {
?>
     
			<li class="list-group-item"><?php print $rowrec["rec_list"]."&nbsp"."->"."&nbsp".$rowrec["cname"];?></li>
<?php	
}		
}
?>
			
            </div>
   		 </div>
		  <div class="panel panel-default">
           <div class="panel-heading"><h4>My Reviews</h4></div>
   			<div class="panel-body">
			
			<?php
require('../database/config.php');
$resultk = $conn->prepare("SELECT cid FROM reviews where uid='".$_SESSION['uid']."'");
$resultk->execute();
if($resultk->rowCount() > 0)
{
while($rowk=$resultk->fetch())
{
$cidr = $rowk['cid'];
}
$result10 = $conn->prepare("SELECT * FROM concert where cid='".$cidr."'");
$result10->execute();
while($rowc=$result10->fetch())
{
$cnamec = $rowc['cname'];
}
//print_r ($ar);
$arree=array();
$resulta = $conn->prepare("SELECT * FROM reviews where uid='".$_SESSION['uid']."'");
$resulta->execute();
while($row1=$resulta->fetch())
{
$rating = $row1['ratings'];
$rev = $row1['rev_desc'];
$arree +=[$rating=>$rev];
}

?>


<?php
//foreach ($arree as $rating=>$rev)
//{
?>
<li class="list-group-item"><?php echo $cnamec;?></li>
<li class="list-group-item"><?php echo $rating;?></li>
<li class="list-group-item"><?php echo $rev;?></li>

<?php
}
else
{
echo $_SESSION['fullname']."&nbsp has given no reviews yet!!";
}
?>

              
              </ul>
            </div>
   		 </div>
  	</div>
	
	<?php

require('../database/config.php');

if( !isset($_SESSION['uname'])) 
{
	header("location: index.html");
}
?>
  	<div class="col-md-4 col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading"><h4>Profile Information <span style="float:right"><a href="editpru.php"><font size="4">Edit</font></a></span> </h4></div>
   			<div class="panel-body">
              <ul class="list-group">
			  <li class="list-group-item"><?php echo $_SESSION['fullname'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['uname'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['dob'];?></li>
              <li class="list-group-item"><?php echo $_SESSION['addr'];?></li>
			  <li class="list-group-item"><?php echo $_SESSION['email'];?></li>
              </ul>
            </div>
   		</div>
		<div class="panel panel-default">
           <div class="panel-heading"><h4>Music Type</h4></div>
   			<div class="panel-body">
        <?php
require('../database/config.php');
$result = $conn->prepare("SELECT mname FROM music");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$mname = $row['mname'];
?>
<form action="../userlikes.php" method="POST">
        
			<input type="hidden" name="like" value="<?php echo $mname; ?>">	
            <input type="submit" class="btn btn-primary center-block" style="width:150px" value ="<?php echo $mname; ?>">
              
              <hr>
			  </form>
         <?php 
		 }?>    
 
             
              
            </div>
         </div>
        
		<div class="panel panel-default">
           <div class="panel-heading"><h4>Music Taste</h4></div>
   			<div class="panel-body">
        <?php
require('../database/config.php');
$result = $conn->prepare("SELECT * FROM user_likes where uid='".$_SESSION['uid']."'");
$result->execute();
$arm=array();
if ($result->rowCount() > 0)
{
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$mid = $row['mid'];
array_push($arm, $mid);
}

$armm=array();
foreach($arm as $mid1)
{
$result1 = $conn->prepare("SELECT * FROM music where mid='".$mid1."'");
$result1->execute();
while ($row1 = $result1->fetch(PDO::FETCH_ASSOC))
{
$mname = $row1['mname'];
array_push($armm, $mname);
}
}
foreach($armm as $jhk)
{
?>

        
			<li class="list-group-item"><?php echo $jhk;?></li>
              
              <hr>
			 
         <?php 
		 }
		 }
		 else 
		 echo $_SESSION['fullname']."&nbsp likes no music";?>    
 
             
              
            </div>
         </div>     
    </div>
  </div><!--/row-->
  