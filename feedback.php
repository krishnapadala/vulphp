<?php
//check the name of the user.

session_start();

$username=$_SESSION["uname"];

//if user is admin redirect him to feedback_admin.php
//if the user is  not a dmin redirect him to feedback_user.php
if($username=="admin")
{
header("location:feedback_admin.php");

}

else
{


header("location:feedback_user.php");

}



?>
