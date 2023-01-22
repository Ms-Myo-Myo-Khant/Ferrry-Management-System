 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/animate.css">   
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    
<style type="text/css">
	html{
 		width: 99.99%;]
 	height: 650px;
 	margin-left: 0px;
 	 	/*background: linear-gradient(pink,lightseagreen);*/
 	background:#808080;
 	/*background-position: center;*/
 	background-repeat: repeat;
 	background-size: cover;

 }

 .errorsignin{
 	width: 400px;
 	height: 500px;
 	margin:0px auto;
 	background: white;
 	background-size: cover;
 	 
 	border-radius: 15px;
 	margin-top: 110px;
 	border:1px solid grey;
 	/*filter: blur(3px);*/
 }
  .errorsignin h2{
 	color: green;
 	font-size: 30px;
 }
 .errorimg{
 	margin:0px auto;
 	margin-top: 25px;
 	text-align: center;
 }
 .errtext{
 	text-align: center;
 	padding: 15px;
 	width: 80%; 
 	margin: 0px auto; 
 	font-size: 20px; 
 	color: black;

 }
 .pswtext{
 	text-align: center;
 	padding: 15px;
 	width: 50%; 
 	margin: 0px auto; 
 	font-size: 20px; 
 	color: green;
 	font-size: 20px;
 	border: 1px solid green;
 	height: 30px;


 }
 .errorsignin .button{
 	background: gold;
 	color: black;
 	width: 50%; 
 	border:0;
 	font-size: 20px;
 	box-shadow: 0; 
 	margin:0px auto;
 	margin-top:40px;
 	border-radius: 5px;
 	text-decoration: none;
 	 line-height: 50px;
 }
</style>
	
</head>
<body>
<div class="animated bounceIn errorsignin">
<h2><a href="driverinfo.php"> <i class="fa fa-arrow-circle-left" style="font-size: 50px;padding: 10px;color: gold;padding-right: 30px;"></i><a><span style="color: gold;">Register successfully</i></h2>

<div class="errorimg"><img src="images/successnew.png" width="100px" height="100px"></div>


<?php  
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@$#';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
    
}
 
function bsend()
{
$password=randomPassword(); 
if (!isset($_POST["sendpwd"])) {
	
	 
echo '<div class="errtext">You have to send password for your driver login! </div>';
 
echo '<form action="" method="post"><input type="submit" name="sendpwd" class="button" value="Send Password" style="margin-left: 100px;width: 170px;"></form>';	
}
else
{
session_start();
$email=$_SESSION['email'];
$name=$_SESSION['name']; 
 	include("confs/config.php"); 
		 if(!mysqli_query($conn,"UPDATE driver set DPassword='$password' where Email='$email' and DName='$name'"))
		{
			echo mysqli_error($conn);
		}
		 
		else
			{
				$to = $email;
                $subject = "FMS Confirm Password For Login";
                $mailContent = '<p style="color:purple;font-size:15px;">Dear '.$name.', 
                <br/>Recently you  was registered as a driver in FMS.
                <br/>Use the following password for your login:</p><h2 style="color:green;text-align:center;border: 1px solid green;height: 35px;width:50%">'.$password.'</h2> 
                <br/><p style="color:purple;font-size:15px;">Regards,
                <br/>FMS.<p>';
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: FMS<Ferry Management System> ' . "\r\n";
                //send email
                mail($to,$subject,$mailContent,$headers);
				echo '<div class="errtext">Password is successfully sent to your driver.</div>';
			}	
		 
		
}
}
bsend();
?>




</div>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
