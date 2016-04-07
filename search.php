<?php 
require('database/config.php');
session_start();
$uname = $_POST['uname'];
$result=$conn->prepare("SELECT * FROM user WHERE uname LIKE CONCAT('%' , :uname , '%') ");
$result->bindParam(':uname', $uname);
$result->execute();
$count=$result->rowcount();
while($row=$result->fetch())
{
$uid = $row['uid'];
//echo "$row['uname]";
echo "<a href='googleplus/followst.php?id=".$uid."'>".$row['uname']."</a>";
}
?>
