<?php
session_start();

// // Set Language variable
// if(isset($_GET['lang']) && !empty($_GET['lang'])){
//  $_SESSION['lang'] = $_GET['lang'];

//  if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
//   echo "<script type='text/javascript'> location.reload(); </script>";
//  }
// }

// // Include Language file
// if(isset($_SESSION['lang'])){
//  include "lang_".$_SESSION['lang'].".php";
// }else{
//  include "lang_en.php";
// }

// include("lang_pl.php");

if(isset($_GET['lang'])){
  include "lang_".$_GET['lang'].".php";
}

else{
  include "lang_pl.php";
}
?>

<!doctype html>
<html>
 <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
 <body >
 <script>
 function changeLang(){
  document.getElementById('form_lang').submit();
 }
 </script>

 <!-- Language -->
 <form method='get' action='' id='form_lang' >

  <ul>
    <li><a href="lang_index.php?lang=en">English</a></li>
    <li><a href="lang_index.php?lang=pl">Myanmar</a></li>
  </ul>
  <!-- 
   Select Language : <select name='lang' onchange='changeLang();' >
   <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
   <option value='pl' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'pl'){ echo "selected"; } ?> >Myanmar</option>
  </select>
 </form>
 -->
<!-- Form -->
 <h1><?= _REGISTER ?></h1>
 <p><?= _safety?></p>
 <p><?= _comfort?></p>
 </body>
</html>