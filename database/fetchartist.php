<?php
session_start();
require('config.php');
$result = $conn->prepare("SELECT * FROM artist WHERE aid='".$_SESSION['aid']."'");
$result->execute();
$count=$result->rowcount();
if($count > 0) {
while ($r = $result->fetch())
{
$aid=$r['aid'];
$aname=$r['aname'];
$full=$r['a_fullname'];
$dof=$r['adof'];
$link=$r['alink'];
$email=$r['aemail'];
}
}
?>