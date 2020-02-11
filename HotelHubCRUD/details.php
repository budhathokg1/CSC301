<?php 
	include('functions.php');

	$id = $_GET['id'];
	$hotel_array = jsonToArray('data.json');
	$hotels = $hotel_array[0]['hotels'];

include('header.php');
?> 
<body>

<div class="container-fluid text-center">
  <h1><?php echo $id; ?></h1>
</div>
  
<div class="container cs-body-overlap">
  <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8 overlap">
          <div class="row background-card" style="background-image:url(<?php echo $hotels[$id]["img_url"] ?>)"></div>
            <h5><b>Address:</b> <?php echo $hotels[$id]["address"]; ?> </h5>
            <h5><b>Price per night:</b> <?php echo $hotels[$id]["price_per_night"]; ?> </h5>
        </div>
      <div class="col-md-2">

      </div>
  </div>
</div>

</body>
</html>

