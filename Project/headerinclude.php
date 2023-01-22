

<?php 
  session_start();

  if(!$_SESSION){
    include "lang_en.php";
  }
  
  else if($_SESSION['langgn']==$_SESSION['langid']){
    // echo "ennnn".$_SESSION['langgn'];

    include "lang_en.php";
  }

 else if($_SESSION['langgn']==$_SESSION['langid1']){
    // echo "myan_plllll".$_SESSION['langgn'];
    include("lang_pl.php");
  }

?>


<header role="banner" id="sessiondiv">
    <nav class="navbar navbar-expand-lg  bg-dark">
      <div class="container-fluid">
        <!-- <a class="navbar-brand " href="landingpage.php">FMS</a> -->
        <!-- <a href="landingpage.php" class="logo"><img src="images/logo/FMS3.png" alt="Logo" width="94px;" height="90px;" style="margin-top: -25px;"></a> -->
        <a href="landingpage.php" class="navbar-brand " ><img src="images/logo/FMS8.png" alt="Logo" width="270px;" height="70px;"></a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

   
        <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav pl-md-5 ml-auto">
            <li class="nav-item">
              <a class="nav-link hmlanding" href="landingpage.php"><?= _home ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link abtlanding" href="aboutlanding.php"><?= _about ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link schlanding" href="schoollanding.php"><?= _school ?></a>
            </li>

            <!-- for dropdown li start -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="services.php" id="dropdown04" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Services</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="#"> </a>
                <a class="dropdown-item" href="#">Web Design</a>
                <a class="dropdown-item" href="#">App Design</a>
                <a class="dropdown-item" href="#">Start Up</a>
              </div>
            </li> -->

            <!-- for dropdown li end -->

            <li class="nav-item">
              <a class="nav-link" href="loginlanding.php"><?= _login ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signuplanding.php"><?= _singup ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fblanding" href="feedbacklanding.php"><?= _feedback ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link ctlanding" href="contactlanding.php"><?= _contact ?></a>
            </li>


            
            <!-- language dropdown li start -->

            <li class="nav-item dropdown">
              <a href="#" onclick="return false;" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
                ><?= _service ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">                
                <a class="dropdown-item" href="langinc.php?lang=en"><?= _eng ?></a>
                <a class="dropdown-item" href="langinc.php?lang=pl"><?= _myan ?></a>
              </div>
            </li>

            <!-- language dropdown li end -->
          </ul>

          

        </div>
      </div>
    </nav>
  </header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>

    $(document).ready(function() { 
                
            }); 
   
  </script>