<!doctype html>
<html lang="en">

<head>
  
  <title>Ferry Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">


  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/landingstyle.css">

  <style type="text/css">

  	body{
  		background: #ebeeef;
  	}

  	.signup{
  		position: relative;
  		width:700px;
  		height: 850px;
  		max-height: 850px;
  		margin: 0px auto;
  		background: #fff;
  		border-radius: 7px;
  		/*-webkit-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.7);
		-moz-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.7);
		box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.7); */
		margin-top: 50px;


  	}

  	.signup .header{
  		width: 100%;
  		height: 200px;
  		display: block;
  		margin: 0px auto;
  		background-image: url(images/ferryschool.jpg);
  		background-position:50px -130px;
  		filter: blur(1px);
  	}

  	.headertxt{
  		
	  color: white;
	  font-weight: bold;
	  position: absolute;
	  top: 100px;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  z-index: 2;
	  width: 100%;
	  height: 200px;	  
	  font-size:37px;
	  padding: 20px;
	  text-align: center;
	  line-height:150px;
	  /*background-color: rgb(0,0,0); */
	  background-color: rgba(54,84,99,0.7);
	  border-top-left-radius: 7px;
	  border-top-right-radius: 7px;
  	}

  	.signup span{
  		color: #808080;
  	}

  	.signup .content {
  		display: block;
  		width: 100%;
  		height: 650px;
  		margin: 0px auto;
  		background: #fff;
  		border-bottom-left-radius: 7px;
	  	border-bottom-right-radius: 7px;
  	}

  	.inpcon{
  		width: 100%;
  		height: 60px;
  		/*background: grey;*/
  		display: block;
  		margin: 0px auto;
  		margin-top: 10px;	
  	}

  	.inpcon:nth-child(1){
  		margin-top: 20px;
  	}

  	.labelsg{
  		float: left;
  		width: 35%;
  		height: 60px;
  		line-height: 60px;
  		text-align: center;
  		color: #808080;
  	}

  	.boxsg{
  		float: right;
  		width: 45%;
  		height: 60px;
  		margin-right: 20%;
  		border:none;
  		border-bottom: 1px solid grey;
  		outline: none;
  		color: #555555;
  	}

  	.butsg{
  		width: 100%;
  		height: 50px;
  		display: block;
  		/*background: grey;*/
  		margin-top: 30px;
  		margin-bottom: 20px;
  	}

  	.butsg .sgthree{
  		display: block;
  		width: 150px;
  		height: 50px;
  		border:none;
  		box-shadow: none;
  		border-radius: 25px;
  		margin: 0px auto;
  		/*background: #57b846;*/
      background: gold;
  		color: black;
  		transition: .6s;
  	}

  	.sgfile{
  		display: block;
  		width: 150px;
  		height: 60px;
  		border:none;
  		box-shadow: none;
  		/*border-radius: 25px;*/
  		/*margin: 0px auto;*/
  		background: #57b846;
  		color: #fff;
  		transition: .6s;
  		margin: 0px;
  		margin-left: 30px;
  		/*position: absolute;*/
  		outline: none;
  		line-height: 0px;
  	}

  	.butsg .sgthree:hover{
  		background: #fff;
  		color:#000;
      border: 1px solid gold;
  		transition: .6s;
  	}


    .sgfile:hover{
      background: #222;
      color:#fff;
      transition: .6s;
    }

  	/*.signup .hiddencontent{
  		display: block;
  		width: 100%;
  		height: 650px;
  		background: grey;
  		border-bottom-left-radius: 7px;
	  	border-bottom-right-radius: 7px;
  	}*/



  </style>

</head>

