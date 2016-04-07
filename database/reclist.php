<?php
require('config.php');
session_start();
$data = $_POST['checkbox'];
$name = $_POST['lname'];
echo $name;
echo "<br>";
echo "<br>";
print_r($data);
echo "<br>";
echo "<br>";
$result = $conn->prepare("SELECT * FROM pages WHERE uid='".$_SESSION['uid']."'");
$result->execute();
while ($row = $result->fetch())
{
$pageid = $row['pgid'];
echo $pageid.'<br>';
}
echo "<br>";

foreach ($data as $check)
{
$registerquery ="insert into recommendation (pgid, rec_list, cid) VALUES(:pgid, :rec_list, :cid);";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':pgid' => $pageid, ':rec_list' => $name, ':cid' => $check));
  }
  
header("location: ../googleplus/index.php");
?>