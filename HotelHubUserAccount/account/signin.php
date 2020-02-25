<?php
     include("../functions/functions.php");
   function signin(){
       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return "The email that you entered is not valid";
       $_POST['email'] = strtolower($_POST['email']);

       $_POST['pwd'] = trim($_POST['pwd']);
       if(strlen($_POST['pwd'])<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';
       
       if(!file_exists('users.csv.php')){
			$h=fopen('database.csv','w+');
			fwrite($h,'<? die(); ?>'."\n");
			fclose($h);
	   }

       $h=fopen('users.csv.php','r');
		while(!feof($h)){
			$line=fgets($h);
            $line=preg_replace('/\n/','',$line);
			if(strstr($line,$_POST['email'])) {
                $line=explode(';', $line);
                if(!password_verify($_POST['pwd'], $line[1])) {
                    return '<div class="alert alert-danger" role="alert">Password does not match!</div>';
                }
                else return '<div class="alert alert-success" role="alert">You have sucessfully signed in to your account. Welcome!</div>';
            }   
            
		}
		fclose($h);
        return '<div class="alert alert-danger" role="alert">The credentials entered are not registered, you may need to <a href="signup.php">Sign Up</a></div>';
   }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $error=signin();
	    if(isset($error{0})) echo $error;
    }
   
    include_once("../header/header.php");
?>
<div class="container-fluid text-center">
    <h1>Sign In</h1>
</div>

<div class="container cs-body-overlap">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 overlap">
        <form class="form-horizontal" action="signin.php" method="POST">
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

<?php include_once("../footer/footer.php"); ?>