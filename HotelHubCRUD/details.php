<?php 
	include_once("functions.php");

	$id = $_GET["id"];
	$hotel = readJSON("hotels.json", $id);

  include_once("header.php");
?> 
<body>

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
            <a class="btn btn-md btn-info" href="edit.php?id=<?= $_GET["id"]; ?>">Edit</a>
            <a class="btn btn-md btn-danger" href="delete.php?id=<?= $_GET["id"]; ?>">Delete</a>
            <br>
        </div>
      <div class="col-md-2">

      </div>
  </div>
</div>

</body>
</html>

