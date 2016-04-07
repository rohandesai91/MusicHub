<?php
session_start();
require('/database/config.php');
$emailErr="";
$email=$_POST['Email'];
$aname=$_POST['Artistname'];
$afullname=$_POST['Fullname'];
$dof=$_POST['DOF'];
$webpage=$_POST['Link'];

$registerquery ="update artist set aname = :aname , aemail = :aemail, a_fullname = :afullname, adof = :adof, alink = :alink where aid ='".$_SESSION['aid']."'";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':aname' => $aname, ':aemail'=> $email, ':afullname'=>$afullname, ':adof'=>$dof, ':alink'=>$webpage));
  header("location: googleplus/indexart.php");
  ?>