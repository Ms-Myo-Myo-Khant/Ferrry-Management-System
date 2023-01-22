<?php

$connect = mysqli_connect("localhost", "root", "", "projectdb");
if (mysqli_connect_errno()) {
  header("location:errtest.php");
}
$output = '';
if(isset($_POST["query"]))
{
	$searchget = mysqli_real_escape_string($connect, $_POST["query"]);
	$search=ucwords(strtolower($searchget));
	$query = "
	SELECT * FROM school 
	WHERE Township LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM school ORDER BY SId";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	// $output .= '<div class="table-responsive">
	// 				<table class="table table bordered">
	// 					<tr>
	// 						<th>Student Name</th>
	// 						<th>Email</th>
	// 						<th>Grade</th>
							
	// 					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<div class="col-lg-4">

          <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
            <div class="work-text">
              <h2>'.$row["SName"].'</h2>
              <p style="color:yellow;">'.$row["ContactNo"].'</p>
            </div>
            <img src='.$row["Photo"].' alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
          </a>

        </div>
		';
	}
	echo $output;
}
else
{
	echo '<div class="col-lg-12 col-md-12 col-md-12">

          <a href="portfolio-single.php" class="work-thumb" style="width: 500px; height: 300px;margin:0px auto;margin-bottom: 20px;">
            <div class="work-text">
              <h2 style="color:yellow;">No Data For This Township</h2>
              <p style="color:red;">Check your spelling</p>
            </div>
            <img src="images/nodata.jpg" alt="Image" class="img-fluid" style="width: 500px;height: 300px;">
          </a>

        </div>';
}
?>