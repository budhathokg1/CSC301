<?php 
	require_once("../functions/File.php");

	File::deleteJSON('../assets/data/hotels.json', $_GET['id']);

	header("Location: ../index.php"); 
?>