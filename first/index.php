<?php
$firstName = "Ganesh";
$lastName = "Budhathoki";
$email = "ganesh.budhathoki88@gmail.com";
$major = "Computer Science";
$year = "Senior";
$bio = "I'm a 21 year old Web Developer originally from Nepal. I currently live in the United States
                    and I am studying Computer Science
                    as a major and Mathematics as a minor at Northern Kentucky University. I hope to graduate in
                    May 2020.";
$interest = "I like investing in my leisure time.";
$funFact = "Almost as many people own dogs as stocks and shares";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

    .bio {
      background-color: #f7f7f7;
      border-radius: 5px;

    }

  </style>
</head>
<body>

<div class="container-fluid text-center">
  <h1>Bio of <?php echo $firstName." ".$lastName;?></h1>
</div>
  
<div class="container cs-body-overlap">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 bio">
    <div class="row">
      <div class="col-sm-6">
      <br />
      <img src="http://studenthome.nku.edu/~budhathokg1/images/personal/IMG_20171208_121816.jpg" alt="Ganesh Budhathoki" height="400">
      <br /> <br />
      </div>
      <div class="col-sm-6">
      <br />
        <p><b>Name: </b> <?php echo $firstName." ".$lastName ?></p>
        <p><b>Email: </b> <a href="mailto:<?php echo $email; ?>"><?php echo $email?></a></p>
        <p><b>Major: </b> <?php echo $major ?></p>
        <p><b>Year: </b> <?php echo $year ?></p>
        <p><b>Bio: </b><?php echo $bio ?></p>
        <p><b>Interest: </b><?php echo $interest ?></p>
        <p><b>Fun Fact: </b><?php echo $funFact ?></p>

        <br />
        <br />
      </div>
    </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>

</body>
</html>

