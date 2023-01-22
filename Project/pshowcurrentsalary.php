<?php 

session_start();
include("confs/config.php");
if(!$_SESSION['authparent'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}

    
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

//$STUID=$_SESSION['stuid'];
//$AMOUNT=110;

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
    <link rel="stylesheet" type="text/css" href="css/pshowcurrentsalary.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link rel="stylesheet" type="text/css" href="css/fmsprofile.css">
    <link rel="stylesheet" type="text/css" href="css/pstudentsalary.css">
    <link rel="stylesheet" type="text/css" href="css/salarylist.css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
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
                <a class="navbar-brand" href="./"><img src="images/fmsparent.png" alt="Logo"></a>
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

                    <li class="active">
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
                        <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitpickup" value="Map"></i>                       
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
                                <h1>Show Current Salary</h1>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active"><a href="parentindex.php">Dashboard&nbsp;/&nbsp;</a><a href="pstudentsalary.php">Salary</a>&nbsp;/&nbsp;<a href="#">Show Current Salary</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
            
                </div>
                
                <div class="content mt-3">

                    <div class="col-sm-12 col-lg-12 col-md-12 slrtitle animated fadeInDown">
                        <h6><?php echo "Salary(".$MONTH.",".$YEAR.")" ?></h6>
                    </div>

                    <div class="col-sm-12 col-lg-4 col-md-4 animated fadeInUp">                        
                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr2">Choose Year <i class="fa fa-angle-down"></i></li>
                                <ul class="liul2" onchange="test()" id='year'>
                                    <li><a href="pchooseyearforcurrent.php?year=2019"  style="color: white;">2019</a></li>
                                    <li><a href="pchooseyearforcurrent.php?year=2020"  style="color: white;">2020</a></li>
                                    <li><a href="pchooseyearforcurrent.php?year=2021"  style="color: white;">2021</a></li>
                                                                        
                                </ul>
                            </ul>
                        </div>

                        <div class="dropdownmonthslr">
                            <ul>
                                <li class="chosemonthforslr">Choose Month <i class="fa fa-angle-down"></i></li>
                                <ul class="liul">
                                    <li><a href="pchoosemonthforcurrent.php?month=January&stuid=<?php echo $STUID ?>" style="color: white;">January</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=February"  style="color: white;">February</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=March"  style="color: white;">March</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=April"  style="color: white;">April</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=May"  style="color: white;">May</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=June"  style="color: white;">June</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=July"  style="color: white;">July</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=August"  style="color: white;">August</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=September"  style="color: white;">September</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=October"  style="color: white;">October</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=November"  style="color: white;">November</a></li>
                                    <li><a href="pchoosemonthforcurrent.php?month=December"  style="color: white;">December</a></li>                                    
                                </ul>
                            </ul>
                        </div>
                        
                    </div>

                    <div class="col-sm-12 col-lg-8 col-md-8 animated fadeInUp">
                        
                                <div class="tparhead">
                                    <table class="parsalaryheader" style="width: 1000px;height: 50px;text-align: center;">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                        </tr>
                                    </table>
                                </div>

                                <div class="tparbody">
                                    <table class="parsalarybody" style="width: 1000px;text-align: center;">
                                        <?php while($srowprofile=mysqli_fetch_assoc($student)): ?>
                                        <tr style="height: 60px;">
                                            <td><?php echo $srowprofile['StuName'] ?></td>
                                            <td><?php echo $srowprofile['Email'] ?></td>
                                            <td><?php echo $srowprofile['Amount'] ?></td>
                                            <td><?php 

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
                                                else
                                                {
                                                    echo "Not yet";
                                                }
                                             ?></td>

                                            <?php 
                                                if($tocheck==100)
                                                {
                                            ?>
                                                <td><a href="parentsalarycheck.php?stuid=<?php echo $srowprofile['StuId']?>&month=<?php echo $MONTH ?>&year=<?php echo $YEAR ?>"><i class="ti-check"></a></td>


                                            <?php 
                                                }else if($tocheck==110)
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
                                    </table>
                                </div>
                                                   
                    </div>

                </div>

                
    </div>

                    
    <!-- Right Panel -->


 <!-- start profile -->

                <?php 

                include ("parentprofileprofile.php");

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
    <script type="text/javascript">
        
         $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {

            $jq('.chosemonthforslr').click(function(){
                $jq('.liul').slideToggle();
            });

            $jq('.chosemonthforslr2').click(function(){
                $jq('.liul2').slideToggle();
            });

         });


    </script>
    <!--  table -->

    

</body>

</html>
