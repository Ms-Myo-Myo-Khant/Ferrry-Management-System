<?php

session_start();

if (!$_SESSION['auth']) {
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

$email = $_SESSION['email'];
$ownerid = $_SESSION['ownerid'];

include("confs/config.php");

$car = mysqli_query($conn, "SELECT * from car where CId in (SELECT  CId from assign where Id='$ownerid')");
$schoolselect = mysqli_query($conn, "SELECT * from school where SId ");

$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid'");
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
    <link href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="vendorhomepage/flag-icon-css/css/flag-icon.min.css"> -->
    
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/driverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/ablock.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="exponential.js"></script>
    <link rel="stylesheet" href="css/stylehome.css">
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
                            <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register"> </i>

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
                            <img class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo']; ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#profile" data-lity><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" id="logoutbut"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Car Information</h1>
                    </div>
                </div>
            </div>



            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"> <a href="owner.php"> Dashboard </a> &nbsp;/&nbsp;<a href="#">Car Information</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">



            <div class="col-sm-12 col-lg-12 but-wrap">

                <button class="addbut">Add Car</button>

                <button class="editbut ahov">Edit Info</button>

                <button class="removebut ahov">Remove</button>

                <button class="originview ahov">Origin</button>

            </div>


            <!-- add car info content -->

            <div class="col-sm-12 col-lg-12 col-md-12 add">


                <div class="addcar">

                    <div class="addcarinfocontent">

                        <h1>Add Car</h1>

                        <div class="orshow">
                            <form enctype="multipart/form-data" method="post" action="addcar.php" id="regiform">
                                <div class="labelcif">School</div>
                                <select class="labelcif" name="school" id='schoollist' onchange="showassign()" selected=0>
                                    <?php while ($school = mysqli_fetch_assoc($schoolselect)) :  ?>
                                        <option>
                                            <?php
                                            echo $school['SName'];
                                            ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                                <select class="labelcif" name="assign" id='assignlist'>
                                    <option value="morning">Morning</option>
                                    <option value="evening">Evening</option>
                                </select>
                                <div class="labelcif">Model<b style="color:red"> *</b></div>
                                <input type="text" name="model" placeholder="eg. Honda Fit" id="cifmodel">
                                <div class="labelcif">Type</div>
                                <input type="text" name="type" placeholder="eg. luxury" id="ciftype">
                                <div class="labelcif">Car No<b style="color:red"> *</b></div>
                                <input type="text" name="carno" placeholder="eg. AA-1111" id="cifcarno">
                                <div class="labelcif">Number of passengers<b style="color:red"> *</b></div>
                                <input type="text" name="seats" placeholder="eg. 8" id="cifseats">
                                <div class="labelcif">Color</div>
                                <input type="text" name="color" placeholder="eg.grey" id="cifcolor">
                                <div style="margin:auto 0px;">
                                    <div class="labelcif">Upload Car Image<b style="color:red"> *</b></div>
                                    <input type="file" name="photo">

                                </div>
                                <div class="buttoncar">
                                    <!-- <button class="backbut">Back&nbsp;<i class="ti-control-backward"></i></button> -->
                                    <button class="submit" id="cifsubmit" style="display: block;">Submit&nbsp;&nbsp;<i class="ti-save"></i></button>
                                </div>
                                </form>
                                <div class="buttoncar">
                                    <button class="backbut" style="margin-left: 28px;">Back&nbsp;<i class="ti-control-backward"></i></button>
                                </div>
                             
                           
                            

                        </div>






                    </div>


                </div>
            </div>


            <!-- add car end -->

            <!-- add car script start -->

            <!-- <script>
                                    var form = $('#regiform');
                                    var model = $("#cifmodel");
                                    var type = $("#ciftype");
                                    var carno = $("#cifcarno");
                                    var seats = $("#cifseats");
                                    var color = $("#cifcolor");

                                    $(form).submit(function(event) {
                                        function isValidCarno(carno) {
                                            var carnoRegExp = /^[0-9 a-z A-Z]{2}\-[0-9]{4}$/gi;
                                            return (carnoRegExp.test(carno));
                                        }

                                        function isValidSeats(seats) {
                                            var seatsRegExp = /^[0-9]+$/gi;
                                            return (seatsRegExp.test(seats));
                                        }

                                        // Stop the browser from submitting the form.
                                        event.preventDefault();

                                        model.css("border", "1px solid lightgray");
                                        carno.css("border", "1px solid lightgray");
                                        seats.css("border", "1px solid lightgray");
                                        var flag = 1;
                                        // TODO
                                        if (model.val() == 0 || carno.val() == 0 || seats.val() == 0) {
                                            if (model.val() == 0) {
                                                model.css("border", "1px solid red");
                                            }
                                            if (carno.val() == 0) {
                                                carno.css("border", "1px solid red");
                                            }
                                            if (seats.val() == 0) {
                                                seats.css("border", "1px solid red");
                                            }
                                            flag = 0;
                                        }
                                        if (!isValidCarno(carno.val())) {
                                            carno.css("border", "1px solid red");
                                            flag = 0;
                                        }
                                        if (!isValidSeats(seats.val())) {
                                            seats.css("border", "1px solid red");
                                            flag = 0;
                                        }

                                        if (flag == 1) {
                                            var modelval = model.val();
                                            var typeval = type.val();
                                            var carnoval = carno.val();
                                            var seatsval = seats.val();
                                            var colorval = color.val();
                                            var schoolval = $('#schoollist').find(":selected").text();
                                            var assignval = $('#assignlist').find(":selected").text();

                                            model.css("border", "1px solid lightgray");
                                            carno.css("border", "1px solid lightgray");
                                            seats.css("border", "1px solid lightgray");
                                            location.href = "addcar.php?model=" + modelval + "&type=" + typeval + "&carno=" + carnoval + "&seats=" + seatsval + "&color=" + colorval + "&school=" + schoolval + "&assign=" + assignval;

                                        }
                                    }); -->
                                </script>

            <!-- add car script end -->
            <!-- set car start -->

            <?php while ($row = mysqli_fetch_assoc($car)) : ?>
                <div class="col-sm-12 col-lg-3 col-md-6 setcarcov  animated zoomIn">

                    <div class="setcar">



                        <div class="carinfocontent">

                            <span class="hidecardel"><a href="delcar.php?cid=<?php echo $row['CId'] ?>"><i class="fa fa-times-circle"></i></a></span>
                            <span class="hidecaredit"><a href="editcar.php?cid=<?php echo $row['CId'] ?>"><i class="fa fa-edit"></i></a></span>
                            <div class="img">
                                <!--  imgbg -->
                                <img src="<?php echo $row['Photo']; ?>" style="width: 230px;height: 150px;border-top-left-radius:10px;border-top-right-radius:10px;" data-lity>
                            </div> <!--  imgbg -->



                            <div class="carinf">
                                <!-- carinfo -->

                                <label class="carlab" style="font-size:19px;">
                                    <?php echo $row['Model']; ?>

                                </label>

                                <button class="carlab ahov" style="color: black;"><a href="showcarinfo.php?cid=<?php echo $row['CId'] ?>">More</a></button>
                                <!--  -->
                            </div> <!-- carinfo -->

                        </div>




                    </div>
                </div>
            <?php endwhile; ?>












            <!-- end ser car -->


        </div> <!-- .content -->
    </div>

    <!-- Right Panel -->


 
    <!-- start profile -->

    <?php
        include("ownerprofileprofile.php");
    ?>
          <!-- end profile -->





    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>

    <script src="js/main.js"></script>
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>
    <script type="text/javascript" src="js/logoutpopup.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>
    <script src="js/prism.js"></script>

    <script type="text/javascript">
        $jq = jQuery.noConflict();
        $jq(document).ready(function(e) {



            $jq('.profilenext').click(function() {
                $jq('.profilesubmit').show();
                $jq('.profileback').show();
                $jq('.profilebox').hide();
                $jq('.hideprofiletable').slideDown();
                $jq('.profilenext').hide();
            });



            $jq('.profileback').click(function() {
                $jq('.profilesubmit').hide();
                $jq('.profileback').hide();
                $jq('.profilebox').slideDown();
                $jq('.hideprofiletable').hide();
                $jq('.profilenext').show();
            });


            $jq('.profilenext').on("click", function(e) {
                e.preventDefault();
            });

            $jq('.profileback').on("click", function(e) {
                e.preventDefault();
            });

            $jq('.backbut').on("click", function(e) {
                e.preventDefault();
            });

            $jq('.editbut').on("click", function(e) {
                $jq('.hidecardel').hide();
                $jq('.hidecaredit').show();
                $jq('.originview').show();
                e.preventDefault();
            });

            $jq('.removebut').on("click", function(e) {
                $jq('.hidecardel').show();
                $jq('.hidecaredit').hide();
                $jq('.originview').show();
                e.preventDefault();
            });

            $jq('.originview').on("click", function(e) {
                $jq('.hidecardel').hide();
                $jq('.hidecaredit').hide();
                $jq('.originview').hide();
                e.preventDefault();
            });





        });

        function showassign() {
            var list1 = document.getElementById('schoollist');
            var list2 = document.getElementById("assignlist");
            var list1SelectedValue = list1.options[list1.selectedIndex].value;
            if (list1SelectedValue == 'Ahlone B.E.H.S [4]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Ahlone B.E.H.S [6]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Bahan B.E.H.S [1]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Bahan B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Bahan B.E.M.S [3]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Botahtaung B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Botahtaung B.E.H.S [3]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Botahtaung B.E.H.S [4]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Botahtaung B.E.H.S [5]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Botahtaung B.E.H.S [6]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Botahtaung B.E.M.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Dagon B.E.H.S [1]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Dagon B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Dagon B.E.H.S [3]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Kamayut B.E.H.S [T.T.C]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Lanmadaw B.E.H.S [1]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Lanmadaw B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Latha B.E.H.S [1]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Latha B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Mingalardon B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Mingalardon B.E.H.S [4]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            } else if (list1SelectedValue == 'Pabedan B.E.H.S [1]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Pabedan B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Yankin B.E.H.S [2]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Morning', 'morning');
                list2.options[1] = new Option('Evening', 'evening');
            } else if (list1SelectedValue == 'Yankin B.E.M.S [4]') {
                list2.options.length = 0;
                list2.options[0] = new Option('Full', 'full');
            }

        }
    </script>
</body>

</html>