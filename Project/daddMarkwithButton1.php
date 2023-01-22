<?php 
include("confs/config.php");
session_start();

if(!$_SESSION['driverauth'])
{
    // echo "<script>alert('Hello World');</script>";
    header("location:landingpage.php");
}
$did=$_SESSION['driverid'];  

$driver = mysqli_query($conn,"SELECT * from driver where DId='$did'");
$rowprofile=mysqli_fetch_assoc($driver);



// map last updated

if ($_GET) {
    $sid = $_GET['SId'];
    $_SESSION['sid'] = $sid;
    $subid = $_GET['SubId'];
    $_SESSION['subid'] = $subid;    
    $cid = $_GET['CId'];
    $_SESSION['cid'] = $cid;
}

$sid = $_SESSION['sid'];
$subid = $_SESSION['subid'];
$cid = $_SESSION['cid'];

$driver = mysqli_query($conn, "SELECT DName, PhoneNo from driver where DId=$did");
if ($driver->num_rows > 0) {
    // output data of each row
    while ($row = $driver->fetch_array()) {
        for ($j = 0; $j < 2; $j++) {
            $Driver[$j] = $row[$j];
        }
    }
} else {
    $Driver = array();
}

$sch = mysqli_query($conn, "SELECT SName,ContactNo,Coordinate from school where SId='$sid'");
if ($sch->num_rows > 0) {
    // output data of each row
    while ($row = $sch->fetch_array()) {
        for ($j = 0; $j < 3; $j++) {
            $School[$j] = $row[$j];
        }
    }
} else {
    $School = array();
}

$allstu = mysqli_query($conn, "SELECT StuName, PhoneNo, Coordinate from student where SId=$sid and SubId=$subid and Coordinate is not NULL");
if ($allstu->num_rows > 0) {
    $index = 0;
    // output data of each row
    while ($row = $allstu->fetch_array()) {
        for ($j = 0; $j < 3; $j++) {
            $StuHaveLoc[$index][$j] = $row[$j];
        }
        $index++;
    }
} else {
    $StuHaveLoc = array();
}

