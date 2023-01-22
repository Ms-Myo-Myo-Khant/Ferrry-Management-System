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
$cid=$_GET['cid'];

$checkStu = mysqli_query($conn,"SELECT * from student where SId in ( SELECT SId from assign where Id='$ownerid' and CId='$cid') and SubId in (SELECT SubId from assign where Id='$ownerid' and CId='$cid') ");
$count = mysqli_num_rows($checkStu);

if($count==0)
{
$delcar=mysqli_query($conn,"DELETE from car where Cid='$cid'");
$delfromassign = mysqli_query($conn,"DELETE from assign where Cid='$cid'");
unset($_SESSION['cid']);
header('location:carinfo.php');
}
else
{
	header("location:errdelcar.php?");
}




?>