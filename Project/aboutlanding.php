
<!doctype html>
<html lang="en">

<head>
  <title>Ferry Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/bus.png">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">


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

  <div class="inner-page">
    <div class="slider-item overlay" style="background-image: url('images/schoolbus1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-lg-9 text-center col-sm-12 element-animate">
            <h1 class="mb-4"><?= _aboutus?></h1>
            <p class="custom-breadcrumbs"><a href="landingpage.php"><?= _home?></a> <span class="mx-3">/</span> <?= _about?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
  include("whoweareinclude.php");
  ?>
  <!-- end who we are -->

  
  <div class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-md-2">
          <figure class="img-dotted-bg">
            <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
          </figure>
        </div>
        <div class="col-md-5 mr-auto">
          <h2 class="mb-4 section-title">
            <?= _create ?>
          </h2>
          <p><?= _create_txt ?></p>
  
        </div>
      </div>
    </div>
  </div>
  
  <div class="section">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-8 text-center">
          <h2 class="mb-4 section-title">
            <?= _meet_team ?>
          </h2>
          <p class="mb-5 lead">
            <?= _meet_team_txt ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/cmk.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
             
              <h3 class="mt-0 text-black"><?= _cmk ?></h3>
              <p><?= _cmk_txt?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/hhh.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= _hhh ?></h3>
              <p><?= _hhh_txt ?></p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/igk.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= _igk ?></h3>
              <p><?= _igk_txt ?></p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/km.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= _km ?></h3>
              <p><?= _km_txt ?></p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/mmk.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= _mmk ?></h3>
              <p><?= _mmk_txt ?></p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="media d-block media-custom text-center">
            <a href="#"><img src="images/vj.jpg" alt="Image Placeholder" class="img-fluid" style="width:250px;height: 250px;"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= _zy ?></h3>
              <p><?=  _zy_txt ?></p>
            </div>
          </div>
        </div>
  
      </div>
  
    </div>
  </div>
  <!-- END section -->



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
    
      $(".abtlanding").addClass("active");
      

  </script>
</body>

</html>