<?php


session_start();
include("confs/config.php");
$name = $_GET['name'];
$email = $_GET['email'];
$nrc = $_GET['nrc'];
$dob = $_GET['dob'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$password = $_GET['password'];
$photo = $_GET['photo'];
$page = "landingpage.php";

/*if ($name == null || $email == null || $nrc == null || $phone == null || $password == null || $cpassword == null) {
	header("location:NotEnoughInfo.php?page=" . $page);
}
else if(!preg_match("/^\(\+[0-9]{2}\)[0-9]{9,13}$/",$phone)) {
	header("location:NotEnoughInfo.php?page=" );
}
else {*/
// $driveOrnot = $_SESSION['yesdrive'];
// if ($driveOrnot == 1) {
// 	$dname = $_POST['dname'];
// 	$demail = $_POST['demail'];
// 	$dnrc = $_POST['dnrc'];
// 	$ddob = $_POST['ddob'];
// 	$dphone = $_POST['dphone'];
// 	$daddress = $_POST['daddress'];
// 	$password = $_POST['dpassword'];
// 	$cpassword = $_POST['dcpassword'];
// }

// $dlicense = $_POST['dlicense'];
// $dyoe = $_POST['dyoe'];

// $school = $_POST['schoolList'];

$haveaccount = "SELECT Email FROM owner WHERE Email='$email'";
$result = mysqli_query($conn, $haveaccount);
$haveaccountval = mysqli_fetch_assoc($result);
if ($haveaccountval['Email'] == $email) {
	header("location:AccountIsAlreadyHad.php?page=" . $page);
} else {
	$owner = "SELECT * FROM owner WHERE OName='$name'";
	$result = mysqli_query($conn, $owner);
	$row = mysqli_fetch_assoc($result);
	// if ($row >= 1) {
	// 	header("location:landingpage.php");
	// } else {

	$sql = "INSERT INTO owner 
	(OName,Email,NRC,Address,PhoneNo,DateOfBirth,OPassword)
		VALUES('$name','$email','$nrc','$address','$phone','$dob','$password')";

	if (mysqli_query($conn, $sql)) {
		header("location: successlogin.php");
	} else {
		echo "<script> alert('Password Not Match') </script>";
	}
}

	
		
	//}
//}
