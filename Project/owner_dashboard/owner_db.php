    <?php
     
    $dataPoints = array(

    	array("y" => 11,"label" => "Jan" ),
    	array("y" => 12,"label" => "Feb" ),
    	array("y" => 28,"label" => "March" ),
    	//array("y" => 1,"label" => "April" ),
    	array("y" => 1,"label" => "May" ),
        array("y" => 4,"label" => "June" ),
        array("y" => 5,"label" => "July" ),
        array("y" => 12,"label" => "Aug" ),
        array("y" => 13,"label" => "Sep" ),
        array("y" => 16,"label" => "Oct" ),
        array("y" => 10,"label" => "Nov" ),
        array("y" => 19,"label" => "Dec" )

    );
     
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function()
     {
     
    var chart = new CanvasJS.Chart("chartContainer", 
        {
    	animationEnabled: true,
    	title:{	text: "Annual Chart of FMS"},
    	axisY: {},
    	data: [{
    		type: "bar",
    		yValueFormatString: "Ks#,##600K",//to put calculated data here
    		indexLabel: "{y}",
    		indexLabelPlacement: "inside", //Ks inside the bar
    		indexLabelFontWeight: "bolder",
    		indexLabelFontColor: "white",
    		dataPoints: 
            <?php 
            echo json_encode($dataPoints,0); 
            ?>
         	}]
      }
      );//end
    chart.render();
     
    }//function end
    </script>
    </head>
      <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
   
        <div class="features clearfix">
           <div class="container">
              <div class="row">
                  <div class="columns ten centered">
                      <h2>View Your Excellent Drivers</h2>
                  </div>
              </div>
            <div class="row">
                <div class="columns three">
                  <section>
                      <img src="images/admin.jpg" alt="">
                        <b style="color: #CFB53B">Gold</b>
                        <p>This driver got the best satisfaction among all from parents for this month.</p>
                    </section>
                </div>
                <div class="columns three">
                  <section>
                      <img src="images/admin.jpg" alt="">
                      <b style="color: #C0C0C0;">Silver</b>
                      <p>This driver got the second best satisfaction among all from parents for this month.</p>
                  </section>
                </div>
              <div class="row">
                <div class="columns three">
                  <section>
                      <img src="images/admin.jpg" alt="">
                        <b style="color: #cd7f32;">Bronze</b>
                        <p>This driver got the third best satisfaction among all from parents for this month.</p>
                  </section>
                </div>
              <div class="columns three">
                  <section>
                      <img src="images/admin.jpg" alt="">
                      <b>Consolation</b>
                      <p>This driver got the average satisfaction among all from parents for this month.</p>
                  </section>
              </div>
            </div>

        </div>

  </div>




<link rel="stylesheet" href="css/owner_db.css">




      </body>
    </html>                              