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


$assignsql = mysqli_query($conn,"SELECT CId from assign where SId in( SELECT SId from student where PId='$pid') and SubId in(SELECT SubId from student where PId='$pid') ");
$cidresult = mysqli_fetch_assoc($assignsql);
$cid = $cidresult['CId'];

$carsql = mysqli_query($conn,"SELECT * from car where CId='$cid' ");
$car = mysqli_fetch_assoc($carsql);

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
    <link rel="stylesheet" type="text/css" href="css/pcarinfo.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/driverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/showdriverinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>

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
                    <li class="active">
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


                    <li>                    
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
                                <h1>Car Information</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                     <li class="active"><a href="parentindex.php">Dashboard</a>&nbsp;/&nbsp;<a href="#">Car Information</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content mt-3" style="overflow: hidden;">

                    

                    

                    <div style="margin-top: 20px;height:650px;">
                    <div class="morecarinfo" style="width:500px; height: 600px;box-shadow: 2px 6px 23px -5px rgba(0,0,0,0.75);border-radius: 10px;">
                        <div style="height: 400px;margin:0px auto;margin-bottom:60px;border-radius: 10px;"  class="showcar">
                                

                                <div class="showcarinfocontent">

                                <h1>Car Information</h1>
                                
                                
                                        <div class="headtab">
                                            <table>
                                                <tr>
                                                    <td> 
                                                        <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Car Number&nbsp;&nbsp;
                                                    </td>

                                                    <td>
                                                        <?php echo $car['CNo']?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> 
                                                        <i class="fa fa-credit-card-alt">&nbsp;&nbsp;&nbsp;</i>Model&nbsp;&nbsp;
                                                    </td>
                                                    <td>
                                                      <?php echo $car['Model']?>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td> 
                                                        <i class="fa fa-spinner">&nbsp;&nbsp;&nbsp;</i>Car Type&nbsp;&nbsp;
                                                    </td>
                                                    <td>
                                                      <?php echo $car['Type']?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> 
                                                        <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Number of passengers&nbsp;&nbsp;
                                                    </td>
                                                    <td>
                                                      <?php echo $car['NoOfSeats']?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <i class="fa fa-mail-forward">&nbsp;&nbsp;&nbsp;</i>Color&nbsp;&nbsp;
                                                    </td>
                                                    <td>
                                                      <?php echo $car['Color']?>
                                                    </td>
                                                </tr>
                                                


                                            </table>
                                           
                                        </div>

                                        <div class="carinfoimgparent">                                            
                                            <img src="<?php echo $car["Photo"]; ?>">
                                        </div>        

                                        <div class="buttoncar">      
                                            <button class="carimgpar">Car Image</button> 
                                                                                  
                                        </div>

                                        <div class="buttoncar1">      
                                        <button class="carimgpar1" >Back</button>                                                                                  
                                        </div>
                                        
                         
                                </div>


                            
                        </div>


                    </div>

                    </div>

                    


    <!-- end inline car info -->
     

     <!-- end ser car -->
                   

                </div> 

    </div>

    <!-- Right Panel -->



   <!-- start profile -->

                <?php 

                include "parentprofileprofile.php";

                ?>             

<!-- end profile -->



   

    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <script src="js/main.js"></script> 
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
    <script type="text/javascript" src="js/logoutpopup.js"></script>     
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>  
    <script src="js/prism.js"></script> 
    <script type="text/javascript" src="schoolinfo.js"></script>
    <script type="text/javascript" src="js/fms.js"></script> 
    <script type="text/javascript">
        

         $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {

            $jq('.carimgpar1').hide();

            $jq('.morecarinfo').slideDown("slower");


            $jq('.editdriverinfo').on("click",function(e){
            e.preventDefault();
            $jq('.morecarinfo').hide();
                $jq('.editmorecarinfo').fadeIn();
            });

            $jq('.carimgpar').click(function(){
            $jq('.carinfoimgparent').toggle();
            $jq('.headtab').toggle();
            $jq('.carimgpar').hide();
            $jq('.carimgpar1').show();
            });

            $jq('.carimgpar1').click(function(){
            $jq('.carinfoimgparent').toggle();
            $jq('.headtab').toggle();
            $jq('.carimgpar1').hide();
            $jq('.carimgpar').show();
            });
          
        

         });

       
    

   </script>
</body>

</html>
