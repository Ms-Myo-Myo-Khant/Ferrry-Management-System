<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['driverauth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}


$did=$_SESSION['driverid'];
$driver = mysqli_query($conn,"SELECT * from driver where DId='$did'");
$rowprofile=mysqli_fetch_assoc($driver);

$car=mysqli_query($conn,"SELECT * from car where CId in(SELECT CId from assign where DId='$did' )");
$student=mysqli_query($conn,"SELECT * from studentinfo ");
$assignsql = mysqli_query($conn, "SELECT * from assign where DId='$did' ");
$assign = mysqli_fetch_assoc($assignsql);
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
    <link rel="stylesheet" type="text/css" href="css/pickuplist.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="css/time(z).css">


   
    <style type="text/css">
        
        .confirm{
          background: white;
          color: #00ad5f;
          border: 1px solid black;
          border-right: none;
          border-radius: 3px;
        }

        .cancel{
          background: white;
          color: red;
          border: 1px solid black;
          border-radius: 3px;
        }
    
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

                    <li>
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
                    
                    <li class="active">                    
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
                            <img style=" width:10%;height:10%;" class="user-avatar rounded-circle" src="<?php echo $rowprofile['Photo']?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#profile" data-lity><i class="fa fa-user"></i> My Profile</a>                  
                            <a class="nav-link" href="dlogout.php"><i class="fa fa-power-off"></i> Logout</a>
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
                        <h1>Student Pickup</h1>
                    </div>
                </div>
            </div>

           

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="driver.php">Dashboard</a>&nbsp;/&nbsp;<a href="dpickup.php">Student Pickup</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="content mt-3">


        <!-- </div>            

      
    
        <div class="content mt-3" style="background:#F8F8FF;"> -->
                    <div class="col-sm-12 col-lg-12 col-md-6 setcarcov">
                                           
                <!-- Show Time -->       
                    Current Time <br>
                    <p id="current" class="realtime" style="font-size:20px;margin-right:30%;"></p>

                    <h6 style="float:left;margin-left:20px; align-items: center;" id='time'> 
                    <input type="text" id="hour" style="width:90px;background: transparent;color: black" disabled>Pick up List</h6>

                    <br><br><br>
                    <div class="col-sm-12 col-lg-12 col-md-12" style="margin-bottom: 20px;">
                        <a href="dpickup.php?upcoming=true"> 
                            <button onclick ='upcoming()' class="pick_btn2 ahov" id='upcoming'> Upcoming </button> 
                        </a>
                        <a href="dpickup.php?previous=true">
                            <button onclick ='previous()' class="pick_btn1 ahov" id='previous'> Previous </button>
                        </a>
                    </div>
                    

                    <div style="visibility:hidden;" id='alert'>
                        <h1 style="font-size: 200%;"> No Current Pickup List! </h1>
                    </div>
                
                    <div class="col-sm-12 col-lg-12 col-md-6 setcarcov">
                        
                                <div style="margin-top:35px;visibility: visible;" id="list" class="stulisttable animated fadeIn delay-1s">
                                    
                                <div class="headlist">

                                    <table >
                                        
                                        <!-- <div class="headlist"> -->
                                            
                                            <tr>
                                                <th>Name</th>
                                                <th></th>
                                                <th>Cancel</th>
                                                <th>Submit</th>
                                            </tr>

                                    </table>

                                </div>

                               
    <script>

                setInterval(time,1000);
                function time()
                {
                var date = new Date();    
                var hours = date.getHours();
                var mins  = date.getMinutes();
                var secs  = date.getSeconds();
                var count=0;
                 if(mins==0 && secs==0 &&(hours==6||hours==8||hours==10||hours==11||hours==14||hours==16))
                {   while(count==0)
                    {  
                        window.location.reload();   
                        count++;
                    }
                }
           
                document.getElementById('current').innerHTML = date.toLocaleTimeString();
                
                    if(hours>12)
                    {
                        hours-=12;
                        hours+='PM';  
                    }
                    else
                    {
                        hours+='AM';
                    }   
          
                
                    if(hours=='6AM'||hours=='7AM')
                    {
                        document.getElementById('hour').value = '6AM'; 
                     
                    }
        
                    if(hours=='8AM'||hours=='9AM')
                    {
                        
                       document.getElementById('hour').value = '8AM'; 
                         
                    }
            
                    if(hours=='10AM')
                    {
                        document.getElementById('hour').value = '10AM'; 
                         
                    }

                    if(hours=='11AM'||hours=='12AM'||hours=='1PM')
                    {
                       document.getElementById('hour').value = '11AM'; 
                         
                    }
            
                    if(hours=='2PM'||hours=='3PM')
                    {
                        document.getElementById('hour').value = '2PM'; 
                         
                    }
            
                    if(hours=='4PM'||hours=='5PM'||hours=='6PM'||hours=='7PM')
                    {
                        document.getElementById('hour').value = '4PM'; 
                         
                    }
                    
               }
   </script>
                                       
                          <div class="bodylist">
                                <table>
                                    <div>
                                    <tbody>
<!---  new  --->
                                 
                    <?php     
                                                  
                            date_default_timezone_set("Asia/Rangoon");
                            $hour = date('H');
                            $count=0;
                            
                            $driverassign = mysqli_query($conn,"SELECT * from assign where DId='$did'");
                            $time = '';
                            
                            while($assignresult = mysqli_fetch_assoc($driverassign)):
                                
                                $assign = $assignresult['SType'];
                                
                                if($assign == 'morning')
                                {   
                                    if($hour >= 6 && $hour<8)
                                    {   
                                       $time = '0';
                                    }
                                    elseif(($hour >= 11 && $hour<14) ||$hour==0)
                                    {   
                                        $time = '3';
                                    }
                                    
                                }
                                elseif($assign == 'full')
                                {
                                    if($hour >= 8 && $hour<10)
                                    {   
                                        $time = '1';                                     
                                    }
                                    elseif($hour >= 14 && $hour<16)
                                    {
                                        $time = '4';                                     
                                    }
                                    
                                }   
                                elseif($assign == 'evening')
                                {
                                    if($hour >= 10 && $hour<11)
                                    {
                                       $time = '2';
                                    } 
                                    elseif($hour >= 16 && $hour<19)
                                    {
                                       $time = '5';
                                    }
                                    
                                }
                              endwhile;  

                              if(( $hour>=19 && $hour<=24) || ($hour>=1 && $hour<=4) )
                                {
                                    //echo "<script> alert('No time');</script>";
                            
                                    $time='_';
                                }
                ?>
                 
                <?php     
                        if(isset($_GET['previous']))
                        {
                            previous();
                            //unset($_GET['upcoming']);
                        } 

                        if(isset($_GET['upcoming']))
                        {
                            upcoming(); 
                            //unset($_GET['previous']);
                        }  
                            function previous()
                        {   
                            $timecopy = $GLOBALS['time'];
                            //echo "<script> alert('$timecopy');</script>";
                            
                            if(isset($_SESSION['time']))
                            {
                                $timecopy = $_SESSION['time'];
                            
                            if($_SESSION['time']<= $GLOBALS['time']+1 && $timecopy > 0 )
                            {   
                                $_SESSION['time'] = $timecopy-1;
                                $timecopy = $_SESSION['time'];
                                //echo "<script> alert('$timecopy');</script>";
                            }
                            }
                            
                            if(!($GLOBALS['time']==$timecopy))
                            echo "<script> document.getElementById('time').style.visibility='hidden'; </script>";
                           
                            if($GLOBALS['time']-1 == $_SESSION['time']|| $_SESSION['time']==0 )
                            {
                                echo "<script> document.getElementById('previous').style.visibility='hidden'; </script>";
                                //unset($_SESSION['time']);
                                unset($_GET['previous']);
                            }

                            $GLOBALS['time'] = $timecopy;

                        }  
                            function upcoming()
                        {   
                            $timecopy = $GLOBALS['time'];
                            $t = $_SESSION['time'];
                            echo "<script> alert('$t'); </script>";
                            if(isset($_SESSION['time']))
                            {
                                $timecopy = $_SESSION['time'];
                            

                            
                            if($_SESSION['time']<= $GLOBALS['time']+1 && $timecopy< 5)
                            {   
                                $_SESSION['time']= $_SESSION['time']+1;
                                $timecopy = $_SESSION['time'];
                                //echo "<script> alert('$timecopy');</script>";
                            }

                            }
                            else
                            {
                                $_SESSION['time'] = $GLOBALS['time'];
                            }

                            if(!($GLOBALS['time']==$timecopy))
                            echo "<script> document.getElementById('time').style.visibility='hidden'; </script>";
                            if($GLOBALS['time']+1 == $_SESSION['time'] || $_SESSION['time']==5)
                            {
                                echo "<script> document.getElementById('upcoming').style.visibility='hidden'; </script>";
                                //unset($_SESSION['time']);
                                unset($_GET['upcoming']);
                            }

                            $GLOBALS['time'] = $_SESSION['time'];

                        }      
                    
                    ?>

                
                <?php
                        //echo "<script> alert('$time');</script>";
                            if($time=='')
                            {
                            echo "<script>
                                    document.getElementById('list').style.visibility='hidden';
                                    document.getElementById('time').style.visibility = 'hidden';

                                    document.getElementById('alert').style.visibility = 'visible';
                                  </script> ";                      
                            }

                            if($time=='_')
                            {
                            echo "<script>
                                    document.getElementById('list').style.visibility='hidden';
                                    document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('previous').style.visibility = 'hidden';
                                    document.getElementById('upcoming').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                  </script> ";                      
                            }
            
                            if( $time == '0') 
                            {   
                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='morning' ");

                                $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];

                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
                                 $count = mysqli_num_rows($student);   //4
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                  
                                  $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j'); 
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,0,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,2,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,4,1);
                                  }
                                  $StuYNsql = mysqli_query($conn,"SELECT * from student where StuId='$stuid'");
                                  $StuYNresult=mysqli_fetch_assoc($StuYNsql);
                                  $StuYN      =$StuYNresult['YN'];
                                  if( $yesno==1 && $StuYN==1 )
                                   {
                                      
                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                            <?php  }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>document.getElementById('list').style.visibility='hidden';
                                     document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                }  



                            }
                            if($time == '1')
                            {   
                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='full'");


                               $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];
                                
                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
                                 $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                  
                                  $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j');
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];         

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,0,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,2,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,4,1);
                                  }

                                $StuYNsql = mysqli_query($conn,"SELECT * from student where StuId='$stuid'");
                                  $StuYNresult=mysqli_fetch_assoc($StuYNsql);
                                  $StuYN      =$StuYNresult['YN'];
                                  if($yesno==1 && $StuYN==1)
                                   {

                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                            <?php  
                                    }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>document.getElementById('list').style.visibility='hidden';
                                   document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                }

                            }

                            if($time == '2')
                            {   
                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='full' ");
                                $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];

                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
                                 $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                  
                                  $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j');
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,0,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,2,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,4,1);
                                  }

                                   if($yesno==1)
                                   {

                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                        <?php  
                                       }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>document.getElementById('list').style.visibility='hidden';
                                    document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                } 
                            }
                            if( $time == '3') 
                            {   
                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='morning' ");
                                $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];

                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
                                
                                $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                 $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                  $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j');
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,1,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,3,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,5,1);
                                  }
                                  
                                  $StuYNsql = mysqli_query($conn,"SELECT * from student where StuId='$stuid'");
                                  $StuYNresult=mysqli_fetch_assoc($StuYNsql);
                                  $StuYN      =$StuYNresult['YN'];
                                  if($yesno==1 && $StuYN==1)
                                   {
                              
                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                            <?php  
                                
                                }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>document.getElementById('list').style.visibility='hidden';
                                    document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                }

                            }
                            if($time == '4')
                            {
                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='full' ");
                                $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];

                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
        
                                 $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                
                                $yid  ='yes'.$count;
                                $nid  ='no'.$count;
                                $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j');
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,1,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,3,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,5,1);
                                  }

                                   $StuYNsql = mysqli_query($conn,"SELECT * from student where StuId='$stuid'");
                                  $StuYNresult=mysqli_fetch_assoc($StuYNsql);
                                  $StuYN      =$StuYNresult['YN'];
                                  if($yesno==1 && $StuYN==1)
                                  { 

                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                            <?php  
                                    }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>document.getElementById('list').style.visibility='hidden';
                                     document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                }
                            }
                            
                            if($time == '5')
                            {

                                $assign = mysqli_query($conn,"SELECT * from assign where DId='$did' and SType='evening'");
                                $result = mysqli_fetch_assoc($assign);
                                $sid = $result['SId'];
                                $subid = $result['SubId'];

                                $student = mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid'");
                                 $count = mysqli_num_rows($student);
                                //echo "<script> alert('$count'); </script>";
                                $timer=0;
                               
                                while( $row=mysqli_fetch_assoc($student) ):
                                  
                                $stuid = $row['StuId'];

                                date_default_timezone_set("Asia/Rangoon");
                                $day   = Date('j');
                                $month = Date('n');
                                $year  = Date('Y');

                                  $pickup = mysqli_query($conn,"SELECT * from pickup where StuId='$stuid' and Month='".$month."' ");
                                  $result2=mysqli_fetch_assoc($pickup);
                                  $yesno  = $result2['Day'.$day];

                                  if($year==2019)
                                  {
                                    $yesno = substr($yesno,1,1);
                                  }
                                  else if($year==2020)
                                  {
                                    $yesno = substr($yesno,3,1);
                                  }
                                  else if($year==2021)
                                  {
                                    $yesno = substr($yesno,5,1);
                                  }

                                  $StuYNsql = mysqli_query($conn,"SELECT * from student where StuId='$stuid'");
                                  $StuYNresult=mysqli_fetch_assoc($StuYNsql);
                                  $StuYN      =$StuYNresult['YN'];
                                  if($yesno==1 && $StuYN==1)
                                   {

                            ?>          
                                <tr>
                      
                                    <td class="km1" >
                                        <i class="cname"><?php echo $row['StuName'] ?></i>
                                        <i class="cph"><?php echo $row['PhoneNo'] ?></i>
                                    </td>                                                                   
                                     <!-- class="cancel" -->                         
                                    <td class="ipad">
                                        <i class="fa fa-phone-square" id="icondir"></i>
                                    </td>
                                    <!-- cancel -->
                                    <td class="no">
                                        <a href="dcancelpickup.php?stuid=<?php  echo $row['StuId']?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <!-- confirm -->
                                    <td class="yes">
                                        <a href="dconfirmpickup.php?stuid=<?php echo $row['StuId'] ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    <!-- fa fa-times-circle -->
                                </tr>

                            <?php  
                                    }
                                else
                                {
                                    $timer++;
                                    //echo "<script> alert('$timer'); </script>";  
                                }
                                endwhile;

                                if($timer==$count)
                                {
                                    echo "<script>
                                    document.getElementById('list').style.visibility='hidden';
                                    document.getElementById('time').style.visibility = 'hidden';
                                    document.getElementById('alert').style.visibility = 'visible';
                                      </script>";
                                }
                            }

                        ?>
                           
                                         
                                            </tbody>
                                            </div>
                                    </table>

                                </div>  

                        
                    </div>  <!--  1 set -->

        <script>


            function show()
            { 
                var date = new Date();
              //  document.getElementById('current').innerHTML = date.toLocaleTimeString();

                var hours=date.getHours();
                if(hours>12)
                {
                    hours-=12;
                    hours=hours+'PM';
                }
                else
                    hours+='AM';

                var list = document.getElementById('list');
                if(list.style.visibility == 'hidden' && (hours=='6AM'||hours=='8AM'||hours=='10AM'||hours=='11AM'||hours=='2PM'||hours=='4PM'))
                {
                    list.style.visibility = 'visible';
                }
                else
                    list.style.visibility = 'hidden';

            }

           
        </script>


      </div> <!-- .content -->
    </div>

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



    <!-- start inline car info -->


    

    <!-- <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script> -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
     <script src="js/main.js"></script>      
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>


    <!-- lity js -->

    <script src="js/lity.js"></script>  
    <script src="js/prism.js"></script>
    <script type="text/javascript" src="js/fms.js"></script>
    <script type="text/javascript">
       

       



         $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {


           $jq('.ipad').on("click",function(e) {
             var par=$jq(this).parent();
             var tab=par.children('.km1');
             var cname=tab.children('.cname');
             var cph=tab.children('.cph');
             cph.toggle("slow");
             cname.toggle();
             $jq(this).find($jq(".fa")).toggleClass('fa-phone-square').toggleClass('fa-play');
             $jq(this).toggleClass('ipad');
             $jq(this).toggleClass('ipad1');
             // $jq(this).add('#ipad');
             event.preventDefault();
           });


            $jq('.ipad1').on("click",function(e) {
             var par=$jq(this).parent();
             var tab=par.children('.km1');
             var cname=tab.children('.cname');
             var cph=tab.children('.cph');
             
             cname.toggle("slow");
             cph.toggle();
             $jq(this).find($jq(".fa")).toggleClass('fa-play').toggleClass('fa-phone-square');
             $jq(this).toggleClass('ipad1');
             $jq(this).toggleClass('ipad ');
             event.preventDefault();
           });






           $jq('.confirm').on("click",function(e) {
             $jq(this).css("opacity","0.5");
             $jq(this).css("color","#222");             
             var cancel1=$jq(this).parent();
             var cancel=cancel1.find('.cancel');
             cancel.css("opacity","1");
             cancel.css("background","white");
             cancel.css("color","red");            
             event.preventDefault();
           });

           $jq('.cancel').on("click",function(e) {
             $jq(this).css("opacity","0.5");
             $jq(this).css("color","#222");
             var confirm1=$jq(this).parent();
             var confirm=confirm1.find('.confirm');
             confirm.css("opacity","1");
             confirm.css("background","white");
             confirm.css("color","#00ad5f");
             event.preventDefault();
           });


         });
   </script>
   
   
    
   
</body>

</html>
