<?php
session_start();
include('confs/config.php');

if ($_POST) {
    /*    $sid  =$_SESSION['sid'];
    $subid=$_SESSION['subid'];

	//$email=$_POST['editstuemail'];
	$grade=$_POST['editstugrade'];
	$phone=$_POST['editstuphone'];
	$address=$_POST['editstuaddress'];
	$pname=$_POST['editstupname'];
	$pnrc=$_POST['editstupnrc'];
	$stuid=$_POST['hiddenstuid'];
	if(mysqli_query($conn,"UPDATE student set Grade='$grade',PhoneNo='$phone',Address='$address' where StuId='$stuid'"))
    {
        echo "Success";
    }
    else
    {
        echo mysqli_error($conn);
    }
    $pidsql = mysqli_query($conn,"SELECT PId from student where StuId='$stuid'");
    $pid    = mysqli_fetch_assoc($pidsql);
    $real   = $pid['PId'];
    mysqli_query($conn,"UPDATE parent set PName='$pname', PNRC='$pnrc' where PId='$real' ");

	//header("location:studentlist.php?sid=$sid&subid=$subid");
*/ }
$sid  = $_SESSION['sid'];
$subid = $_SESSION['subid'];
$stuid = $_GET['stuid'];
$_SESSION['stuid'] = $stuid;


$showstu = mysqli_query($conn, "SELECT * from student where StuId='$stuid'");
$row = mysqli_fetch_assoc($showstu);

$showpid = mysqli_query($conn, "SELECT PId from student where StuId='$stuid'");
$pid  = mysqli_fetch_assoc($showpid);
$real = $pid['PId'];

