<?php

$sno=$_GET["sno"];

$con=mysqli_connect("localhost","root","happy123$","marwebdb");

$query="select * from marwebtb where sno=$sno";

$result=mysqli_query($con,$query);

$row=mysqli_fetch_row($result);

echo "Hello $row[1] , Your account balance is RS $row[5]";





?>

