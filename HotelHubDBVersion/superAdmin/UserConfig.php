<?php
    require_once('../functions/UserManager.php');
    require_once('../layout/Template.php');

    $users=UserManager::getUsers();
?> 
<!DOCTYPE html>
        <html lang="en">
        <head>
        <title>User Mamager</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        </head>
        <body>
            
<div class="container-fluid text-center">
  <h1>User Manager</h1>
</div>
<div class="container cs-body-overlap">

  <div class="row overlap">
      <div class="col-md-12">
	  <br>
	  <div class="row">
      <div class="list-group">
      <a href="userCreate.php" class="list-group-item list-group-item-action">Add a New User</a>
    </div>
	  <br>
        <?php
          foreach($users as $name=>$value) {
        ?>
          <div class="card w-50 text-center">
  <div class="card-body">
    <h3 class="card-title"><?php print($value['firstName']." ".$value['lastName'])?></h5>
    <p class="card-text">E-Mail: <?=$value['email']?></p>
    <p class="card-text">Password: <?=$value['password']?></p>
    <p class="card-text">User Type: <?=$value['userType']?></p>
    <a href="userModify.php?id=<?= $value['userID']; ?>" class="btn btn-primary">Edit</a>
  </div>
</div>
<br>
            <?php
          }
        ?>

      </div>
  </div>
</div>
</body>
</html>