<?php
session_start();
require('config.php');
echo "here";
$cname=$_POST['rsvp'];
echo $cname;
echo $_SESSION['uid'];
$result = $conn->prepare("SELECT cid FROM concert where cname='".$cname."'");
$result->execute();
while ($row = $result->fetch())
{
$cid = $row['cid'];
}
echo $cid;

$result2 = $conn->prepare("SELECT * FROM scheduling WHERE cid=:cid AND uid=:paramid");
$result2->bindParam(':cid', $cid);
$result2->bindParam(':paramid', $_SESSION['uid']);
$result2->execute();
$count=$result2->rowcount();
//echo $mid."<br>";
//echo $_SESSION['uid']."<br>";
//echo $count;
if($count > 0) {

header("location: ../notifications.php?id1=1");
}
else
{
$registerquery ="insert into scheduling (uid, cid, sch_time) VALUES(:uid, :cid, NOW());";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':uid' => $_SESSION['uid'], ':cid' => $cid));
header("location: ../googleplus/index.php");
}
?>