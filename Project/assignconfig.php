<?php
include("confs/config.php");
 
 
if (isset($_GET['aid'])) {
  $aid=$_GET['aid'];
 mysqli_query($conn,"DELETE From assign where ProId='$aid'"); 
  header("location:reassign.php");
}
else
echo "error";
 
?>