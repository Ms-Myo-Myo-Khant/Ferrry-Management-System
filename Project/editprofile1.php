<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php"); 
}
else
{	 
	$ownerid=$_SESSION['ownerid'];

	// image
	//if(!isset($_POST['photo']))
	if(!empty($_FILES['photo']['name']))
{	
	echo "<script> alert('Enter'); </script>";
    $fileinfo = PATHINFO($_FILES['photo']["name"]);
	$newFilename="O".rand(1,100).".". $fileinfo['extension'];	
	$target_file="Uploads/".$newFilename;


	$uploadok=1; $check=1; $empty=0;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if($_FILES["photo"]["size"]>500000)
	{
		header("location:errorimagesize.php");
		//	$uploadok=0;
	}
	if($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="jpeg")
	{	
		$check=0; //$uploadok=0;
		
	}

	if($uploadok==0)
	{	
		echo "<br> Sorry, your file was not uploaded";
	}
	else
	{	if($check == 1)
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
			{	echo "<script> alert('1'); </script>";
				echo "<img src='".$target_file."' alt='Uploaded Image'>";
	
	
				if(mysqli_query($conn,"UPDATE owner set OName='$name', Address='$address', DateOfBirth='$dob', PhoneNo='$phone',Photo='$target_file' where Id='$ownerid' "))
				{
					echo "Success1";
				}
				else
				{
					echo mysqli_error($conn);	
				}
			}
		}
		elseif($check == 0)
		{	echo "<script> alert('0'); </script>";
			$target_file = "Uploads/blank.png";

			if(mysqli_query($conn,"UPDATE owner set OName='$name', Address='$address', DateOfBirth='$dob', PhoneNo='$phone',Photo='$target_file' where Id='$ownerid' "))
				{
					echo "Success2";
				}
				else
				{
					echo mysqli_error($conn);
				}
		}
	}	
		
	if($check==0)
	{
		header("location:errorimage.php");
		echo "<img src='$target_file' alt='Uploaded Image'>";
		
	}
	else
		echo "<script> Alert('Ok') </script>";
		//header("location:owner.php");
}
else
{	echo "<script> alert('Not Enter'); </script>";
	if(mysqli_query($conn,"UPDATE owner set OName='$name', Address='$address', DateOfBirth='$dob', PhoneNo='$phone' where Id='$ownerid' "))
	{
		echo "Success3";
	}
	else
	{
		echo mysqli_error($conn);	
	}

	//header("location:owner.php");
}
	
}

header("location:editprofile.php?")
?>