<?php 
include('confs/config.php');
session_start();

$ownerid = $_SESSION['ownerid'];
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

//echo "<script>alert($YEAR)</script>";
//echo "<script>alert($MONTH)</script>";
//echo $MONTH;

//$_SESSION['subid'] = $subid;
//$subid= $_SESSION['subid'];
$student=mysqli_query($conn,"SELECT * from salary where Year=$YEAR");
$studentforedit=mysqli_query($conn,"SELECT * from student where SId='$sid' and SubId='$subid' ");

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
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/studentlist.css"> -->
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
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
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
                        <i class="menu-icon ti-notepad">&nbsp;<input type="submit" name="submitstudentregister" value="Student Register">  </i>
                          
                    </form> 
                    </li>
                   
                    <li>
                      
                    <form class="hovform" method="post" action="assign.php">
                        <i class="menu-icon ti-clipboard">
                            <input type="submit" name="submitassign" value="Assign / Reassign">   
                        </i>
                         
                    </form> 
                    </li>

                  
                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->

                    <li class="active">
                      
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
                    <li>
                        
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
                                <h1>Salary list</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="owner.php">Dashboard&nbsp;/&nbsp;</a><a href="studentsalary.php">Student's Salary&nbsp;</a>/&nbsp;<a href="showsalaryfromcar.php?sid=<?php echo $sid;?>">Show Salary From Car</a><a href="#">&nbsp;/&nbsp;Salary list</a></li>
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
                                    <li><a href="chooseyear.php?year=2019"  style="color: white;">2019</a></li>
                                    <li><a href="chooseyear.php?year=2020"  style="color: white;">2020</a></li>
                                    <li><a href="chooseyear.php?year=2021"  style="color: white;">2021</a></li>
                                                                        
                                </ul>
                            </ul>
                        </div>

                        

                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr">Choose Month <i class="fa fa-angle-down"></i></li>
                                <ul class="liul">
                                    <li><a href="choosemonth.php?month=January" style="color: white;">January</a></li>
                                    <li><a href="choosemonth.php?month=February"  style="color: white;">February</a></li>
                                    <li><a href="choosemonth.php?month=March"  style="color: white;">March</a></li>
                                    <li><a href="choosemonth.php?month=April"  style="color: white;">April</a></li>
                                    <li><a href="choosemonth.php?month=May"  style="color: white;">May</a></li>
                                    <li><a href="choosemonth.php?month=June"  style="color: white;">June</a></li>
                                    <li><a href="choosemonth.php?month=July"  style="color: white;">July</a></li>
                                    <li><a href="choosemonth.php?month=August"  style="color: white;">August</a></li>
                                    <li><a href="choosemonth.php?month=September"  style="color: white;">September</a></li>
                                    <li><a href="choosemonth.php?month=October"  style="color: white;">October</a></li>
                                    <li><a href="choosemonth.php?month=November"  style="color: white;">November</a></li>
                                    <li><a href="choosemonth.php?month=December"  style="color: white;">December</a></li>                                    
                                </ul>
                            </ul>
                        </div>

                    </div>
                

                    <div class="col-sm-12 col-lg-8 col-md-8 setcarcov viewtable">
                                           
                                <h6>Student's Salary View</h6>
                                <h6><?php echo "(".$MONTH.",".$YEAR.")" ?></h6>
                                <div class="stulisttable animated fadeInUp delay-1s">
                                    
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
                                                <td><?php echo $rows[$MONTH]?></td>
                                                
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
                                <div class="stulisttable animated fadeInDown delay-1s">
                                    
                                <div class="headlist">

                                    <table >
                                                                            
                                            <tr>
                                                <th>Name</th>                                                
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Amount</th> 
                                                <th>Driver</th>
                                                <th>Parent</th>                                               
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
                                                <td><?php echo $rows['Amount']?></td>
                                                <td>
                                                
                                                    <?php 
                                                        $STUID=$rows['StuId'];
                                                        $salary=mysqli_query($conn,"SELECT * from salarycheck where StuId=$STUID and Year=$YEAR");
                                                        $salaryrow=mysqli_fetch_assoc($salary);
                                                        $tocheck=$salaryrow[$MONTH];
                                                        if($tocheck==100)
                                                        {
                                                            echo "Done";
                                                        }
                                                        else if($tocheck==110)
                                                        {
                                                            echo "Done";
                                                        }
                                                        else if($tocheck==111)
                                                        {
                                                            echo "Done";
                                                        }
                                                        else
                                                        {
                                                            echo "Not yet";
                                                        }
                                                    ?>
                                                </td>
                                                <td>


                                                    <?php 

                                                        $salary=mysqli_query($conn,"SELECT * from salarycheck where StuId=$STUID and Year=$YEAR");
                                                        $salaryrow=mysqli_fetch_assoc($salary);
                                                        $tocheck=$salaryrow[$MONTH];
                                                        if($tocheck==110)
                                                        {
                                                            echo "Done";
                                                        }
                                                        else if($tocheck==111)
                                                        {
                                                            echo "Done";
                                                        }
                                                        else
                                                        {
                                                            echo "Not yet";
                                                        }
                                                    ?>
                                            </td>


                                            <?php 
                                                if($tocheck==110)
                                                {
                                            ?>
                                                <td class="hidetableconfirm"><a href="editsalarylist.php?stuid=<?php echo $rows['StuId']?>&month=<?php echo $MONTH ?>&year=<?php echo $YEAR ?>&amount=<?php echo $rows['Amount'] ?>&name=<?php echo $rows['StuName'] ?>&email=<?php echo $rows['Email'] ?>&phoneno=<?php echo $rows['PhoneNo'] ?>"><i class="ti-check"></i></a></td>

                                            <?php 
                                                }else if($tocheck==111)
                                                {   
                                             ?>
                                                <td><a href="">Done</a></td>
                                             <?php 
                                                }else{
                                              ?>
                                                <td><a href="">Can't Confirm</a></td>
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


    <!-- lity js -->

    <script src="js/lity.js"></script>  
    <script src="js/prism.js"></script> 
    <script type="text/javascript" src="js/fms.js"></script>
    <!--  table -->

    <script type="text/javascript">

        function editsalarylist()
        {

        }



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
