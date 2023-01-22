<?php

include("confs/config.php");
 
 
//mail function
        function sentmail($email,$name,$link)
                {
                 $to =$email;
                $subject = "Password Update Request";
                $mailContent = 'Dear '.$name.', 
                <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                <br/>To reset your password, visit the following link: <a href="'.$link.'">'.$link.'</a>
                <br/><br/>Regards,
                <br/>FMS.';
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: FMS<Ferry Management System> ' . "\r\n";
                //send email
                mail($to,$subject,$mailContent,$headers);
                }

//conditions start
if(isset($_POST['forgotSubmit']))
{ 
  $email=$_POST['email']; 
  
  $parentsql="SELECT * FROM student WHERE Email='$email'";
  $parentresult=mysqli_query($conn,$parentsql);
  $parentcount=mysqli_num_rows($parentresult);

  $driversql="SELECT * FROM driver WHERE Email='$email'";
  $driverresult=mysqli_query($conn,$driversql);
  $drivercount=mysqli_num_rows($driverresult);

  $ownersql="SELECT * FROM owner WHERE Email='$email'";
  $ownerresult=mysqli_query($conn,$ownersql);
  $ownercount=mysqli_num_rows($ownerresult);

      if($parentcount>0 && $drivercount<=0 && $ownercount<=0 )
        {
        //this account is parent   
             $uniqidStr = md5(uniqid(mt_rand()));; 
              $update=mysqli_query($conn, "UPDATE student set Pforgotidentity='$uniqidStr' where Email='$email'"); 
                  if($update){
                      $resetPassLink ='http://localhost/fms%20project/fms2.1/resetPassword.php?fp_code='.$uniqidStr;
                      $psql = "SELECT * from  student  where Email='$email'";
                      $presult = $conn->query($psql); 
                while ($prow = $presult->fetch_assoc()) {
                    $pname = $prow["StuName"];
                }
                      
                      //send reset password email
                      sentmail($email,$pname,$resetPassLink); 
                      $sessData['status']['type'] = 'success';
                      $sessData['status']['msg'] = 'Please check your e-mail, we have sent a password reset link to your registered email.';  
                      } 
                      else{
                      $sessData['status']['type'] = 'error';
                      $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                  }   
             } 
      else if($parentcount<=0 && $drivercount>0 && $ownercount<=0)
          {

            //this account is driver

            $uniqidStr = md5(uniqid(mt_rand()));; 
            $update=mysqli_query($conn, "UPDATE driver set Dforgotidentity='$uniqidStr' where Email='$email'"); 
                    if($update){
                        $resetPassLink ='http://localhost/fms%20project/fms2.1/resetPassword.php?fp_code='.$uniqidStr;
                        $dsql = "SELECT * from  driver  where Email='$email'";
                        $dresult = $conn->query($dsql);
                       while ($drow = $dresult->fetch_assoc()) {
                    $dname = $drow["DName"];
                    }
                   
                        //send reset password email
                        sentmail($email,$dname,$resetPassLink); 
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = 'Please check your e-mail, we have sent a password reset link to your registered email.';  
                        } 
                        else{
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                    }

          }  

      else if($parentcount<=0 && $drivercount<=0 && $ownercount>0)
          {
            //this account is owner
              $uniqidStr = md5(uniqid(mt_rand()));; 
              $update=mysqli_query($conn, "UPDATE owner set Oforgotidentity='$uniqidStr' where Email='$email'"); 
                    if($update){
                        $resetPassLink ='http://localhost/fms%20project/fms2.1/resetPassword.php?fp_code='.$uniqidStr;
                        $Osql = "SELECT * from  owner  where Email='$email'";
                        $Oresult = $conn->query($OSql);
                        while ($Orow = $Oresult->fetch_assoc()) {
                       $Oname = $Orow["OName"];
                      }
                 
                        //send reset password email
                        sentmail($email,$Oname,$resetPassLink); 
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = 'Please check your e-mail, we have sent a password reset link to your registered email.';  
                        }
                        else{
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                    }

          }  
          else
        {
          $sessData['status']['type'] = 'error';
           $sessData['status']['msg'] = 'Given email is not associated with any account.'; 
          
        }
   
                  
    if ($sessData['status']['type'] == 'success') {
       
     $redirectURL = 'sendmailsuccess.php' ; 
    header("Location:$redirectURL");

    }
     echo "<meta http-equiv='refresh' content='1'>";

 } 

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/forgot_reset.css">
</head>
<body>

 

 <div class="cov"  style="z-index: 1;height: 280px;width: 300px;">
              
                <div class="form-container">
                    <br><p style="font-size: 20px;">
                   <a href="landingpage.php"   >Home  &nbsp;</a><span  style="color: grey;"> /&nbsp;Forgot Password</span></p>
                  
                    <?php 

                      
               if (isset($sessData['status']['msg']))
                 {
                    if ($sessData['status']['msg']=='Please check your e-mail, we have sent a password reset link to your registered email.')
                     {
                         echo'<p style="color:green;">'.$sessData['status']['msg'].'</p>' ; 
                          
                    }
                    else if($sessData['status']['msg']=='Given email is not associated with any account.')
                    {
                       echo'<p style="color:red;">'.$sessData['status']['msg'].'</p>' ;
                        
                    }
                     
                  }
                  else 
                    echo '<p style="color:grey;"> Enter the Email of Your Account to Reset New Password.</p>';

                  
                     ?>    
                    
                  <form name="lgform" class="form"  method="POST" action="#">
                 
                    <label class="name">Enter email
                      <input class="nametext" name="email" type="email" placeholder="" required=""> 
                    </label>
 
                   <br>
                   <input type="submit" name="forgotSubmit" value="Send New Password" class="submitlg" >

                    
                   </form>
                </div>
          </div>     
</body>
</html>
 


 
 