<!--
AddMarkDB.php is used for updating coordinate from student database
$index for row of database in $StuInfo & $StuHaveLoc
$StuInfo is all result of database
$StuHaveLoc is result of having Coordinate value
$sql is the query statement
$result is the one row from database
StuInfo is copy array of $StuInfo
StuHaveLoc is copy array of $StuHaveLoc
curInd is the StuInfo index of currently clicked on map
stuCoor is the coordinate of currently clicked on map
markers[] is the array of markers that have coordinates
stuVectorLayer is the student marker added layer to map
schoolVectorLayer is the school marker added layer to map
setPeople() is the function of set the students location in markers[]
AddMarker(type1, type2) is the function of add or replace the markers location
	type1 is the name of student that add or replace coordinate
		if type1='-1N' is added, else replace
	type2 is the phone no of student that add or replace coordinate
		if type2='-1P' is added, else replace
LabelStyles() is the function that set the text above the markers' size, font, etc
PopUp() is the function when hover on marker, appears its phone no
SubmitForm() is the function when click the submit button, get the information of selected student's info, check the student has coordinate or add coordinate
UpdateDB() is the function of updating the database informationcurInd is the StuInfo index of currently clicked on map
-->
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ferry Management System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/AddMarkutil.css">
    <link rel="stylesheet" type="text/css" href="css/AddMarkmain.css">
    <!--===============================================================================================-->


    
</head>

<body onload="initialize_map();">
    <div id="map-canvas">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>
    <a href="chooseMapType.php?SId=<?php echo $sid?>&CId=<?php echo $cid ?>&SubId=<?php echo $subid?>">
    <input type="button" class="btn" value="back" >
    <a>
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

    <script>
        var StuInfo = <?php echo json_encode($StuInfo); ?>;
        var StuHaveLoc = <?php echo json_encode($StuHaveLoc); ?>;
        var School = <?php echo json_encode($School); ?> ;
        var curInd = null;
        var stuCoor;
        var markers = [];
        var map;
        var stuVectorLayer;
        var schoolVectorLayer;
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
                    center: ol.proj.fromLonLat([96.135, 16.855]),
                    zoom: 12
                })
            });

            alert("Map is used");

            setPeople();
            setSchool();
            map.on('click', function(e) {
                document.getElementById('limiter').style.display = 'block';
                stuCoor = e.coordinate;
            });

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
            
            stuVectorLayer=setOnMap("blue-dot",markers);
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

        function setOnMap(color,markers){
            var iconStyles = new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 0.5],
                    anchorXUnits: "fraction",
                    anchorYUnits: "fraction",
                    src: "https://maps.google.com/mapfiles/ms/icons/"+color+".png"
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
                setBus();
            }

            function UpdateSchoolBusDB() {
                var dataS = {
                    Id: <?php echo $cid;?>,
                    Coor: busCoor
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