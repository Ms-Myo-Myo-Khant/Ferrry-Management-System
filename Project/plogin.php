<?php

include("confs/config.php");
$email=$_POST['parentemail'];
$password=$_POST['parentpassword'];

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
$sql="SELECT * FROM student WHERE Email='$email' and PPassword='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$parentid=$row['PId'];
// echo $parentid;
$count=mysqli_num_rows($result);

if($count==1){
	session_start();
	$_SESSION['authparent']='true';
	$_SESSION['email']=$email;
	$_SESSION['parentid']=$parentid;
	// $_SESSION['did']=$row['did'];
	header("location:parentindex.php");
}

else{
	header("location:errlogin.php");
}

}



?>
