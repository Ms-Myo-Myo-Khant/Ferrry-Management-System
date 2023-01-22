<?php

session_start();

//header("location:pickup.php");

$month = date('j:n:Y');
echo $month;


?>
<script type="text/javascript">
	var date = new Date();
	var gethours= date.getHours();
	alert(gethours);
</script>