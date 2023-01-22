<?php
$connect = mysqli_connect("localhost", "root", "", "projectdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
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
	if($row = mysqli_fetch_array($result))
	{	
		$output .= '<ul>
		              <li>'.$row['Township'].' Township</li>
		            </ul>';
	}
	echo $output;
}
else
{
	echo '<p style="color:red;" >No Township with this name</p>';
}
?>