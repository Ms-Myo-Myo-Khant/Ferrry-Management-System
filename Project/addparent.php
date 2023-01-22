<?php
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$sid    =$_SESSION['sid'];
$subid  =$_SESSION['subid'];


$name = $_POST['name'];
$grade = $_POST['grade'];
$pname = $_POST['pname'];
$nrc = $_POST['nrc'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];


// $name = $_GET['name'];
// $grade = $_GET['grade'];
// $pname = $_GET['pname'];
// $nrc = $_GET['nrc'];
// $phone = $_GET['phone'];
// $email = $_GET['email'];
// $address = $_GET['address'];

$_SESSION['name']=$name;
$_SESSION['grade']=$grade;
$_SESSION['phone']=$phone;
$_SESSION['email']=$email;
$_SESSION['address']=$address;

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


$page="studentlist.php";
if($name==null ||$pname==null || $email==null || $nrc==null|| $phone==null){
	 echo "<script> alert('null'); </script>";
	//header("location:NotEnoughInfo.php?page=".$page);		
}
else if((!(isValidEmail($email)))|| (!(isValidPhone($phone))) || (!(isValidNRC($nrc))) ){
	 echo "<script> alert('dataformatwrong'); </script>";
	//header("location:errorformat.php?page=".$page);
}
else
{
	$addparent = mysqli_query($conn,"INSERT into parent (PName,PNRC) values('$pname','$nrc')");
	$pid = mysqli_insert_id($conn);

	$addstudent= mysqli_query($conn,"INSERT into student(	StuName,Grade,PhoneNo,Email,Address,PId,SId,SubId,YN) values('$name','$grade','$phone','$email','$address','$pid','$sid','$subid','1') ");
	$stuid= mysqli_insert_id($conn);

	for($i=1;$i<=12;$i++)
	{
		if($i!=4 and $i!=5)
		{
			mysqli_query($conn,"INSERT into pickup (StuId,Month,Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31) values('$stuid','$i','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111','111111') ");
		}
	}
	if ($pid && $stuid) {
		echo "<script> alert('done'); </script>";
		//header("location:stusuccesspwd.php");
		$_SESSION["email"]=$email;
		$_SESSION["name"]=$pname;
		}

}

?>