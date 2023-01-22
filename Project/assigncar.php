<?php

session_start();
if (!$_SESSION['auth']) {

    header("location:landingpage.php");
}

$ownerid = $_SESSION['ownerid'];
include("confs/config.php");
$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid'");
$rowprofile = mysqli_fetch_assoc($ownerprofile);


?>
<!doctype html>

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
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/massign.css">
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

                    <li>
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

                    <li class="active">
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
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button> -->
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
                        <h1>Assign Car</h1>
                    </div>
                </div>
            </div>



            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="owner.php">Dashboard</a>&nbsp;/&nbsp;<a href="assign.php">Assign&Reassign</a>&nbsp;/&nbsp;<a href="#">Assign Car</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // function for sms
        function sentsms($name,$phoneNo,$cno)

                {
                $_objSmsProtocolGsm = new Com("ActiveXperts.SmsProtocolGsm");
                        //create the nessecairy com objects
                        $objMessage   = new Com ("ActiveXperts.SmsMessage");
                        $objConstants = new Com ("ActiveXperts.SmsConstants");
                        
                        //get the submitted information
                        $device       = "SAMSUNG Mobile USB Modem";
                        $speed = "Default";       
                        $pincode      ="";
                        
                         
                        $sender="FMS";
                        $recipient    = "+95" . $phoneNo;
                        $message      = "Dear ".$name.",Your owner have assigned you to drive  Car Number->".$cno.".";
                        
                        
                        $unicode      = "";
                        
                $_objSmsProtocolGsm->Logfile = "C:\SMSMMSToolLog.txt";
                        
                        //Clear the messageobject first
                        $objMessage->Clear();
                        
                        $objMessage->Clear();
                        
                            if( $recipient == "" ) die("No recipient address filled in."); 
                        $objMessage->Recipient = $recipient;
                        $objMessage->Sender = $sender;
                        
                        if( $unicode != "" ) $objMessage->Format = $objConstants->asMESSAGEFORMAT_UNICODE;
                        
                            $objMessage->Data = $message;
                            $_objSmsProtocolGsm->Clear();
                            
                            $_objSmsProtocolGsm->Device = $device;
                        
                        //fill in the devicespeed
                        if( $speed == "Default" ) $_objSmsProtocolGsm->DeviceSpeed = 0;
                        if( $speed != "Default" ) $_objSmsProtocolGsm->DeviceSpeed = $speed;
                        
                            if( $pincode != "" ) $_objSmsProtocolGsm->EnterPin( $pincode );
                            
                                if( $_objSmsProtocolGsm->LastError == 0 ){
                            $_objSmsProtocolGsm->Send( $objMessage );
                            }
                            
                            $LastError        = $_objSmsProtocolGsm->LastError;
                        $ErrorDescription = $_objSmsProtocolGsm->GetErrorDescription( $LastError );

                }

                 //submit start   
        if (isset($_POST["asubmit"])) {

            $carno = $_POST["carno"]; //get car number from user choice 
            $dname = $_POST["dname"]; //get driver name from user choice 
            $page = "assigncar.php";
            if ($carno == null || $dname == null) {
                echo ("<script>location.href='NothingChoose.php?page=$page';</script>");
            } else {
                $csql = "SELECT * FROM car where CNo='$carno'"; //select cid of car number form db
                $cresult = $conn->query($csql);
                while ($crow = $cresult->fetch_assoc()) {
                    $cid = $crow["CId"];
                }

                $dsql = "SELECT * FROM driver where DName='$dname'"; //select cid of car number form db
                $dresult = $conn->query($dsql);
                while ($drow = $dresult->fetch_assoc()) {
                    $did = $drow["DId"];
                    $dpno=$drow["PhoneNo"];
                }

                if (!empty($cid) && !empty($did)) {

                    $into = mysqli_query($conn, "INSERT INTO assign(Id,CId,DId) VALUES ('$ownerid','$cid','$did')");
                    if ($into) {
                        $dpno=substr($dpno, 1);//concat 0
                        sentsms($dname,$dpno,$carno);//send sms
                        $error = 'You have successfully assigned.This information is already sent to driver.';
                        
                    }
                }
                echo "<meta http-equiv='refresh' content='1'>";
            }
        }
        //frame start 
                            //car query
                                $sql = "SELECT CNo from  car  where CId not in (select CId from assign)"; 
                                $result = $conn->query($sql);

                                //driver query
                                $dsql = "SELECT DName from driver  where DId not in (select DId from assign)"; 
                                $dresult = $conn->query($dsql);
                                       
                                if ($result->num_rows <= 0 || $dresult->num_rows<=0) { 
                                 
                                echo '<h2 class="text-left " style="border:1px solid grey;margin-top:30px;width:1000px;margin-left:200px;height: 70px; " ><a href="assign.php"  class=" text-left"style="color:gold;">&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-arrow-circle-left" class="text-success text-left" style="font-size: 50px;padding:10px;"></i><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" style="font-size: 20px;padding: 10px;color: grey;"> &nbsp;&nbsp;&nbsp;Can\'t assign right now.Your all cars or drivers have already assigned.</i></h2>';
                                }
                                
                              else
                                { 
        ?>

        <div class="col-sm-12 col-lg-12 col-md-12">
            <div style="width: 340px;height: 510px;background:white;margin:0px auto;border-radius: 20px;border: 1px solid grey;margin-top: 20px;">


                <div>
                    <h1 class="setassignheader">Assign</h1>

                    <h2 class="text-left bg-white ">
                        <?php  
                         $ricon = '<i class="fa fa-info-circle" id="setred">&nbsp;&nbsp;&nbsp;';
                        $gicon = '<i class="fa fa-info-circle" id="setgold">&nbsp;&nbsp;&nbsp;';
                        $nicon = '<i class="fa fa-info-circle" id="setassign">&nbsp;&nbsp;&nbsp;';
                  if (isset($error)) {
                                   echo($gicon.$error);
                                    }
                                    else
                                    {
                                    $error = 'Can assign one car per driver.';
                                    echo $nicon.$error;
                                    }   
                  ?> 

                        </i></h2>
                    <br>
                    <form name="assigncar" class="asform" method="POST" action="#">

                        <p style="font-size: 20px;text-align: left;">Choose Car Number
                            <select class="assele" name="carno">
                                <option selected> </option>
                                <?php 
                                //this query is above
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option>" . $row["CNo"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }



                                ?>
                            </select></p>



                        <p style="font-size: 20px;text-align: left;">Choose Driver Name
                            <select class="assele" name="dname">
                                <option selected> </option>
                                <?php

                                //this query is above
                                if ($dresult->num_rows > 0) {
                                    while ($row = $dresult->fetch_assoc()) {
                                        echo "<option>" . $row["DName"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }



                                ?>
                            </select>
                        </p>
                        <br>
                        <table>
                            <tr>

                                <td> <a href="assign.php">
                                        <p class="backas">Back</i></p><a></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="submit" name="asubmit" value="Submit" class="submitas"></td>
                            </tr>
                        </table>

                    </form>

                </div>

            </div>


        </div>
    </div>
<?php } ?>

<!--//frame end-->
    <!-- start profile -->

    <?php
        include("ownerprofileprofile.php");
    ?>
      <!--       <script>
                var form = $('#proform');
                var proname = $("#proname");
                var proemail = $("#proemail");
                var pronrc = $("#pronrc");
                var prophone = $("#prophone");

                var proaddress = $("#proaddress");
                var prodob = $("#prodob");
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
                        var proaddressval = proaddress.val();
                        var prodobval = prodob.val();
                        proname.css("border", "1px solid lightgray");
                        proemail.css("border", "1px solid lightgray");
                        pronrc.css("border", "1px solid lightgray");
                        prophone.css("border", "1px solid lightgray");
                        location.href = "editprofile.php?name=" + pronameval + "&email=" + proemailval + "&nrc=" + pronrcval + "&address=" + proaddressval + "&dob=" + prodobval + "&phone=" + prophoneval;

                    }
                });
            </script>
        </form>


    </div>
 -->
    <!-- end profile -->
</body>
<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
<script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
<script type="text/javascript" src="js/logoutpopup.js"></script>
<script src="js/main.js"></script>
<script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
<script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/widgets.js"></script>
<script src="js/lity.js"></script>
<script src="js/prism.js"></script>
<script type="text/javascript" src="js/fms.js"></script>

</html>