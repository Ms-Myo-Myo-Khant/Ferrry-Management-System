<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$did=$_SESSION['did'];

// $name = $_POST['name'];
// $nrc = $_POST['nrc'];
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// $dob = $_POST['dob'];
// $license = $_POST['license'];
// $years = $_POST['years'];
// $email = $_POST['email'];

function isValidLicense($license)
{
	$licenseRegExp = "/^[A-Z a-z]{1}\/[0-9]{5}\/[0-9]{2}$/";
	return (preg_match($licenseRegExp, $license));
}

$name = $_POST['name'];
$nrc = $_POST['nrc'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$license = $_POST['license'];
$years = $_POST['years'];
$email = $_POST['email'];


$page = "driverinfo.php";
if ($license == null) 
{
	 echo "<script> alert('LicenseNull'); </script>";

	//header("location:NotEnoughInfo.php?page=".$page);		
}
else if ((!(isValidLicense($license)))) {
	// echo "<script> alert('Licenserror'); </script>";

	header("location:errorformat.php?page=".$page);
}
else
{
	if($updatedriver=mysqli_query($conn,"UPDATE driver set DName='$name', NRC='$nrc', Address='$address', PhoneNo='$phone', DateOfBirth='$dob', LicenseNo='$license', YearOfExp='$years', Email='$email' where DId='$did' and DId in (Select DId from assign where Id='$ownerid')"))
	{

	}
	else
		echo mysqli_error($conn);
	header("location:driverinfo.php");
}
?>