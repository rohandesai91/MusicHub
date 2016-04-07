<?php
require('config.php');
session_start();
$mname=$_POST['like'];
echo $mname;

$result = $conn->prepare("SELECT * FROM music WHERE mname='".$mname."'");
$result->execute();
while ($row = $result->fetch())
{
$mid = $row['mid'];
}
//echo $mid;

$result = $conn->prepare("SELECT * FROM plays WHERE mid=:mid AND aid=:paramid");
$result->bindParam(':mid', $mid);
$result->bindParam(':paramid', $_SESSION['aid']);
$result->execute();
$count=$result->rowcount();
echo $mid."<br>";
echo $_SESSION['uid']."<br>";
echo $count;
if($count > 0) {

header("location: ../notificationsa.php?id1=1");
}
else
{
if(isset($_POST['like']))
    {

$registerquery ="insert into plays (aid, mid) VALUES(:aid, :mid);";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':aid' => $_SESSION['aid'], ':mid' => $mid));
header("location: ../googleplus/indexart.php");
  }
}
?>