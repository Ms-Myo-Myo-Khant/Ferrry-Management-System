<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/cv.css">

	<style type="text/css">
		
		.containertab{
			width: 1200px;
			margin: 0px auto;
			background: transparent;
			border: 1px solid #3ed758;
			margin-top: 25px;
		}

		.crosscv{
			float: right;
			margin-top: 20px;
			margin-right: 30px;
			cursor: pointer;
			font-size: 35px;
			opacity: 0.6;
		}

		.butcv{
			width: 900px;
			margin: 0px auto;
			margin-top: 40px;
		}

		.titlecv{
			width: 900px;		
			text-align: center;
			margin:0px auto;				
			border-top: 1px solid black;
			margin-bottom: 30px;
		}

			.butcv{
				width: 900px;
				margin: 0px auto;
				margin-top: 40px;
			}

			.fms{
				font-size: 45px;
				font-weight: bold;
				color: #3ed758;
			}
			.exploremore{
				/*font-size: 20px;
				margin-left: -115px;*/
				/*background: black;*/
				color: #3ed758;

			}


			.butcv .cvone,.butcv .cvtwo,.butcv .cvthree{
				width: 110px;
				height: 45px;
				border: none;
				box-shadow: none;
				background: black;
				color: white;			
			}

			.butcv .cvone:hover,.butcv .cvtwo:hover,.butcv .cvthree:hover{
				opacity: 0.7;
			}

			.viewcv{
				width: 500px;
				margin: 0px auto;
				margin-top: 35px;
			}

			

			input[type='text'],input[type='password'],input[type='date'],input[type='telephone'],input[type='email']{
				width: 90%;
				height: 50px;
				text-align: left;
				padding-left: 10px;
				margin: 10px 0 10px 0;
			}

			input[type='submit']{
				width: 92.8%;
				height: 45px;
				text-align: center;
				margin:10px 0 10px 0;
				border: 1px solid #3ed758;
				background: transparent;
				color: black;
				font-size: 19px;

			}

			input[type='submit']:hover{
				background: #3ed758;
				/*border: 1px solid black;*/
				color: white;
			}

			.labelcv{
				width: 90%;
				margin: 0px auto;
				text-align: left;
				font-size: 20px;
				margin-top: 5px;
			}

			.linecv{
				border-top: 2px solid black;
				width: 100px;
				margin: 0px auto;
			}

			.addcv{
				width: 500px;
				margin: 0px auto;
				margin-top: 35px;
				display: none;
			}

	</style>
</head>
<body>



	<div class="containertab">
		

		 <span class="crosscv">&times;</span>

			 	<div class="butcv">
			 			
			 		<button class="cvone">View</button>
			 		<button class="cvtwo">Add</button>
			 		<!-- <button class="cvthree">Car</button> -->


			 	</div>
		        <div class="titlecv">
		           <h1>Welcome to <span class="fms">FMS</span></h1>
		           <div class="linecv"></div>
		           <h3>Sign Up to <span class="exploremore">Explore more</span>....</h3>

		           <div class="viewcv">
							
							<div class="labelcv">Name</div>
							<input type="text" name="name" placeholder="Name">
							<div class="labelcv">Email</div>
							<input type="email" name="email" placeholder="Email">
							<div class="labelcv">NRC</div>
							<input type="text" name="nrc" placeholder="NRC(eg.7/manyana(MNN)123456)..">
							<div class="labelcv">Address</div>
							<input type="text" name="address" placeholder="Address(No,Street,Block,Township)">
							<div class="labelcv">Phone</div>
							<input type="telephone" name="phone" placeholder="Phone">
							<div class="labelcv">DOB</div>
							<input type="date" name="bday">
							<div class="labelcv">Password</div>
							<input type="password" name="password" placeholder="Password">

							<input type="submit" name="submit" value="Submit">
							
					</div>	

					<div class="addcv">
							
							<div class="labelcv"> Driver Name</div>
							<input type="text" name="name" placeholder="Name">
							<div class="labelcv">Email</div>
							<input type="email" name="email" placeholder="Email">
							<div class="labelcv">NRC</div>
							<input type="text" name="nrc" placeholder="NRC(eg.7/manyana(MNN)123456)..">
							<div class="labelcv">Address</div>
							<input type="text" name="address" placeholder="Address(No,Street,Block,Township)">
							<div class="labelcv">Phone</div>
							<input type="telephone" name="phone" placeholder="Phone">
							
							<div class="labelcv">Driver License</div>
							<input type="text" name="driverlicense" placeholder="eg..">
							<div class="labelcv">DOB</div>
							<input type="date" name="bday">
							<div class="labelcv">Year of Experience</div>
							<input type="text" name="yoe" placeholder="eg.7..">
							
							<div class="labelcv">Password</div>
							<input type="password" name="password" placeholder="Password">

							<input type="submit" name="submit" value="Submit">
							
					</div>

				</div>



	</div>



	<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/signup.js"></script>

	<script type="text/javascript">
		
		$(".cvtwo").click(function(){

					$(".addcv").show();
					$(".viewcv").hide("slow");
					// $(".schoolcontentcv").hide("slow");
					$(".cvtwo").css("background-color","grey");
					$(".cvone").css("background-color","black");
					// $(".cvthree").css("background-color","black");

			});

			$(".cvone").click(function(){

					$(".addcv").hide("slow");
					$(".viewcv").show("slow");
					// $(".schoolcontentcv").hide("slow");
					$(".cvtwo").css("background-color","black");
					$(".cvone").css("background-color","grey");
					// $(".cvthree").css("background-color","black");


			});

			// $(".cvthree").click(function(){

			// 		$(".drivercontentcv").hide("slow");
			// 		$(".ownercontentcv").hide("slow");
			// 		$(".schoolcontentcv").show("slow");
			// 		$(".cvtwo").css("background-color","black");
			// 		$(".cvone").css("background-color","black");
			// 		$(".cvthree").css("background-color","grey");


			// });


			$(".crosscv").click(function(){
				$(".containercv").hide("slow");
			});

	</script>
</body>
</html>