<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$cid = $_GET['cid'];
$_SESSION['cid']=$cid;


header("location:pickup.php");

?>