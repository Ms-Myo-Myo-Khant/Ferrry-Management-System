<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>Lity - Lightweight, accessible and responsive lightbox</title>
    <meta name="description" content="Lity is a ultra-lightweight, accessible and responsive lightbox plugin which supports images, iframes and inline content out of the box.">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic|Arvo:700,400,400italic' rel='stylesheet' type='text/css'>
    <link href="css/fmsprofile.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="css/lity.css" rel="stylesheet"/>
    <style type="text/css">
        
    </style>
    
</head>
<body>

    <h3>Demos</h3>

    <p>        
        <a class="btn" href="#inline" data-lity>Inline</a>
    </p>

    <div id="inline" class="profile lity-hide">

    			<form method="post" action="editprofile.php" enctype="multipart/form-data">
    			<div class="hideprofiletable">
		     				<div class="upload-btn-wrapper">
                                      <button class="btn">Upload</button>
                                      <input type="file" name="myfile"/>
                            </div>
                                   
		     			<table>

                              
                                   
		     					<tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="profilename" value="Khant Hmuu" class="inputprofile">
                                    </td>
                                </tr>

                                

                                

		     			</table>
		     	</div>



		     	<div class="profilebox">
		     		
		     			<div class="profileimgbox">
		     					
		     					<div class="outercircle">
		     						
		     							<div class="innercircle">
		     								
		     								<img src="images/member/cmk.jpg" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">

		     							</div>

		     					</div>


		     					<h1>Chan Min Kyaw</h1>

		     					<p class="bio">Hello , My name is CMK . I'm a UIT student.</p>

		     			</div>     			


		     			<div class="profilecontent">
		     				<div class="showprofiletable">
		     				<table>
		     					<tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    Chan Min Kyaw
                                    </td>
                                </tr>

		     				</table>
		     				</div>


		     				
		     			</div>
		     	</div>

		     	<div class="profilebutton">
		     		
		     		<button class="profilenext">Edit</button>		     		
		     		<button class="profileback">Back</button>
		     		<button class="profilesubmit">Save</button>

		     	</div>
		     	</form>

	</div>




<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/lity.js"></script>

<script src="js/prism.js"></script>

<script type="text/javascript">
		

		$('.profilenext').click(function(){
			$('.profilesubmit').show();
			$('.profileback').show();
			$('.profilebox').hide();
			$('.hideprofiletable').slideDown();
			$('.profilenext').hide();
		});



		$('.profileback').click(function(){
			$('.profilesubmit').hide();
			$('.profileback').hide();
			$('.profilebox').slideDown();
			$('.hideprofiletable').hide();
			$('.profilenext').show();
		});


		$('.profilenext').on("click",function(e){
		    e.preventDefault();
		});

		$('.profileback').on("click",function(e){
		    e.preventDefault();
		});

		
</script>
</body>
</html>