$stui = mysqli_query($conn, "select StuId, StuName, PhoneNo, Address, Coordinate from student where SId=$sid and SubId=$subid");
if ($stui->num_rows > 0) {
    $index = 0;
    while ($row = $stui->fetch_array()) {
        for ($j = 0; $j < 5; $j++) {
            $StuInfo[$index][$j] = $row[$j];
        }
        $index++;
    }
} else {
    $StuInfo=array();
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
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendorhomepage/bootstrap/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="vendorhomepage/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendorhomepage/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/modify.css">
    <link rel="stylesheet" type="text/css" href="css/carinfo.css">
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/AddMarkutil.css">
    <link rel="stylesheet" type="text/css" href="css/AddMarkmain.css">
    <style type="text/css">
    
    
    </style>

</head>

<body onload="initialize_map();">

    <!-- start profile -->

    <div id="inline" class="profile lity-hide">


                <form method="post" action="editprofilefordriver.php">
                <div class="hideprofiletable">
                            
                        <table>
                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="name" value="<?php echo $rowprofile['DName']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="email" value="<?php echo $rowprofile['Email']?>" class="inputprofile" disabled="disabled">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="nrc" value="<?php echo $rowprofile['NRC']?>" class="inputprofile" disabled="disabled">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="address" value="<?php echo $rowprofile['Address']?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="date" name="dob" value="<?php echo $rowprofile['DateOfBirth'] ?>" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="phone" value="<?php echo $rowprofile['PhoneNo']?>" class="inputprofile">
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


                                <h1><?php $dname=$rowprofile['DName']; echo $dname; ?></h1>

                                <p class="bio">Hello, My name is <?php echo $dname; ?>. I'm a UIT student.</p>

                        </div>              


                        <div class="profilecontent">
                            <div class="showprofiletable">
                            <table>
                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['DName']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['Email']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['NRC']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $rowprofile['Address']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php 
                                    
                                        $dob = $rowprofile['DateOfBirth'];
                                        $day = (int)substr($dob,8,2);
                                        $month = (int)substr($dob,5,2);
                                        $year  = (int)substr($dob,0,4);
                                        echo $month."/".$day."/".$year;

                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                   <?php echo $rowprofile['PhoneNo']?>
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
                    
                    
                    <li class="active animated slideInLeft" >
                        <!-- <a href="owner.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> -->
                    <form class="hovform" method="post" action="driver.php">
                        <i class="menu-icon ti-dashboard">
                             <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>"> 
                             <input type="submit" name="submitdashboard" value="Dashboard">
                        </i>
                           
                    </form>                    
                    </li>
                    <li class="animated slideInLeft">
                        <!-- <a href="sitehome.php"> <i class="menu-icon fa ti-world"></i>Site Home</a> -->
                    <form class="hovform" method="post" action="dsitehome.php">
                        <i class="menu-icon  ti-world">
                             <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>"> 
                            <input type="submit" name="submitsitehome" value="Site Home"> 
                        </i>                     
                    </form>  
                    </li>

                    <h3 class="menu-title animated slideInDown">Information</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <li class="animated slideInLeft">
                        <!-- <a href="carinfo.php"> <i class="menu-icon fa fa-bus"></i>Car Information</a> -->

                    <form class="hovform" method="post" action="dcarinfo.php">
                        <i class="menu-icon ti-truck">
                            <input type="submit" name="submitcarinfo" value="Car Information">
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                        </i>
                          
                    </form> 
                    </li>

                  

                    <li class="animated slideInLeft">                       
                    <form class="hovform" method="post" action="dschoolinfo.php">
                        <i class="menu-icon ti-world">
                            <input type="submit" name="submitschoolinfo" value="School Information">
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                        </i>
                            
                    </form> 
                    </li>
                                      
                    <h3 class="menu-title animated slideInDown">Transaction</h3><!-- /.menu-title -->

                    <li class="animated slideInLeft">
                        <!-- <a href="studentsalary.php"> <i class="menu-icon ti-credit-card"></i>Student's Salary</a> -->
                    <form class="hovform" method="post" action="dstudentsalary.php">
                        <i class="menu-icon ti-credit-card">
                            <input type="submit" name="submitstudentsalary" value="Student Salary"> 
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">   
                        </i>
                    </form> 
                    </li>

                    <li class="animated slideInLeft">                        
                    <form class="hovform" method="post" action="ddriversalary.php">
                        <i class="menu-icon ti-money">
                            <input type="submit" name="submitdriversalary" value="Driver's Salary"> 
                            <?php $did=$rowprofile['DId'] ?>
                            <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">     
                        </i>
                        
                    </form> 
                    </li>
                   
                    <h3 class="menu-title animated slideInDown">Activity</h3><!-- /.menu-title -->

                    <li class="animated slideInLeft">
                        <form class="hovform" method="post" action="dmapSchool.php">
                            <i class="menu-icon ti-map-alt">&nbsp;<input type="submit" name="submitmap" value="Map"></i>
                        </form>
                    </li>

                    <li class="animated slideInLeft">                    
                    <form class="hovform" method="post" action="dpickup.php">
                        <i class="menu-icon ti-timer">&nbsp;<input type="submit" name="submitpickup" value="Student Pickup"></i>
                        <?php $did=$rowprofile['DId'] ?>
                        <input type="hidden" name="hiddendriverid" value="<?php echo $did ?>">  
                            
                    </form> 
                    </li>
                    <li class="animated slideInLeft">
                     
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
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#inline" data-lity><i class="fa fa-user"></i>My Profile</a>                  
                            <a class="nav-link buttaa" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
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

        <div class="content mt-3">

            <div id="map-canvas">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>

    <input type="button" class="btn" value="Set Location" onclick="document.getElementById('limiter').style.display = 'block';">

    <div class="limiter" id="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class='column1'>Name</th>
                                <th class='column2'>Phone No</th>
                                <th class='column3'>Address</th>
                                <th class='column4'>Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($j = 0; $j < sizeof($StuInfo); $j++) {
                                echo "<tr><td  class='column1'>" . $StuInfo[$j][1] . "</td>";
                                echo "<td class='column2'>" . $StuInfo[$j][2] . "</td>";
                                echo "<td class='column3'>" . $StuInfo[$j][3] . "</td>";
                                echo "<td class='column4'><input type='radio' name='select' value=" . $j . "></td></tr>";
                            }
                            ?>
                        <tbody>
                    </table>
                </div>
                <br>
                <form name="form" action="">
                    <input type="button" class="button" onclick="SubmitForm()" value="Submit" name="Submit">
                    <input type="button" class="button" onclick="document.getElementById('limiter').style.display = 'none';" value="Cancle" name="Cancle">
                    <form>
            </div>

        </div>
    </div>
            
        </div>

    </div>

    <!-- Right Panel -->

    <script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="js/main.js"></script>      
    <script src="vendorhomepage/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendorhomepage/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/widgets.js"></script>
    <script src="js/lity.js"></script>
    <script src="js/prism.js"></script>
    <script type="text/javascript" src="js/fms.js"></script>
   <script type="text/javascript">
       

        $jq=jQuery.noConflict();
         $jq(document).ready(function(e) {

           $jq('.buttaa').click(function(){
        $jq.confirm({
   title: 'Logout?',
    content: 'Your time is out, you will be automatically logged out in 10 seconds.',
    autoClose: 'logoutUser|10000',
    buttons: {
        logoutUser: {
            text: 'logout myself',
            action: function () {
                $jq.alert('The user was logged out');
                window.location = "logout.php";
            }
        },
        cancel: function () {
            $jq.alert('Canceled logout');
        }
    }
});
    });


         });

        
    
    // last map updated


    var StuInfo = <?php echo json_encode($StuInfo); ?> ;
        var StuHaveLoc = <?php echo json_encode($StuHaveLoc); ?> ;
        var Driver = <?php echo json_encode($Driver); ?> ;
        var School = <?php echo json_encode($School); ?> ;
        var curInd = null;
        var stuCoor;
        var markers = [];
        var map;
        var stuVectorLayer;
        var schoolVectorLayer;
        var busVectorLayer;

        var buslat = 16.855;
        var buslong = 96.135;
        var busmark = [];

        var labelStyle;

        function initialize_map() {
            getLocation();
            var baseMapLayer = new ol.layer.Tile({
                source: new ol.source.OSM(),
            });
            map = new ol.Map({
                target: 'map-canvas',
                layers: [baseMapLayer],
                view: new ol.View({
                    center: ol.proj.fromLonLat([buslong, buslat]),
                    zoom: 12
                })
            });
            
            alert("Map is used");
            setPeople();
            setSchool();
            setBus();

        }

        function setPeople() {
            markers = [];
            map.removeLayer(stuVectorLayer);
            for (var i = 0; i < StuHaveLoc.length; i++) {
                var HaveCoor = StuHaveLoc[i][2].split(",");
                markers.push(new ol.Feature({
                    geometry: new ol.geom.Point([HaveCoor[0], HaveCoor[1]]),
                    name: StuHaveLoc[i][0],
                    description: StuHaveLoc[i][1],
                    coordinate: [HaveCoor[0], HaveCoor[1]]
                }));
            }

            stuVectorLayer=setOnMap("blue-dot", markers);
            map.addLayer(stuVectorLayer);
            PopUp();

        }

        function setSchool() {
                var schoolCoor = School[2].split(",");
                schoolMark = [];
                schoolMark.push(new ol.Feature({
                    geometry: new ol.geom.Point([schoolCoor[0], schoolCoor[1]]),
                    name: School[0],
                    description: School[1],
                    coordinate: [schoolCoor[0], schoolCoor[1]]
                }));

                schoolVectorLayer = setOnMap("green-dot", schoolMark);
                map.addLayer(schoolVectorLayer);
                PopUp();
            }


        function setBus() {
            map.removeLayer(busVectorLayer);

            busVectorLayer=setOnMap("red-dot", busmark);
            map.addLayer(busVectorLayer);
            PopUp();
        }

        function setOnMap(color, markers) {
            var iconStyles = new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 0.5],
                    anchorXUnits: "fraction",
                    anchorYUnits: "fraction",
                    src: "https://maps.google.com/mapfiles/ms/icons/" + color + ".png"
                })
            });

            LabelStyles();

            var vectorSource = new ol.source.Vector({
                features: markers
            });

            var markerVectorLayer = new ol.layer.Vector({
                source: vectorSource,
                style: function(feature) {
                    var name = feature.get('name');
                    var iconStyle = iconStyles;
                    labelStyle.getText().setText(name);
                    return [iconStyle, labelStyle];
                }
            });

            return markerVectorLayer;
        }

        function AddMarker(type1, type2) {
            if (type1 != '-1N') {

                for (var i = 0; i < StuHaveLoc.length; i++) {
                    if (StuHaveLoc[i][0] == type1 && StuHaveLoc[i][1] == type2) {
                        StuHaveLoc[i][2] = stuCoor[0] + "," + stuCoor[1];
                        break;
                    }
                }
            } else {
                StuHaveLoc.push([]);
                StuHaveLoc[StuHaveLoc.length - 1].push(StuInfo[curInd][1]);
                StuHaveLoc[StuHaveLoc.length - 1].push(StuInfo[curInd][2]);
                StuHaveLoc[StuHaveLoc.length - 1].push(stuCoor[0] + "," + stuCoor[1]);

            }
            setPeople();

        }





        function LabelStyles() {
            labelStyle = new ol.style.Style({
                text: new ol.style.Text({
                    font: '14px Calibri,sans-serif',
                    overflow: true,
                    fill: new ol.style.Fill({
                        color: '#000000'
                    }),
                    stroke: new ol.style.Stroke({
                        color: '#ffffff',
                        width: 3
                    }),
                    textBaseline: 'bottom',
                    offsetY: -8
                })
            });
        }




        function PopUp() {
            var container = document.getElementById('popup');
            var content = document.getElementById('popup-content');
            var closer = document.getElementById('popup-closer');

            var overlay = new ol.Overlay({
                element: container,
                autoPan: true,
                autoPanAnimation: {
                    duration: 250
                }
            });
            map.addOverlay(overlay);

            map.on('pointermove', function(event) {
                var feature = map.forEachFeatureAtPixel(event.pixel,
                    function(feature, layer) {
                        return feature;
                    });
                if (feature) {
                    var coordinate = event.coordinate;
                    content.innerHTML = feature.get('description');
                    coor = feature.get('coordinate');
                    overlay.setPosition(coor);

                } else {
                    overlay.setPosition(undefined);
                    closer.blur();
                }
            });
        }

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
            busmark = [];
            var coor = new ol.proj.fromLonLat([buslong, buslat]);
            busmark.push(new ol.Feature({
                geometry: new ol.geom.Point(coor),
                name: 'School Bus',
                description: Driver[1],
                coordinate: coor
            }));
            stuCoor = coor;
            UpdateSchoolBusDB();
            setBus();
        }

        function SubmitForm() {
            var radios = document.getElementsByName('select');
            var conf = false;
            for (var i = 0; i < radios.length; i++) {

                if (radios[i].checked) {
                    var ind = radios[i].value;
                    curInd = i;
                    conf = true;
                    if (StuInfo[i][4] == null) {
                        var answer = confirm('Are you sure you want to add location for ' + StuInfo[i][1] + '?');
                        if (answer) {
                            AddMarker('-1N', '-1P');
                            document.getElementById('limiter').style.display = 'none';
                            StuInfo[i][4] = stuCoor[0] + "," + stuCoor[1];
                            radios[i].checked = false;
                            UpdateDB();
                            alert('Successfully added');
                        }
                    } else {
                        var answer = confirm(StuInfo[i][1] + '\'s location is already existed. Do you want to replace it?');
                        if (answer) {
                            AddMarker(StuInfo[i][1], StuInfo[i][2]);
                            document.getElementById('limiter').style.display = 'none';
                            StuInfo[i][4] = stuCoor[0] + "," + stuCoor[1];
                            radios[i].checked = false;
                            UpdateDB();
                            alert('Successfully updated');

                        }
                    }
                    radios[i].checked = false;
                    break;
                }
            }
            if (!conf) {
                alert('Sorry, You haven\'t checked.');
            }
        }

        function UpdateDB() {
            var dataS = {
                Id: StuInfo[curInd][0],
                Coor: (stuCoor[0] + "," + stuCoor[1])
            };
            $.ajax({
                type: "POST",
                url: "AddMarkDB.php",
                data: dataS,
            });
        }

        function UpdateSchoolBusDB() {
            var dataS = {
                Id: 2,
                Coor: (stuCoor[0] + "," + stuCoor[1])
            };
            $.ajax({
                type: "POST",
                url: "AddSchoolBusCoorDB.php",
                data: dataS,
            });
        }

    

   </script>
</body>

</html>
