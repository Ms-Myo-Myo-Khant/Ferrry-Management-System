<!DOCTYPE html>
<html>
<head>	
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/errlogin.css">
<style type="text/css">
	
</style>
	
</head>
<body>
<?php
session_start();
include("confs/config.php");

$page=$_GET['page'];
?>
<div class="animated shake errorsignin">
<h2>Not Enough Information</h2>
<div class="errorimg"><img src="images/errorcross.png" width="100px" height="100px"></div>
<div class="errtext">You must fill '<b style="color:red">*</b>' mark at least.</div>
<a class="button" href="<?php echo $page?>">Try Again</a>
</div>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.errorsignin').draggable();
	});
</script>
</body>
</html>