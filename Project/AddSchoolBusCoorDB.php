<?php
    $Id = $_REQUEST['Id'];
    $Coor =$_REQUEST['Coor'];
    $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
    $db = mysql_select_db("projectdb", $connection); // Selecting Database
    $query = mysql_query("UPDATE car SET Coordinate='$Coor' WHERE CId=$Id"); //Update Query
    echo "Form Submitted succesfully";
    mysql_close($connection); // Connection Closed
?>