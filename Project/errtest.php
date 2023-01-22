<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
	<style type="text/css">
		.err{
			margin: 0px auto;
			text-align: center;
		}

		.err p{
			font-size: 85px;
			text-align: center;
			color: lightgrey;
			margin-top: -150px;
		}

		.err h6{
			margin-top: 100px;
			font-size: 100px;
			color: lightgrey;

		}

		.err i{
			text-align: center;
			font-size: 305px;
			color: lightgrey;
			margin-bottom: -300px;
		}

		.err .errbut{
			border:none;
			box-shadow: none;
			width: 120px;
			height: 45px;
			display: block;
			margin: 0px auto;
			background: lightgrey;
			color: white;
		}

		.err .errbut:hover{
			background: #32333f;
			color: white;
		}

	</style>
</head>
<body>
<div class="err animated fadeIn delay-1s">
		<i class="fa fa-frown-o"></i>
		<h6>2003</h6>
		<p style="margin-top: 50px;margin-bottom: 20px;">Can't connect to Mysql!!!!</p>
		<b>The network connection has been refused</b>
		<button class="errbut"  style="margin-top:30px;">Reload</button>

</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$('.errbut').click(function(){
		location.href="landingpage.php";
	});
</script>
</body>
</html>