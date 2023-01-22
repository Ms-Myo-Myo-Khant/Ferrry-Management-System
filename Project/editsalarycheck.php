<?php 






	session_start();
	include("confs/config.php");
	// if(!$_SESSION['auth'])
	// {
	//     header("location:landingpage.php");
	// }
	$MONTH=$_GET['month'];
	$YEAR=$_GET['year'];
	$STUID=$_GET['stuid'];
	$AMOUNT=100;
	echo "This is month=".$MONTH;
	echo "<br>";
	echo "This is year=".$YEAR;
	echo "<br>";
	echo "This is stuid=".$STUID;
	echo "<br>";
	echo "This is amount=".$AMOUNT;
	echo "<br>";

	$query=mysqli_query($conn,"SELECT * from salarycheck where StuId=$STUID and Year=$YEAR");
	$number = mysqli_num_rows($query);
	echo "This is num of rows".$number;
	echo "<br>";
	
	
	if($number>0)
	{
		echo "To update";
		echo "<br>";
		if($MONTH=="January")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET January=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="February")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET February=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="March")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET March=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="April")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET April=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="May")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET May=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="June")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET June=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="July")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET July=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="August")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET August=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="September")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET September=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="October")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET October=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="November")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET November=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
		else if($MONTH=="December")
		{
			$salaryadd=mysqli_query($conn,"UPDATE salarycheck SET December=$AMOUNT where StuId=$STUID and Year=$YEAR");
		}
	}
	else
	{
		echo "To insert";
		if($MONTH=="January")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,January,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="February")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,February,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="March")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,March,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="April")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,April,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="May")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,May,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="June")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,June,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="July")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,July,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="August")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,August,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="September")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,September,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="October")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,October,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="November")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,November,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
		else if($MONTH=="December")
		{
			$salaryadd=mysqli_query($conn,"INSERT INTO salarycheck(StuId,December,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
		}
	}
	//$salaryadd=mysqli_query($conn,"INSERT INTO salary(StuId,January,Year) VALUES ($STUID,$AMOUNT,$YEAR)");
	//$did = mysqli_insert_id($conn);
	//header("location:dsalarylist.php");
 ?>