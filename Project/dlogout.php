<?php
  session_start();
  unset($_SESSION['driverauth']);
  unset($_SESSION['email']);
  unset($_SESSION['did']);
  session_unset();
  session_destroy();
  header("location: landingpage.php");
?>