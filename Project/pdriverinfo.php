<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['authparent'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}
$pid=$_SESSION['parentid'];
$parent=mysqli_query($conn,"SELECT * from parent where PId='$pid'");
$prowprofile=mysqli_fetch_assoc($parent);

$student=mysqli_query($conn,"SELECT * from student where PId in (SELECT PId from parent where PId='$pid') ");
$srowprofile=mysqli_fetch_assoc($student);


$assignsql = mysqli_query($conn,"SELECT DId from assign where SId in( SELECT SId from student where PId='$pid') and SubId in(SELECT SubId from student where PId='$pid') ");
$didresult = mysqli_fetch_assoc($assignsql);
$did = $didresult['DId'];

$driversql = mysqli_query($conn,"SELECT * from driver where DId='$did' ");
$driver = mysqli_fetch_assoc($driversql);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ferry Management System</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendorhomepage/bootstrap/dist/css/bootstrap.min.css">
    <link href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="vendorhomepage/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/pdriverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/driverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/showdriverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="exponential.js"></script>
    
    <style type="text/css">
        
        
    
    </style>

</head>

<body>


    <!-- Left Panel -->                                 

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="parentindex.php"><img src="images/fmsparent.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="parentindex.php"><img src="images/logo/FMS3.png" alt="Logo" width="40px;" height="40px;"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    

                    <li >
                        <!-- <a href="owner.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> -->
                    <form class="hovform" method="post" action="parentindex.php">
                        <i class="menu-icon ti-dashboard">                             
                             <input type="submit" name="submitdashboard" value="Dashboard">
                        </i>
                           
                    </form>                    
                    </li>
                   
                    <h3 class="menu-title">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li>
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                    <form class="hovform" method="post" action="pcarinfo.php">
                        <i class="menu-icon ti-truck">
                            <input type="submit" name="submitcarinfo" value="Car Information">                            
                        </i>
                          
                    </form> 
                    </li>

                    <li class="active">                       
                    <form class="hovform" method="post" action="pdriverinfo.php">
                        <i class="menu-icon ti-user">
                            <input type="submit" name="submitdriverinfo" value="Driver Information">                            
                        </i>
                            
                    </form> 
                    </li>

                    <li>                       
                    <form class="hovform" method="post" action="pschoolinfo.php">
                        <i class="menu-icon ti-car">
                            <input type="submit" name="submitschoolinfo" value="School Information">                            
                        </i>
                            
                    </form> 
                    </li>
                                      
                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->

                    <li>
                        <!-- <a href="studentsalary.php"> <i class="menu-icon ti-credit-card"></i>Student's Salary</a> -->
                    <form class="hovform" method="post" action="pstudentsalary.php">
                        <i class="menu-icon ti-credit-card">
                            <input type="submit" name="submitstudentsalary" value="Salary">                             
                        </i>
                    </form> 
                    </li>

                    
                   
                    <h3 class="menu-title">Activity</h3><!-- /.menu-title -->


                    <li>                    
                    <form class="hovform" method="post" action="p_pk_attendance.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Attendance Record"></i>                       
                    </form> 
                    </li>

                    <li>                    
                    <form class="hovform" method="post" action="pattendance.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Edit Attendance"></i>                       
                    </form> 
                    </li>

                    <li>
                    <form class="hovform" method="post" action="ppickup.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>
                    </form> 
                    </li>


                    <li>                    
                    <form class="hovform" method="post" action="pmap.php">
                        <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>                       
                    </form> 
                    </li>

                    <li>                    
                    <form class="hovform" method="post" action="Feedback.php">
                        <i class="menu-icon ti-comments">&nbsp;<input type="submit" name="submitpickup" value="Feedback"></i>                       
                    </form> 
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- Left Panel -->



    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">




                <!-- Header-->
                <header id="header" class="header">



                    <div class="header-menu">

                        <div class="col-sm-7">
                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-sliders"></i></a>
                            <div class="header-left">
                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                               

                        <div class="col-sm-5">
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" style="width:10%; height:10%;" src="<?php echo $srowprofile['Photo'] ?>" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#profile" data-lity><i class="fa fa-user"></i> My Profile</a>                  
                                    <a class="nav-link" id="logoutbut"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                    
                    </div> 

                </header><!-- /header -->
                <!-- --------------------------------------------------------------------
                    --------------------------Header------------------------------------>




                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Driver Information</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="parentindex.php">Dashboard</a>&nbsp;/&nbsp;<a href="#">Driver Information</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content mt-3" style="overflow-y: hidden;" >

                    

                    

                    <form action="schoolinfo.php" method="post" style="margin-top: 20px;height: 840px;">
                    <div class="morecarinfo" style="width: 35%; height: 830px;box-shadow: 2px 6px 23px -5px rgba(0,0,0,0.75);border-radius: 10px;">
                        <div style="width: 100%;height: 100%background: green;margin:0px auto;margin-bottom:60px;"  class="showcar">
                                

                                <div class="showcarinfocontent">

                                <h1>Driver Information</h1>
                            

                                 <div class="headtab">
                                    <div class="profileimgparentfo">
                                        <img src="<?php echo $driver["Photo"]; ?>" style="width:100%;height:100%;" data-lity data-lity-desc="Photo of a driver">
                                    </div>
                                <table style="margin-top:-20px;">
                                <tr>
                                    <td> 
                                    <i class="ti-user">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $driver['DName']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="ti-email">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $driver['Email']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="ti-location-pin">&nbsp;&nbsp;&nbsp;</i>License Number&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $driver['LicenseNo']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="ti-location-pin">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $driver['Address']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="ti-gift">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php 
                                    
                                        $dob = $driver['DateOfBirth'];
                                        $day = (int)substr($dob,8,2);
                                        $month = (int)substr($dob,5,2);
                                        $year  = (int)substr($dob,0,4);
                                        echo $month."/".$day."/".$year;

                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="ti-mobile">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                   <?php echo $driver['PhoneNo']?>
                                    </td>
                                </tr>

                                 <tr>
                                    <td> 
                                    <i class="ti-direction-alt">&nbsp;&nbsp;&nbsp;</i>Year of Experience&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                   <?php echo $driver['YearOfExp']?>
                                    </td>
                                </tr>
                                    </table>
                               
                                </div>        

                            </div>


                            
                        </div>


                    </div>

                    </form>


    <!-- end inline car info -->
                
    

    

   
                    


                    <!-- end ser car -->
                   

                </div> 

    </div>

    <!-- Right Panel -->


 <!-- start profile -->

                <?php 

                include "parentprofileprofile.php";

                ?>  

 <!-- <div id="profile" class="profile lity-hide">


