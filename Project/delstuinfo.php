<?php 
include('confs/config.php');
// echo $_GET['stuid'];
$stuid=$_GET['stuid'];
$deletestu=mysqli_query($conn,"DELETE from student where StuId='$stuid'");

$deleteparent = mysqli_query($conn,"DELETE from parent where PId in (SELECT PId from student where StuId='$stuid') ");

header('location:studentlist.php');
?>