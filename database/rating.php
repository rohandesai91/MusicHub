<?php
session_start();
require('config.php');
$rate = $_POST['rate'];
$review = $_POST['rev'];

$registerquery ="insert into reviews (cid, rev_desc, uid, ratings, rev_time) VALUES (:cid, :rev_desc, :uid, :rate, NOW());";
$q=$conn->prepare($registerquery);
$q->execute(array(':cid' => $_SESSION['cidd'], ':rev_desc' => $review, ':rate' => $rate, ':uid' => $_SESSION['uid']));
header("location: ../googleplus/index.php");
?>