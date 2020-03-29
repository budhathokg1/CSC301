<?php 
  session_start();
	include_once("functions/File.php");
  require_once("account/auth_library.php");
  include_once("layout/Template.php");
  
  $id = $_GET["id"];
	$hotel = File::readJSON("assets/data/hotels.json", $id);
  $user = new User();

  Template::Header();
?> 

<div class="container-fluid text-center">
  <h1><?= $hotel["hotel_name"] ?></h1>
</div>
  
<div class="container cs-body-overlap">
  <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8 overlap">
          <div class="row background-card" style="background-image:url(<?= $hotel["img_url"] ?>)"></div>
            <h5><b>Address:</b> <?= $hotel["address"]; ?> </h5>
            <h5><b>Price per night: $</b> <?= $hotel["price_per_night"]; ?> </h5>
            <?php 
              if($user->is_logged('email')){
                ?>
                  <a class="btn btn-md btn-info" href="admin/edit.php?id=<?= $_GET["id"]; ?>">Edit</a>
                  <a class="btn btn-md btn-danger" href="admin/delete.php?id=<?= $_GET["id"]; ?>">Delete</a>
                <?php  
              }
            ?>
            <a class="btn btn-md btn-info" href="index.php">Back To Home</a><br/>           
        </div>
      <div class="col-md-2">

      </div>
  </div>
</div>
<?php Template::Footer(); ?> 

