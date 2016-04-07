<?php
session_start();
require('config.php');
$aname = $_POST['aname'];
$pwd = $_POST['pwd'];
 
if($aname == '') {
	header("location: ../index.html");
	$errflag = true;
}
if($pwd == '') {
	header("location: ../index.html");
	$errflag = true;
}
$password=md5($pwd);
// query
$result = $conn->prepare("SELECT * FROM artist WHERE aname= :aname AND apass= :password");
$result->bindParam(':aname', $aname);
$result->bindParam(':password', $password);
$result->execute();
$count=$result->rowcount();
echo "reached here";
if($count > 0) {
while ($r = $result->fetch())
{
echo "correct pwd";
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
echo $_SESSION['aname'];
header("location: ../googleplus/indexart.php");
}
}
else{
echo "incorrect";
	header("location: ../index.html");
}

?>