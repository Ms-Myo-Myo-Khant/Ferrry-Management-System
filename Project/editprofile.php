<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php"); 
}
else{
					function isValidEmail($email) {
                        $emailRegExp ="/^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/";
                                                return (preg_match($emailRegExp,$email));
                    }

                    function isValidNRC($nrc) {
                        $nrcRegExp = "/^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/";
                        return (preg_match($nrcRegExp,$nrc));
                    }

                    function isValidPhone($tel) {
                        $telRegExp ="/^[0-9]{2}[0-9]{9,13}$/";
                        return (preg_match($telRegExp,$tel));
                    }


	$ownerid=$_SESSION['ownerid'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$nrc = $_POST['nrc'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];

$page="owner.php";
if($name==null || $email==null || $nrc==null|| $phone==null){
	 echo "<script> alert('null'); </script>";
	header("location:NotEnoughInfo.php?page=".$page);		
}
else if((!(isValidEmail($email)))||(!(isValidNRC($nrc)))||(!(isValidPhone($phone)))){
	 echo "<script> alert('dataformatwrong'); </script>";
	header("location:errorformat.php?page=".$page);
}
else{
	// image
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
					echo "Success";
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
					echo "Success";
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
	else{
		header("location:owner.php");
	}
}
else
{
	if(mysqli_query($conn,"UPDATE owner set OName='$name', Address='$address', DateOfBirth='$dob', PhoneNo='$phone' where Id='$ownerid' "))
	{	
		echo "<script> alert('Edit without image'); </script>";
		echo "Success";
	}
	else
	{
		echo mysqli_error($conn);	
	}

	header("location:owner.php");
}


	
}

}



?>