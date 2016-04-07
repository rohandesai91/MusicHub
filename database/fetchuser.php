<?php
session_start();
require('config.php');
$result = $conn->prepare("SELECT * FROM user WHERE uid='".$_SESSION['uid1']."'");
$result->execute();
$count=$result->rowcount();
if($count > 0) {
while ($r = $result->fetch())
{
$uid=$r['uid'];
$uname=$r['uname'];
$full=$r['u_fullname'];
$dob=$r['udob'];
$addr=$r['uaddr'];
$email=$r['uemail'];
}
}
?>