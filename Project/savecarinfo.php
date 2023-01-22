<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$cid=$_SESSION['cid'];

// $model = $_POST['model'];
// $type = $_POST['type'];
// $carno = $_POST['carno'];
// $noofseats = $_POST['seats'];
// $color = $_POST['color'];
			function isValidCarno($carno) {
	            $carnoRegExp = "/^[0-9 a-z A-Z]{2}\-[0-9]{4}$/";
	            return (preg_match($carnoRegExp,$carno));
	        }

	        function isValidSeats($seats) {
	            $seatsRegExp = "/^[0-9]+$/";
	            return (preg_match($seatsRegExp,$seats));
	        }


$model = $_POST['model'];
$type = $_POST['type'];
$carno = $_POST['carno'];
$noofseats = $_POST['seats'];
$color = $_POST['color'];

$page="carinfo.php";
if($model==null || $carno==null|| $noofseats==null){
	header("location:NotEnoughInfo.php?page=".$page);		
}
else if((!(isValidCarno($carno)))||(!(isValidSeats($noofseats))) ){
	header("location:errorformat.php?page=".$page);
}
else 
{
		if($updatecar=mysqli_query($conn,"UPDATE car set Model='$model', Type='$type', CNo='$carno', NoOfSeats='$noofseats', Color='$color' where CId='$cid' and CId in (Select CId from assign where Id='$ownerid') ")	)
		echo 'OK';
		else
		echo mysqli_error($conn);
		header("location:carinfo.php");
}
?>