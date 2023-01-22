
<!doctype html>
<html lang="en">

<head>
  <title>Ferry Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/bus.png">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/landingstyle.css">
  <style type="text/css">
    html,body{
      overflow-x:hidden;
    }
  </style>
</head>

<body>

  <?php 
  include("headerinclude.php");
  ?>
  <!-- END header -->

  <div class="slider-item overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('images/schoolbus1.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center">
        <div class="col-lg-9 text-center col-sm-12 element-animate">
          <h1 class="mb-4"><?= _werfms ?></h1>
          <div class="btn-play-wrap mx-auto">
            <p class="mb-4"><a href="https://youtu.be/oDRUUUhbxbs" data-fancybox data-ratio="2"
                class="btn-play"><span class="ion ion-ios-play"></span></a></p>
          </div>

          <span><?= _lookvd ?></span>

        </div>
      </div>
    </div>
  </div>

  
  <?php 
  include("whoweareinclude.php");
  ?>
  <!-- end who we are -->
  

  <?php 
  include("portfolioinclude.php");
  ?>
  <!-- end portfolio(School) -->  

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mr-auto mb-3">
          <span class="d-block text-uppercase text-secondary">Grab our Services</span>
          <span class="divider my-4"></span>
          <h2 class="mb-4 section-title">
            <?= _service_ttt?>
            </h2>
          <p><?= _grab_txt ?></p>
          
        </div>
        <div class="col-lg-6">
          <div class="row mt-5">
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="service">
                <span class="icon icon-shield mb-4 d-block"></span>
                <h3><?= _safety ?></h3>
                <p><?= _safety_txt ?></p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="service">
                <span class="icon icon-screen-desktop mb-4 d-block"></span>
                <h3><?= _design?></h3>
                <p><?= _design_txt ?></p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
              <div class="service">
                <span class="icon icon-screen-smartphone mb-4 d-block"></span>
                <h3><?= _reliable ?></h3>
                <p><?= _reliable_txt ?></p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="service">
                <span class="icon icon-rocket mb-4 d-block"></span>
                <h3><?= _performance ?></h3>
                <p><?= _performance_txt ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <?php
  include("feedbackinclude.php");
  ?>
  <!-- END .block-4 -->
  </div>

  <?php
  include("getintouchinclude.php");
  ?>
  <!-- end getintouchsession -->

  

  <?php 
  include("footerinclude.php");
  ?>
  <!-- END footer -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#f4b214" /></svg></div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/landingmain.js"></script>

  <script type="text/javascript">
    
      $(".hmlanding").addClass("active");
      // window.location.reload();
  </script>
</body>

</html>