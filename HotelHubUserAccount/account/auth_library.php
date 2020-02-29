<?php
function is_logged($field_name){
    return isset($_SESSION[$field_name]{0});
}
function signup($file){
       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return "The email that you entered is not valid";
       $_POST['email'] = strtolower($_POST['email']);

       $_POST['pwd'] = trim($_POST['pwd']);
       if(strlen($_POST['pwd'])<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';
       
       if(!file_exists($file)){
			$h=fopen($file,'w+');
			fwrite($h,'<? die(); ?>'."\n");
			fclose($h);
	   }
       $h=fopen($file,'r');
		while(!feof($h)){
			$line=fgets($h);
			if(strstr($line,$_POST['email'])) return '<div class="alert alert-danger" role="alert">Email already is already registered!</div>';
		}
		fclose($h);

        $_POST['pwd']=password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        $h=fopen($file,'a+');
		fwrite($h,implode(';',[$_POST['email'],$_POST['pwd']])."\n");
		fclose($h);

        echo '<div class="alert alert-success" role="alert">You have successfully registered now you can <a href="signin.php">Sign in!</a></div>';
		return '';
}
function signin($file){
       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return "The email that you entered is not valid";
       $_POST['email'] = strtolower($_POST['email']);

       $_POST['pwd'] = trim($_POST['pwd']);
       if(strlen($_POST['pwd'])<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';
       
       if(!file_exists($file)){
			$h=fopen($file,'w+');
			fwrite($h,'<? die(); ?>'."\n");
			fclose($h);
	   }

       $h=fopen($file,'r');
	   while(!feof($h)){
			$line=fgets($h);
            $line=preg_replace('/\n/','',$line);
			if(strstr($line,$_POST['email'])) {
                $line=explode(';', $line);
                if(!password_verify($_POST['pwd'], $line[1])) {
                    return '<div class="alert alert-danger" role="alert">Password does not match!</div>';
                }
                else{
                    $_SESSION['email'] = $_POST['email'];
                    return '<div class="alert alert-success" role="alert">You have sucessfully signed in to your account. <a href="../index.php">Welcome!</a></div>';
                }  
            }
            
	   }
		fclose($h);
        return '<div class="alert alert-danger" role="alert">The credentials entered are not registered, you may need to <a href="signup.php">Sign Up</a></div>';
}
function signout($field_name){
    if($_SESSION[$field_name]{0}) header('location: ../index.php');
    session_start();
    $_SESSION=[];
    session_destroy();
    header('location: ../index.php');
}
?>