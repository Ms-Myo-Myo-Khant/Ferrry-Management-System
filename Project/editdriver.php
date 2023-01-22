<?php
session_start();
if (!$_SESSION['auth']) {
    header("location:landingpage.php");
}

$email = $_SESSION['email'];
$ownerid = $_SESSION['ownerid'];


include("confs/config.php");
$_SESSION['did'] = $_GET['did'];
$did = $_SESSION['did'];
$driver = mysqli_query($conn, "SELECT * from driver where did='$did' and DId in (SELECT DId from assign where Id='$ownerid') ");
$row = mysqli_fetch_assoc($driver);

$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid' ");
$rowprofile = mysqli_fetch_assoc($ownerprofile);
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
    <link href="css/lity.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="owner.php"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="owner.php"><img src="images/logo/FMS3.png" alt="Logo" width="40px;" height="40px;"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <form class="hovform" method="post" action="owner.php">
                            <i class="menu-icon ti-dashboard">
                                <input type="submit" name="submitdashboard" value="Dashboard">
                            </i>

                        </form>
                    </li>

                    <h3 class="menu-title">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">

                    <li>

                        <form class="hovform" method="post" action="carinfo.php">
                            <i class="menu-icon ti-truck">
                                <input type="submit" name="submitcarinfo" value="Car Information">
                            </i>

                        </form>
                    </li>

                    <li class="active">
                        <form class="hovform" method="post" action="driverinfo.php">
                            <i class="menu-icon ti-user">
                                <input type="submit" name="submitdriverinfo" value="Driver Information">
                            </i>

                        </form>
                    </li>

                    <li>

                        <form class="hovform" method="post" action="schoolinfo.php">
                            <i class="menu-icon ti-world">
                                <input type="submit" name="submitschoolinfo" value="School Information">
                            </i>

                        </form>
                    </li>


                    <h3 class="menu-title">Assign</h3><!-- /.menu-title -->

                    <li>

                        <form class="hovform" method="post" action="studentregister.php">
                            <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register"> </i>

                        </form>
                    </li>

                    <li>
                        <form class="hovform" method="post" action="assign.php">
                            <i class="menu-icon ti-clipboard">
                                <input type="submit" name="submitassign" value="Assign / Reassign">
                            </i>

                        </form>
                    </li>


                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->

                    <li>
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
                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
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
                        <h1>Edit Driver Information</h1>
                    </div>
                </div>
            </div>



            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="owner.php">Dashboard</a>&nbsp;/&nbsp;<a href="driverinfo.php">Driver Information</a>&nbsp;/&nbsp;<a href="#">Edit Driver Information</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">



            <div class="morecarinfo" style="height: 820px;margin-top: 20px;margin-bottom: 20px;">
                <div style="margin:0px auto;margin-bottom:60px;" class="showcar"  style="height: 800px;">


                    <div class="showcarinfocontent" style="height: 650px;">

                        <h1>Edit Driver Information</h1>

                        <form action="savedriverinfo.php" method="post" id="regiform">
                            <div class="headtab">
                                <table>
                                    <tr>
                                        <td>
                                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="name" value="<?php echo $row['DName'] ?>" id="eddname">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-credit-card-alt">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="nrc" value="<?php echo $row['NRC'] ?>" id="eddnrc">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-home">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="address" value="<?php echo $row['Address'] ?>" id="eddaddress">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="phone" name="phone" value="<?php echo $row['PhoneNo'] ?>" id="eddphone">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-paw">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="date" name="dob" value="<?php echo $row['DateOfBirth'] ?>" id="edddob">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-server">&nbsp;&nbsp;&nbsp;</i>License&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="license" value="<?php echo $row['LicenseNo'] ?>" id="eddlicense">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-spinner">&nbsp;&nbsp;&nbsp;</i>Year of Experience&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="years" value="<?php echo $row['YearOfExp'] ?>" id="eddyears">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="email" value="<?php echo $row['Email'] ?>" id="eddemail">
                                        </td>
                                    </tr>
                                </table>
                                </div>
                                <div class="buttoncar">
                                    <button class="savedriverinfo">Save</button>
                                </div>
                                <div class="buttoncar">
                                    <a class="backabut" href="driverinfo.php?did=<?php echo $row['DId'] ?>">Back</a>
                                </div>


                               <!--  <script type="text/javascript">
                                    var form = $('#regiform');
                                    var eddname = $('#eddname');
                                    var eddnrc = $('#eddnrc');
                                    var eddphone = $('#eddphone');
                                    var eddlicense = $('#eddlicense');
                                    var eddemail = $('#eddemail');

                                    $(form).submit(function(event) {
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

                                        function isValidLicense(license) {
                                            var licenseRegExp = /^[A-Z]{1}\/[0-9]{5}\/[0-9]{2}$/gi;
                                            return (licenseRegExp.test(license));
                                        }
                                        // Stop the browser from submitting the form.
                                        event.preventDefault();
                                        eddname.css("border", "1px solid lightgray");
                                        eddnrc.css("border", "1px solid lightgray");
                                        eddphone.css("border", "1px solid lightgray");
                                        eddlicense.css("border", "1px solid lightgray");
                                        eddemail.css("border", "1px solid lightgray");
                                        var flag = 1;
                                        // TODO
                                        if (eddname.val() == 0 || eddnrc.val() == 0 || eddphone.val() == 0 || eddlicense.val() == 0 || eddemail.val() == 0) {
                                            if (eddname.val() == 0) {
                                                eddname.css("border", "1px solid red");
                                            }
                                            if (eddnrc.val() == 0) {
                                                eddnrc.css("border", "1px solid red");
                                            }
                                            if (eddphone.val() == 0) {
                                                eddphone.css("border", "1px solid red");
                                            }
                                            if (eddlicense.val() == 0) {
                                                eddlicense.css("border", "1px solid red");
                                            }
                                            if (eddemail.val() == 0) {
                                                eddemail.css("border", "1px solid red");
                                            }
                                            flag = 0;
                                        }
                                        if (!isValidEmail(eddemail.val())) {
                                            eddemail.css("border", "1px solid red");
                                            flag = 0;
                                        }
                                        if (!isValidNRC(eddnrc.val())) {
                                            eddnrc.css("border", "1px solid red");
                                            flag = 0;
                                        }
                                        if (!isValidPhone(eddphone.val())) {
                                            eddphone.css("border", "1px solid red");
                                            flag = 0;
                                        }
                                        if (!isValidLicense(eddlicense.val())) {
                                            eddlicense.css("border", "1px solid red");
                                            flag = 0;
                                        }
                                        if (flag) {
                                            eddname.css("border", "1px solid lightgray");
                                            eddnrc.css("border", "1px solid lightgray");
                                            eddphone.css("border", "1px solid lightgray");
                                            eddlicense.css("border", "1px solid lightgray");
                                            eddemail.css("border", "1px solid lightgray");
                                            var eddnameval = eddname.val();
                                            var eddnrcval = eddnrc.val();
                                            var eddemailval = eddemail.val();
                                            var eddaddressval = $("#eddaddress").val();
                                            var eddphoneval = eddphone.val();
                                            var edddobval = $("#edddob").val();
                                            var eddlicenseval = eddlicense.val();
                                            var eddyearsval = $("#eddyears").val();
                                            location.href = "savedriverinfo.php?name=" + eddnameval + "&email=" + eddemailval + "&nrc=" + eddnrcval + "&address=" + eddaddressval + "&phone=" + eddphoneval + "&dob=" + edddobval + "&license=" + eddlicenseval + "&years=" + eddyearsval;
                                        }
                                    });
                                </script>
 -->
                            <!-- </div> -->
                        </form>



                    </div>



                </div>


            </div>




            <!-- end inline car info -->



            <!------------------------------ edit car Information----------------------------------------->








        </div>



    </div>


    </div>













    <!-- ---------------------------------end edit car Information -------------------------------------->





    <!-- end ser car -->


    </div>

    </div>

    <!-- Right Panel -->



    <!-- start profile -->

    <div id="profile" class="profile lity-hide">


        <form method="post" action="editprofile.php" enctype="multipart/form-data" id="proform">
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
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="name" value="<?php echo $rowprofile['OName'] ?>" class="inputprofile" id="proname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="email" value="<?php echo $rowprofile['Email'] ?>" class="inputprofile" id="proemail">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="nrc" value="<?php echo $rowprofile['NRC'] ?>" class="inputprofile" id="pronrc">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="address" value="<?php echo $rowprofile['Address'] ?>" class="inputprofile" id="proaddress">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="date" name="dob" value="<?php echo $rowprofile['DateOfBirth'] ?>" class="inputprofile" id="prodob">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="phone" value="<?php echo $rowprofile['PhoneNo'] ?>" class="inputprofile" id="prophone">
                        </td>
                    </tr>

                </table>
            </div>



            <div class="profilebox">

                <div class="profileimgbox">

                    <div class="outercircle">

                        <div class="innercircle">
                            <?php $photo = $rowprofile['Photo'];
                            echo "<script> alert($photo); </script>"; ?>
                            <img src="<?php echo $rowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower" alt="*-*">

                        </div>

                    </div>


                    <h1><?php $oname = $rowprofile['OName'];
                        echo $oname; ?></h1>

                    <p class="bio">Hello, My name is <?php echo $oname; ?>. I'm a UIT student.</p>

                </div>


                <div class="profilecontent">
                    <div class="showprofiletable">
                        <table>
                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['OName'] ?>
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

            <script>
                var form = $('#proform');
                var proname = $("#proname");
                var proemail = $("#proemail");
                var pronrc = $("#pronrc");
                var prophone = $("#prophone");

                $(form).submit(function(event) {
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
                    // Stop the browser from submitting the form.
                    event.preventDefault();

                    proname.css("border", "1px solid lightgray");
                    proemail.css("border", "1px solid lightgray");
                    pronrc.css("border", "1px solid lightgray");
                    prophone.css("border", "1px solid lightgray");
                    var flag = 1;
                    // TODO
                    if (proname.val() == 0 || proemail.val() == 0 || pronrc.val() == 0 || prophone.val() == 0) {
                        if (proname.val() == 0) {
                            proname.css("border", "1px solid red");
                        }
                        if (proemail.val() == 0) {
                            proemail.css("border", "1px solid red");
                        }
                        if (pronrc.val() == 0) {
                            pronrc.css("border", "1px solid red");
                        }
                        if (prophone.val() == 0) {
                            prophone.css("border", "1px solid red");
                        }
                        flag = 0;
                    }
                    if (!isValidEmail(proemail.val())) {
                        proemail.css("border", "1px solid red");
                        flag = 0;
                    }
                    if (!isValidNRC(pronrc.val())) {
                        pronrc.css("border", "1px solid red");
                        flag = 0;
                    }
                    if (!isValidPhone(prophone.val())) {
                        prophone.css("border", "1px solid red");
                        flag = 0;
                    }

                    if (flag == 1) {
                        var pronameval = proname.val();
                        var proemailval = proemail.val();
                        var pronrcval = pronrc.val();
                        var prophoneval = prophone.val();
                        var proaddressval = $("#proaddress").val();
                        var prodobval = $("#prodob").val();
                        proname.css("border", "1px solid lightgray");
                        proemail.css("border", "1px solid lightgray");
                        pronrc.css("border", "1px solid lightgray");
                        prophone.css("border", "1px solid lightgray");
                        location.href = "editprofile.php?name=" + pronameval + "&email=" + proemailval + "&nrc=" + pronrcval + "&address=" + proaddressval + "&dob=" + prodobval + "&phone="+prophoneval ;

                    }
                });
            </script>
        </form>


    </div>

    <!-- end profile -->






    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>
    <script src="js/prism.js"></script>
    <script type="text/javascript" src="js/fms.js"></script>
    <script type="text/javascript">
        $jq = jQuery.noConflict();
        $jq(document).ready(function(e) {

            $jq('.morecarinfo').slideDown("slower");


            $jq('.editdriverinfo').on("click", function(e) {
                e.preventDefault();
                $jq('.morecarinfo').hide();
                $jq('.editmorecarinfo').fadeIn();
            });

            $jq('.backtofirstpage').on("click", function(e) {
                e.preventDefault();
                $jq('.morecarinfo').fadeIn();
                $jq('.editmorecarinfo').hide();
            });

            $jq('.backtodriverinfo').on("click", function(e) {
                e.preventDefault();
            });





        });
    </script>
</body>

</html>