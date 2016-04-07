<?php
require('/database/config.php');
$emailErr="";
$email=$_POST['Email'];
$pwd=$_POST['Password'];
$uname=$_POST['Username'];
$ufullname=$_POST['Fullname'];
$udob=$_POST['Date'];
$addr=$_POST['Address'];
$utype="basic";
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

$query =$conn->prepare( "SELECT uemail FROM user WHERE uemail='".$email."'" );
$query->bindValue( 1, $email );
$query->execute();

if( $query->rowCount() > 0 ) { # If rows are found for query
     echo "Email already exists!";
}
  else 
  {
  $registerquery ="insert into user (uname, upass, uemail, u_fullname, udob, uaddr, utype, u_regtime) VALUES(:uname, :pwd, :email, :ufullname, :udob, :uaddr, :utype, NOW());";
  $q=$conn->prepare($registerquery);
  $q->execute(array(':uname' => $uname, ':pwd' => $password, ':email'=> $email, ':ufullname'=>$ufullname, ':udob'=>$udob, ':uaddr'=>$addr, ':utype'=>$utype));
}

header("location: index.html");
?>
   