$showp = mysqli_query($conn, "SELECT PName,PNRC from parent where PId='$real'");
$prow  = mysqli_fetch_assoc($showp);

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
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
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

                    <li>
                        <!-- <a href="driversalary.php"> <i class="menu-icon ti-money"></i>Driver's Salary</a> -->
                        <form class="hovform" method="post" action="driversalary.php">
                            <i class="menu-icon ti-money">
                                <input type="submit" name="submitdriversalary" value="Driver's Salary">
                            </i>

                        </form>
                    </li>

                    <h3 class="menu-title">Activity</h3><!-- /.menu-title -->

                    <li>
                        <!-- <a href="pickup.php"> <i class="menu-icon ti-timer"></i>Student Pickup</a> -->

                        <form class="hovform" method="post" action="pickup.php">
                            <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>

                        </form>
                    </li>
                    <li>
                        <!--  <a href="absent.php"> <i class="menu-icon ti-pencil-alt"></i>Absent</a> -->
                        <form class="hovform" method="post" action="absent.php">
                            <i class="menu-icon ti-pencil-alt">
                                <input type="submit" name="submitabsent" value="Absent">
                            </i>

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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>



            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="owner.php">Dashboard&nbsp;/&nbsp;</a><a href="studentregister.php">Student Register&nbsp;</a>/&nbsp;<a href="registercar.php">Registered Car</a><a href="studentlist.php">&nbsp;/&nbsp;Student list</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">





            <form action="savestudentinfo.php" method="post" id="regiform">
                <div class="morecarinfo">
                    <div style="width: 100%;height: 100%background: green;margin:0px auto;margin-bottom:60px;" class="showcar">


                        <div class="showcarinfocontent">

                            <h1>Edit Information</h1>


                            <div class="headtab">
                                <table>
                                    <tr>
                                        <td>
                                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;<b style="color:red">*</b>
                                        </td>
                                        <td>
                                            <input type="text" name="name" value="<?php echo $row['StuName'] ?>" id="edstuname">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-credit-card-alt">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;<b style="color:red">*</b>
                                        </td>
                                        <td>
                                            <input type="text" name="email" value="<?php echo $row['Email'] ?>" id="edpemail">
                                        </td>
                                    </tr>

                                    </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Grade&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <!-- <input type="text" name="editstugrade" value="<?php echo $row['Grade'] ?>" id="edstugrade">
 -->
                                            <select name="grade" id="cifgrade">
                                                <option>Grade-1</option>
                                                <option>Grade-2</option>
                                                <option>Grade-3</option>
                                                <option>Grade-4</option>
                                                <option>Grade-5</option>
                                                <option>Grade-6</option>
                                                <option>Grade-7</option>
                                                <option>Grade-8</option>
                                                <option selected>Grade-9</option>
                                                <option>Grade-10</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;<b style="color:red">*</b>
                                        </td>
                                        <td>
                                            <input type="text" name="phone" value="<?php echo $row['PhoneNo'] ?>" id="edpphone">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <input type="text" name="address" value="<?php echo $row['Address'] ?>" id="edpaddress">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Parent Name&nbsp;&nbsp;<b style="color:red">*</b>
                                        </td>
                                        <td>
                                            <input type="text" name="pname" value="<?php echo $prow['PName'] ?>" id="edpname">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Parent NRC&nbsp;&nbsp;<b style="color:red">*</b>
                                        </td>
                                        <td>
                                            <input type="text" name="pnrc" value="<?php echo $prow['PNRC'] ?>" id="edpnrc">

                                        </td>
                                    </tr>


                                </table>

                            </div>

                            <div class="buttoncar">
                                <input type="hidden" name="hiddenstuid" value="<?php echo $StuId ?>">
                                <form action="studentlist.php" method="get">
                                    <input type="hidden" name="sid" value="<?php $sid ?>">
                                    <input type="hidden" name="subid" value="<?php $subid ?>">
                                </form>
                                <button class="savedriverinfo">Save</button>
                            </div>

                           <!--  <script type="text/javascript">
                                var form = $('#regiform');
                                var edstuname = $('#edstuname');
                                var edpemail = $('#edpemail');                                
                                var edpphone = $('#edpphone');
                                var edpname = $('#edpname');
                                var edpnrc = $('#edpnrc');

                                // var grade=document.getElementsByName("grade");
                                // var gradeval=grade.options[grade.selectedIndex].text;
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
                                    edstuname.css("border", "1px solid lightgray");
                                    edpemail.css("border", "1px solid lightgray");
                                    edpphone.css("border", "1px solid lightgray");
                                    edpname.css("border", "1px solid lightgray");
                                    edpnrc.css("border", "1px solid lightgray");

                                    var flag = 1;
                                    // TODO
                                    if (edstuname.val() == 0 || edpemail.val() == 0 || edpphone.val() == 0 || edpname.val() == 0 || edpnrc.val() == 0) {
                                        if (edstuname.val() == 0) {
                                            edstuname.css("border", "1px solid red");
                                        }
                                        if (edpemail.val() == 0) {
                                            edpemail.css("border", "1px solid red");
                                        }
                                        if (edpphone.val() == 0) {
                                            edpphone.css("border", "1px solid red");
                                        }
                                        if (edpname.val() == 0) {
                                            edpname.css("border", "1px solid red");
                                        }
                                        if (edpnrc.val() == 0) {
                                            edpnrc.css("border", "1px solid red");
                                        }
                                        flag = 0;
                                    }
                                    if (!isValidEmail(edpemail.val())) {
                                        edpemail.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (!isValidNRC(edpnrc.val())) {
                                        edpnrc.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (!isValidPhone(edpphone.val())) {
                                        edpphone.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (flag) {
                                        edstuname.css("border", "1px solid lightgray");
                                        edpemail.css("border", "1px solid lightgray");
                                        edpphone.css("border", "1px solid lightgray");
                                        edpname.css("border", "1px solid lightgray");
                                        edpnrc.css("border", "1px solid lightgray");

                                        var edstunameval = edstuname.val();
                                        var edpemailval = edpemail.val();
                                        var edpphoneval = edpphone.val();
                                        var edpaddressval = $("#edpaddress").val();
                                        var edpnameval = edpname.val();
                                        var edpnrcval = edpnrc.val();
                                        var edstugradeval = $('#edstugrade').val();
                                        location.href = "savestudentinfo.php?name=" + edstunameval + "&pname=" + edpnameval + "&email=" + edpemailval + "&nrc=" + edpnrcval + "&address=" + edpaddressval + "&phone=" + edpphoneval + "&grade=" + edstugradeval;
                                    }
                                });
                            </script> -->
            </form>


            <div class="buttoncara" style="width: 100%;">
                <a class="backabut" href="studentlist.php?sid=<?php echo $sid; ?>&subid=<?php echo $subid; ?> ">Back</a>
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

    <div id="profile" class="profile lity-hide">


        <form method="post" action="editprofile.php">
            <div class="hideprofiletable">

                <table>
                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
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


                    <h1>Chan Min Kyaw</h1>

                    <p class="bio">Hello , My name is CMK . I'm a UIT student.</p>

                </div>


                <div class="profilecontent">
                    <div class="showprofiletable">
                        <table>
                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    Chan Min Kyaw
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





        });
    </script>
</body>

</html>