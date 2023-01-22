<?php
session_start();
include("confs/config.php");
if (!$_SESSION['auth']) {
	header("location:landingpage.php");
}

function isValidLicense($license)
{
	$licenseRegExp = "/^[A-Z a-z]{1}\/[0-9]{5}\/[0-9]{2}$/";
	return (preg_match($licenseRegExp, $license));
}

$ownerid = $_SESSION['ownerid'];

$ownerid = $_SESSION['ownerid'];
$name = '';
$nrc  = '';
$email = '';
$address = '';
$phone = '';
$dob = '';
$license = '';
$year = '';
$password = '';
$cno  = '';

if (isset($_POST['name']))
	$name = $_POST['name'];

if (isset($_POST['nrc']))
	$nrc = $_POST['nrc'];

if (isset($_POST['email']))
	$email = $_POST['email'];

if (isset($_POST['address']))
	$address = $_POST['address'];

if (isset($_POST['phone']))
	$phone = $_POST['phone'];

if (isset($_POST['dob']))
	$dob = $_POST['dob'];

if (isset($_POST['license']))
	$license = $_POST['license'];

if (isset($_POST['year']))
	$year = $_POST['year'];

if (isset($_POST['password']))
	$password = $_POST['password'];

if (isset($_POST['carno']))
	$cno = $_POST['carno'];

$page = "driverinfo.php";
if ($license == null) {
	// echo "<script> alert('LicenseNull'); </script>";

	header("location:NotEnoughInfo.php?page=".$page);		
}
else if ((!(isValidLicense($license)))) {
	// echo "<script> alert('Licenserror'); </script>";

	header("location:errorformat.php?page=".$page);
}
else{
	$carsql = mysqli_query($conn, "select * from car where CNo='$cno'");
	$carresult = mysqli_fetch_assoc($carsql);
	$cid      = $carresult['CId'];
	
	//count
	$driversql = mysqli_query($conn, "select * from driver");
	$count  = mysqli_num_rows($driversql);
	
	// image	
	if (empty($_FILES['photo']['name']))
		echo "<script> alert('Ok'); </script>";
	
	$fileinfo = PATHINFO($_FILES['photo']["name"]);
	$newFilename = "dnew." . $fileinfo['extension'];
	$target_file = "Uploads/" . $newFilename;
	
	$uploadok = 1;
	$check = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
	
	if ($_FILES["photo"]["size"] > 500000) {
		header("location:errorimagesize.php");
		//	$uploadok=0;
	}
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "<script> alert('Type Error Coz $imageFileType'); </script>";
		$check = 0; //$uploadok=0;
	}
	
	if ($uploadok == 0) {
		echo "<br> Sorry, your file was not uploaded";
	} else {
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
			echo "<img src='" . $target_file . "' alt='Uploaded Image'>";
	
			if ($DriverAdd = mysqli_query($conn, "INSERT into driver (DName,NRC,Email,Address,PhoneNo,DateOfBirth,LicenseNo,YearOfExp,DPassword,Photo) values('$name','$nrc','$email','$address','$phone','$dob','$license','$year','$password','$target_file')"))
				echo "Success";
			else
				echo myslqli_error($conn);
			$did = mysqli_insert_id($conn);
	
	
			if (!mysqli_query($conn, "update assign set DId='$did' where CId='$cid'")) {
				echo mysqli_error($conn);
			}
			if ($did) {
				header("location:dsuccesspwd.php");
				$_SESSION["email"] = $email;
				$_SESSION["name"] = $name;
			}
		}
	}
	if ($check == 0) {
		header("location:errorimage.php");
	} else {
		//header("location:driverinfo.php");
	}
	
}
?>