<form method="post" action="editprofileforparent.php" id="proform">
<div class="hideprofiletable">
            
        <table>

                <div class="outercircle">

                    <div class="innercircle">
            
                        <img src="<?php echo $srowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">
                        <br><br>
                        <input type="file" name="photo">

                    </div>

                </div>      <br><br><br>

                <tr>
                    <td> 
                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <input type="text" name="name" value="<?php echo $prowprofile['PName']?>" class="inputprofile" id="proname">
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <input type="text" name="email" value="<?php echo $srowprofile['Email']?>" class="inputprofile" disabled="disabled">
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <input type="text" name="nrc" value="<?php echo $prowprofile['PNRC']?>" class="inputprofile" disabled="disabled">
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <input type="text" name="phone" value="<?php echo $srowprofile['PhoneNo']?>" class="inputprofile" id="prophone">
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <input type="text" name="address" value="<?php echo $srowprofile['Address']?>" class="inputprofile" id="proaddress">
                    </td>
                </tr>

        </table>
</div>



<div class="profilebox">
    
        <div class="profileimgbox">
                
                <div class="outercircle">
                    
                        <div class="innercircle">
                            
                            <img src="images/member/cmk.jpg" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">

                        </div>

                </div>


                <h1><?php $pname=$prowprofile['PName']; echo $pname; ?></h1>

                <p class="bio">Hello, My name is <?php echo $pname; ?>. I'm a UIT student.</p>

        </div>              


        <div class="profilecontent">
            <div class="showprofiletable">
            <table>
                <tr>
                    <td> 
                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <?php echo $prowprofile['PName']?>
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <?php echo $srowprofile['Email']?>
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <?php echo $prowprofile['PNRC']?>
                    </td>
                </tr>

                <tr>
                    <td> 
                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                    </td>
                    
                    <td>
                    <?php echo $srowprofile['Address']?>
                    </td>
                </tr>

                

                <tr>
                    <td> 
                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                    </td>
                    
                    <td>
                   <?php echo $srowprofile['PhoneNo']?>
                    </td>
                </tr>

            </table>
            </div>

            
        </div>
</div>

<div class="profilebutton">
    
    <button class="profilenext">Edit</button>                   
    <button class="profileback">Back</button>
    <button class="profilesubmit">Save</button>

</div>

<script>
var form = $('#proform');
var proname = $("#proname");
var prophone = $("#prophone");

$(form).submit(function(event) {                    

    function isValidPhone(tel) {
        var telRegExp = /^[0-9]{2}[0-9]{9,13}$/gi;
        return (telRegExp.test(tel));
    }
    // Stop the browser from submitting the form.
    event.preventDefault();

    proname.css("border", "1px solid lightgray");
    prophone.css("border", "1px solid lightgray");
    var flag = 1;
    // TODO
    if (proname.val() == 0 || prophone.val() == 0) {
        if (proname.val() == 0) {
            proname.css("border", "1px solid red");
        }
        
        if (prophone.val() == 0) {
            prophone.css("border", "1px solid red");
        }
        flag = 0;
    }
  
    if (!isValidPhone(prophone.val())) {
        prophone.css("border", "1px solid red");
        flag = 0;
    }

    if (flag == 1) {
        var pronameval = proname.val();
        var prophoneval = prophone.val();
        var proaddressval = $("#proaddress").val();
        proname.css("border", "1px solid lightgray");                        
        prophone.css("border", "1px solid lightgray");
        location.href = "editprofileforparent.php?name=" + pronameval + "&address=" + proaddressval  + "&phone="+prophoneval ;

    }
});
</script>
</form>


</div>                 
 -->
<!-- end profile -->



   

    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script> 
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
    <script type="text/javascript" src="js/logoutpopup.js"></script>     
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>  
    <script src="js/prism.js"></script>  
    <script type="text/javascript" src="js/fms.js"></script>
    <script type="text/javascript">
        

         $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {

            $jq('.morecarinfo').slideDown("slower");


            $jq('.editdriverinfo').on("click",function(e){
            e.preventDefault();
            $jq('.morecarinfo').hide();
                $jq('.editmorecarinfo').fadeIn();
            });


          
        

         });

       
    

   </script>
</body>

</html>
