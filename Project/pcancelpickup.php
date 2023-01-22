<?php 

include("confs/config.php");
if(!$_SESSION['authparent'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}
//echo "Cancel ".$_GET['stuid'];
$stuid = $_GET['stuid'];
date_default_timezone_set("Asia/Rangoon");
$hour  =Date('H');
$year  = Date('Y');
$month = Date('n');
$day   = Date('j');

if($pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='$month'"))
	echo "Student selected <br> ";
$result=mysqli_fetch_assoc($pickup);
$stupickup= $result['Day'.$day];

if($hour<11)
{
	if($year==2019)
	{
		$stupickup = "0".substr($stupickup,1,5);	
	}
	elseif($year==2020)
	{
		$stupickup = substr($stupickup,0,2)."0".substr($stupickup,3,3);
	}
	elseif($year==2021)
	{
		$stupickup = substr($stupickup,0,4)."0".substr($stupickup,5,1);
	}
	$dayname = "Day".$day;
	$cancelpikcup = mysqli_query($conn,"UPDATE pickup set $dayname='$stupickup' where StuId='$stuid' and Month='$month' ");

}
elseif($hour>=11||$hour>=14||$hour>=16)
{
	if($year==2019)
	{	
		
		$stupickup = substr($stupickup,0,1)."0".substr($stupickup,2,4);	
	}
	elseif($year==2020)
	{
		$stupickup = substr($stupickup,0,3)."0".substr($stupickup,4,2);
	}
	elseif($year==2021)
	{
		$stupickup = substr($stupickup,0,5)."0"	;
	}
	$dayname = "Day".$day;
	$cancelpikcup = mysqli_query($conn,"UPDATE pickup set $dayname='$stupickup' where StuId='$stuid' and Month='$month' ");	
}
 	
 header("location:ppickup.php");

?>	