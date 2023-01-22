<div class="section">
  <div class="container">



    <div class="row">

      <div class="col-md-12 text-center">
        <?= _contact_info1 ?>
        <p class="mb-5"><?= _gotq ?></p>

        
						<div class="map-area">
							<h2><?= _location ?></h2>
							<div id="map">
								<div id="popup" class="ol-popup">
									<a href="#" id="popup-closer" class="ol-popup-closer"></a>
									<div id="popup-content"></div>
								</div>
							</div>
						</div> <!-- /.map-area -->
					<br>
      </div>
     
      
      
      
      
      <div class="col-md-6 mb-5 order-2">
        <form action="#" method="post">
          <div class="row">

            <div class="col-md-6 form-group">
              <label for="name"><?= _name ?></label>
              <input type="text" id="name" class="form-control ">
            </div>
            <div class="col-md-6 form-group">
              <label for="phone"><?= _ph ?></label>
              <input type="text" id="phone" class="form-control ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email"><?= _email ?></label>
              <input type="email" id="email" class="form-control ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="message">Write Message</label>
              <textarea name="message" id="message" class="form-control " cols="30" rows="8" style="resize: none;"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="submit" value="<?= _send?>" class="btn btn-primary px-3 py-3">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 order-2 mb-5">
        <div class="row justify-content-right">
          <div class="col-md-8 mx-auto contact-form-contact-info">
            <p class="d-flex">
              <span class="ion-ios-location icon mr-5"></span>
              <span><?= _address_txt ?></span>
            </p>

            <p class="d-flex">
              <span class="ion-ios-telephone icon mr-5"></span>
              <span>09-791234567</span>
            </p>

            <p class="d-flex">
              <span class="ion-android-mail icon mr-5"></span>
              <span>fms1235679@gmail.com</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>