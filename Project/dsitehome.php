<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['driverauth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}
$did=$_SESSION['driverid'];

$driver = mysqli_query($conn,"SELECT * from driver where DId='$did'");
$rowprofile=mysqli_fetch_assoc($driver);
$assignsql = mysqli_query($conn, "SELECT * from assign where DId='$did' ");
$assign = mysqli_fetch_assoc($assignsql);
//$car=mysqli_query($conn,"SELECT * from carinfo where did='$did'");

//$count=mysqli_num_rows($car);
//$row=mysqli_fetch_assoc($car);
//$driver=mysqli_query($conn,"SELECT * from driverinfo where did='$did'");
//$row1=mysqli_fetch_assoc($driver);
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
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- <link rel="stylesheet" href="vendorhomepage/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>

</head>

<body onload="getLocation();">
<script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            buslat = position.coords.latitude;
            buslong = position.coords.longitude;
            var coor = new ol.proj.fromLonLat([buslong, buslat]);
            busCoor = coor[0] + "," + coor[1];
            UpdateSchoolBusDB();
        }

        function UpdateSchoolBusDB() {
            var dataS = {
                Id: <?php echo $assign['CId']; ?>,
                Coor: busCoor
            };
            $.ajax({
                type: "POST",
                url: "AddSchoolBusCoorDB.php",
                data: dataS,
            });
        }
    </script>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="driver.php"><img src="images/fmsdriver.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="driver.php"><img src="images/logo/FMS3.png" alt="Logo" width="40px;" height="40px;"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    

                    <li>
                        <!-- <a href="owner.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> -->
                    <form class="hovform" method="post" action="driver.php">
                        <i class="menu-icon ti-dashboard">
                             <input type="submit" name="submitdashboard" value="Dashboard">
                        </i>
                           
                    </form>                    
                    </li>
                    <li class="active">
                        <!-- <a href="sitehome.php"> <i class="menu-icon fa ti-world"></i>Site Home</a> -->
                    <form class="hovform" method="post" action="dsitehome.php">
                        <i class="menu-icon  ti-world">
                            <input type="submit" name="submitsitehome" value="Site Home"> 
                        </i>                     
                    </form>  
                    </li>
                    <h3 class="menu-title">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li>
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                    <form class="hovform" method="post" action="dcarinfo.php">
                        <i class="menu-icon ti-truck">
                            <input type="submit" name="submitcarinfo" value="Car Information">
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                        </i>
                          
                    </form> 
                    </li>

                  

                    <li>                       
                    <form class="hovform" method="post" action="dschoolinfo.php">
                        <i class="menu-icon ti-world">
                            <input type="submit" name="submitschoolinfo" value="School Information">
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                        </i>
                            
                    </form> 
                    </li>
                                      
                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->

                    <li>
                        <!-- <a href="studentsalary.php"> <i class="menu-icon ti-credit-card"></i>Student's Salary</a> -->
                    <form class="hovform" method="post" action="dstudentsalary.php">
                        <i class="menu-icon ti-credit-card">
                            <input type="submit" name="submitstudentsalary" value="Student Salary"> 
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">   
                        </i>
                    </form> 
                    </li>

                
                   
                    <h3 class="menu-title">Activity</h3><!-- /.menu-title -->
                    <li>
                        <form class="hovform" method="post" action="dmapSchool.php">
                            <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>
                        </form>
                    </li>
                    

                    <li>                    
                    <form class="hovform" method="post" action="dpickup.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>
                        <?php $did=$rowprofile['DId'] ?>
                        <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                            
                    </form> 
                    </li>
                    <li>
                     
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

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
                            <img class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo'] ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#inline" data-lity><i class="fa fa-user"></i> My Profile</a>                  
                            <a class="nav-link" id="logoutbut"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            
            </div> 

        </header><!-- /header -->
        <!--  end Header-->


    <!-- start profile -->

    <div id="inline" class="profile lity-hide">


        <form method="post" action="editprofilefordriver.php" enctype="multipart/form-data">
            <div class="hideprofiletable">

                <table>
                    <div class="outercircle">

                        <div class="innercircle">
                            
                            <img src="<?php echo $rowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">
                            <br><br>
                            <input type="file" name="photo">

                    </div>

                    </div><br><br><br>
                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="name" value="<?php echo $rowprofile['DName'] ?>" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="email" value="<?php echo $rowprofile['Email'] ?>" class="inputprofile" disabled="disabled">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="nrc" value="<?php echo $rowprofile['NRC'] ?>" class="inputprofile" disabled="disabled">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="address" value="<?php echo $rowprofile['Address'] ?>" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="date" name="dob" value="<?php echo $rowprofile['DateOfBirth'] ?>" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="phone" value="<?php echo $rowprofile['PhoneNo'] ?>" class="inputprofile">
                        </td>
                    </tr>

                </table>
            </div>



            <div class="profilebox">

                <div class="profileimgbox">

                    <div class="outercircle">

                        <div class="innercircle">

                            <img src="<?php echo $rowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">
                        </div>

                    </div>


                    <h1><?php $dname = $rowprofile['DName'];
                        echo $dname; ?></h1>

                    <p class="bio">Hello, My name is <?php echo $dname; ?>. I'm a UIT student.</p>

                </div>


                <div class="profilecontent">
                    <div class="showprofiletable">
                        <table>
                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['DName'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['Email'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['NRC'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['Address'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php

                                    $dob = $rowprofile['DateOfBirth'];
                                    $day = (int) substr($dob, 8, 2);
                                    $month = (int) substr($dob, 5, 2);
                                    $year  = (int) substr($dob, 0, 4);
                                    echo $month . "/" . $day . "/" . $year;

                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['PhoneNo'] ?>
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

    
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Site Home</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li class="active"><a href="driver.php">Dashboard</a>&nbsp;/&nbsp;<a href="#">Site Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            
            <!--/.col-->

            

           

           

            

            
            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="vendorhomepage/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script>  
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
    <script type="text/javascript" src="js/dlogoutpopup.js"></script>
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
      
    <script src="js/widgets.js"></script>




    <!-- profile -->

    <script src="js/lity.js"></script>
    <script src="js/prism.js"></script>
    <script type="text/javascript" src="js/fms.js"></script>
    <!-- end profile -->
    <script>
       
    </script>

</body>

</html>
