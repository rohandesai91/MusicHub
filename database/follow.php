<?php
session_start();
require('config.php');
$registerquery ="insert into follows (followerid, followingid, t_following) VALUES(:fwr, :fwing, NOW());";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':fwr' => $_SESSION['uid'], ':fwing' => $_SESSION['uid1']));
  header("location: ../googleplus/index.php");
  ?>
  