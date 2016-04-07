<?php
session_start();
require('config.php');
$post = $_POST['post'];

$registerquery ="insert into postartist (owner_a, post_desc, posta_time) VALUES (:owner_a, :post_desc, NOW());";
$q=$conn->prepare($registerquery);
$q->execute(array(':owner_a' => $_SESSION['aid'], ':post_desc' => $post));
header("location: profileartist.php");

?>
