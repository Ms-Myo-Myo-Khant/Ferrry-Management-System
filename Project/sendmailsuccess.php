
<!-- <?php 

$email=$_POST['email'];
if(isset($_POST['ssubmit'])){ 
    $_SESSION['sessData'] = $sessData;
     $redirectURL ='landingpage.php';
     
    header("Location:$redirectURL");

}
?> -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/successsignin.css">
<style type="text/css">

</style>
	
</head>
<body>

<div class="animated bounceIn errorsignin">
<h2 style="font-size:22px;color: green;">Your Account Password Reset Is Successfully Requested !</h2>
<div class="errorimg"><img src="images/successnew.png" width="100px" height="100px"></div>
<div style="font-size: 15px;">Please check your e-mail,we have sent a password reset link to your registered email.</div>
<form action="landingpage.php">
<input type="submit"  name="ssubmit" class="button" value="Back">
</form>
</div>

<script type="text/javascript" src="s/jquery.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>