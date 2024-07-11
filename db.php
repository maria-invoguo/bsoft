<?php
$servername = "localhost";
$username = "bdbscsha_anadhu_user";
$password = "f~LXs}rdz?Vv";
$dbname = "bdbscsha_bsoft";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
 echo " ";
}
else
{
	die("connection is failed because".mysqli_connect_error());
}
?>
