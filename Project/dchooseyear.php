<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['driverauth'])
{
	header("location:landingpage.php");
}

if(isset($_GET['year']))
{
	$_SESSION['year']=$_GET['year'];
	$year=$_SESSION['year'];

}
header("location:dsalarylist.php");
 ?>
