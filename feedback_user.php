
<?php

session_start();
if(!isset($_SESSION["uname"]))
header("location:login.html");

?>


<html>

<form name="feedback" method="GET" action="feedback_user.php">

Feedback:<input type="text" name="fb">

<input type="submit" value="Send Feedback">

</form>


</html>

<?php
if(isset($_GET["fb"]))
{
$feedback=$_GET["fb"];

$username=$_SESSION["uname"];
$con=mysqli_connect("localhost","root","happy123$","marwebdb");
$feedback=mysqli_real_escape_string($con,$feedback);


$query="update marwebtb set feedback='$feedback' where username='$username'";
mysqli_query($con,$query);

echo "feedback submitted";

}

?>


<html>

<a href="signout.php">Signout</a><br><br>
<a href="transfer.php">Transfer</a>
<br><br>
<a href="profile.php">Profile</a>


</html>
