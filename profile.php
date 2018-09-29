<html>

<?php

session_start();
if(isset($_SESSION["uname"]))
{
$username=$_SESSION["uname"];
$con=mysqli_connect("localhost","root","happy123$","marwebdb");
$eusername=mysqli_real_escape_string($con,$username);
echo "Hello $username";
//connect to database

header("Access-Control-Allow-Origin:*");




$query="select * from marwebtb where username='$eusername'";

$result=mysqli_query($con,$query);


$row=mysqli_fetch_row($result);
echo "<br><br><img src='/marwebapp/statement/$row[0].jpg' height='42' width='42'><br><br>";

//print Acno,balance,feedback,mobile,emailid

echo "<br><br>Your account num:$row[0]<br><br>";

echo "you balance:$row[5]<br><br>";
$fb=$row[6];
//$fb=htmlspecialchars($fb);

echo "Your feedback : $fb<br><br>";

echo "your mobile number:$row[4]<br><br>";

echo "your email id: $row[3]<br><br>";
}
else
{

echo "You are not logged in. ";
echo ("<a href='login.html'>click here to login</a>");
}

?>

<a href="signout.php">Signout</a><br><br>
<a href="transfer.php">Transfer</a>
<br><br>
<a href="feedback.php">Feedback</a>
</html>
