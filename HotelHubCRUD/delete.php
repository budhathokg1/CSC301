<?php 
	include_once("functions.php");

	deleteJSON('hotels.json', $_GET['id']);

	header("Location: index.php"); 
?>