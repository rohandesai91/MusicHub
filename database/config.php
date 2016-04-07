<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "music_hub";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 } catch (PDOException $pe) {
 die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
