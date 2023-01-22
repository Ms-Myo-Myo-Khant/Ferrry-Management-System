<?php

include("confs/config.php");
session_start();

$email=$_POST['email'];
$password=$_POST['password'];

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
	$parentsql="SELECT * FROM student WHERE Email='$email'";
	$parentresult=mysqli_query($conn,$parentsql);
	$parentcount=mysqli_num_rows($parentresult);

	$driversql="SELECT * FROM driver WHERE Email='$email'";
	$driverresult=mysqli_query($conn,$driversql);
	$drivercount=mysqli_num_rows($driverresult);

	$ownersql="SELECT * FROM owner WHERE Email='$email'";
	$ownerresult=mysqli_query($conn,$ownersql);
	$ownercount=mysqli_num_rows($ownerresult);

	if($parentcount>0 && $drivercount<=0 && $ownercount<=0 ){
		//this account is parent
		//let's check parent password
		$parentsqlcheck="SELECT * FROM student WHERE Email='$email' and PPassword='$password'";
		$parentresultcheck=mysqli_query($conn,$parentsqlcheck);
		$parentcountcheck=mysqli_num_rows($parentresultcheck);
		$parentrow=mysqli_fetch_assoc($parentresultcheck);
		$parentid=$parentrow['PId'];
		if($parentcountcheck>0)
		{
			//correct password
			//go to parent
			session_start();
			$_SESSION['authparent']='true';
			$_SESSION['email']=$email;
			$_SESSION['parentid']=$parentid;
			// $_SESSION['did']=$row['did'];
			header("location:parentindex.php");
		}	
		else
		{
			//incorrect password
			//go to errorlogin
			header("location:errlogin.php");
		}	
	}
	else if($parentcount<=0 && $drivercount>0 && $ownercount<=0){
		//this account is driver
		//let's check driver password
		$driversqlcheck="SELECT * FROM driver WHERE Email='$email' and DPassword='$password'";
		$driverresultcheck=mysqli_query($conn,$driversqlcheck);
		$drivercountcheck=mysqli_num_rows($driverresultcheck);
		$driverrow=mysqli_fetch_assoc($driverresultcheck);
		if($drivercountcheck>0)
		{
			//correct password
			//go to driver
			session_start();
			$_SESSION['driverauth']='true';
			$_SESSION['email']=$email;
			$_SESSION['driverid']=$driverrow['DId'];	
			header("location:driver.php");
		}
		else
		{
			//incorrect password
			//go to errorlogin
			header("location:errlogin.php");
		}
	}
	else if($parentcount<=0 && $drivercount<=0 && $ownercount>0){
		//this account is owner
		//let's check owner password
		echo "<script>alert('Owner')</script>";
		$ownersqlcheck="SELECT * FROM owner WHERE Email='$email' and OPassword='$password'";
		$ownerresultcheck=mysqli_query($conn,$ownersqlcheck);
		$ownercountcheck=mysqli_num_rows($ownerresultcheck);
		$ownerrow=mysqli_fetch_assoc($ownerresultcheck);
		if($ownercountcheck>0)
		{
			//correct password
			//go to owner
			session_start();
			$_SESSION['auth'] = 'true';
			$_SESSION['email'] = $email;
			$_SESSION['ownerid'] = $ownerrow['Id'];
			header("location:owner.php");
		}
		else
		{
			//incorrect password
			//go to errorlogin
			header("location:errlogin.php");
		}

	}
	else if($drivercount>0 && $ownercount>0)
	{
		echo "<script>alert('Owner');</script>";
		//this account is owner
		//let's check owner password
		$ownersqlcheck="SELECT * FROM owner WHERE Email='$email' and OPassword='$password'";
		$ownerresultcheck=mysqli_query($conn,$ownersqlcheck);
		$ownercountcheck=mysqli_num_rows($ownerresultcheck);
		$ownerrow=mysqli_fetch_assoc($ownerresultcheck);
		if($ownercountcheck>0)
		{
			//correct password
			//go to owner
			session_start();
			$_SESSION['auth'] = 'true';
			$_SESSION['email'] = $email;
			$_SESSION['ownerid'] = $ownerrow['Id'];
			header("location:owner.php");
		}
		else
		{
			//incorrect password
			//go to errorlogin
			header("location:errlogin.php");
		}
	}
	else{
		header("location:errlogin.php");
	}

}



?>
