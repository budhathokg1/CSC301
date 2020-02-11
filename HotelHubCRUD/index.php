<?php 
	include_once('functions.php');
	
  $hotels = readJSON("hotels.json");
  // foreach($hotels as $name=>$value) {
  //   print_r($name);
  //   echo "<hr>";
  //   print_r($value);
  // }
  // die();

  include('header.php');
?> 
<body>

<div class="container-fluid text-center">
  <h1>HotelHub</h1>
</div>
  
<div class="container cs-body-overlap">
  <div class="row overlap">
      <div class="col-md-12">
	  <br>
	  <div class="row">
		<div class="col text-center">
	  <a class="btn btn-md bg-info" href="create.php">Add a New Hotel</a>
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
                    <a class="btn btn-md bg-info" href="details.php?id=<?= $name; ?>">Details</a>

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

</body>
</html>

