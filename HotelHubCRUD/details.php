<?php 
	include('functions.php');

	$id = $_GET['id'];
	$hotel_array = jsonToArray('data.json');
	$hotels = $hotel_array[0]['hotels'];


?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HotelHub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

    body {
      background: #f1f1f1;
    }
    .container-fluid h1{
      padding: 7%;
      color: #f7f7f7;

    }

    .container-fluid {
      background-color: #ff7b00 !important;
    }

    .cs-body-overlap {
    margin-top: -3% !important;
    }

    .overlap {
      background-color: #f7f7f7;
      border-radius: 5px;

    }

    .hotel-card {
      min-height: 232px;
      border-radius: 2px;
      border: 1px solid #e6e6e6;

    }

    .background-card{
      min-height: 232px;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;

    }

  </style>
</head>
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

