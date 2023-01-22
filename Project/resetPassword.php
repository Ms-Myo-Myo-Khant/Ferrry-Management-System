<?php

include("confs/config.php");

if(isset($_POST['resetSubmit']))
{
  
  if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code']))
     {   $fp_code = $_POST['fp_code'];
        //password and confirm password comparison
      if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }
        else
        {
            $parentsql="SELECT * FROM student WHERE Pforgotidentity='$fp_code'";
            $parentresult=mysqli_query($conn,$parentsql);
            $parentcount=mysqli_num_rows($parentresult);

            $driversql="SELECT * FROM driver WHERE Dforgotidentity='$fp_code'";
            $driverresult=mysqli_query($conn,$driversql);
            $drivercount=mysqli_num_rows($driverresult);

            $ownersql="SELECT * FROM owner WHERE Oforgotidentity='$fp_code'";
            $ownerresult=mysqli_query($conn,$ownersql);
            $ownercount=mysqli_num_rows($ownerresult);


            if($parentcount>0 && $drivercount<=0 && $ownercount<=0 )
      {
             //this account is parent   
             
             
                //update data with new password 
               $mdate= date("Y-m-d H:i:s");
               $password=$_POST['password'];
             $update=mysqli_query($conn, "UPDATE student set PPassword='$password' ,Pmodified='$mdate' where Pforgotidentity='$fp_code'"); 
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
                  }
                else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                  }
            
      }  

      else if($parentcount<=0 && $drivercount>0 && $ownercount<=0)
      {

        //this account is driver  
                //update data with new password 
               $mdate= date("Y-m-d H:i:s");
               $password=$_POST['password'];
            $update=mysqli_query($conn, "UPDATE driver set DPassword='$password' ,Dmodified='$mdate' where Dforgotidentity='$fp_code'"); 
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
                }
                else
                {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            
        }

        else if($parentcount<=0 && $drivercount<=0 && $ownercount>0)
      {
        //this account is owner
         
                //update data with new password 
               $mdate= date("Y-m-d H:i:s");
               $password=$_POST['password'];
            $update=mysqli_query($conn, "UPDATE owner set OPassword='$password',Omodified='$mdate' where Oforgotidentity='$fp_code'"); 
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
                }
                else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
              
      }
 
      else
      {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'You does not authorized to reset new password of this account.';
      }
     
    if ($sessData['status']['type'] == 'success') { 
     $redirectURL ='resetsuccess.php';
    header("Location:$redirectURL");

    }
            
        }    
        
    }
    echo "<meta http-equiv='refresh' content='2'>";
}    

?>
<!DOCTYPE html>
<html>
<head>
   
   <link rel="stylesheet" type="text/css" href="css/forgot_reset.css">
</head>
<body>
 
 <div class="cov"  style="z-index: 1;height:390px;width: 300px;">
              
                <div class="form-container" >
                     
                   <h2 style=" text-transform:uppercase;text-align: center;padding-top: 30px;font-weight: bold;color: #3ed758;">Reset Password </h2> 
                   <?php 

               if (isset($sessData['status']['msg']))
                 {
                    if ($sessData['status']['msg']=='Your account password has been reset successfully. Please login with your new password.')
                     {
                         echo'<p style="color:green;">'.$sessData['status']['msg'].'</p>' ;  
                    }
                    else if($sessData['status']['msg']=='You does not authorized to reset new password of this account.')
                    {
                       echo'<p style="color:red;">'.$sessData['status']['msg'].'</p>' ;
                    }
                    else if($sessData['status']['msg']=='Some problem occurred, please try again.')
                    {
                       echo'<p style="color:red;">'.$sessData['status']['msg'].'</p>' ;
                    }
                    elseif ($sessData['status']['msg']=='Confirm password must match with the password.') {
                     echo'<p style="color:red;">'.$sessData['status']['msg'].'</p>' ;
                    }
                     
                  }
                  else 
                    echo '<p style="color:grey;">Enter New Password to reset.<br><span style="color:red;">*Password should be more than 8 characters.*</span></p>';
                  
                     ?>   
                  <form name="lgform" class="form"  method="POST" action="#">

                    <label class="name">password
                      <input class="nametext" name="password" type="password" placeholder="" required=""> 
                    </label>
                    <br>
                    <label class="name">Confirm password
                      <input class="nametext" name="confirm_password" type="password" placeholder="" required=""> 
                    </label>
                     <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
 
                   <br> 
                   <input type="submit" name="resetSubmit" value="RESET PASSWORD" class="submitlg" >

                    
                   </form>
                </div>
        </div> 
         
             
            
      
 
</body>
</html>  