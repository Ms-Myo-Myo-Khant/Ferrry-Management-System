<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['authparent'])
{
	header("location:landingpage.php");
}

if(isset($_GET['month']))
{
	$_SESSION['month']=$_GET['month'];
	$month=$_SESSION['month'];

}
$STUID=$_GET['stuid'];
header("location:pshowprevioussalary.php");
 ?>