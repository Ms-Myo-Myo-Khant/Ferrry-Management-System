<?php
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];


$name = $_POST['name'];
$grade = $_POST['grade'];
$pname = $_POST['pname'];
$nrc = $_POST['nrc'];
$phone = $_POST['address'];
$email = $_POST['phone'];
$address = $_POST['address'];


if( mysqli_query($conn,"INSERT into parent (PName,PNRC) values('$pname','$nrc')"))
{
	echo "Success";
}
else
{
	echo mysqli_error($conn);
}
?>