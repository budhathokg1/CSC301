<?php 
require_once('auth_library.php');
$user = new User();

$user->signout('email');
?>