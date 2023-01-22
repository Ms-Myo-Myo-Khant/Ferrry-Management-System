<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

$email=$_SESSION['email'];
$ownerid=$_SESSION['ownerid'];
$did=$_GET['did'];

$checkdriver = mysqli_query($conn,"SELECT * from assign where Id='$ownerid' and DId='$did' ");
$count = mysqli_num_rows($checkdriver);
if($count==0)
{

$deleteDriver = mysqli_query($conn,"DELETE from driver where DId='$did' and DId in (SELECT DId from assign where Id='$ownerid')");

	header('location:driverinfo.php');
}
else
{
	header('location:errdeldriver.php');
}
?>