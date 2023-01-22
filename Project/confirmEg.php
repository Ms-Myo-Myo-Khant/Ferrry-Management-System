<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>
<body>

	<button class="butt">Click</button>

<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
	$('.butt').click(function(){
		$.confirm({
   title: 'Logout?',
    content: 'Your time is out, you will be automatically logged out in 10 seconds.',
    autoClose: 'logoutUser|10000',
    buttons: {
        logoutUser: {
            text: 'logout myself',
            action: function () {
                $.alert('The user was logged out');
                window.location = "salarylist.php";
            }
        },
        cancel: function () {
            $.alert('canceled');
        }
    }
});
	});
	
</script>
</body>
</html>