<body>

  	  <div class="signup">
  	  	
  	  		<div class="header">
  	  			
  	  		</div>

  	  		<div class="headertxt">
  	  			SIGNUP
  	  		</div>
  	  	<form method="post" action="signup.php" enctype="multipart/form-data" id="regiform">	
  	  		<div class="content">
  	  			<div class="inpcon">
	  	  			<div class="labelsg">Name
	  	  				<b style="color:red"> *</b>
	  	  			</div>
					<input type="text" name="name" placeholder="Name" class="boxsg" id="sgkhname">
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">Email<b style="color:red"> *</b></div>
					<input type="email" name="email" placeholder="Email" class="boxsg" id="sgkhemail">
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">NRC<b style="color:red"> *</b></div>
					<input type="text" name="nrc" placeholder="NRC(eg.7/manyana(MNN)123456).." class="boxsg" id="sgkhnrc">
          <span id="pnrc"></span>
          <span id="pnrc1"></span>
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">Address</div>
					<input type="text" name="address" placeholder="Address(No,Street,Block,Township)" class="boxsg" id="sgkhaddress">
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">Phone<b style="color:red"> *</b></div>
					<input type="telephone" name="phone" placeholder="Phone" class="boxsg" id="sgkhtelephone">
  	  			</div>


  	  			<div class="inpcon">
					<div class="labelsg">DOB</div>
					<input type="date" name="dob" class="boxsg" id="dob">
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">Owner Password<b style="color:red"> *</b></div>
					<input type="password" name="password" placeholder="Password" class="boxsg" id="ownerkhpw">
  	  			</div>

  	  			<div class="inpcon">
	  	  			<div class="labelsg">Confirm Password<b style="color:red"> *</b></div>
					<input type="password" name="cpassword" placeholder="Confirm Password" class="boxsg" id="ownerkhconfirmpw">
  	  			</div>

  	  			<div class="butsg">  	  
  	  				<a href="landingpage.php" style="margin-left: 10px;border-bottom: 1px solid #20c997;padding-bottom: 10px;"><i class="fa fa-long-arrow-left" style="color: "></i>&nbsp;&nbsp;&nbsp;&nbsp;Back to FMS</a>				
					<button class="sgthree" style="display: inline-block;margin-left: 20%;outline: none;">Submit</button>

				</div>
				
  	  		</div>


  	  		<!-- <div class="hiddencontent">
  	  			
  	  			<div class="butsg">

					<button class="sgfile">
						<input type='file' name='photo' style="position:inline;outline: none;opacity:0;width: 150px;">Browse
							
					</button>
					
  	  			</div>

  	  		</div> -->


  	  	</form>
  	  </div>

	  <!-- loader -->
	  <div id="loader" class="show fullscreen">
	  	<svg class="circular" width="48px" height="48px">
		      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
		        stroke="#f4b214" />
    	</svg>
   	  </div>

  <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/landingmain.js"></script>

  <script type="text/javascript">
      
      $(".fblanding").addClass("active");

            var form = $('#regiform');
            var ownerkhpw=$('#ownerkhpw');
            var ownerkhconfirmpw=$('#ownerkhconfirmpw');


            $(form).submit(function(event) {
              // Stop the browser from submitting the form.
              event.preventDefault();

              function isValidEmail(email) {
    var emailRegExp = /^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/gi;
    return (emailRegExp.test(email));
  }

  function isValidNRC(nrc) {
    var nrcRegExp = /^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/gi;
    return (nrcRegExp.test(nrc));
  }

  function isValidPhone(tel) {
    var telRegExp = /^[0-9]{2}[0-9]{9,13}$/gi;
    return (telRegExp.test(tel));
  }

  var sgkhname = $("#sgkhname");
  var sgkhemail = $("#sgkhemail");
  var sgkhnrc = $("#sgkhnrc");
  var sgkhaddress = $("#sgkhaddress");
  var sgkhtelephone = $("#sgkhtelephone");
  sgkhname.css("border-bottom", "1px solid gray");
  sgkhemail.css("border-bottom", "1px solid gray");
  sgkhnrc.css("border-bottom", "1px solid gray");
  sgkhtelephone.css("border-bottom", "1px solid gray");
  var flag=1;

  // empty value start


  if (sgkhname.val() == 0 || sgkhemail.val() == 0 || sgkhnrc.val() == 0 || sgkhtelephone.val() == 0) {
    if (sgkhname.val() == 0) {
      sgkhname.css("border-bottom", "1px solid red");
    }
    if (sgkhemail.val() == 0) {
      sgkhemail.css("border-bottom", "1px solid red");
    }
    if (sgkhnrc.val() == 0) {
      sgkhnrc.css("border-bottom", "1px solid red");
      $('#pnrc1').text("Empty");
    $('#pnrc1').css("color","red");
    $('#pnrc1').css("text-align","center");
    }
    if (sgkhtelephone.val() == 0) {
      sgkhtelephone.css("border-bottom", "1px solid red");
    }
    flag=0;
  }


  // empty value end



  // valid email start

  if (!isValidEmail(sgkhemail.val())) {
    sgkhemail.css("border-bottom", "1px solid red");
    flag=0;
  }
  // valid email end



   



  // validnrc start

  if (!isValidNRC(sgkhnrc.val())) {

    if (sgkhnrc.val() == 0) {
      sgkhnrc.css("border-bottom", "1px solid red");
      $('#pnrc1').text("Empty");
    $('#pnrc1').css("color","red");
    $('#pnrc1').css("font-size","10px;");
    $('#pnrc1').css("text-align","center");
    $('#pnrc1').css("display","block");
    $('#pnrc').css("display","none");
    }
    else{
      sgkhnrc.css("border-bottom", "1px solid red");
    $('#pnrc').text("Invalid Number");
    $('#pnrc').css("color","red");
    $('#pnrc').css("font-size","10px;");
    $('#pnrc').css("text-align","center");
    $('#pnrc').css("display","block");
    $('#pnrc1').css("display","none");
    }
    flag=0;

    }
    else{
      $('#pnrc').css("display","none");
      $('#pnrc1').css("display","none");
    }

    // end validnrc

    // start valid phone

    if (!isValidPhone(sgkhtelephone.val())) {
      sgkhtelephone.css("border-bottom", "1px solid red");
      flag=0;
    }


    // end valid phone

 
  if(flag) {
    sgkhname.css("border-bottom", "1px solid gray");
    sgkhemail.css("border-bottom", "1px solid gray");
    sgkhnrc.css("border-bottom", "1px solid gray");
    sgkhtelephone.css("border-bottom", "1px solid gray");
    $(".drivercontentsg").show();
    $(".ownercontentsg").hide();
    $(".schoolcontentsg").hide();
  }

              ownerkhpw.css("border-bottom","1px solid gray");
                ownerkhconfirmpw.css("border-bottom","1px solid gray");
              // TODO
              if(ownerkhpw.val()!=ownerkhconfirmpw.val()||ownerkhpw.val()==0||ownerkhconfirmpw.val()==0){               
                ownerkhpw.css("border-bottom","1px solid red");
                ownerkhconfirmpw.css("border-bottom","1px solid red");
                
              }

              else{
                ownerkhpw.css("border-bottom","1px solid gray");
                ownerkhconfirmpw.css("border-bottom","1px solid gray");
                var sgkhnameval=$("#sgkhname").val();
                var sgkhemailval=$("#sgkhemail").val();
                var sgkhnrcval=$("#sgkhnrc").val();
                var sgkhaddressval=$("#sgkhaddress").val();
                var sgkhtelephoneval=$("#sgkhtelephone").val();
                var dobval=$("#dob").val();
                var ownerkhpwval=ownerkhpw.val();
                location.href="signup.php?name="+sgkhnameval+"&email="+sgkhemailval+"&nrc="+sgkhnrcval+"&address="+sgkhaddressval+"&phone="+sgkhtelephoneval+"&dob="+dobval+"&password="+ownerkhpwval;  
              }
            });
            
          </script>
</body>

</html>