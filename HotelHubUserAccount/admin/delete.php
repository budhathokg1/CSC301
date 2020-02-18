<?php 
	include_once("../functions/functions.php");

	deleteJSON('../assets/data/hotels.json', $_GET['id']);

	header("Location: ../index.php"); 
?>