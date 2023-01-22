    <?php 
session_start();
if(!$_SESSION['authparent'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}


include("confs/config.php");
$pid=$_SESSION['parentid'];
$parent=mysqli_query($conn,"SELECT * from parent where PId='$pid'");
$prowprofile=mysqli_fetch_assoc($parent);

$student=mysqli_query($conn,"SELECT * from student where PId in (SELECT PId from parent where PId='$pid') ");
$srowprofile=mysqli_fetch_assoc($student);


?>
<?php  
                           if(isset($_POST['rating']))
                           {   $rating = $_POST['rating'];
                               //   echo "<script> alert('The rating is $rating'); </script>";

                               mysqli_query($conn,"UPDATE student set Rating='$rating' where PId='$pid' ");
                           }

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
    <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/bus.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
    <link rel="stylesheet" href="vendorhomepage/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" />
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/rating.css" type="text/css">
    
    <link rel="stylesheet" href="css/stylehome.css">

    <link href="css/lity.css" rel="stylesheet"/>
    <style type="text/css">
        
        
    
    </style>
   
</head>

<body>

    <!-- start profile -->

    
    <?php
        include("parentprofile.php");
    ?>

    <!-- end profile -->


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="width:250px;">
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

                    <li class="active">                    
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
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" style="width:10%; height:10%;" src="<?php echo $srowprofile['Photo'] ?>" alt="User Avatar">
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
                        <h1>Feedback</h1>
                    </div>
                </div>
            </div>

           

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li class="active"><a href="parentindex.php">Dashboard</a>&nbsp;/&nbsp;<a href="Feedback.php">Feedback</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            </div>

            <div class="fdk col-sm-12 col-md12 col-lg-12" style="max-height: 2000px;overflow-y: auto;">
                <h6>Rating!</h6>
<div class="container" style="max-height: 2000px;">
    <div class="row" style="margin-top:40px;">
        <div class="col-md-6" >
        <div class="well well-sm fit1" style="width:1200px">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box" style="width:100%; font-size:150%"> Give Rating For the Driver</a>
            </div>
        
            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" id="rating" name="rating">
        
                      <div class="text-right">
                            
                            <div id="dropdown">
                                Please rate In Order!
                            </div>


                        <center>
                    
                              <div class="jumbotron">
                                  <p style="font-size:130%; color:black;">Rate The Driver</p><br />
                                  <span onclick="rate(0)" class="glyphicon glyphicon-star-empty star"></span>
                                  <span onclick="rate(1)" class="glyphicon glyphicon-star-empty star"></span>
                                  <span onclick="rate(2)" class="glyphicon glyphicon-star-empty star"></span>
                                  <span onclick="rate(3)" class="glyphicon glyphicon-star-empty star"></span>
                                  <span onclick="rate(4)" class="glyphicon glyphicon-star-empty star"></span>
                                  <br />
                                  <br />
                                  <button onclick="button()"  class="btn btn-success btn-lg" style="border-radius: 5px; color:white; font-size:100%; ">
                                    Done
                                  </button>
                                  
                                  <a class="btn btn-danger btn-lg" href="#" id="close-review-box" style="display:none; font-size:100%;  margin-right: 10px; border-radius: 5px; color:white;">
                                      Close</a>
                                  

                              </div>
                    
                        </center>
                      </div>

                    </form>
                </div>
            </div>
        </div> 
         
        </div>
    </div>


                <div class="fdk col-sm-12 col-md12 col-lg-12">
                    <br><br>
                    <h6>Feedback!</h6>
                    <div class="feedbackparent">
                        <h5>How do you feel the service we provided</h5>
                        <div class="fdbk fdbk1" onclick="<?php $good=1;$well=0;$bad=0; echo "<script> alert('$good');</script>"; ?>">
                            It was great.<i class="ti-face-smile"></i>
                        </div>

                        <div class="fdbk fdbk2" onclick="<?php $good=0; $well=1; $bad=0; echo "<script> alert('$good');</script>" ?> ">
                            It did the job. <i class="ti-face-sad"></i>
                        </div>

                        <div class="fdbk fdbk3" onclick="<?php $good=0; $well=1; $bad=0;echo "<script> alert('$good');</script>"?>">
                            I'm disappointed.<i class="fa fa-meh-o"></i>
                        </div>
                        <h5>Enter your suggestion here for new updates.</h5>
                        <textarea class="tareapar" placeholder="Message Here">
                            
                        </textarea>
               

                        <input type="submit" name="submitparentfdb" value="Submit">
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
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


   <script type="text/javascript">
       
        $jq=jQuery.noConflict();
        $jq(document).ready(function(e) {
            $jq('.fdbk1').click(function(){
                $jq(this).css("background","green");        
                $jq(this).css("color","white");
                $jq('.fdbk2').css("background","black");
                $jq('.fdbk2').css("color","white");

                $jq('.fdbk3').css("background","black");
                $jq('.fdbk3').css("color","white");


            });  

            $jq('.fdbk2').click(function(){
                $jq(this).css("background","yellow");
                $jq(this).css("color","#222");

                $jq('.fdbk1').css("background","black");
                $jq('.fdbk1').css("color","white");

                $jq('.fdbk3').css("background","black");
                $jq('.fdbk3').css("color","white");

                
            });  

            $jq('.fdbk3').click(function(){
                $jq(this).css("background","red");
                $jq(this).css("color","white");

                $jq('.fdbk1').css("background","black");
                $jq('.fdbk1').css("color","white");

                $jq('.fdbk2').css("background","black");
                $jq('.fdbk2').css("color","white");

                
            });

            $jq('#open-review-box').click(function(){
                
                $jq('#post-review-box').slideDown(400);
                $jq('#open-review-box').fadeOut(100);

                $jq('#close-review-box').show();
  
            }); 

            $jq('#close-review-box').click(function(){
               
                $jq('#post-review-box').slideUp(400,function()
                {
                    $jq('#open-review-box').show();
                });
                $jq('#close-review-box').hide();
               
            });  
        });
            

 

   </script>

   <script>
  

   // alert("Rate in order😂");

    var star_buttons = [false, false, false, false, false];


    function button(){
        var user_rating = 0;
            for(var i = 0; i < star_buttons.length; i++){
                if(star_buttons[i])
                    user_rating++;
            }
        if(user_rating == 0)
            {
                alert("Nothing? Alright, thanks for the " + user_rating +"");
                


            }
        else
           {           alert("Thanks for the " + user_rating + "");
                        
                       document.cookie = "rating = "+ user_rating;
                       
           
                       
            }
            
            document.getElementById('rating').value = user_rating;

                        

    }



    function orderOfRate(orderBy){
        for(var i = 0; i < orderBy; i++){
                if(!star_buttons[i]){
                    document.getElementById("dropdown").style.top="20%";
                return false;
                }
            }
            return true;
    }



    function orderOfDelete(orderBy){
        for(var i = 4; i > orderBy; i--){
                if(star_buttons[i]){
                document.getElementById("dropdown").style.top="80%";
                 return false;
                }
            }
            return true;
    }



    function rate(rateNum){
        if(!star_buttons[rateNum] && orderOfRate(rateNum)){
            
            document.getElementsByTagName("span")[rateNum].className="glyphicon glyphicon-star star";
            
            star_buttons[rateNum]= true;
            
            if(orderOfRate(rateNum))
                hide();
            
        }else if(orderOfDelete(rateNum)){
            
            document.getElementsByTagName("span")[rateNum].className="glyphicon glyphicon-star-empty star";
            
            star_buttons[rateNum] = false;
            
            if(orderOfRate(rateNum))
                hide();
        }
    }


    function hide(){

    document.getElementById("dropdown").style.top="100%";

    }
</script>


</body>

</html>
