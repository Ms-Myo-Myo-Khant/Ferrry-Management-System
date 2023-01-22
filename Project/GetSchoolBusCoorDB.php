<?php
//connect to the mysql
$cid=$_GET['CId'];
$db = @mysql_connect('localhost', 'root', '') or die("Could not connect database");
@mysql_select_db('projectdb', $db) or die("Could not select database");
 
//database query
$sql = @mysql_query("select c.Coordinate from car c where c.CId=$cid");
 
$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
 
//echo result as json
echo json_encode($rows);
?>