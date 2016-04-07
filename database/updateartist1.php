<?php
session_start();
require('config.php');
$result = $conn->prepare("SELECT * FROM artist where aid=2004");
$result->execute();
while ($r = $result->fetch())
{
$aid=$r['aid'];
$aname=$r['aname'];
$full=$r['a_fullname'];
$dof=$r['adof'];
$link=$r['alink'];
$email=$r['aemail'];
$_SESSION['aid'] = $aid;
$_SESSION['aname'] = $aname;
$_SESSION['fullname'] = $full;
$_SESSION['dof'] = $dof;
$_SESSION['link'] = $link;
$_SESSION['email'] = $email;
}
?>