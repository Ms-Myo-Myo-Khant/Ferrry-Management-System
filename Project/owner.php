<?php

session_start();

if (!$_SESSION['auth']) {
    header("location:landingpage.php");
}

$ownerid = $_SESSION['ownerid'];
include("confs/config.php");
$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid'");
$rowprofile = mysqli_fetch_assoc($ownerprofile);


// Start Rating

$driver = mysqli_query($conn,"SELECT distinct DId from assign where Id='$ownerid' ");

while($driverR = mysqli_fetch_assoc($driver))
{   $Totalrating = 0;
    $Totalvoting = 0;
    $AverageRating = 0;
    $did     = $driverR['DId'];

    $assignInDriver = mysqli_query($conn,"SELECT * from assign where DId='$did' ");

    while($noofassign = mysqli_fetch_assoc($assignInDriver))
    {   
        $sid = $noofassign['SId'];
        $subid = $noofassign['SubId'];
    
        $student1 =  mysqli_query($conn,"SELECT sum(Rating) as R from student where SId='$sid' and SubId='$subid'");
        $studentR = mysqli_fetch_assoc($student1);
        $ratingforassign = $studentR['R'];
        $Totalrating += $ratingforassign;

        $student2 = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
        $noofstudent  = mysqli_num_rows($student2);
        $Totalvoting += $noofstudent;
         
        
    }
    if($Totalvoting == 0)
        $AverageRating = 0;
    else
        $AverageRating = $Totalrating/$Totalvoting;

    
    //echo "<script> alert('$AverageRating') </script>";


    // Update RatingTotal in driver
    mysqli_query($conn,"UPDATE driver set AverageRating='$AverageRating' where DId='$did' ");

}

// End Rating

 $dataPoints = array(

        array("y" => 11,"label" => "Jan" ),
        array("y" => 12,"label" => "Feb" ),
        array("y" => 28,"label" => "March" ),
        //array("y" => 1,"label" => "April" ),
        array("y" => 1,"label" => "May" ),
        array("y" => 4,"label" => "June" ),
        array("y" => 5,"label" => "July" ),
        array("y" => 12,"label" => "Aug" ),
        array("y" => 13,"label" => "Sep" ),
        array("y" => 16,"label" => "Oct" ),
        array("y" => 10,"label" => "Nov" ),
        array("y" => 19,"label" => "Dec" )

    );

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
    
    <link href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="vendorhomepage/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/driver_db.css">
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
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



<!-- start profile -->

    <?php
        include("ownerprofile.php");
    ?>

