<?php
session_start();
include("confs/config.php");
if (!$_SESSION['driverauth']) {
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}


$did = $_SESSION['driverid'];

$driver = mysqli_query($conn, "SELECT * from driver where DId='$did'");
$rowprofile = mysqli_fetch_assoc($driver);
if ($_GET) {
    $sid = $_GET['SId'];
    $_SESSION['sid'] = $sid;
    $subid = $_GET['SubId'];
    $_SESSION['subid'] = $subid;
    $cid = $_GET['CId'];
    $_SESSION['cid'] = $cid;
}

$sid = $_SESSION['sid'];
$subid = $_SESSION['subid'];
$cid = $_SESSION['cid'];

$driver = mysqli_query($conn, "SELECT DName, PhoneNo from driver where DId=$did");
if ($driver->num_rows > 0) {
    // output data of each row
    while ($row = $driver->fetch_array()) {
        for ($j = 0; $j < 2; $j++) {
            $Driver[$j] = $row[$j];
        }
    }
} else {
    $Driver = array();
}

$sch = mysqli_query($conn, "SELECT SName,ContactNo,Coordinate from school where SId='$sid'");
if ($sch->num_rows > 0) {
    // output data of each row
    while ($row = $sch->fetch_array()) {
        for ($j = 0; $j < 3; $j++) {
            $School[$j] = $row[$j];
        }
    }
} else {
    $School = array();
}

$allstu = mysqli_query($conn, "SELECT StuName, PhoneNo, Coordinate from student where SId=$sid and SubId=$subid and Coordinate is not NULL");
if ($allstu->num_rows > 0) {
    $index = 0;
    // output data of each row
    while ($row = $allstu->fetch_array()) {
        for ($j = 0; $j < 3; $j++) {
            $StuHaveLoc[$index][$j] = $row[$j];
        }
        $index++;
    }
} else {
    $StuHaveLoc = array();
}

$stui = mysqli_query($conn, "select StuId, StuName, PhoneNo, Address, Coordinate from student where SId=$sid and SubId=$subid");
if ($stui->num_rows > 0) {
    $index = 0;
    while ($row = $stui->fetch_array()) {
        for ($j = 0; $j < 5; $j++) {
            $StuInfo[$index][$j] = $row[$j];
        }
        $index++;
    }
} else {
    $StuInfo = array();
}
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
    <link href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- <link rel="stylesheet" href="vendorhomepage/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/studentregister.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet" />
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
                Id: <?php echo $cid; ?>,
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
                   
                    <h3 class="menu-title">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li>
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                        <form class="hovform" method="post" action="dcarinfo.php">
                            <i class="menu-icon ti-truck">
                                <input type="submit" name="submitcarinfo" value="Car Information">
                                <?php $did = $rowprofile['DId'] ?>
                                <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">
                            </i>

                        </form>
                    </li>



                    <li>
                        <form class="hovform" method="post" action="dschoolinfo.php">
                            <i class="menu-icon ti-world">
                                <input type="submit" name="submitschoolinfo" value="School Information">
                                <?php $did = $rowprofile['DId'] ?>
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
                                <?php $did = $rowprofile['DId'] ?>
                                <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">
                            </i>
                        </form>
                    </li>


                    <h3 class="menu-title">Activity</h3><!-- /.menu-title -->
                    <li class="active">
                        <form class="hovform" method="post" action="dmapSchool.php">
                            <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>
                        </form>
                    </li>


                    <li>
                        <form class="hovform" method="post" action="dpickup.php">
                            <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>
                            <?php $did = $rowprofile['DId'] ?>
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
                            <img style=" width:10%;height:10%;" class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo'] ?>" alt="User Avatar">
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

    
            <?php

            include "driverprofile.php";

            ?>
    <!-- <script>
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
                var prodobval = $("#prodob").val();
                proname.css("border", "1px solid lightgray");                        
                prophone.css("border", "1px solid lightgray");
                location.href = "editprofilefordriver.php?name=" + pronameval + "&address=" + proaddressval + "&dob=" + prodobval + "&phone="+prophoneval ;

            }
        });
    </script>

</form>


</div>
 -->
<!-- end profile -->


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Choose Map Type</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="driver.php">Dashboard</a>&nbsp;/&nbsp;<a href="dmapSchool.php">Choose School For Map</a>&nbsp;/&nbsp;<a href="dmapCar.php?sid=<?php echo $sid ?>">Choose Car For Map</a>&nbsp;/&nbsp;<a href="#">Choose Map Type</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">



            <div class="col-sm-12 col-lg-4 col-md-6 setcarcov  animated zoomIn">

                <div class="carlist">

                    <div class="carbg">

                        <img src="images/carbg/5.jpg" style="width: 300px;height: 140px;">
                        <div class="textonimg">Map</div>
                    </div>

                    <div class="carcontent">

                        <div class="lft">
                            <i class="menu-icon ti-map-alt"></i>
                        </div>

                        <div class="rght">
                            <a href="dAddMarkByClicking.php?SId=<?php echo $sid ?>&CId=<?php echo $cid ?>&SubId=<?php echo $subid ?>">
                                Set Mark By Clicking on Map
                            </a>
                        </div>

                    </div>

                </div>


            </div>

            <div class="col-sm-12 col-lg-4 col-md-6 setcarcov  animated zoomIn">

                <div class="carlist">

                    <div class="carbg">

                        <img src="images/carbg/5.jpg" style="width: 300px;height: 140px;">
                        <div class="textonimg">Map</div>
                    </div>

                    <div class="carcontent">

                        <div class="lft">
                            <i class="menu-icon ti-map-alt"></i>
                        </div>

                        <div class="rght">
                            <a href="dAddMarkWithButton.php?SId=<?php echo $sid ?>&CId=<?php echo $cid ?>&SubId=<?php echo $subid ?>">
                                Set Mark with Button on Map
                            </a>
                        </div>

                    </div>

                </div>


            </div>


            <div class="col-sm-12 col-lg-4 col-md-6 setcarcov  animated zoomIn">

                <div class="carlist">

                    <div class="carbg">

                        <img src="images/carbg/5.jpg" style="width: 300px;height: 140px;">
                        <div class="textonimg">Map</div>
                    </div>

                    <div class="carcontent">

                        <div class="lft">
                            <i class="menu-icon ti-map-alt"></i>
                        </div>

                        <div class="rght">
                            <a href="dmap.php?SId=<?php echo $sid ?>&CId=<?php echo $cid ?>&SubId=<?php echo $subid ?>">
                                View Map
                            </a>
                        </div>

                    </div>

                </div>


            </div>




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