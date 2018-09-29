<?php

$username=$_POST["uname"];
$password=$_POST["pwd"];

$re = '/[^a-z,A-Z,0-9]/';

preg_match_all($re,$username,$matches);

$match=$matches[0];

if(empty($match))
{

//connect to db marwebdb

$con=mysqli_connect("localhost","root","happy123$","marwebdb");

$query="select * from marwebtb where username='$username' and password='$password'";

$result=mysqli_query($con,$query);

$num=mysqli_num_rows($result);


if($num>0)
{

session_start();

$_SESSION["uname"]=$username;

header("location:profile.php");


}
else
{
echo "you are not $username";
//header("location:login.html");

}
}

else
{

echo "XSS attempt detected..!!";
}
?>
