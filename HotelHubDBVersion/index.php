<?php 
session_start();
include_once("functions/File.php");
include_once("functions/HotelDB.php");    
require_once("account/auth_library.php");
include_once("layout/Template.php");
    

$hotels = Hotel::getHotels();

$loginCheck = new User();
Template::Header();
?> 
<?php
if(!$loginCheck->is_logged('email')){
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
    <?php if($loginCheck->is_logged('email') && $loginCheck->isAdmin('email')) echo'
    <div class="list-group">
      <a href="admin/create.php" class="list-group-item list-group-item-action">Add a New Hotel</a>
    </div>'?>
	  <br>
        <?php
          foreach($hotels as $name=>$value) {
        ?>
            <div class="row hotel-card">
              <div class="col-md-4 background-card" style="background-image:url(<?php echo $value["hotelImageUrl"]; ?>)"></div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <h3><?= $value["hotelName"]; ?></h3>
                    <h5>Address: <?php print($value["streetName"]." ".$value["city"].", ".$value["state"]." ".$value["zipCode"]); ?></h5>
                    <a class="btn btn-md btn-primary" href="details.php?id=<?= $value["hotelID"]; ?>">Available Rooms</a>
                    <?php if($loginCheck->is_logged('email') && $loginCheck->isAdmin('email')){ ?>
                    <a class="btn btn-md btn-info" href="admin/edit.php?id=<?= $value["hotelID"]; ?>">Edit</a>
                    <a class="btn btn-md btn-danger" href="admin/delete.php?id=<?= $value["hotelID"]; ?>">Delete</a>
                    <?php }?>
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
<?php
Template::Footer();
?>