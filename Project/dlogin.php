<?php

include("confs/config.php");
session_start();

$email=$_POST['driveremail'];
$password=$_POST['driverpassword'];

if(strlen($email)==0 && strlen($password)==0){
	echo "<script>alert('Empty email and password');</script>";
	header('location:landingpage.php');
}
else if(strlen($email)==0){
	echo "<script>alert('Empty email');</script>";
	header('location:landingpage.php');
}
else if(strlen($password)==0){
	echo "<script>alert('Empty password');</script>";
	header('location:landingpage.php');
}
else{
$sql="SELECT * FROM driver WHERE Email='$email' and DPassword='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);

if($count==1){
	session_start();
	$_SESSION['driverauth']='true';
	$_SESSION['email']=$email;
	$_SESSION['driverid']=$row['DId'];	
	header("location:driver.php");
	// echo "<script>alert('Hello World');</script>";

}

else{
	header("location:errlogin.php");
}

}



?>
