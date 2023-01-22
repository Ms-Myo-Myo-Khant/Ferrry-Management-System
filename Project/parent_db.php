<html>
<head>   
<link href="css/parent_db.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php

echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
include 'parent_calendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
</body>
</html>  