<?php
session_start();
require('config.php');
$post = $_POST['post'];

$registerquery ="insert into postuser (owner_u, post_desc, postu_time) VALUES (:owner_u, :post_desc, NOW());";
$q=$conn->prepare($registerquery);
$q->execute(array(':owner_u' => $_SESSION['uid'], ':post_desc' => $post));
header("location: ../googleplus/index.php");
?>