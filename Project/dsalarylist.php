<?php 
session_start();
include("confs/config.php");
if(!$_SESSION['driverauth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

$did=$_SESSION['driverid'];
if($_GET)
{
$sid = $_GET['sid'];
$_SESSION['sid']=$sid;
//$_SESSION['sid'] = $sid;
$subid=$_GET['subid'];
$_SESSION['subid']=$subid;
}

$sid= $_SESSION['sid'];
$subid=$_SESSION['subid'];

$MONTH="January";
if(isset($_SESSION['month']))
{
    $MONTH=$_SESSION['month'];    
}
$YEAR=2019;
if(isset($_SESSION['year']))
{
    $YEAR=$_SESSION['year'];    
}

$student=mysqli_query($conn,"SELECT * from salary where Year='$YEAR'");
$studentforedit=mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid' ");

$driver = mysqli_query($conn,"SELECT * from driver where DId='$did'");
$rowprofile=mysqli_fetch_assoc($driver);

$assignsql = mysqli_query($conn, "SELECT * from assign where DId='$did' ");
$assign = mysqli_fetch_assoc($assignsql);
// $salaryshow = mysqli_query($conn,"SELECT * from salary where StuId=$sid and Year=$YEAR and Month=$MONTH");
//$show=mysqli_fetch_assoc($salaryshow);

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
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/studentlist.css"> -->
    <link rel="stylesheet" type="text/css" href="css/salarylist.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
    
    <!-- table -->


    <style type="text/css">
        

    
    </style>

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
                             <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>"> 
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

                    <li class="active">
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
                <img style=" width:10%;height:10%;" class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo'] ?>" alt="User Avatar">
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
                                <h1>Salary list</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="driver.php">Dashboard&nbsp;/&nbsp;</a><a href="dstudentsalary.php">Student's Salary&nbsp;</a>/&nbsp;<a href="dshowsalaryfromcar.php?sid=<?php echo $sid?>">Show Salary From Car</a><a href="#">&nbsp;/&nbsp;Salary list</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
            
                </div>

                <div class="content mt-3">

                    <div class="col-sm-12 col-lg-4 col-md-4 animated fadeInUp">                        
                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr">Choose&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></li>
                                <ul class="liul">

                                    <li><a class="showview" style="color: white;">View</a></li>
                                    <li><a class="showedit" style="color: white;">Edit</a></li>
                                                      
                                </ul>
                            </ul>
                        </div>

                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr2">Choose Year <i class="fa fa-angle-down"></i></li>
                                <ul class="liul2" onchange="test()" id='year'>
                                    <li><a href="dchooseyear.php?year=2019"  style="color: white;">2019</a></li>
                                    <li><a href="dchooseyear.php?year=2020"  style="color: white;">2020</a></li>
                                    <li><a href="dchooseyear.php?year=2021"  style="color: white;">2021</a></li>
                                                                        
                                </ul>
                            </ul>
                        </div>

                        

                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr">Choose Month <i class="fa fa-angle-down"></i></li>
                                <ul class="liul">
                                    <li><a href="dchoosemonth.php?month=January" style="color: white;">January</a></li>
                                    <li><a href="dchoosemonth.php?month=February"  style="color: white;">February</a></li>
                                    <li><a href="dchoosemonth.php?month=March"  style="color: white;">March</a></li>
                                    <li><a href="dchoosemonth.php?month=April"  style="color: white;">April</a></li>
                                    <li><a href="dchoosemonth.php?month=May"  style="color: white;">May</a></li>
                                    <li><a href="dchoosemonth.php?month=June"  style="color: white;">June</a></li>
                                    <li><a href="dchoosemonth.php?month=July"  style="color: white;">July</a></li>
                                    <li><a href="dchoosemonth.php?month=August"  style="color: white;">August</a></li>
                                    <li><a href="dchoosemonth.php?month=September"  style="color: white;">September</a></li>
                                    <li><a href="dchoosemonth.php?month=October"  style="color: white;">October</a></li>
                                    <li><a href="dchoosemonth.php?month=November"  style="color: white;">November</a></li>
                                    <li><a href="dchoosemonth.php?month=December"  style="color: white;">December</a></li>                                    
                                </ul>
                            </ul>
                        </div>
                    </div>




                    <div class="col-sm-12 col-lg-8 col-md-8 setcarcov viewtable">
                                           
                                <h6>Student's Salary View</h6>
                                <h6><?php echo "(".$MONTH.",".$YEAR.")" ?></h6>
                                <div class="stulisttable animated fadeInUp">
                                    
                                <div class="headlist">

                                    <table >
                                                                            
                                            <tr>
                                                <th>Name</th>                                                
                                                <th>Phone</th>
                                                <th>Email</th>   
                                                <th>Amount</th>

                                            </tr>

                                    </table>

                                </div>

                                <div class="bodylist">
                                    <table>
                                            <div>
                                            <tbody>
                                            <?php while($rows=mysqli_fetch_assoc($student)): ?>
                                            <tr>
                                                <td class="currentstuname"><?php echo $rows['StuName']?></td>
                                                <td><?php echo $rows['PhoneNo']?></td>
                                                <td><?php echo $rows['Email']?></td>
                                                <td><?php echo $rows[$MONTH] ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                            </tbody>
                                            </div>

                                        <!-- </div> -->





                                    </table>

                                </div>  

                                </div>
                    </div>  <!--  1 set -->



                    <div class="col-sm-12 col-lg-8 col-md-8 setcarcov hidetable">
                                           
                                <h6>Student's Salary Edit</h6>
                                <h6><?php echo "(".$MONTH.",".$YEAR.")" ?></h6>
                                
                                <div class="stulisttable animated fadeInDown">
                                    
                                <div class="headlist">

                                    <table >
                                                                            
                                            <tr>
                                                <th>Name</th>                                                
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Confirm</th>
                                            </tr>

                                    </table>

                                </div>

                                <div class="bodylist">
                                    <table>
                                            <div>
                                            <tbody>
                                            <?php while($rows=mysqli_fetch_assoc($studentforedit)): ?>
                                            <tr>
                                                <td class="currentstuname"><?php echo $rows['StuName']?></td>
                                                <td><?php echo $rows['PhoneNo']?></td>
                                                <td><?php echo $rows['Email']?></td>
                                                <td><?php echo $rows['Amount'] ?></td>

                                                <?php 
                                                    $STUID=$rows['StuId'];
                                                    $query1=mysqli_query($conn,"SELECT * from salarycheck where StuId=$STUID and Year=$YEAR");
                                                    $number1 = mysqli_num_rows($query1);
                                                    if($number1>0)
                                                    {
                                                        $salary=mysqli_query($conn,"SELECT * from salarycheck where StuId=$STUID and Year=$YEAR");
                                                        $salaryrow=mysqli_fetch_assoc($salary);
                                                        $tocheck=$salaryrow[$MONTH];
                                                        if($tocheck==100 || $tocheck==110 || $tocheck==111)
                                                        {
                                                ?>
                                                        <td><a href="">Done</a></td>
                                                <?php 
                                                        }
                                                        else
                                                        {
                                                ?>
                                                        <td class="hidetableconfirm"><a href="editsalarycheck.php?stuid=<?php echo $rows['StuId']?>&month=<?php echo $MONTH ?>&year=<?php echo $YEAR ?>"><i class="ti-check"></i></a></td>
                                                <?php 
                                                        }
                                                    }
                                                    else
                                                    {
                                                 ?>
                                                    <td class="hidetableconfirm"><a href="editsalarycheck.php?stuid=<?php echo $rows['StuId']?>&month=<?php echo $MONTH ?>&year=<?php echo $YEAR ?>"><i class="ti-check"></i></a></td>
                                                <?php 
                                                    }
                                                 ?>
                                                        
                                                         
                                                    
                                                

                                                  




                                                

                                                










                                                
                                                
                                            </tr>
                                            <?php endwhile; ?>
                                            </tbody>
                                            </div>

                                        <!-- </div> -->





                                    </table>

                                </div>  

                                </div>
                    </div>  <!--  hide edit set -->



                    
    <!-- Right Panel -->



    <!-- start profile -->

    
            <?php

            include "driverprofileprofile.php";

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


    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script>      
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>  
    <script src="js/prism.js"></script> 
    <script type="text/javascript" src="js/fms.js"></script>
    <!--  table -->

    <script type="text/javascript">
          $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {

            $jq('.chosemonthforslr').click(function(){
                $jq('.liul').slideToggle();
            });

            $jq('.chosemonthforslr1').click(function(){
                $jq('.liul1').slideToggle();
            });

            $jq('.chosemonthforslr2').click(function(){
                $jq('.liul2').slideToggle();
            });

            $jq('.showview').click(function(){
                $jq('.viewtable').show();
                $jq('.hidetable').hide();
            });

            $jq('.showedit').click(function(){
                $jq('.hidetable').show();
                $jq('.viewtable').hide();
            });

         });
    </script>

</body>

</html>
