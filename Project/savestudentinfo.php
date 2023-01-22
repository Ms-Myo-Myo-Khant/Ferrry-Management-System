<?php
session_start();
include("confs/config.php");
if (!$_SESSION['auth']) {
    header("location:landingpage.php");
}

$sid  = $_SESSION['sid'];
$subid = $_SESSION['subid'];
$stuid = $_SESSION['stuid'];

//$email=$_POST['editstuemail'];
//$grade=$_POST['editstugrade'];
//$phone=$_POST['editstuphone'];
//$address=$_POST['editstuaddress'];
//$pname=$_POST['editstupname'];
//$pnrc=$_POST['editstupnrc'];

//$stuid=$_POST['hiddenstuid'];
                    function isValidEmail($email) {
                        $emailRegExp ="/^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/";
                                                return (preg_match($emailRegExp,$email));
                    }

                    function isValidNRC($nrc) {
                        $nrcRegExp = "/^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/";
                        return (preg_match($nrcRegExp,$nrc));
                    }

                    function isValidPhone($tel) {
                        $telRegExp ="/^[0-9]{2}[0-9]{9,13}$/";
                        return (preg_match($telRegExp,$tel));
                    }


$name = $_POST['name'];
$grade = $_POST['grade'];
$pname = $_POST['pname'];
$pnrc = $_POST['pnrc'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

$page="studentlist.php";
if($name==null ||$pname==null || $email==null || $pnrc==null|| $phone==null){
     echo "<script> alert('null'); </script>";
    //header("location:NotEnoughInfo.php?page=".$page);     
}
else if((!(isValidEmail($email)))|| (!(isValidPhone($phone))) || (!(isValidNRC($pnrc))) ){
     echo "<script> alert('dataformatwrong'); </script>";
    //header("location:errorformat.php?page=".$page);
}
else
{
    if (mysqli_query($conn, "UPDATE student set StuName='$name',Email='$email',Grade='$grade',PhoneNo='$phone',Address='$address' where StuId='$stuid'")) 
    {
        echo "Success";
    } 
    else 
    {
        echo mysqli_error($conn);
    }
    $pidsql = mysqli_query($conn, "SELECT PId from student where StuId='$stuid'");
    $pid    = mysqli_fetch_assoc($pidsql);
    $real   = $pid['PId'];
    mysqli_query($conn, "UPDATE parent set PName='$pname', PNRC='$pnrc' where PId='$real' ");

     echo "<script> alert('Done'); </script>";
    header("location:studentlist.php");
}

?>
