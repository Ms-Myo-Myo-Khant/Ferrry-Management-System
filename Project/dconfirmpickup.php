<?php 
session_start();
 include("confs/config.php");
 if(!$_SESSION['driverauth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}
 //echo "Confirm ".$_GET['stuid'];

$stuid = $_GET['stuid'];

$confirmpickup = mysqli_query($conn,"UPDATE student set YN=0 where StuId='$stuid'");
header("location:dpickup.php");

?>