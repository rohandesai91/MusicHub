<?php
session_start();
require('config.php');
$result = $conn->prepare("SELECT * FROM user where uid='".$_SESSION['uid']."'");
$result->execute();
while ($r = $result->fetch())
{
$uid=$r['uid'];
$uname=$r['uname'];
$full=$r['u_fullname'];
$dob=$r['udob'];
$addr=$r['uaddr'];
$email=$r['uemail'];
$_SESSION['uid'] = $uid;
$_SESSION['uname'] = $uname;
$_SESSION['fullname'] = $full;
$_SESSION['dob'] = $dob;
$_SESSION['addr'] = $addr;
$_SESSION['email'] = $email;
echo $_SESSION['uname'];
}
?>