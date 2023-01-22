
<!-- <?php 

$email=$_POST['email'];
if(isset($_POST['rsubmit'])){ 
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
<h2 style="font-size:20px;color: green;padding:5px;">Your Account Password Is Successfully Reseted.</h2>
<div class="errorimg"><img src="images/successnew.png" width="100px" height="100px"></div>
<div  >You can go back to login.</div>
<form action=" " method="post">
<input type="submit" name="rsubmit" class="button" value="Back">
</form>
</div>

<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>