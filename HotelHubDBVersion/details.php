<?php 
  session_start();
  include_once("functions/File.php");
  include_once("functions/HotelDB.php");
  require_once("account/auth_library.php");
  include_once("layout/Template.php");
  
  $id = $_GET["id"];
  $hotel = Hotel::getHotel($id);
  $rooms = Hotel::getRooms($id);
  $user = new User();

  Template::Header();
?> 
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Back to Home</a>
  </li>
</ul>
<div class="container-fluid text-center">
  <h1><?=$hotel['hotelName']?></h1>
</div>
  
<div class="container cs-body-overlap">

  <div class="row overlap">
      <div class="col-md-12">
	  <br>
        <?php
          foreach($rooms as $name=>$value) {
        ?>
            <div class="row hotel-card">
              <div class="col-md-4 background-card" style="background-image:url(<?php echo $value["roomImageUrl"]; ?>)"></div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                        <h5><b>Number of Beds:</b> <?= $value["numberOfBeds"]; ?> </h5>
                        <h5><b>Room Type:</b> <?= $value["roomType"]; ?> </h5>
                        <h5><b>Price per night: $</b> <?= $value["price"]; ?> </h5>
                        <?php 
                          if($user->is_logged('email')){
                        ?>
                          <a class="btn btn-md btn-info" href="admin/edit.php?roomNum=<?= $value["roomNumber"]; ?>">Reserve</a>

                        <?php  
                          }
                        ?> 

                  </div>
                </div>
              </div>
            </div>
              <br />
            <?php
          }
        ?>

      </div>
  </div>
</div>
<?php Template::Footer(); ?> 





