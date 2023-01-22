<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
	{
	    header("location:landingpage.php");
	}

			function isValidCarno($carno) {
	            $carnoRegExp = "/^[0-9 a-z A-Z]{2}\-[0-9]{4}$/";
	            return (preg_match($carnoRegExp,$carno));
	        }

	        function isValidSeats($seats) {
	            $seatsRegExp = "/^[0-9]+$/";
	            return (preg_match($seatsRegExp,$seats));
	        }



$ownerid=$_SESSION['ownerid'];

$cid    =$_SESSION['cid'];
$model = $_POST['model'];
$type = $_POST['type'];
$carno = $_POST['carno'];
$noofseats = $_POST['seats'];
$color = $_POST['color'];
$school=$_POST['school']; 
$assign = $_POST['assign'];

// $model = $_GET['model'];
// $type = $_GET['type'];
// $carno = $_GET['carno'];
// $noofseats = $_GET['seats'];
// $color = $_GET['color'];
// $school=$_GET['school']; 
// $assign = $_GET['assign'];

$page="carinfo.php";
if($model==null || $carno==null|| $noofseats==null){
	header("location:NotEnoughInfo.php?page=".$page);		
}
else if((!(isValidCarno($carno)))||(!(isValidSeats($noofseats))) ){
	header("location:errorformat.php?page=".$page);
}
else {
	$schoolsql  = mysqli_query($conn,"SELECT * from school where SName='$school'");
	$schoolresult= mysqli_fetch_assoc($schoolsql);
	$sid = $schoolresult['SId'];
	
	$subidsql = mysqli_query($conn,"SELECT MAX(SubId)as maximum from assign where SId='$sid'"); 
	$subidresult=mysqli_fetch_assoc($subidsql);
	$subid = $subidresult['maximum']+1;
	
//count
	$carsql = mysqli_query($conn,"select * from car");
	$count  = mysqli_num_rows($carsql);
	
// image	

	$fileinfo = PATHINFO($_FILES["photo"]["name"]);
	$newFilename="car".($count+1). "." . $fileinfo['extension'];	
	$target_file="Uploads/".$newFilename;

	$uploadok=1; $check=1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if($_FILES["photo"]["size"]>500000)
	{
		header("location:errorimagesize.php");
		//	$uploadok=0;
	}
	if($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="jpeg")
	{
		$check=0; $uploadok=0;
	}

	if($uploadok==0)
	{
		echo "<br> Sorry, your file was not uploaded";
	}
	else
	{	
		if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
		{
			echo "<img src='".$target_file."' alt='Uploaded Image'>";
	
			if($carAdd=mysqli_query($conn,"INSERT into car (Model,Type,CNo,NoOfSeats,Color,Photo) values('$model','$type','$carno','$noofseats','$color','$target_file')"))
			{
					echo "Success";
			}
			else
			{
				echo mysqli_error($conn);
			}
			$cid = mysqli_insert_id($conn);
	
	
				if(!mysqli_query($conn,"INSERT into assign (Id,CId,SId,SubId,SType) values('$ownerid','$cid','$sid','$subid','$assign')"))
				{
					echo mysqli_error($conn);
				}

				}
				else 
				{
					echo "error";
				}
	}

	if($check=0)
	{
		header("location:erroriamge.php");
	}
	else
	{
		header("location:carinfo.php");
	}
	//mysqli_query($conn,"INSERT into assign (Id,CId) values('$ownerid','$cid') ");

}


?>