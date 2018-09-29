<html>
<h1>Enter Baccount number and amount</h1>
<form name="transfer" method="POST" onsubmit="return checkinp()"action="transfer.php">
Bacno:<input type='text' name='bacno'><br><br>
TAmount:<input type="text" name="tamount">
<br><br>
<input type="submit" value="Transfer">
</form>

<script>

function checkinp()
{

var x=document.forms["transfer"]["bacno"].value;

if(isNaN(x))
{

 document.write(x+" is not a number.");
return false;


}

</script>











<?php
session_start();
if(isset($_SESSION["uname"]))
{

if(isset($_POST["bacno"]))
{
$bano=$_POST["bacno"];
$tamnt=$_POST["tamount"];
$username=$_SESSION["uname"];


$con=mysqli_connect("localhost","root","happy123$","marwebdb");

//get the balance of the loggedin user

$query="select * from marwebtb where username='$username'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);

$fbalance=$row[5];

//reduce balance by tamnt

$nfbalance=$fbalance-$tamnt;


//update it back inot db

$query="update marwebtb set balance='$nfbalance' where username='$username'";
mysqli_query($con,$query);

//get the balanace of bano
$query="select * from marwebtb where sno='$bano'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);

//add tamnt to bano balance
$bbalance=$row[5];
$nbbalance=$bbalance+$tamnt;


//update it back to db
$query="update marwebtb set balance ='$nbbalance' where sno='$bano'";
mysqli_query($con,$query);
echo "Tranfer completed..!! Your savings account balance#$nfbalance";

}

}
else
{
echo "You are not logged in. ";
echo ("<a href='login.html'>click here to login</a>");

}

?>




</html>

<html>

<a href="signout.php">Signout</a><br><br>
<a href="transfer.php">Transfer</a>
<br><br>
<a href="profile.php">Profile</a>


</html>

