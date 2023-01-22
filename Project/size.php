<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link href="lib/ssi-modal/dist/ssi-modal/styles/ssi-modal.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="vendorhomepage/bootstrap/dist/css/bootstrap.min.css">
	
	<style type="text/css">
		
		.size{
			margin: 0px auto;
			padding: 0px;
			width: 1910px;
			height: 500px;
			background: cyan;
		}
	</style>
</head>
<body>
 <div class="size">
 	Hello World

 	<button id="modal4" class="btn btn-primary">Open modal</button>
 </div>
<script type="text/javascript" src="vendor/jquery/dist/jquery.min.js"></script>
 <script src="lib/ssi-modal/dist/ssi-modal/js/ssi-modal.min.js"></script>

 <script type="text/javascript">
 	$jq=jQuery.noConflict();
    $jq(document).ready(function(e)
    {
                     
			    $jq('#modal4').click(function () {
			        ssi_modal.show({
			            content: 'Hello World',
			            title: 'Modal with buttons',
			            buttons: [{
			                className: 'btn btn-primary',
			                label: 'Ok',
			                enableAfter: 3,
			                closeAfter: true,
			                method: function () {
			                    ssi_modal.notify('info', {content: 'Ok'})
			                }
			            }, {
			                className: 'btn btn-danger',
			                label: 'Cancel',
			                closeAfter: true,
			                method: function () {
			                    ssi_modal.notify('error', {content: 'Cancel'})
			                }
			            }]
			        });
			    })
           
    });
 	
 </script>
</body>
</html>