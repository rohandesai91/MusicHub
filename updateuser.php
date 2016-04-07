<?php
session_start();
require('/database/config.php');
$emailErr="";
$email=$_POST['Email'];
$uname=$_POST['Username'];
$ufullname=$_POST['Fullname'];
$udob=$_POST['Date'];
$addr=$_POST['Address'];

$registerquery ="update user set uname = :uname , uemail = :uemail, u_fullname = :ufullname, udob = :udob, uaddr = :uaddr where uid ='".$_SESSION['uid']."'";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':uname' => $uname, ':uemail'=> $email, ':ufullname'=>$ufullname, ':udob'=>$udob, ':uaddr'=>$addr));
  header("location: googleplus/index.php");
  ?>