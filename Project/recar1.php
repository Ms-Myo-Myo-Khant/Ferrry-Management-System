<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['auth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

$ownerid=$_SESSION['ownerid'];
$_SESSION['sid'] = $_GET['sid'];
$sid    =$_SESSION['sid'];

// $driver=mysqli_query($conn,"SELECT * from driverinfo where did='$did'");
// $row1=mysqli_fetch_assoc($driver);

$car=mysqli_query($conn,"SELECT * from car where CId in (SELECT CId from assign where Id='$ownerid' and SId='$sid') ");

$ownerprofile= mysqli_query($conn,"SELECT * from owner where Id='$ownerid'");
$rowprofile  = mysqli_fetch_assoc($ownerprofile);


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
    <link rel="stylesheet" type="text/css" href="css/registercar.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>

    
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
                        <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register">  </i>
                          
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
                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="owner.php">Dashboard&nbsp;/&nbsp;</a><a href="studentregister.php">Student Register&nbsp;</a>/&nbsp;<a href="registercar.php">Registered Car</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content mt-3">

                    

                    


                    <!-- set car start -->
                    <?php while($row=mysqli_fetch_assoc($car)):?>
                    <div class="col-sm-12 col-lg-4 col-md-6 setcarcov  animated zoomIn">
                                           
                                
                                <div class="carlist">
                                    
                                    
                                        <div class="carbg">
                                            
                                            <img src="images/carbg/<?php $random = rand(1,11); echo $random; ?>.jpg" style="width: 300px;height: 140px;" class="img-hov-zoomin">
                                            <div class="textonimg">Car</div>

                                        </div>

                                        <div class="carcontent">
                                            
                                            <div class="lft">
                                                <i class="fa fa-bus"></i>
                                            </div>

                                            <div class="rght">
                                                    <a href="studentlist.php?cid=<?php echo $row['cid']?>"><?php echo $row['carname'] ?></a>
                                            </div>

                                        </div>

                                </div>

                        
                    </div>  <!--  1 set -->
                <?php endwhile;?>

                    




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



    <!-- start inline car info -->


    <div id="inline" class="morecarinfo lity-hide">
                    

                    <div style="width: 100%;height: 100%background: green;margin:0px auto;margin-bottom:60px;"  class="showcar">

                        <div class="showcarinfocontent">

                            <h1>Student List</h1>
                            <form>
                                
                                <div class="labelshowcif">Name</div>
                                <input type="text" name="name" placeholder="Name">
                                <div class="labelshowcif">Car License</div>
                                <input type="text" name="name" placeholder="Car License">
                                <div class="labelshowcif">Name</div>
                                <input type="text" name="name" placeholder="Name">
                                <div class="labelshowcif">Car License</div>
                                <input type="text" name="name" placeholder="Car License">
                                <div class="labelshowcif">Name</div>
                                <input type="text" name="name" placeholder="Name">
                                <div class="labelshowcif">Car License</div>
                                <input type="text" name="name" placeholder="Car License">
                                <div class="labelshowcif">Name</div>
                                <input type="text" name="name" placeholder="Name">
                                <div class="labelshowcif">Car License</div>
                                <input type="text" name="name" placeholder="Car License">

                            </form>
                            
                                <div class="buttoncar">
                                       

                                       
                                </div> 

                        </div>

                        
                    </div>


    </div>


    <!-- end inline car info -->

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
       

        

    

   </script>
</body>

</html>
