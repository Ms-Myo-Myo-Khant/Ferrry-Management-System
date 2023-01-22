<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$_SESSION['cid']=$_GET['cid'];
$cid=$_SESSION['cid'];
// echo $did;
// echo $ownerid;
$car=mysqli_query($conn,"SELECT * from car where CId='$cid' and CId in (SELECT CId from assign where Id='$ownerid') ");
$row=mysqli_fetch_assoc($car);

$ownerprofile=mysqli_query($conn,"SELECT * from owner where Id='$ownerid'");
$rowprofile=mysqli_fetch_assoc($ownerprofile);
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
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/driverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/showdriverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>

    
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
                <a class="navbar-brand" href="owner.php"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="owner.php"><img src="images/logo/FMS3.png" alt="Logo" width="40px;" height="40px;"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <!-- <a href="owner.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> -->
                    <form class="hovform" method="post" action="owner.php">
                        <i class="menu-icon ti-dashboard">
                             <input type="submit" name="submitdashboard" value="Dashboard">
                        </i>
                           
                    </form>                    
                    </li>

                    <li>
                        <!-- <a href="sitehome.php"> <i class="menu-icon fa ti-world"></i>Site Home</a> -->
                    <form class="hovform" method="post" action="sitehome.php">
                        <i class="menu-icon  ti-world">
                            <input type="submit" name="submitsitehome" value="Site Home"> 
                        </i>
                           
                    </form>  
                    </li>
                    <h3 class="menu-title">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li class="active">
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                    <form class="hovform" method="post" action="carinfo.php">
                        <i class="menu-icon ti-truck">
                            <input type="submit" name="submitcarinfo" value="Car Information">  
                        </i>
                          
                    </form> 
                    </li>

                    <li>
                        <!-- <a href="driverinfo.php"> <i class="menu-icon ti-user"></i>Driver Information </a> -->
                    <form class="hovform" method="post" action="driverinfo.php">
                        <i class="menu-icon ti-user">
                             <input type="submit" name="submitdriverinfo" value="Driver Information">
                        </i>
                       
                    </form> 
                    </li>

                    <li>
                        <!-- <a href="schoolinfo.php"> <i class="menu-icon ti-home"></i>School Information</a> -->

                    <form class="hovform" method="post" action="schoolinfo.php">
                        <i class="menu-icon ti-world">
                            <input type="submit" name="submitschoolinfo" value="School Information">
                        </i>
                            
                    </form> 
                    </li>
                    
                    
                    <h3 class="menu-title">Assign</h3><!-- /.menu-title -->

                    <li>
                        <!-- <a href="studentregister.php"> <i class="menu-icon ti-notepad"></i>Student Register</a> -->

                    <form class="hovform" method="post" action="studentregister.php">
                        <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register">  </i>
                          
                    </form> 
                    </li>
                   <!--  <li>
                        <a href="owner.php"> <i class="menu-icon ti-id-badge"></i>Driver Register</a>
                    </li> -->
                    <li>
                        <!-- <a href="assign.php"> <i class="menu-icon ti-clipboard"></i>Assign / Reassign</a> -->

                    <form class="hovform" method="post" action="assign.php">
                        <i class="menu-icon ti-clipboard">
                            <input type="submit" name="submitassign" value="Assign / Reassign">   
                        </i>
                         
                    </form> 
                    </li>

                  
                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->

                    <li>
                        <!-- <a href="studentsalary.php"> <i class="menu-icon ti-credit-card"></i>Student's Salary</a> -->
                    <form class="hovform" method="post" action="studentsalary.php">
                        <i class="menu-icon ti-credit-card">
                            <input type="submit" name="submitstudentsalary" value="Student Salary">  
                        </i>
                    </form> 
                    </li>

                                    
                    <h3 class="menu-title">Activity</h3><!-- /.menu-title -->

                    <li>
                        <form class="hovform" method="post" action="omapSchool.php">
                            <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>
                        </form>
                    </li>
                    
                    <li>
                        <!-- <a href="pickup.php"> <i class="menu-icon ti-timer"></i>Student Pickup</a> -->

                    <form class="hovform" method="post" action="pickup.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>
                            
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
                                    <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#profile" data-lity><i class="fa fa-user"></i> My Profile</a>                  
                                    <a class="nav-link"  id="logoutbut"><i class="fa fa-power-off"></i> Logout</a>
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
                                <h1>Show Car Information</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                     <li class="active"><a href="owner.php">Dashboard</a>&nbsp;/&nbsp;<a href="carinfo.php">Car Information</a>&nbsp;/&nbsp;<a href="#">Show Car Information</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content mt-3">

                    

                    

                    <form action="carinfo.php" method="post" style="margin-top:20px;height: 700px;">
                    <div class="morecarinfo" style="height: 600px;">
                        <div style="width: 100%;height: 500px;margin:0px auto;margin-bottom:60px;"  class="showcar">
                                

                                <div class="showcarinfocontent">

                                <h1>Car Information</h1>
                                

                                <div class="headtab">
                                    <table>

                                        <tr>
                                            <td> 
                                                <i class="fa fa-credit-card-alt">&nbsp;&nbsp;&nbsp;</i>Model&nbsp;&nbsp;
                                            </td>
                                            <td>
                                              <?php echo $row['Model']?>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td> 
                                                <i class="fa fa-spinner">&nbsp;&nbsp;&nbsp;</i>Car Type&nbsp;&nbsp;
                                            </td>
                                            <td>
                                              <?php echo $row['Type']?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> 
                                                <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Car Number&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                <?php echo $row['CNo']?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> 
                                                <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Number of passengers&nbsp;&nbsp;
                                            </td>
                                            <td>
                                              <?php echo $row['NoOfSeats']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> 
                                                <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Color&nbsp;&nbsp;
                                            </td>
                                            <td>
                                              <?php echo $row['Color']?>
                                            </td>
                                        </tr>
                                        


                                    </table>
                                   
                                </div>        


                                
                                <div class="buttoncar">      
                                        <button class="backtodriverinfo">Back</button>
                                    <!---    <?php $email=$row['owneremail'] ?>                                 
                                        <input type="hidden" name="hiddenemail" value="<?php echo $email ?>">
                                    --->
                                </div>

                               
                            </div>


                            
                        </div>


                    </div>

                    </form>


    <!-- end inline car info -->
    
    </div>

    <!-- Right Panel -->



    <!-- start profile -->

     <div id="profile" class="profile lity-hide">


                <form method="post" action="editprofile.php">
    
            <div class="hideprofiletable">
                            
                        <table>
                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="name" value="<?php echo $rowprofile['OName']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="email" value="<?php echo $rowprofile['Email']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="nrc" value="<?php echo $rowprofile['NRC']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="address" value="<?php echo $rowprofile['Address']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="date" name="dob" value="<?php echo $rowprofile['DateOfBirth']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="phone" value="<?php echo $rowprofile['PhoneNo']?>" class="inputprofile">
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


                                <h1><?php echo $rowprofile['OName']?></h1>

                                <p class="bio">Hello , My name is <?php echo $rowprofile['OName']?> . I'm a UIT student.</p>

                        </div>              


                        <div class="profilecontent">
                            <div class="showprofiletable">
                            <table>
                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['OName']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['Email']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['NRC']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['Address']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php 
                                    
                                        $dob = $rowprofile['DateOfBirth'];
                                        $day = (int)substr($dob,8,2);
                                        $month = (int)substr($dob,5,2);
                                        $year  = (int)substr($dob,0,4);
                                        echo $day."/".$month."/".$year;

                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['PhoneNo']?>
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
                </form>


    </div>

    <!-- end profile -->



   

    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script>      
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
    <script type="text/javascript" src="js/logoutpopup.js"></script>


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

            $jq('.backtofirstpage').on("click",function(e){
            e.preventDefault();
            $jq('.morecarinfo').fadeIn();
            $jq('.editmorecarinfo').hide();
            });


          
        

         });

       
    

   </script>
</body>

</html>