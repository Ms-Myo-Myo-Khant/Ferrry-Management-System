<?php
include('confs/config.php');
session_start();

$ownerid = $_SESSION['ownerid'];
if ($_GET) {
    $sid = $_GET['sid'];
    $_SESSION['sid'] = $sid;
    //$_SESSION['sid'] = $sid;
    $subid = $_GET['subid'];
    $_SESSION['subid'] = $subid;
}

$sid = $_SESSION['sid'];
$subid = $_SESSION['subid'];

//$_SESSION['subid'] = $subid;
//$subid= $_SESSION['subid'];
$student = mysqli_query($conn, "SELECT * from student where SId='$sid' and SubId='$subid' ");

$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid'");
$rowprofile  = mysqli_fetch_assoc($ownerprofile);

?>

<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link rel="stylesheet" type="text/css" href="css/studentlist.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="exponential.js"></script>
    <!-- table -->


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
                    <li>
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

                    <li class="active">
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
        <!-- --------------------------------------------------------------------
                    --------------------------Header------------------------------------>




        <div class="breadcrumbs">

            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Student list</h1>
                    </div>
                </div>
            </div>



            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="owner.php">Dashboard&nbsp;/&nbsp;</a><a href="studentregister.php">Student Register&nbsp;/&nbsp;</a><a href="registercar.php?sid=<?php echo $sid ?>">Registered Car&nbsp;/&nbsp;</a><a href="#">Student list</a></li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">



            <div class="col-sm-12 col-lg-12 but-wrap">

                <button class="addbut">Add Student</button>

                <button class="editbut">Edit Info</button>

                <button class="removebut">Remove</button>

                <button class="originview ahov">Origin</button>
            </div>


            <!-- add car info content -->

            <div class="col-sm-12 col-lg-12 col-md-12 add">


                <div class="addcar">

                    <div class="studentlistinfocontent">

                        <h1>Add Student</h1>
                        <form action="addparent.php" method="post" id="regiform">

                            <div class="labelcif">Name<b style="color:red"> *</b></div>
                            <input type="text" name="name" placeholder="Name" id="cifstuname">
                            <div class="labelcif">Grade</div>

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
                            <div class="labelcif">Parent's Name<b style="color:red"> *</b></div>
                            <input type="text" name="pname" placeholder="Parent Name" id="cifpname">
                            <div class="labelcif">Parent's NRC<b style="color:red"> *</b></div>
                            <input type="text" name="nrc" placeholder="eg. 1/TaKaLa(N)123456" id="cifpnrc">
                            <div class="labelcif">Parent's Phone<b style="color:red"> *</b></div>
                            <input type="text" name="phone" placeholder="eg. 0900000000 without '-'" id="cifpphone">
                            <div class="labelcif">Parent's Email<b style="color:red"> *</b></div>
                            <input type="email" name="email" placeholder="eg. someone@gmail.com" id="cifpemail">
                            <div class="labelcif">Address</div>
                            <input type="text" name="address" placeholder="eg. No,Street,Block,Township" id="cifpaddress">



                            <div class="buttoncar">
                                <!-- <button class="backbut">Back</button>                                                 -->

                                <button class="submit">Submit</button>

                            </div>
                              </form>   

                            <div class="buttoncar">

                                <button class="backbut" style="margin-left: 30px;">Back</button>

                            </div>
                           <!--  <script type="text/javascript">
                                var form = $('#regiform');
                                var cifstuname = $('#cifstuname');
                                var cifpname = $('#cifpname');
                                var cifpnrc = $('#cifpnrc');
                                var cifpphone = $('#cifpphone');
                                var cifpemail = $('#cifpemail');

                                // var grade=document.getElementsByName("grade");
                                // var gradeval=grade.options[grade.selectedIndex].text;
                                $(form).submit(function(event) {
                                    function isValidEmail(email) 
                                    {
                                        var emailRegExp = /^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/gi;
                                        return (emailRegExp.test(email));
                                    }

                                    function isValidNRC(nrc) 
                                    {
                                        var nrcRegExp = /^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/gi;
                                        return (nrcRegExp.test(nrc));
                                    }

                                    function isValidPhone(tel) 
                                    {
                                        var telRegExp = /^[0-9]{2}[0-9]{9,13}$/gi;
                                        return (telRegExp.test(tel));
                                    }
                                    // Stop the browser from submitting the form.
                                    event.preventDefault();
                                    cifstuname.css("border", "1px solid lightgray");
                                    cifpname.css("border", "1px solid lightgray");
                                    cifpnrc.css("border", "1px solid lightgray");
                                    cifpphone.css("border", "1px solid lightgray");
                                    cifpemail.css("border", "1px solid lightgray");

                                    var flag = 1;
                                    // TODO
                                    if (cifstuname.val() == 0 || cifpname.val() == 0 || cifpnrc.val() == 0 || cifpphone.val() == 0 || cifpemail.val() == 0) {
                                        if (cifstuname.val() == 0) {
                                            cifstuname.css("border", "1px solid red");
                                        }
                                        if (cifpname.val() == 0) {
                                            cifpname.css("border", "1px solid red");
                                        }
                                        if (cifpnrc.val() == 0) {
                                            cifpnrc.css("border", "1px solid red");
                                        }
                                        if (cifpphone.val() == 0) {
                                            cifpphone.css("border", "1px solid red");
                                        }
                                        if (cifpemail.val() == 0) {
                                            cifpemail.css("border", "1px solid red");
                                        }
                                        flag = 0;
                                    }
                                    if (!isValidEmail(cifpemail.val())) {
                                        cifpemail.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (!isValidNRC(cifpnrc.val())) {
                                        cifpnrc.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (!isValidPhone(cifpphone.val())) {
                                        cifpphone.css("border", "1px solid red");
                                        flag = 0;
                                    }
                                    if (flag) {
                                        cifstuname.css("border", "1px solid lightgray");
                                        cifpname.css("border", "1px solid lightgray");
                                        cifpnrc.css("border", "1px solid lightgray");
                                        cifpphone.css("border", "1px solid lightgray");
                                        cifpemail.css("border", "1px solid lightgray");

                                        var gradeval = $('#cifgrade').find(":selected").text();
                                        var cifstunameval = cifstuname.val();
                                        var cifpnameval = cifpname.val();
                                        var cifpnrcval = cifpnrc.val();
                                        var cifpaddressval = $("#cifpaddress").val();
                                        var cifpphoneval = cifpphone.val();
                                        var cifpemailval = cifpemail.val();
                                        location.href = "addparent.php?name=" + cifstunameval + "&pname=" + cifpnameval + "&email=" + cifpemailval + "&nrc=" + cifpnrcval + "&address=" + cifpaddressval + "&phone=" + cifpphoneval+"&grade="+gradeval;
                                    }
                                });
                            </script> -->
                  
                    </div>


                </div>


            </div>


            <div class="col-sm-12 col-lg-12 col-md-12 setcarcov">

                <h6 class="animated fadeInDown">Student List</h6>
                <div class="stulisttable  animated fadeInUp">

                    <div class="headlist">

                        <table>

                            <!-- <div class="headlist"> -->

                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th class="remth">Remove</th>
                                <th class="editth">Edit</th>
                            </tr>

                        </table>

                    </div>

                    <div class="bodylist">
                        <table>
                            <div>
                                <tbody>
                                    <?php while ($rows = mysqli_fetch_assoc($student)) : ?>
                                        <tr>
                                            <td class="currentstuname"><?php echo $rows['StuName'] ?></td>
                                            <td class="issetstuname"><input type="text" name="issetstuname" value="<?php echo $rows['StuName'] ?>"></td>
                                            <td><?php echo $rows['PhoneNo'] ?></td>
                                            <td><?php echo $rows['Email'] ?></td>
                                            <td><?php echo $rows['Address'] ?></td>

                                            <td class="editstuinfodel"><a href="delstuinfo.php?stuid=<?php echo $rows['StuId'] ?>"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="editstuinfoedit"><a href="editstuinfo.php?sid=<?php echo $sid ?>&subid=<?php echo $subid ?>&stuid=<?php echo $rows['StuId'] ?>"><i class="fa fa-edit"></i></a></td>

                                        </tr>
                                    <?php endwhile; ?>


                                </tbody>
                            </div>

                            <!-- </div> -->





                        </table>

                    </div>


                </div> <!--  1 set -->





                <!-- Right Panel -->



                <!-- start profile -->
    <?php
        include("ownerprofileprofile.php");
    ?>
    <!-- <script>
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
 -->
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
                <!--  table -->

                <script type="text/javascript">
                    // $jq=jQuery.noConflict();
                    $jq(document).ready(function(e) {



                        $jq('.editstuinfo').click(function() {

                            var par = $jq(this).parent();
                            par.css('opacity', '1');
                            par.siblings('tr').css('opacity', '0.3');
                            var currentstuname = par.find('.currentstuname');
                            var issetstuname = par.find('.issetstuname');
                            currentstuname.toggle();
                            issetstuname.toggle();
                        });
                        $jq('.editbut').click(function() {
                            $jq('.editth').css("display", "block");
                            $jq('.editstuinfoedit').css("display", "block");
                            $jq('.originview').show();
                            $jq('.remth').css("display", "none");
                            $jq('.editstuinfodel').css("display", "none");
                        });


                        $jq('.removebut').click(function() {
                            $jq('.originview').show();
                            $jq('.editth').css("display", "none");
                            $jq('.editstuinfoedit').css("display", "none");
                            $jq('.remth').css("display", "block");
                            $jq('.editstuinfodel').css("display", "block");
                        });

                        $jq('.originview').on("click", function(e) {
                            $jq('.editstuinfodel').hide();
                            $jq('.editstuinfoedit').hide();
                            $jq('.remth').hide();
                            $jq('.editth').hide();
                            $jq('.originview').hide();
                            e.preventDefault();
                        });


                        $jq('.editstuinfoedit').click(function() {
                            $jq(this).hide();
                        });

                       





                    });
                </script>

</body>

</html>