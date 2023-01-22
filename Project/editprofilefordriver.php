<?php
session_start();

include("confs/config.php");
if (!$_SESSION['driverauth']) {
	header("location:landingpage.php");
} else {
	function isValidPhone($tel)
	{
		$telRegExp = "/^[0-9]{2}[0-9]{9,13}$/";
		return (preg_match($telRegExp, $tel));
	}

	$did = $_SESSION['driverid'];

	$name = $_POST['name'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];


	$page = "driver.php";
	if ($name == null || $address == null || $dob == null || $phone == null) 
	{
		echo "<script> alert('NUll'); </script> ";
		header("location:NotEnoughInfodriver.php?page=" . $page);
	}
	else if (!isValidPhone($phone)) {
		echo "<script> alert('Phone'); </script> ";
		header("location:.php?page=" . $page);
	}
else {

	//  image
	if (!empty($_FILES['photo']['name'])) {
		echo "<script> alert('Enter'); </script>";
		$fileinfo = PATHINFO($_FILES['photo']["name"]);
		$newFilename = "D" . rand(1, 100) . "." . $fileinfo['extension'];
		$target_file = "Uploads/" . $newFilename;


		$uploadok = 1;
		$check = 1;
		$empty = 0;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		if ($_FILES["photo"]["size"] > 500000) {
			header("location:errorimagesize.php");
			//	$uploadok=0;
		}
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$check = 0; //$uploadok=0;

		}

		if ($uploadok == 0) {
			echo "<br> Sorry, your file was not uploaded";
		} else {
			if ($check == 1) {
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
					echo "<script> alert('1'); </script>";
					echo "<img src='" . $target_file . "' alt='Uploaded Image'>";

					if (mysqli_query($conn, "UPDATE driver set DName='$name',Address='$address', DateOfBirth='$dob', PhoneNo='$phone',Photo='$target_file' where DId='$did'")) {
						echo "Success1";
					} else {
						echo mysqli_error($conn);
					}
				}
			} elseif ($check == 0) {
				echo "<script> alert('0'); </script>";
				$target_file = "Uploads/blank.png";

				if (mysqli_query($conn, "UPDATE driver set DName='$name',Address='$address', DateOfBirth='$dob', PhoneNo='$phone', Photo='$target_file' where DId='$did'")) {
					echo "Success0";
				} else {
					echo mysqli_error($conn);
				}
			}
		}
		if ($check == 0) {
			header("location:errorimage.php");
			echo "<img src='$target_file' alt='Uploaded Image'>";
		} else
			echo "<script> alert('OK'); </script>";
		header("location:driver.php");
	} else {
		if (mysqli_query($conn, "UPDATE driver set DName='$name',Address='$address', DateOfBirth='$dob', PhoneNo='$phone' where DId='$did'")) {
			echo "SuccessNone";
		} else {
			echo mysqli_error($conn);
		}


		header("location:driver.php");
	}
}

}
?>
