<?php
session_start();
require('config.php');
$cname=$_POST['concertname'];
$vname=$_POST['lname'];
$ctime=$_POST['ctime'];
$result = $conn->prepare("SELECT * FROM location WHERE vname='".$vname."'");
$result->execute();
while ($row = $result->fetch())
{
$vid = $row['vid'];
}
echo $cname;
echo $vid;
$result = $conn->prepare("SELECT * FROM concert WHERE cname='".$cname."'");
$result->execute();
while ($row = $result->fetch())
{
$cid = $row['cid'];
}

$result = $conn->prepare("SELECT * FROM concert WHERE cid=:cid AND aid=:paramid");
$result->bindParam(':cid', $cid);
$result->bindParam(':paramid', $_SESSION['aid']);
$result->execute();
$count=$result->rowcount();
echo $mid."<br>";
echo $_SESSION['uid']."<br>";
echo $count;
if($count > 0) {

header("location: notificationsa.php?id=1");
}
else
{
if(isset($_POST['enter']))
    {

$registerquery ="insert into concert (cname, aid, vid, c_time) VALUES(:cname, :aid, :vid, :c_time);";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':cname' => $cname, ':aid' => $_SESSION['aid'], ':vid' => $vid, ':c_time' => $ctime));
header("location: ../googleplus/indexart.php");
  }
}
?>