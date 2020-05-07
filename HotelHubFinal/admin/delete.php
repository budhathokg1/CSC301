<?php 
	require_once('../_settings.php');
	require_once(APP_ROUTE."/functions/File.php");
	require_once(APP_ROUTE."/functions/HotelDB.php");

	Hotel::deleteHotel($_GET['id']);

	header("Location: ../index.php"); 
?>