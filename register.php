<html>

<?php
libxml_disable_entity_loader (false);
$xmlfile = file_get_contents('php://input');
$dom = new DOMDocument();
$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
$info = simplexml_import_dom($dom);
$name = $info->name;
$tel = $info->tel;
$email = $info->email;
$password = $info->password;

$con=mysqli_connect("localhost","root","happy123$","marwebdb");
$result=mysqli_query($con,"SELECT * FROM marwebtb where username='$name'");

$num=mysqli_num_rows($result);

if($num>0)
{

echo "Already registered with username <b> $name </b> or email id <b> $email </b> ..!!";

}

else

{

$query="insert into marwebtb(username,password,email,mobile,balance,feedback)VALUES('$name','$password','$email','$tel',0,'nofb')";

mysqli_query($con,"$query");
echo "Registration completed";

}
?>

<a href='login.html'>click here to login</a>

</html>
