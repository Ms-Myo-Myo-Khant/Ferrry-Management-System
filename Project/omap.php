<!--
GetSchoolBusCoorDB.php is used for loading coordinate from car DB
$index for row of database in $StuInfo & $StuHaveLoc & $Driver
$StuHaveLoc is result of having Coordinate value
$Driver is result of selected driver
$sql is the query statement
$result is the one row from database
StuHaveLoc is copy array of $StuHaveLoc
Driver is copy array of $Driver
BusCoor is the coordinate of school bus location
markers[] is the array of markers that have coordinates of students
stuVectorLayer is the student marker added layer to map
schoolVectorLayer is the school marker added layer to map
busVectorLayer is the bus marker added layer to map
vectorSource is the source of markerVectorLayer
BusSource is the source of schoolBusVectorLayer
busmark[] is the array of markers that have coordinates of school bus
setPeople() is the function of set the students location in markers[]
setBus() is the function of set school location on map
setOnMap() is the function of set markers[] on map
LabelStyles() is the function that set the text above the markers' size, font, etc
PopUp() is the function when hover on marker, appears its phone no
UpdateCarDB() is the function of updating the database information
callback() is the function pass ajax variable to js
-->
<?php

include('confs/config.php');
session_start();

$ownerid = $_SESSION['ownerid'];
if ($_GET) {
    $sid = $_GET['sid'];
    $_SESSION['sid'] = $sid;
    //$_SESSION['sid'] = $sid;
    $subid = $_GET['subid'];
    $_SESSION['subid'] = $subid;
}

$sid = $_SESSION['sid'];
$subid = $_SESSION['subid'];

//$_SESSION['subid'] = $subid;
//$subid= $_SESSION['subid'];

$ownerprofile = mysqli_query($conn, "SELECT * from owner where Id='$ownerid'");
$rowprofile  = mysqli_fetch_assoc($ownerprofile);

$assign = mysqli_query($conn, "SELECT CId, DId from assign where Id='$ownerid' and SId='$sid' and SubId='$subid'");
$assignrow = mysqli_fetch_assoc($assign);
$cid = $assignrow['CId'];
$did = $assignrow['DId'];

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
    <link rel="stylesheet" type="text/css" href="css/AddMarkmain.css">

</head>

<body onload="initialize_map();">
    <div id="map-canvas">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>
    <a href="omapcar.php?sid=<?php echo $sid?>">
    <input type="button" class="btn" value="back" style="height:35px">
    <a>
    <script>
        var StuHaveLoc = <?php echo json_encode($StuHaveLoc); ?>;
        var Driver = <?php echo json_encode($Driver); ?>;
        var School = <?php echo json_encode($School); ?>;
        var BusCoor;
        var markers = [];
        var map;
        var busmark = [];
        var labelStyle;
        var schoolMark = [];
        var stuVectorLayer;
        var busVectorLayer;
        var schoolVectorLayer;
        var view;
        var temp;

        function initialize_map() {
            baseMapLayer = new ol.layer.Tile({
                source: new ol.source.OSM(),
            });

            alert("Map is used");
            map = new ol.Map({
                target: 'map-canvas',
                layers: [baseMapLayer],
                view: new ol.View()
            });
            setInterval(function() {
                $.ajax({
                    'async': false,
                    'type': "POST",
                    'global': false,
                    url: "GetSchoolBusCoorDB.php?CId=<?php echo $cid ?>",
                    success: function(data) {
                        var BB;
                        var obj = $.parseJSON(data);
                        $.each(obj, function() {
                            BB = this['Coordinate'];
                        });
                        callback(BB);
                    }
                });
            }, 4000);

            setPeople();
            setSchool();
            var all = markers.concat(schoolMark);
            view = new ol.source.Vector({
                features: all
            });
            map.getView().fit(view.getExtent(), map.getSize());
        }

        function setPeople() {
            for (var i = 0; i < StuHaveLoc.length; i++) {
                var HaveCoor = StuHaveLoc[i][2].split(",");
                markers.push(new ol.Feature({
                    geometry: new ol.geom.Point([HaveCoor[0], HaveCoor[1]]),
                    name: StuHaveLoc[i][0],
                    description: StuHaveLoc[i][1],
                    coordinate: [HaveCoor[0], HaveCoor[1]]
                }));
            }

            stuVectorLayer = setOnMap("blue-dot", markers);
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
            var busCoor = BusCoor.split(",");
            busmark = [];
            busmark.push(new ol.Feature({
                geometry: new ol.geom.Point([busCoor[0], busCoor[1]]),
                name: 'School Bus',
                description: Driver[1],
                coordinate: [busCoor[0], busCoor[1]]
            }));
            map.removeLayer(busVectorLayer);

            busVectorLayer = setOnMap("red-dot", busmark);
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




        function LabelStyles() {
            labelStyle = new ol.style.Style({
                text: new ol.style.Text({
                    font: '12px Calibri,sans-serif',
                    overflow: true,
                    fill: new ol.style.Fill({
                        color: '#000'
                    }),
                    stroke: new ol.style.Stroke({
                        color: '#fff',
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

        function callback(response) {
            BusCoor = response;
            setBus();
        }
    </script>
</body>

</html>