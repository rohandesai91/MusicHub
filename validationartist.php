<?php
require('/database/config.php');
$emailErr="";
$email=$_POST['Email'];
$pwd=$_POST['Password'];
$aname=$_POST['Artistname'];
$afullname=$_POST['Fullname'];
$dof=$_POST['DOF'];
$webpage=$_POST['Link'];
if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
    if(preg_match('/[!@#$%*a-zA-Z0-9]{8,}/',$pwd) && preg_match_all('/[0-9]/',$pwd) >= 2)
{
    // do
}
else
{
echo "password is incorrect";
}

$password=md5($pwd);

$query =$conn->prepare( "SELECT aemail FROM artist WHERE aemail='".$email."'" );
$query->bindValue( 1, $email );
$query->execute();

if( $query->rowCount() > 0 ) { # If rows are found for query
     echo "Email already exists!";
}
  else 
  {
  $registerquery ="insert into artist (aname, apass, aemail, a_fullname, adof, alink, a_regtime) VALUES(:aname, :pwd, :email, :afullname, :adof, :alink, NOW());";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':aname' => $aname, ':pwd' => $password, ':email'=> $email, ':afullname'=>$afullname, ':adof'=>$dof, ':alink'=>$webpage));
}
header("location: index.html");
?>
   