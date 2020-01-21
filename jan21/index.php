<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

 
<div class="container">
  <div class="row">
    <h1 class="text-center">Multiplication Table</h1>
  </div>
  <div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8">
	<table class="table table-bordered table-striped">
    <?php
      for($i=0; $i<=6; $i++) {
        echo '<tr>';
        for($j=0; $j<=5; $j++) {
          echo '<td>';
          echo "$i * $j = ". ($i*$j);
          echo '</td>';
        }
        echo '</tr>';
      }
    ?>
	</table>
    </div>
    <div class="col-sm-2">

    </div>
  </div>
</div>

</body>
</html>
