<?php
session_start();
require('config.php');
$user = $_POST['uname'];
$pwd = $_POST['pwd'];
 
if($user == '') {
	header("location: ../index.html");
	$errflag = true;
}
if($pwd == '') {
	header("location: ../index.html");
	$errflag = true;
}
$password=md5($pwd);
// query
$result = $conn->prepare("SELECT * FROM user WHERE uname= :username AND upass= :password");
$result->bindParam(':username', $user);
$result->bindParam(':password', $password);
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
$_SESSION['uid'] = $uid;
$_SESSION['uname'] = $uname;
$_SESSION['fullname'] = $full;
$_SESSION['dob'] = $dob;
$_SESSION['addr'] = $addr;
$_SESSION['email'] = $email;
echo $_SESSION['uname'];
header("location: ../googleplus/index.php");
}
}
else{
	
		header("location: ../index.html");
}


?>