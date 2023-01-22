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
    <link rel="stylesheet" type="text/css" href="css/pshowprevioussalary.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link rel="stylesheet" type="text/css" href="css/pstudentsalary.css">
    <link rel="stylesheet" type="text/css" href="css/salarylist.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>

    <!-- table -->
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
                <li>
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

                    <li>                       
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


                    <li class="active">                    
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
                                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
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
            <h1>Attendance</h1>
        </div>
    </div>
</div>



<div class="col-sm-8">
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="parentindex.php">Dashboard&nbsp;/&nbsp;</a><a href="#">Attendance</a></li>
            </ol>
        </div>
    </div>
</div>

</div>
                
                <div class="content mt-3" style="overflow-y: hidden;">

                    <div class="col-sm-12 col-lg-12 col-md-12 slrtitle animated fadeInDown">
                        <h6>Attendance Record 
                           
                           <?php 
                                if(isset($_SESSION['month']))
                                {   
                                    $month = $_SESSION['month'];
                                    if($month == 1)
                                    {
                                        $text = "January, ";
                                    }
                                    elseif($month == 2)
                                    {
                                        $text = "February, ";
                                    }
                                    elseif($month == 3)
                                    {
                                        $text = "March, ";
                                    }
                                    elseif($month == 6)
                                    {
                                        $text = "June, ";
                                    }
                                    elseif($month == 7)
                                    {
                                        $text = "July, ";
                                    }
                                    elseif($month == 8)
                                    {
                                        $text = "August, ";
                                    }
                                    elseif($month == 9)
                                    {
                                        $text = "September, ";
                                    }
                                    elseif($month == 10)
                                    {
                                        $text = "October, ";
                                    }
                                    elseif($month == 11)
                                    {
                                        $text = "November, ";
                                    }
                                    elseif($month == 12)
                                    {
                                        $text = "December, ";
                                    }

                                }
                                else
                                {
                                    $text = "";
                                }

                                if(isset($_SESSION['year']))
                                {
                                    $year = $_SESSION['year'];
                                    $text .= $year;
                                }

                                echo ' ( '. $text.' )';
                           ?>

                        </h6>
                        
                    </div>

                    <div class="col-sm-12 col-lg-4 col-md-4 animated fadeInUp">    
                        
                        
                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr1">Choose Year <i class="fa fa-angle-down"></i></li>
                                <ul class="liul1" onchange="test()" id='year'>
                                 <li><a href="pattcheck.php?year=2019" style="color: white;">2019</a></li>
                                 <li><a href="pattcheck.php?year=2020" style="color: white;">2020</a></li>
                                 <li><a href="pattcheck.php?year=2021" style="color: white;">2021</a></li>
                                </ul>
                            </ul>
                        </div>

                        

                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr2">Choose Month <i class="fa fa-angle-down"></i></li>
                                <ul class="liul2">
                                    <li><a href="pattcheck.php?month=1" style="color: white;"> January</a></li>
                                    <li><a href="pattcheck.php?month=2" style="color: white;"> February</a></li>
                                    <li><a href="pattcheck.php?month=3" style="color: white;">  March</a></li>
                                    <li><a href="pattcheck.php?month=6" style="color: white;">  June</a></li>                                    
                                    <li><a href="pattcheck.php?month=7" style="color: white;"> July</a></li>
                                    <li><a href="pattcheck.php?month=8" style="color: white;">  August</a></li>
                                    <li><a href="pattcheck.php?month=9" style="color: white;">  September</a></li>
                                    <li><a href="pattcheck.php?month=10" style="color: white;">  October</a></li>
                                    <li><a href="pattcheck.php?month=11" style="color: white;">  November</a></li>
                                    <li><a href="pattcheck.php?month=12" style="color: white;">  December</a></li>                                    
                                </ul>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-8 col-md-8 animated fadeInUp"  style="height:100%  ;" id='showpickup'>
                        
                                <div class="tparhead">
                                    <table class="parsalaryheader" style="width: 800px;height: 50px;text-align: center;">
                                        <tr>
                                            <th>Name</th>           
                                            <th>Date</th>
                                            <th>Go</th>
                                            <th>Come</th>
                                        </tr>
                                    </table>
                                </div>

                                <div class="tparbody">
                                    <table class="parsalarybody" style="width: 800px;height: 80px;text-align: center;">
                                    
                                <?php
                                    $stusql = mysqli_query($conn,"SELECT * from student where PId='$pid'");
                                    $sturesult = mysqli_fetch_assoc($stusql);
                                    $stuid = $sturesult['StuId'];
        
                                    $year = $_SESSION['year'];
                                    $month = $_SESSION['month'];  
                                    $limit = $_SESSION['limit'];    
                                    //echo "<script> alert('$year - $month - $limit'); </script>";                          

                                    $pickupsql = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='$month' ");
                                    $pickup = mysqli_fetch_assoc($pickupsql);  

                                    for($i=1;$i<$limit;$i++)
                                    {
                                ?>
                                        <tr>
                                            <td> <?php echo $sturesult['StuName'];?></td>
                                            <td> <?php echo $i.'/'.$month.'/'.$year ?></td>
                                            
                                <?php
                                        $result = $pickup['Day'.$i];
                                        if($year == '2019')                             
                                        {
                                            $result = $pickup['Day'.$i];
                                            $gyesorno= substr($result,0,1);

                                            if($gyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($gyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            
                                            $cyesorno= substr($result,1,1);

                                            if($cyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($cyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
 
                                           
                                        }

                                              if($year == '2020')                             
                                        {
                                            $result = $pickup['Day'.$i];
                                            $gyesorno= substr($result,2,1);

                                            if($gyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($gyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            
                                            $cyesorno= substr($result,3,1);

                                            if($cyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($cyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
 
                                           
                                        }

                                              if($year == '2021')                     
                                        {
                                            $result = $pickup['Day'.$i];
                                            $gyesorno= substr($result,4,1);

                                            if($gyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($gyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            
                                            $cyesorno= substr($result,5,1);

                                            if($cyesorno == 1)
                                            {

                                ?>
                                                <td style="color: #3ed758;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
                                            elseif($cyesorno == 0 )
                                            {
                                ?>
                                                <td style="color: red;"><i class="ti-check-box" style="font-size: 30px;"></i></td>
                                <?php
                                            }
 
                                           
                                        }


                                ?>
                                            
                                            
                                        </tr> 
                                <?php

                                    }
                                    
                                ?>
                                    

                                    </table>
                                </div>
                                                   
                    </div>

                    
                </div>

                
    </div>

                    
    <!-- Right Panel -->



    <!-- start profile -->

  <?php 

                include "parentprofileprofile.php";

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
        proname.css("border", "1px solid lightgray");                        
        prophone.css("border", "1px solid lightgray");
        location.href = "editprofileforparent.php?name=" + pronameval + "&address=" + proaddressval  + "&phone="+prophoneval ;

    }
});
</script>
</form>


</div>   -->               

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
            $jq('#showpickup').hide();

            $jq('.chosemonthforslr2').click(function(){
                $jq('.liul2').slideToggle();
            });

            $jq('.chosemonthforslr1').click(function(){
                $jq('.liul1').slideToggle();
            });
        // Jquery Year
            $jq('.y2019').click(function(){
               $jq('.liul1').slideToggle();
            });

            $jq('.y2020').click(function(){
               $jq('.liul1').slideToggle();
            });

            $jq('.y2021').click(function(){
               $jq('.liul1').slideToggle();
            }); 

        // Jquery Month
        
            $jq('.jan').click(function(){
                  $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });

            $jq('.feb').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.mar').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.jun').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.jul').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();  
            });
            $jq('.aug').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });                          
            $jq('.sep').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.oct').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.nov').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
            $jq('.dec').click(function(){
                $jq('.liul2').slideToggle();
                $jq('#showpickup').show();
            });
        <?php if(isset($_SESSION['month']))
              {
         ?>
                $jq('#showpickup').show();
        <?php
              }
        ?>


         });


    </script>
   <?php unset($_SESSION['month']); ?> 

</body>

</html>
