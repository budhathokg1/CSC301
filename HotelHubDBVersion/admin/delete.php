<?php 
	require_once("../functions/File.php");
	require_once("../functions/HotelDB.php");

	Hotel::deleteHotel($_GET['id']);

	header("Location: ../index.php"); 
?>