<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['authparent'])
{
    header("location:landingpage.php");
}

if(isset($_GET['year']))
{
	$_SESSION['year'] = $_GET['year'];
	$year = $_SESSION['year'];
	unset($_SESSION['month']);
	unset($_SESSION['limit']);
}
elseif(isset($_SESSION['year']))
{
	$year = $_SESSION['year'];
}
else
{
	$year ='';
}

if(isset($_GET['month']))
{
	$_SESSION['month'] = $_GET['month'];
	$month = $_SESSION['month'];
}
elseif(isset($_SESSION['month']))
{
	$month = $_SESSION['month'];
}
else
{
	$month = '';
}
	
if($month == 1)
{
	$limit = '31';
}
elseif($month ==2)
{
	$limit = '28';
}
elseif($month == 3)
{
	$limit = '31';
} 
elseif($month == 6)
{
	$limit = '30';
}
elseif($month == 7)
{
	$limit ='31';
}
elseif($month == 8)
{
	$limit = '31';
}
elseif($month == 9)
{
	$limit ='30';
}
elseif($month == 10)
{
	$limit = '31';
}
elseif($month ==11)
{
	$limit = '30';
}
elseif($month ==12)
{
	$limit = '31';
}
else
{
	$limit ='';
}

$_SESSION['limit'] = $limit;

//echo 'Year'.$year.'-->'.'Month'.$month.'-->'.'Limit'.$limit;
header("location:p_pk_attendance.php");

?>