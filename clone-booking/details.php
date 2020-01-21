<?php 

$id = $_GET['id'];

$hotels = array(
  "Kimpton George Hotel" => array(
    "address" => "15 E Street Northwest, Northwest, Washington, D.C., DC 20001, United States of America",
    "img_url" =>"https://r-cf.bstatic.com/images/hotel/max1024x768/230/230389960.jpg",
    "price_per_night" =>"$1367.26"
  ),
  "Washington Court Hotel" => array(
    "address" => "525 New Jersey Avenue Northwest, Northwest, Washington, D.C., DC 20001, United States of America",
    "img_url" =>"https://q-cf.bstatic.com/images/hotel/max1024x768/972/97220601.jpg",
    "price_per_night" =>"$1746.06"
  ),
  "Liaison Washington Capitol Hill" => array(
    "address" => "415 New Jersey Avenue Northwest, Northwest, Washington, D.C., DC 20001, United States of America",
    "img_url" =>"https://q-cf.bstatic.com/images/hotel/max1024x768/267/26768924.jpg",
    "price_per_night" =>"$1371.73"
  ),
  "Hyatt Regency Washington on Capitol Hill" => array(
    "address" => "400 New Jersey Avenue Northwest, Northwest, Washington, D.C., DC 20001, United States of America",
    "img_url" =>"https://r-cf.bstatic.com/images/hotel/max1024x768/234/234224865.jpg",
    "price_per_night" =>"$1668.54"
  ),
  "The Wink" => array(
    "address" => "1143 New Hampshire Avenue Northwest, Northwest, Washington, D.C., DC 20037, United States of America",
    "img_url" =>"https://q-cf.bstatic.com/images/hotel/max1024x768/233/233409647.jpg",
    "price_per_night" =>"$1103.46"
  ),
  "Hamilton Hotel - Washington DC" => array(
    "address" => "1001 14th Street Northwest, Northwest, Washington, D.C., DC 20005, United States of America",
    "img_url" =>"https://r-cf.bstatic.com/images/hotel/max1024x768/183/183884153.jpg",
    "price_per_night" =>"$1691.49"
  ),
  "The Watergate Hotel Georgetown" => array(
    "address" => "2650 Virginia Avenue NW, Northwest, Washington, D.C., DC 20037, United States of America",
    "img_url" =>"https://q-cf.bstatic.com/images/hotel/max1024x768/179/179521128.jpg",
    "price_per_night" =>"$1462.06"
  )
  
); 

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking.com</title>
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
      background-color: #3b78e7 !important;
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

