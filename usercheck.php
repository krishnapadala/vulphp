<?php

$username=$_POST["uname"];
$password=$_POST["pwd"];
session_start();
//$_SESSION["uname"]=$username;
//session_regenerate_id();

$con=mysqli_connect("localhost","root","happy123$","marwebdb");
//$eusername=htmlspecialchars($username);
//$epassword=mysqli_real_escape_string($con,$password);


//connect to db marwebdb



$query="select * from marwebtb where username='$username' and password='$password'";

//select * from marwebtb where username='krishna' and password='happy123$'

$result=mysqli_query($con,$query);

$num=mysqli_num_rows($result);


if($num>0)
{

//session_start();

$_SESSION["uname"]=$username;

header("location:profile.php");


}
else
{

//$username=htmlspecialchars($username);
echo "you are not $username";
//header("location:login.html");

}



?>
