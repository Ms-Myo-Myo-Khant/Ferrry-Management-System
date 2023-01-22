
<?php 

$val=$_GET['lang'];

session_start();

if($_GET['lang']=="en"){
  $_SESSION['langgn']='';
  $_SESSION['langid']=session_id();
  $_SESSION['langid1']='';
  $_SESSION['langgn']=$_SESSION['langid'];
  // echo "===".$_SESSION['langid'];
  echo "<script>window.history.go(-1);</script>";
}

if($_GET['lang']=="pl"){
  $_SESSION['langgn']='';
  $_SESSION['langid1']=session_id();
  $_SESSION['langid']='';
  $_SESSION['langgn']=$_SESSION['langid1'];
  // echo "===".$_SESSION['langid1'];
  echo "<script>window.history.go(-1);</script>";
}

?>