<!-- end profile -->


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
                    <li class="active animated bounceInLeft">
                        <!-- <a href="owner.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> -->
                        <form class="hovform" method="post" action="owner.php">
                            <i class="menu-icon ti-dashboard">
                                <input type="submit" name="submitdashboard" value="Dashboard">
                            </i>

                        </form>
                    </li>

                    
                    <h3 class="menu-title animated slideInUp">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li class="animated bounceInLeft">
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                        <form class="hovform" method="post" action="carinfo.php">
                            <i class="menu-icon ti-truck">
                                <input type="submit" name="submitcarinfo" value="Car Information">
                            </i>

                        </form>
                    </li>

                    <li class="animated bounceInLeft">
                        <!-- <a href="driverinfo.php"> <i class="menu-icon ti-user"></i>Driver Information </a> -->
                        <form class="hovform" method="post" action="driverinfo.php">
                            <i class="menu-icon ti-user">
                                <input type="submit" name="submitdriverinfo" value="Driver Information">
                            </i>

                        </form>
                    </li>

                    <li class="animated bounceInLeft">
                        <!-- <a href="schoolinfo.php"> <i class="menu-icon ti-home"></i>School Information</a> -->

                        <form class="hovform" method="post" action="schoolinfo.php">
                            <i class="menu-icon ti-world">
                                <input type="submit" name="submitschoolinfo" value="School Information">
                            </i>

                        </form>
                    </li>


                    <h3 class="menu-title animated slideInUp">Assign</h3><!-- /.menu-title -->

                    <li class="animated bounceInLeft">
                        <!-- <a href="studentregister.php"> <i class="menu-icon ti-notepad"></i>Student Register</a> -->

                        <form class="hovform" method="post" action="studentregister.php">
                            <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register"> </i>

                        </form>
                    </li>
                    <!--  <li class="animated bounceInLeft">
                        <a href="owner.php"> <i class="menu-icon ti-id-badge"></i>Driver Register</a>
                    </li> -->
                    <li class="animated bounceInLeft">
                        <!-- <a href="assign.php"> <i class="menu-icon ti-clipboard"></i>Assign / Reassign</a> -->

                        <form class="hovform" method="post" action="assign.php">
                            <i class="menu-icon ti-clipboard">
                                <input type="submit" name="submitassign" value="Assign / Reassign">
                            </i>

                        </form>
                    </li>


                    <h3 class="menu-title animated slideInUp">Transaction</h3><!-- /.menu-title -->

                    <li class="animated bounceInLeft">
                        <!-- <a href="studentsalary.php"> <i class="menu-icon ti-credit-card"></i>Student's Salary</a> -->
                        <form class="hovform" method="post" action="studentsalary.php">
                            <i class="menu-icon ti-credit-card">
                                <input type="submit" name="submitstudentsalary" value="Student Salary">
                            </i>
                        </form>
                    </li>


                    <h3 class="menu-title animated slideInUp">Activity</h3><!-- /.menu-title -->

                    <li class="animated bounceInLeft">
                        <form class="hovform" method="post" action="omapSchool.php">
                            <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>
                        </form>
                    </li>

                    <li class="animated bounceInLeft">
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
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#inline" data-lity><i class="fa fa-user"></i>My Profile</a>
                            <a class="nav-link" id="logoutbut"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>

            </div>

        </header>

        <!-- Header-->






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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3" style="height: 1000px;">

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
   
                    <div class="features clearfix">
                        <div class="containerd">
                            <div class="rowd">
                                <div class="columns ten centered">
                                    <h2>Best Driver of this Month</h2>
                                    <span class="titlespandriver" style="margin-top: 10px;">View Your Excellent Drivers</span>
                                </div>
                            </div>
                            <div class="rowd">
            <?php
                if($test = mysqli_query($conn," SELECT * from driver where DId in (SELECT DId from assign where Id='$ownerid') order by AverageRating desc limit 3 "))
                {
                     //echo "Success ".mysqli_num_rows($test) ;

                }
                else
                {
                    echo mysqli_error($conn);
                }
                $count = 0; 
                $colors = array('#ffbf00','#bec2cb','#AD8A56');
                $words  = array('This driver got the best satisfaction among all from parents for this month.','This driver got the second best satisfaction among all from parents for this month.','This driver got the third best satisfaction among all from parents for this month.');
                while($testresult = mysqli_fetch_assoc($test))
                    {   
            ?>
                            
                            <div class="columns four" style="float:left">
                                <section style="background:<?php echo $colors[$count] ?>;">
                                      <div >
                                        <img style="width:100px; height:80px; border-radius: 5px;" src="<?php echo $testresult['Photo']; ?>" alt="" >
                                      </div>
                                      <b><?php echo $testresult['DName']; ?> </b>
                                      <p><?php echo $words[$count]; ?> </p>
                                      <button  class="driver_detail">Congrats</button>
                                </section>
                            </div>
<?php
    $count++;
    }
?>  
                            

                            </div>

                        </div>
                    </div>

                

        </div>

    </div>

    <!-- Right Panel -->

    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>
    <script type="text/javascript" src="js/logoutpopup.js"></script>
    
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>
    <script src="js/lity.js"></script>
    <script src="js/prism.js"></script>
    <script type="text/javascript" src="js/fms.js"></script>
     <script src="js/bar.js"></script>

    <script>
    window.onload = function()
     {
     
    var chart = new CanvasJS.Chart("chartContainer", 
        {
        animationEnabled: true,
        title:{ text: "Annual Chart of FMS"},
        axisY: {},
        data: [{
            type: "bar",
            yValueFormatString: "Ks#,##600K",//to put calculated data here
            indexLabel: "{y}",
            indexLabelPlacement: "inside", //Ks inside the bar
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: 
            <?php 
            echo json_encode($dataPoints,0); 
            ?>
            }]
      }
      );//end
    chart.render();
     
    }//function end
    </script>
</body>

</html>