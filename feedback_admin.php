





<?php
session_start();
$username=$_SESSION["uname"];
if($username=="admin")
{
$con=mysqli_connect("localhost","root","happy123$","marwebdb");

$query="select * from marwebtb";

$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
$i=1;
while($i<=$num)
{
$row=mysqli_fetch_row($result);
echo "$row[1]: $row[6]<br><br>";
$i=$i+1;
}
}
else
{
  header("location:signout.php");
}
?>
