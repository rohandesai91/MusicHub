<?php 
error_reporting(E_ERROR);
require('database/config.php');
session_start();
$aname = $_POST['aname'];
$result=$conn->prepare("SELECT * FROM artist WHERE aname LIKE CONCAT('%' , :aname , '%') ");
$result->bindParam(':aname', $aname);
$result->execute();
$count=$result->rowcount();
while($row=$result->fetch())
{
$aid = $row['aid'];
//echo "$row['uname]";
echo "<a href='googleplus/fanst.php?id=".$aid."'>".$row['aname']."&nbsp </a>";
}
?>
