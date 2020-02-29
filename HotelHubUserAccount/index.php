<?php 
session_start();
include_once("functions/functions.php");    
require_once("account/auth_library.php");
    
	
$hotels = readJSON("assets/data/hotels.json");

include_once("header/header.php");
?> 
<?php
if(!is_logged('email')){
    echo'<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="account/signin.php">Sign In</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="account/signup.php">Sign Up</a>
  </li>
</ul>';
}
else{
    echo'<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="account/signout.php">Sign Out</a>
  </li>
</ul>';
}
?>
<div class="container-fluid text-center">
  <h1>HotelHub</h1>
</div>
  
<div class="container cs-body-overlap">

  <div class="row overlap">
      <div class="col-md-12">
	  <br>
	  <div class="row">
		<div class="col text-center">
        <?php if(is_logged('email')) echo '<a class="btn btn-md btn-info" href="admin/create.php">Add a New Hotel</a>'?>
	     </div>
	  </div>
	  <br>
        <?php
          foreach($hotels as $name=>$value) {
        ?>
            <div class="row hotel-card">
              <div class="col-md-4 background-card" style="background-image:url(<?php echo $value["img_url"]; ?>)"></div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <h3><?= $value["hotel_name"]; ?></h3>
                    <h5>Address: <?= $value["address"] ?></h5>
                    <h5>Price Per Night: $<?= $value["price_per_night"] ?></h5>
                    <a class="btn btn-md btn-primary" href="details.php?id=<?= $name; ?>">Details</a>

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

<?php include_once("footer/footer.php"); ?> 
