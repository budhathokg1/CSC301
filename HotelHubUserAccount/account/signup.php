<?php 
  require_once("../functions/File.php");
  require_once("../layout/Template.php");
  require_once('auth_library.php');
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new User($_POST['email'], $_POST['pwd']);
    $error= $user->signup('users.csv.php');
	  if(isset($error{0})) echo $error;
  }
   
  Template::Header();
?>

<div class="container-fluid text-center">
    <h1>Sign Up</h1>
</div>

<div class="container cs-body-overlap">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 overlap">
        <form class="form-horizontal" action="signup.php" method="POST">
        <br><br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required minlength="8">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

<?php Template::Footer(); ?>