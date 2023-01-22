<?php
if (mysqli_connect_errno()) {
  header("location:errtest.php");
}
?>

<style type="text/css">
  .townshiptitle {
    width: 1100px;
    height: 60px;
    background: #222;
    color: yellow;
    margin: 0px auto;
    text-align: center;
    line-height: 60px;
  }

  .townshiptitle ul li {
    list-style-type: none;
  }
</style>
<div class="section portfolio-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h2 class="mb-4 section-title" style="color: white;"><?= _school ?></h2>
        <p><?= _school_txt ?></p>
      </div>


      <!-- start search school -->

      <!-- <div class="col-12 text-center">
          
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search by Township " class="form-control" style="border: none;border:1px solid #222;width: 900px;margin: 0px auto;margin-left: 175px;" />
       
        </div>  -->

      <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <div class="input-group mt-5" style="margin: 0px auto">
          <span class="input-group-addon" style="line-height:50px;background:#222;text-align:center;color:yellow;width: 100px;height: 50px;">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search by Township" class="form-control" style="box-shadow:none;border:none;border:1px solid #222;color:#222;height: 50px;border-bottom-right-radius: 25px;border-top-right-radius: 25px;" />
        </div>
      </div>

      <!-- end search school   -->

      <!-- <div class="col-lg-12 col-md-12 col-sm-12">
        
        <div class="townshiptitle" id="townshiptitle" style="display: none;">
            
        </div>

      </div> -->

    </div>
    <div class="row" id="resultschool">

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _ahlone ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _6 ?></p>
          </div>
          <img src="images/school/AhloneBEHS6.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>


      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _botahtaung ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _3 ?></p>
          </div>
          <img src="images/school/BotahtaungBEHS3.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _dagon ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/DagonBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _yankin ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/YankinBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _mingalardon ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _4 ?></p>
          </div>
          <img src="images/school/MingalardonBEHS4.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>
      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _pabedan ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/PabedanBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>
      </div>

    </div>


    <div class="row" id="resultschool1">
      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _ahlone ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _6 ?></p>
          </div>
          <img src="images/school/AhloneBEHS6.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>


      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _botahtaung ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _3 ?></p>
          </div>
          <img src="images/school/BotahtaungBEHS3.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _dagon ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/DagonBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _yankin ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/YankinBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>

      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _mingalardon ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _4 ?></p>
          </div>
          <img src="images/school/MingalardonBEHS4.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>
      </div>

      <div class="col-lg-4">

        <a class="work-thumb" style="width: 280px; height: 290px;margin:0px auto;margin-bottom: 20px;">
          <div class="work-text">
            <h2><?= _pabedan ?></h2>
            <p style="color:yellow;"><?= _behs ?>-<?= _2 ?></p>
          </div>
          <img src="images/school/PabedanBEHS2.jpg" alt="Image" class="img-fluid" style="width: 280px;height: 290px;">
        </a>
      </div>

    </div>
    <div class="row mt-5">
      <div class="col-12 text-center">
        <!-- <p><a class="btn btn-outline-white px-4 py-3">More Portfolio</a></p> -->
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    // load_data();

    $('#resultschool1').hide();

    function load_data(query) {
      $.ajax({
        url: "find.php",
        method: "post",
        data: {
          query: query
        },
        success: function(data) {
          $('#resultschool').html(data);
        }

      });
    }

    $('#search_text').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        $('#townshiptitle').show();
        $('#resultschool1').hide();
        load_data(search);
      }

      if (search == 0) {

        $('#resultschool').html('');
        $('#resultschool1').show();
      }

    });



    function load_townshipdata(query) {
      $.ajax({
        url: "find1.php",
        method: "post",
        data: {
          query: query
        },
        success: function(data1) {
          $('#townshiptitle').html(data1);
        }

      });
    }

    $('#search_text').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        $('#townshiptitle').show();
        $('#resultschool1').hide();
        load_townshipdata(search);
      }

      if (search == 0) {

        $('#resultschool').html('');
        $('#resultschool1').show();
        $('#townshiptitle').hide();
      }

    });



  });
</script>