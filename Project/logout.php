<?php
  session_start();
  unset($_SESSION['auth']);
  unset($_SESSION['email']);
  unset($_SESSION['ownerid']);

  unset($_SESSION['driverauth']);
  unset($_SESSION['email']);
  unset($_SESSION['driverid']);

  unset($_SESSION['authparent']);
  unset($_SESSION['email']);
  unset($_SESSION['parentid']);

  session_unset();
  session_destroy();
  header("location: landingpage.php");
?>

	